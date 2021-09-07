@extends('layouts.master')

@section('content')
<!--Page Header-->
<div class="page-header">
	<h4 class="page-title"><i class="fe fe-file-text mr-1"></i>User Form</h4>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ Route('Dashboard')}}"> Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Add User</li>
	</ol>
</div>
<!--page header-->

<div class="row">
	<div class="col-lg-12">
		
		<form role="form" action="{{ route('users.update', $user->id) }}" method="POST" class="card">
			@csrf
			@method('PUT')	 
			<div class="card-header">
				<h3 class="card-title">Edit User</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="firstname" class="form-label">{{ __('First Name') }}</label>

							<input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $user->firstname }}" autocomplete="firstname" autofocus>
							@error('firstname')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="lastname" class="form-label">{{ __('Last Name') }}</label>
							<input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}" autocomplete="lastname" autofocus>

							@error('lastname')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="phone" class="form-label">{{ __('Phone') }}</label>
							<input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" autocomplete="phone" autofocus>
						</div>

						<div class="form-group">
							<label for="role_id" class="form-label">{{ __('Role') }}</label>
							<select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" aria-label="Default select example">
								@foreach($roles as $role)
								<option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
								@endforeach
							</select>
							@error('role_id')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="password" class="form-label">{{ __('Password') }}</label>
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>

						<div class="form-group">
							<label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
						</div>
						<div class="form-group">
							<div class=" mt-2 mb-0">
								<button type="submit" class="btn btn-primary">
									{{ __('Update User') }}
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
