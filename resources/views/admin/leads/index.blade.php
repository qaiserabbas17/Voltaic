@extends('layouts.master')
@section('content')
<!--Page Header-->
<div class="page-header">
	<h4 class="page-title"><i class="fe fe-grid mr-1"></i> Leads List</h4>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ Route('Dashboard')}}"> Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Leads</li>
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
					<div class="card-title">Leads List</div>
				</div>
				<div class="col-md-12 col-lg-6">
					
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive ">
					<table id="example-2" class="table table-bordered">
						<thead>
							<tr>
								<th class="wd-15p border-bottom-0">Id</th>
								<th class="wd-15p border-bottom-0">Name</th>
								<th class="wd-15p border-bottom-0">Address</th>
								<th class="wd-15p border-bottom-0">Phone</th>
								<th class="wd-20p border-bottom-0">Email</th>
								<th class="wd-20p border-bottom-0">Image</th>
								<th class="wd-10p border-bottom-0">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($leads as $lead)
						<tr>
							<td>{{ $lead->id }}</td>
							<td>{{ $lead->name }}</td>
							<td>{{ $lead->address }}</td>
							<td>{{ $lead->phone }}</td>
							<td>{{ $lead->email }}</td>
							<td>
								<a download="{{ $lead->bill_image }}" href="{{ URL::to('/') }}/assets/images/{{ $lead->bill_image }}" title="{{ $lead->bill_image }}">
							        <img src="{{ URL::to('/') }}/assets/images/{{ $lead->bill_image }}"  onerror="this.onerror=null;this.src='{{ asset('/assets/images/no-image.png') }}';" alt="" width="50" src="{{ URL::to('/') }}/assets/images/{{ $lead->bill_image }}">
                                </a>
							</td>
							<td>
								<form action="{{ route('leads.destroy', $lead->id) }}" method="POST">
									@if(isset(Auth::user()->hasPer('Users')['pedit']) && Auth::user()->hasPer('Users')['pedit'] == 1)
									
									<a href="{{ route('leads.edit', $lead->id) }}" title="Edit">
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

