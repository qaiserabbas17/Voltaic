@extends('layouts.master')
@section('content')
<!--Page Header-->
<div class="page-header">
	<h4 class="page-title"><i class="fe fe-grid mr-1"></i> Users List</h4>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ Route('Dashboard')}}"> Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Users</li>
	</ol>
</div>
<!--page header-->
<div class="row">
	<div class="col-md-12 col-lg-12">
		<div class="card">
			@if (session('success'))
			<div class="alert alert-successs alert-dismissible fade show">{{ session('success') }}
				<button type="button" class="close" data-dismiss="alert">&times;</button>
			</div>
			@endif
			@if (session('delete'))
			<div class="alert alert-delete alert-dismissible fade show">{{ session('delete') }}
				<button type="button" class="close" data-dismiss="alert">&times;</button>
			</div>
			@endif
			<div class="card-header">
				<div class="col-md-12 col-lg-6">
					<div class="card-title">Users List</div>
				</div>
				<div class="col-md-12 col-lg-6">
					@if(isset(Auth::user()->hasPer('Users')['pcreate']) && Auth::user()->hasPer('Users')['pcreate'] == 1)
					
					<a class="create-btn" href="{{ route('users.create')}}">Create User</a>
					@endif
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive ">
					<table id="example-2" class="table table-bordered">
						<thead>
							<tr>
								<th class="wd-15p border-bottom-0">Id</th>
								<th class="wd-15p border-bottom-0">First Name</th>
								<th class="wd-15p border-bottom-0">Last Name</th>
								<th class="wd-15p border-bottom-0">Role</th>
								<th class="wd-20p border-bottom-0">Email</th>
								<th class="wd-10p border-bottom-0">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->firstname }}</td>
							<td>{{ $user->lastname }}</td>
							<td>{{ $user->role_id == 1 ? 'Admin' : 'User' }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<form action="{{ route('users.destroy', $user->id) }}" method="POST">
									@if(isset(Auth::user()->hasPer('Users')['pedit']) && Auth::user()->hasPer('Users')['pedit'] == 1)
									
									<a href="{{ route('users.edit', $user->id) }}" title="Edit">
										<i class="fas fa-edit  fa-lg"></i>
									</a>
									@endif
									@csrf
									@method('DELETE')
									@if(isset(Auth::user()->hasPer('Users')['pdelete']) && Auth::user()->hasPer('Users')['pdelete'] == 1)
									<button type="submit" title="delete" style="border: none; background-color:transparent;" onclick="myFunction()">
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
		</div>
	</div>
</div>
@endsection
