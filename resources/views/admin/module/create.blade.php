@extends('layouts.master')

@section('content')

<div class="mb-5">
	<div class="page-header">
		<h4 class="page-title"><i class="fe fe-file-text mr-1"></i>Create Module</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">category</a></li>
			<li class="breadcrumb-item active" aria-current="page">create Module</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<form action="{{route('module.store')}}" method="post" class="card">
			@csrf
			<div class="card-header">
				<h3 class="card-title">Create Module</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="form-group">
							<label class="form-label">Name</label>
							<input type="text" class="form-control" name="name" placeholder="Name" required="required">
						</div>
						<div class="form-group">
							<label class="form-label">Route</label>
							<input type="text" class="form-control" name="route" placeholder="Add Here Route" required="required">
						</div>
					</div>
					<div class="mt-2 mb-0">
						<button style="background-color: #089e60;color: #fff;margin-left: 7px;" class="btn" type="submit" class="">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	

@endsection