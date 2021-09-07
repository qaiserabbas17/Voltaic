@extends('layouts.master')

@section('content')

<div class="page-header">
	<h4 class="page-title"><i class="fe fe-grid mr-1"></i>General Setting</h4>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ Route('Dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Setting</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12">
		
		@if($setting)
        <form action="{{ route('generalsetting.update', $setting->id) }}" method="post" class="card" enctype="multipart/form-data">
        	@csrf
        	@method('PUT')
        	@else
		<form action="{{ route('generalsetting.store') }}" method="post" class="card" enctype="multipart/form-data">
			@csrf
			@endif
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
				<h3 class="card-title">Dashboard Setting</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label class="form-label">Title</label>
							<input type="text" class="form-control @error('title') has-error @enderror" name="title" placeholder="Name" value="{{ $setting ? $setting->title : ''}}">
							@error('title')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>

						<div class="form-group">
							<label class="form-label">Address<span class="form-label-small"></span></label>
							<textarea class="form-control" name="address" rows="6" placeholder="text here..">{{ $setting ? $setting->address : ''}}</textarea>
						</div>
						<div class="form-group">
							<label class="form-label">Email</label>
							<input type="text" class="form-control @error('email') has-error @enderror" name="email" placeholder="Email.." value="{{$setting ? $setting->email : ''}}">
							@error('email')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group">
							<label class="form-label">Phone</label>
							<input type="text" class="form-control" name="phone"
							placeholder="number.." value="{{$setting ? $setting->phone : ''}}">
						</div>
						<div class="form-group">
							<label class="form-label">Facebook</label>
							<input type="text" class="form-control" name="facebook"
							placeholder="facebook" value="{{$setting ? $setting->facebook : ''}}">
						</div>
						<div class="form-group ">
							<label class="form-label">Instagram</label>
							<input type="text" class="form-control" name="instagram"
							placeholder="instagram" value="{{$setting ? $setting->instagram : ''}}">
						</div>
						<div class="form-group">
							<label class="form-label">Twitter</label>
							<input type="text" class="form-control" name="twitter"
							placeholder="twitter" value="{{$setting ? $setting->twitter : ''}}">
						</div>
						<div class="form-group">
							<label class="form-label">LinkedIn</label>
							<input type="text" class="form-control" name="linkedin"
							placeholder="linkedin" value="{{$setting ? $setting->linkedin : ''}}">
						</div>
						<div class="form-group">
							<label class="form-label">Logo</label>
							<input type="file" class="form-control" name="logo" placeholder="Logo" value="{{$setting ? $setting->logo : ''}}">
						</div>
						<div class="form-group">
							<label class="form-label">Favicon</label>
							<input type="file" class="form-control" name="favicon"
							placeholder="favicon" value="{{$setting ? $setting->favicon : ''}}">
						</div>
						<div class="mt-2 mb-0">
							<button style="background: #0a9d6e;color: #fff;" class="btn" type="submit">Save</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection