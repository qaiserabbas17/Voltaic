@extends('layouts.master')

@section('content')

<div class="mb-5">
	<div class="page-header">
		<h4 class="page-title"><i class="fe fe-file-text mr-1"></i>Module List</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Module</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Category</div>
			</div>
			<div class="card-body">
				<div class="table-responsive ">
					<table id="example-2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="wd-15p border-bottom-0">ID</th>
								<th class="wd-15p border-bottom-0">NAME</th>
								<th class="wd-20p border-bottom-0">ROUTE</th>
								<th class="wd-10p border-bottom-0">ACTION</th>
							</tr>
						</thead>
						@foreach($modules as $module)
						<tbody>
							<tr>
								<td>{{$module->id}}</td>
								<td>{{$module->name}}</td>
								<td>{{$module->route}}</td>
								<td>
								<form action="{{ route('module.destroy', $module->id) }}" method="POST">
									<a href="{{ route('module.edit', $module->id) }}" title="Edit">
										<i class="fas fa-edit  fa-lg"></i>
									</a>
									@csrf
									@method('DELETE')
									<button type="submit" title="delete" style="border: none; background-color:transparent;">
										<i class="fas fa-trash fa-lg text-danger"></i>
									</button>
								</form>
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>
				</div>
			</div>
			<!-- table-wrapper -->
		</div>
		<!-- section-wrapper -->
	</div>
</div>

@endsection