<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use App\Models\Role;
Use DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'role_id',
        'email',
        'password',
        'confirmation_password',
        'term_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permission()
    {
        return $this->hasMany(RolePermission::class, 'role_id','role_id');
    }

    public function getmodules()
    {

        $perms = $this->permission()->select(DB::raw("GROUP_CONCAT(module_id SEPARATOR ',') as `modules`"))->where('pview', '=', '1')->first();
        $modules = Module::whereIn('id', explode(',', $perms->modules))->get();
        //print_r($modules);die();
        return $modules;
    }

    public function hasPer($perm = null)
    {
        if(is_null($perm)) return false;
        $module = Module::where('name',$perm)->first();
        //print_r($module);die();
        $perms = $this->permission()->select('pview','pedit','pcreate','pdelete')->where('module_id', '=', $module->id)->first();
        return ($perms) ? $perms->toArray() : [];
        // if ($perms) {
        //     return $perms->toArray();
        // }
        // else{
        //     return [];
        // }
    }

    public function wishlist(){
    return $this->hasMany(Wishlist::class);
    }

    public function compare(){
    return $this->hasMany(Compare::class);
    }
}
