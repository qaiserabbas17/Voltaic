@extends('layouts.master')

@section('content')

<div class="mb-5">
	<div class="page-header">
		<h4 class="page-title"><i class="fe fe-file-text mr-1"></i>Create Role</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Role</a></li>
			<li class="breadcrumb-item active" aria-current="page">create Role</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<form action="{{route('role.store')}}" method="post" class="card">
			@csrf
			<div class="card-header">
				<h3 class="card-title">Create Role</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="text" class="form-control" name="name" placeholder="Name" required="required">
						</div>
					</div>

					
		
				<div class="table-responsive ">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="wd-15p border-bottom-0">Name</th>
								<th class="wd-15p border-bottom-0">View</th>
								<th class="wd-15p border-bottom-0">Create</th>
								<th class="wd-15p border-bottom-0">Edit</th>
								<th class="wd-15p border-bottom-0">Delete</th>
							</tr>
						</thead>
						@foreach($modules as $module)
						<input type="hidden" name="moduleid[{{$module->id}}]" value="{{$module->id}}">
						<tbody class="rolemodules">
							<tr>
								<td>{{$module->name}}</td>
								<td>
									<label class="custom-switch pl-0">

										
										<input type="checkbox" name="view[{{$module->id}}]" class="custom-switch-input" id="checkbox"> 
										<span class="custom-switch-indicator"></span> 
									</label>
								</td>
								<td>
									<label class="custom-switch pl-0"> 
										<input type="checkbox" name="create[{{$module->id}}]" class="custom-switch-input"> 
										<span class="custom-switch-indicator"></span> 
									</label>
								</td>
								<td>
									<label class="custom-switch pl-0"> 
										<input type="checkbox" name="edit[{{$module->id}}]" class="custom-switch-input"> 
										<span class="custom-switch-indicator"></span> 
									</label>
								</td>
								<td>
									<label class="custom-switch pl-0"> 
										<input type="checkbox" name="delete[{{$module->id}}]" class="custom-switch-input"> 
										<span class="custom-switch-indicator"></span> 
									</label>
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>
				</div>
						<div class="mt-2 mb-0">
						<button style="background-color: #089e60;color: #fff;margin-left: 7px;" class="btn" type="submit" class="">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	

@endsection