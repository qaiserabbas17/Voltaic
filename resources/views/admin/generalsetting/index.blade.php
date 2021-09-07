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
			<div class="card-body">
				<div class="row">
					<div class="form-group col-md-4">
						<label class="form-label">On Peack Rate</label>
						<input type="text" class="form-control @error('on_peack_rate') has-error @enderror" name="on_peack_rate" placeholder="On Peack Rate" value="{{ $setting ? $setting->on_peack_rate : ''}}">
						@error('on_peack_rate')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">Off Peack Rate</label>
						<input type="text" class="form-control @error('off_peack_rate') has-error @enderror" name="off_peack_rate" placeholder="Off Peack Rate" value="{{ $setting ? $setting->off_peack_rate : ''}}">
						@error('off_peack_rate')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">Export Rate</label>
						<input type="text" class="form-control @error('export_rate') has-error @enderror" name="export_rate" placeholder="Export Rate" value="{{ $setting ? $setting->export_rate : ''}}">
						@error('export_rate')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">Annual Rate Escalation</label>
						<input type="text" class="form-control @error('annual_rate_escalation') has-error @enderror" name="annual_rate_escalation" placeholder="Annual Rate Escalation" value="{{ $setting ? $setting->annual_rate_escalation : ''}}">
						@error('annual_rate_escalation')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">Export Rate Escalation</label>
						<input type="text" class="form-control @error('export_rate_escalation') has-error @enderror" name="export_rate_escalation" placeholder="Export Rate Escalation" value="{{ $setting ? $setting->export_rate_escalation : ''}}">
						@error('export_rate_escalation')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">Daytime Use</label>
						<input type="text" class="form-control @error('daytime_use') has-error @enderror" name="daytime_use" placeholder="Daytime Use" value="{{ $setting ? $setting->daytime_use : ''}}">
						@error('daytime_use')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">On Peak Use</label>
						<input type="text" class="form-control @error('on_peak_use') has-error @enderror" name="on_peak_use" placeholder="On Peak Use" value="{{ $setting ? $setting->on_peak_use : ''}}">
						@error('on_peak_use')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">Panel Structure Cost Per KW</label>
						<input type="text" class="form-control @error('panel_structure_cost_per_kw') has-error @enderror" name="panel_structure_cost_per_kw" placeholder="Panel Structure Cost Per KW" value="{{ $setting ? $setting->panel_structure_cost_per_kw : ''}}">
						@error('panel_structure_cost_per_kw')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">System Cost Per KW</label>
						<input type="text" class="form-control @error('system_cost_per_kw') has-error @enderror" name="system_cost_per_kw" placeholder="System Cost Per KW" value="{{ $setting ? $setting->system_cost_per_kw : ''}}">
						@error('system_cost_per_kw')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">Battery Cost Per KWh</label>
						<input type="text" class="form-control @error('battery_cost_per_kwh') has-error @enderror" name="battery_cost_per_kwh" placeholder="Battery Cost Per KWh" value="{{ $setting ? $setting->battery_cost_per_kwh : ''}}">
						@error('battery_cost_per_kwh')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
					<div class="form-group col-md-4">
						<label class="form-label">USD to PKR Exchange Rate</label>
						<input type="text" class="form-control @error('usd_to_pkr_exchange_rate') has-error @enderror" name="usd_to_pkr_exchange_rate" placeholder="USD to PKR Exchange Rate" value="{{ $setting ? $setting->usd_to_pkr_exchange_rate : ''}}">
						@error('usd_to_pkr_exchange_rate')
	                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
	                    @enderror
					</div>
				</div>

					<div class="row">
						<h3 class="w-100 mt-3 mb-5">Usage Distribution</h3>
						<div class="form-group col-md-2">
							<label class="form-label">Jan</label>
							<input type="text" class="form-control @error('usage_distribution_jan') has-error @enderror" name="usage_distribution_jan" placeholder="Jan" value="{{ $setting ? $setting->usage_distribution_jan : ''}}">
							@error('usage_distribution_jan')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Feb</label>
							<input type="text" class="form-control @error('usage_distribution_feb') has-error @enderror" name="usage_distribution_feb" placeholder="Feb" value="{{ $setting ? $setting->usage_distribution_feb : ''}}">
							@error('usage_distribution_feb')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Mar</label>
							<input type="text" class="form-control @error('usage_distribution_mar') has-error @enderror" name="usage_distribution_mar" placeholder="Mar" value="{{ $setting ? $setting->usage_distribution_mar : ''}}">
							@error('usage_distribution_mar')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Apr</label>
							<input type="text" class="form-control @error('usage_distribution_apr') has-error @enderror" name="usage_distribution_apr" placeholder="Apr" value="{{ $setting ? $setting->usage_distribution_apr : ''}}">
							@error('usage_distribution_apr')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">May</label>
							<input type="text" class="form-control @error('usage_distribution_may') has-error @enderror" name="usage_distribution_may" placeholder="May" value="{{ $setting ? $setting->usage_distribution_may : ''}}">
							@error('usage_distribution_may')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Jun</label>
							<input type="text" class="form-control @error('usage_distribution_jun') has-error @enderror" name="usage_distribution_jun" placeholder="Jun" value="{{ $setting ? $setting->usage_distribution_jun : ''}}">
							@error('usage_distribution_jun')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Jul</label>
							<input type="text" class="form-control @error('usage_distribution_jul') has-error @enderror" name="usage_distribution_jul" placeholder="Jul" value="{{ $setting ? $setting->usage_distribution_jul : ''}}">
							@error('usage_distribution_jul')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Aug</label>
							<input type="text" class="form-control @error('usage_distribution_aug') has-error @enderror" name="usage_distribution_aug" placeholder="Aug" value="{{ $setting ? $setting->usage_distribution_aug : ''}}">
							@error('usage_distribution_aug')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Sep</label>
							<input type="text" class="form-control @error('usage_distribution_sep') has-error @enderror" name="usage_distribution_sep" placeholder="Sep" value="{{ $setting ? $setting->usage_distribution_sep : ''}}">
							@error('usage_distribution_sep')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Oct</label>
							<input type="text" class="form-control @error('usage_distribution_oct') has-error @enderror" name="usage_distribution_oct" placeholder="Oct" value="{{ $setting ? $setting->usage_distribution_oct : ''}}">
							@error('usage_distribution_oct')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Nov</label>
							<input type="text" class="form-control @error('usage_distribution_nov') has-error @enderror" name="usage_distribution_nov" placeholder="Nov" value="{{ $setting ? $setting->usage_distribution_nov : ''}}">
							@error('usage_distribution_nov')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Dec</label>
							<input type="text" class="form-control @error('usage_distribution_dec') has-error @enderror" name="usage_distribution_dec" placeholder="Dec" value="{{ $setting ? $setting->usage_distribution_dec : ''}}">
							@error('usage_distribution_dec')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						
					</div>

					<div class="row">
						<h3 class="w-100 mt-3 mb-5">Solor Generation Per KW</h3>
						<div class="form-group col-md-2">
							<label class="form-label">Jan</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_jan') has-error @enderror" name="solor_generation_per_kw_jan" placeholder="Jan" value="{{ $setting ? $setting->solor_generation_per_kw_jan : ''}}">
							@error('solor_generation_per_kw_jan')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Feb</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_feb') has-error @enderror" name="solor_generation_per_kw_feb" placeholder="Feb" value="{{ $setting ? $setting->solor_generation_per_kw_feb : ''}}">
							@error('solor_generation_per_kw_feb')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Mar</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_mar') has-error @enderror" name="solor_generation_per_kw_mar" placeholder="Mar" value="{{ $setting ? $setting->solor_generation_per_kw_mar : ''}}">
							@error('solor_generation_per_kw_mar')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Apr</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_apr') has-error @enderror" name="solor_generation_per_kw_apr" placeholder="Apr" value="{{ $setting ? $setting->solor_generation_per_kw_apr : ''}}">
							@error('solor_generation_per_kw_apr')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">May</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_may') has-error @enderror" name="solor_generation_per_kw_may" placeholder="May" value="{{ $setting ? $setting->solor_generation_per_kw_may : ''}}">
							@error('solor_generation_per_kw_may')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Jun</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_jun') has-error @enderror" name="solor_generation_per_kw_jun" placeholder="Jun" value="{{ $setting ? $setting->solor_generation_per_kw_jun : ''}}">
							@error('solor_generation_per_kw_jun')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Jul</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_jul') has-error @enderror" name="solor_generation_per_kw_jul" placeholder="Jul" value="{{ $setting ? $setting->solor_generation_per_kw_jul : ''}}">
							@error('solor_generation_per_kw_jul')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Aug</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_aug') has-error @enderror" name="solor_generation_per_kw_aug" placeholder="Aug" value="{{ $setting ? $setting->solor_generation_per_kw_aug : ''}}">
							@error('solor_generation_per_kw_aug')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Sep</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_sep') has-error @enderror" name="solor_generation_per_kw_sep" placeholder="Sep" value="{{ $setting ? $setting->solor_generation_per_kw_sep : ''}}">
							@error('solor_generation_per_kw_sep')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Oct</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_oct') has-error @enderror" name="solor_generation_per_kw_oct" placeholder="Oct" value="{{ $setting ? $setting->solor_generation_per_kw_oct : ''}}">
							@error('solor_generation_per_kw_oct')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Nov</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_nov') has-error @enderror" name="solor_generation_per_kw_nov" placeholder="Nov" value="{{ $setting ? $setting->solor_generation_per_kw_nov : ''}}">
							@error('solor_generation_per_kw_nov')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						<div class="form-group col-md-2">
							<label class="form-label">Dec</label>
							<input type="text" class="form-control @error('solor_generation_per_kw_dec') has-error @enderror" name="solor_generation_per_kw_dec" placeholder="Dec" value="{{ $setting ? $setting->solor_generation_per_kw_dec : ''}}">
							@error('solor_generation_per_kw_dec')
		                    	<span style="color: red;" class="label label-danger">{{ $message }}</span>
		                    @enderror
						</div>
						
					</div>
						

					<div class="row">
						<div class="mt-2 mb-0">
							<button style="background: #0a9d6e;color: #fff;" class="btn" type="submit">Save</button>
						</div>
					</div>
			</div>
		</form>
	</div>
</div>
@endsection