@extends('layouts.master')

@section('content')
<div class="page-header">
	<h3 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
	</ol>
</div>

<div class="row">
	<div class="col-xl-3 col-lg-6 col-md-12 col-sm-6">
		<div class="card">
			<div class="card-body">
				<div class="d-flex mb-4">
					<span class="avatar align-self-center avatar-lg br-7 cover-image bg-primary-transparent">
						<i class="fe fe-map-pin text-primary"></i>
					</span>
					<div class="svg-icons text-right ml-auto">
						<h5 class="text-muted">Locations</h5>
						<h2 class="mb-0 font-weight-extrabold num-font">25,356</h2>
					</div>
				</div>
				<div class="progress progress-md h-2">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-70"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-md-12 col-sm-6">
		<div class="card">
			<div class="card-body">
				<div class="d-flex mb-4">
					<span class="avatar align-self-center avatar-lg br-7 cover-image bg-secondary-transparent">
						<i class="fe fe-shopping-cart text-secondary"></i>
					</span>
					<div class="svg-icons text-right ml-auto">
						<h5 class="text-muted">Orders</h5>
						<h2 class="mb-0 font-weight-extrabold num-font">26,536</h2>
					</div>
				</div>
				<div class="progress progress-md h-2">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary w-50"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-md-12 col-sm-6">
		<div class="card">
			<div class="card-body">
				<div class="d-flex mb-4">
					<span class="avatar align-self-center avatar-lg br-7 cover-image bg-pink-transparent">
						<i class="fe fe-truck text-pink"></i>
					</span>
					<div class="svg-icons text-right ml-auto">
						<h5 class="text-muted">Delivery Items</h5>
						<h2 class="mb-0 font-weight-extrabold num-font">17,356</h2>
					</div>
				</div>
				<div class="progress progress-md h-2">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-pink w-80"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-md-12 col-sm-6">
		<div class="card">
			<div class="card-body">
				<div class="d-flex mb-4">
					<span class="avatar align-self-center avatar-lg br-7 cover-image bg-warning-transparent">
						<i class="fe fe-eye text-warning"></i>
					</span>
					<div class="svg-icons text-right ml-auto">
						<h5 class="text-muted">Dashboard Views</h5>
						<h2 class="mb-0 font-weight-extrabold num-font">65,458</h2>
					</div>
				</div>
				<div class="progress progress-md h-2">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning w-70"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
