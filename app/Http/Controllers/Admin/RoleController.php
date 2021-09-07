<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\Module;
use DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('admin/role/index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $modules = Module::orderBy('id','DESC')->get();
        return view('admin/role/create')->with(compact('modules'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        // echo '<pre>';print_r($request->all());echo '</pre>';       die;
        //die($request->get('view'));
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $role = new Role([
            'name' => $request->get('name')
        ]);
        $role->save();
        foreach ($request->moduleid as $key => $value) {
            $role_permission = new RolePermission([
                'role_id' => $role->id,
                'module_id' => $value,
                'pview' => isset($request->view[$key]) ? $request->view[$key] : 0,
                'pcreate' => isset($request->create[$key]) ? $request->create[$key] : 0,
                'pedit' => isset($request->edit[$key]) ? $request->edit[$key] : 0,
                'pdelete' => isset($request->delete[$key]) ? $request->delete[$key] : 0,
            ]);
            $role_permission->save();
        }
        return redirect('/admin/role')->with('success', 'role has been added.');

        // $request->validate([
        //     'name'    =>  'required',
        // ]);

        // $form_data = array(
        //     'name'       =>   $request->name,
        // );  
        // Role::create($form_data);

        // return redirect('admin/role')->with('success', 'Department Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with('permission')->findOrFail($id);
        $role->permission = json_decode($role->permission, true);
        // print_r(json_decode($role->permission, true));die;
        $modules = Module::orderBy('id','DESC')->get();
        return view('admin/role/edit', compact('role', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $form_data = array(
        //     'name'    =>  $request->name,
        // );

        $role = Role::whereId($id)->first();
        $role->name=  $request->get('name');
        $role->permission()->delete();
        $role->save();
        foreach ($request->moduleid as $key => $value) {
            $role_permission = new RolePermission([
                'role_id' => $role->id,
                'module_id' => $value,
                'pview' => isset($request->view[$key]) ? $request->view[$key] : 0,
                'pcreate' => isset($request->create[$key]) ? $request->create[$key] : 0,
                'pedit' => isset($request->edit[$key]) ? $request->edit[$key] : 0,
                'pdelete' => isset($request->delete[$key]) ? $request->delete[$key] : 0,
            ]);
            $role_permission->save();
        }
        return redirect('admin/role')->with('success', 'Data is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $dept = Role::where('id', $id);

        // $dept = Department::findOrFail($id);
        $dept->delete();
        return redirect('admin/role')->with('success', 'Data is successfully deleted');
    }

}