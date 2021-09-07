@extends('layouts.master')
@section('content')

<div class="mb-5">
	<div class="page-header">
		<h4 class="page-title"><i class="fe fe-file-text mr-1"></i>Role List</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Role</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="col-md-12 col-lg-6">
					<div class="card-title">Role List</div>
				</div>
				<div class="col-md-12 col-lg-6">
					@if(isset(Auth::user()->hasPer('Role')['pcreate']) && Auth::user()->hasPer('Role')['pcreate'] == 1)
						<a class="create-btn" href="{{ route('role.create')}}">Create Role</a>
					@endif
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive ">
					<table id="example-2" class="table table-bordered table-sm">
						<thead>
							<tr>
								<th class="wd-15p border-bottom-0">ID</th>
								<th class="wd-15p border-bottom-0">User</th>
								<th class="wd-15p border-bottom-0">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($roles as $role)
							<tr>
								<td>{{$role->id}}</td>
								<td>{{$role->name}}</td>
								<td>
								<form action="{{ route('role.destroy', $role->id) }}" method="POST">
									@csrf
									@method('DELETE')

									@if(isset(Auth::user()->hasPer('Role')['pedit']) && Auth::user()->hasPer('Role')['pedit'] == 1)
									<a href="{{ route('role.edit', $role->id) }}" title="Edit">
										<i class="fas fa-edit  fa-lg"></i>
									</a>
									@endif
									
									@if(isset(Auth::user()->hasPer('Role')['pdelete']) && Auth::user()->hasPer('Role')['pdelete'] == 1)
										<button type="submit" title="delete" style="border: none; background-color:transparent;">
										<i class="fas fa-trash fa-lg text-danger"></i>
									</button>
										@endif
								</form>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!-- table-wrapper -->
		</div>
		<!-- section-wrapper -->
	</div>
</div>
@endsection