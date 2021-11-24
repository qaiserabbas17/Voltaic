@extends('layouts.master')
@section('content')
<!--Page Header-->
<input type="hidden" name="lead-id" value="{{$leads->id}}">
<section class="sec-firts">
		<div class="container">
			<div class="row pad-top">
				<div class="col-md-6">
					<form class="">
						<div class="row">
							<div class="col-md-6">
								<label for="staticEmail" class="form-label Cusheading">Customer</label>
							</div>
							<div class="col-md-3">
	      						<input type="text" class="form-control next-place-four-end" placeholder="Project ID">
	    					</div>
	    					<div class="col-md-3">
	      							<input type="date" class="form-control next-place-four-end" value="2021-10-05">
	    					</div>
						</div>
						<div class="pad-bottt">
	  						<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Name:</label>
								</div>	
								<div class="col-md-6">
	      							<input type="text" class="form-control next-place-four" placeholder="Name" value="{{$leads->name}}">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
	  						<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Address:</label>
								</div>	
								<div class="col-md-6">
	      							<input type="text" class="form-control next-place-four" placeholder="Address" value="{{$leads->address}}">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Email Address</label>
								</div>	
								<div class="col-md-6">
	      							<input type="email" class="form-control next-place-four" placeholder="Eamil" value="{{$leads->email}}">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Phone Number</label>
								</div>	
								<div class="col-md-6">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="Number" value="{{$leads->phone}}">
	    						</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<form class="">
						<div class="row">
							<div class="col-md-12">
								<label for="staticEmail" class="form-label Cusheading">Sales Person</label>
							</div>
						</div>
						<div class="pad-bottt">
	  						<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Name:</label>
								</div>	
								<div class="col-md-6">
	      							<input type="text" class="form-control next-place-four lead_data" placeholder="name" name="sale_person_name" value="{{$user->firstname}} {{$user->lastname}}">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Email Address</label>
								</div>	
								<div class="col-md-6">
	      							<input type="email" class="form-control next-place-four lead_data" placeholder="Eamil" name="sale_email" value="{{$user->email}}">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Phone Number</label>
								</div>	
								<div class="col-md-6">
	      							<input type="Number" class="form-control next-place-four lead_data" name="sale_phone" min="0" placeholder="Number" value="{{$user->phone}}">
	    						</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<section class="tab-one">
		<div class="container">
			<span class="pad-0n table-info">Sales Input Section</span>
			<p class="p-for">Monthly Electricity Usage</p>
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th >Month</th>
			      <th scope="col">Jan</th>
			      <th scope="col">Feb</th>
			      <th scope="col">Mar</th>
			      <th scope="col">April</th>
			      <th scope="col">May</th>
			      <th scope="col">June</th>
			      <th scope="col">Jul</th>
			      <th scope="col">Aug</th>
			      <th scope="col">Sep</th>
			      <th scope="col">Oct</th>
			      <th scope="col">Nov</th>
			      <th scope="col">Dec</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Usage (KWh)</td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_jan" min="0" value="{{$leads->monthly_electricity_usage_jan}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_feb" min="0" value="{{$leads->monthly_electricity_usage_feb}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_mar" min="0" value="{{$leads->monthly_electricity_usage_mar}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_apr" min="0" value="{{$leads->monthly_electricity_usage_apr}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_may" min="0" value="{{$leads->monthly_electricity_usage_may}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_jun" min="0" value="{{$leads->monthly_electricity_usage_jun}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_jul" min="0" value="{{$leads->monthly_electricity_usage_jul}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_aug" min="0" value="{{$leads->monthly_electricity_usage_aug}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_sep" min="0" value="{{$leads->monthly_electricity_usage_sep}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_oct" min="0" value="{{$leads->monthly_electricity_usage_oct}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_nov" min="0" value="{{$leads->monthly_electricity_usage_nov}}"></td>
			      <td><input type="number" class="form-control lead_data" name="monthly_electricity_usage_dec" min="0" value="{{$leads->monthly_electricity_usage_dec}}"></td>
			    </tr>
			  </tbody>
			</table>
	</section>
	<section class="fourth">
		<div class="container">
			<div class="row">
			<div class="col-md-5">
				<table class="table table-bordered">
					  {{-- <thead>
					    <tr>
					      <th scope="col">Month</th>
					      <th scope="col">Jan</th>
					    </tr>
					  </thead> --}}
					  <tbody>
					    <tr>
					      <td>On-Peak to Total %</td>
					      <td><input type="Number" name="on_peak_total" min="0" class="l form-control lead_data" value="{{ $leads->on_peak_total }}"></td>
					    </tr>
					    <tr>
					      <td>Sanctioned Load</td>
					      <td><input type="Number" name="sanctioned_load" min="0" class="l form-control lead_data" value="{{ $leads->sanctioned_load }}"></td>
					    </tr>
					    <tr>
					      <td>Max System Size Allowed</td>
					      <td class="text-right C16">{{ ($leads->C16) ? $leads->C16 : '0' }}</td>
					      <input type="hidden" class="C16" name="C16" value="{{ ($leads->C16) ? $leads->C16 : '' }}">
					    </tr>
					  </tbody>
				</table>
			</div>
			<div class="col-md-7">
				<form class="form-inline new">
					<div class="row">
						<div class="col-md-6">
	    					<p>Annual Energy Use (KWh)</p>
	    				</div>
	    				<div class="col-md-6">
	      					<span class="in-he F18">{{ ($leads->F18) ? $leads->F18 : '0' }}</span>
					      <input type="hidden" class="F18" name="F18" value="{{ ($leads->F18) ? $leads->F18 : '' }}">
	    				</div>
	  				</div>
	  				<div class="row">
						<div class="col-md-6">
	    					<p>Essentail Loads (KW)</p>
	    				</div>
	    				<div class="col-md-6">
	      					<span class="in-he F19">{{ ($leads->F19) ? $leads->F19 : '0' }}</span>
					      <input type="hidden" class="F19" name="F19" value="{{ ($leads->F19) ? $leads->F19 : '' }}">
	    				</div>
	  				</div>
	  				<div class="row">
						<div class="col-md-6">
	    					<p>On-Peak Summer Load (KW)</p>
	    				</div>
	    				<div class="col-md-6">
	      					<span class="in-he F20">{{ ($leads->F20) ? $leads->F20 : '0' }}</span>
					      <input type="hidden" class="F20" name="F20" value="{{ ($leads->F20) ? $leads->F20 : '' }}">
	    				</div>
	  				</div>
	  				<div class="row">
						<div class="col-md-6">
	    					<p>Number of Inverter ACs used during summer Peak Hours</p>
	    				</div>
	    				<div class="col-md-6 text-right">
	      					<input type="Number" name="number_of_inverter" min="0" class="form-control lead_data" value="{{ $leads->number_of_inverter ?? '' }}" min="0" style="height: 25px;margin: 3px 0;">
	    				</div>
	  				</div>
	  				<div class="row">
						<div class="col-md-6">
	    					<p>Energy Efficient On-Peak Summer Load (KW)</p>
	    				</div>
	    				<div class="col-md-6">
	      					<span class="in-he F21">{{ ($leads->F21) ? $leads->F21 : '0' }}</span>
					      <input type="hidden" class="F21" name="F21" value="{{ ($leads->F21) ? $leads->F21 : '' }}">
	    				</div>
	  				</div>
	  			</form>	
			</div>
			</div>
		</div>
	</section>
	<section class="fifth-main">
		<div class="container">
			<div class="paddd">
				<div class="row">
					<div class="col-md-4">
						<div class="bg-change" style="background: #F1F1F1;
    						padding: 10px 10px;">
							<p class="pad-0n table-info wirthing">Sales Input Section</p>
							<div class="row pad-bto">
								<div class="col-sm-8">
									<span class="solar-pad family">Solar Only</span>
								</div>
								<div class="col-md-4 text-right">
									
								</div>
							</div>	
							<div class="row pad-bto">
								<div class="col-sm-8">
									<span class="family">Recommended Solar System Size (KW)</span>
								</div>
								<div class="col-md-4 text-right">
									<span class="B31">{{ ($leads->B31) ? $leads->B31 : '0' }}</span>
					      		<input type="hidden" class="B31" name="B31" value="{{ ($leads->B31) ? $leads->B31 : '' }}">
								</div>
							</div>
							<div class="row pad-bto">
								<div class="col-sm-8">
									<span class="family">Select system size (must be less than or equal to Max System Size Allowed)</span>
								</div>
								<div class="col-md-4 text-right">
									<span>&nbsp;</span>
								</div>
							</div>	
							<div class="row pad-bto">
								<div class="col-sm-8">
									<span class="family">Select Solar System Size (KW)</span>
								</div>
								<div class="col-md-4 text-right">
									<select class="form-select form-select-lg lead_data" aria-label=".form-select-lg example" name="solar_only_select_solar_system_size_kw">
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '13.60') ? 'selected' : '' }} value="13.60">13.6</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '15.61') ? 'selected' : '' }} value="15.61">15.6</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '4.86') ? 'selected' : '' }} value="4.86">4.9</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '5.4') ? 'selected' : '' }} value="5.4">5.4</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '5.94') ? 'selected' : '' }} value="5.94">5.9</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '15.6.48') ? 'selected' : '' }} value="6.48">6.5</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '15.7.02') ? 'selected' : '' }} value="7.02">7.0</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '7.56') ? 'selected' : '' }} value="7.56">7.6</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '8.1') ? 'selected' : '' }} value="8.1">8.1</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '8.64') ? 'selected' : '' }} value="8.64">8.6</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '9.18') ? 'selected' : '' }} value="9.18">9.2</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '9.72') ? 'selected' : '' }} value="9.72">9.7</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '10.26') ? 'selected' : '' }} value="10.26">10.3</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '10.8') ? 'selected' : '' }} value="10.8">10.8</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '11.34') ? 'selected' : '' }} value="11.34">11.3</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '11.88') ? 'selected' : '' }} value="11.88">11.9</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '12.42') ? 'selected' : '' }} value="12.42">12.4</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '12.96') ? 'selected' : '' }} value="12.96">13.0</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '13.5') ? 'selected' : '' }} value="13.5">13.5</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '14.04') ? 'selected' : '' }} value="14.04">14.0</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '14.58') ? 'selected' : '' }} value="14.58">14.6</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '15.12') ? 'selected' : '' }} value="15.12">15.1</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '15.66') ? 'selected' : '' }} value="15.66">15.7</option>
									</select>
								</div>
							</div>	
							<div class="row pad-bto">	
								<div class="col-sm-8">
									<span class="family">Solar + Battery (Maximize Savings)</span>
								</div>
								<div class="col-md-4 text-right">
								</div>
							</div>
							<div class="row pad-bto">	
								<div class="col-sm-8">
									<span class="family">Reccomended Battery Size (KWh) for Peak Use</span>
								</div>
								<div class="col-md-4 text-right">
									<span class="B33">{{ ($leads->B33) ? $leads->B33 : '0' }}</span>	
					      		<input type="hidden" class="B33" name="B33" value="{{ ($leads->B33) ? $leads->B33 : '' }}">
								</div>
							</div>
							<div class="row pad-bto">
								<div class="col-sm-8">
									<span class="family">Recommended  Solar System Size with Battery ¹</span>
								</div>
								<div class="col-md-4 text-right">
									<span class="B32">{{ ($leads->B32) ? $leads->B32 : '0' }}</span>
					      		<input type="hidden" class="B32" name="B32" value="{{ ($leads->B32) ? $leads->B32 : '' }}">
								</div>
							</div>
							<div class="row pad-bto">
								<div class="col-sm-8">
									<span  class="family">Select Battery Size (KWh)</span>
								</div>
								<div class="col-md-4 text-right">
									<select class="form-select form-select-lg lead_data" aria-label=".form-select-lg example" name="select_battery_size_kwh">
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '9.6') ? 'selected' : '' }} value="9.6">9.6</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '12.8') ? 'selected' : '' }} value="12.8">12.8</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '16.0') ? 'selected' : '' }} value="16.0">16.0</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '19.2') ? 'selected' : '' }} value="19.2">19.2</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '22.4') ? 'selected' : '' }} value="22.4">22.4</option>
										<option {{ ($leads->solar_only_select_solar_system_size_kw == '25.6') ? 'selected' : '' }} value="25.6">25.6</option>
									</select>
								</div>
							</div>	
							<div class="row pad-bto">
								<div class="col-sm-8">
									<span  class="family">Select Solar System Size (KW)</span>
								</div>
								<div class="col-md-4 text-right">
									<select class="form-select form-select-lg lead_data" aria-label=".form-select-lg example" name="battery_and_solar_select_solar_system_size_kw">
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '13.60') ? 'selected' : '' }} value="13.60">13.6</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '15.61') ? 'selected' : '' }} value="15.61">15.6</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '4.86') ? 'selected' : '' }} value="4.86">4.9</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '5.4') ? 'selected' : '' }} value="5.4">5.4</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '5.94') ? 'selected' : '' }} value="5.94">5.9</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '6.48') ? 'selected' : '' }} value="6.48">6.5</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '7.02') ? 'selected' : '' }} value="7.02">7.0</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '7.56') ? 'selected' : '' }} value="7.56">7.6</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '8.1') ? 'selected' : '' }} value="8.1">8.1</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '8.64') ? 'selected' : '' }} value="8.64">8.6</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '9.18') ? 'selected' : '' }} value="9.18">9.2</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '9.72') ? 'selected' : '' }} value="9.72">9.7</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '10.26') ? 'selected' : '' }} value="10.26">10.3</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '10.8') ? 'selected' : '' }} value="10.8">10.8</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '11.34') ? 'selected' : '' }} value="11.34">11.3</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '11.88') ? 'selected' : '' }} value="11.88">11.9</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '12.42') ? 'selected' : '' }} value="12.42">12.4</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '12.96') ? 'selected' : '' }} value="12.96">13.0</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '13.5') ? 'selected' : '' }} value="13.5">13.5</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '14.04') ? 'selected' : '' }} value="14.04">14.0</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '14.58') ? 'selected' : '' }} value="14.58">14.6</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '15.12') ? 'selected' : '' }} value="15.12">15.1</option>
										<option {{ ($leads->battery_and_solar_select_solar_system_size_kw == '15.66') ? 'selected' : '' }} value="15.66">15.7</option>
									</select>
								</div>
							</div>	
							<div class="row pad-bto">
								<div class="col-sm-8">
									<span  class="family">Add Effcient On-Peak Battery Use</span>
								</div>
								<div class="col-md-4 text-right">
									<select class="form-select form-select-lg lead_data" aria-label=".form-select-lg example" name="effcient_on_peak">
										<option {{ ($leads->effcient_on_peak == '1') ? 'selected' : '' }} value="1">Yes</option>
										<option {{ ($leads->effcient_on_peak == '0') ? 'selected' : '' }} value="0">No</option>
									</select>
								</div>
							</div>	
							<div class="row pad-bto family">	
								<span class="okkireport">Select Rate Escalation</span>
							</div>
							<div class="row pad-bto family">	
								<span class="okkireport">Electricity Price Escalation per Year</span>
							</div>	
							<div class="row pad-bto">		
								<div class="col-sm-8">
									<span class="family">Select Price Escalation Rate</span>
								</div>
								<div class="col-md-4 text-right">
									<select class="form-select form-select-lg lead_data" name="escalation_rate">
										<option {{ ($leads->escalation_rate == '5') ? 'selected' : '' }} value="5">5%</option>
										<option {{ ($leads->escalation_rate == '6') ? 'selected' : '' }} value="6">6%</option>
										<option {{ ($leads->escalation_rate == '7') ? 'selected' : '' }} value="7">7%</option>
										<option {{ ($leads->escalation_rate == '8') ? 'selected' : '' }} value="8">8%</option>
										<option {{ ($leads->escalation_rate == '9') ? 'selected' : '' }} value="9">9%</option>
										<option {{ ($leads->escalation_rate == '10') ? 'selected' : '' }} value="10">10%</option>
										<option {{ ($leads->escalation_rate == '11') ? 'selected' : '' }} value="11">11%</option>
										<option {{ ($leads->escalation_rate == '12') ? 'selected' : '' }} value="12">12%</option>
										<option {{ ($leads->escalation_rate == '13') ? 'selected' : '' }} value="13">13%</option>
										<option {{ ($leads->escalation_rate == '14') ? 'selected' : '' }} value="14">14%</option>
										<option {{ ($leads->escalation_rate == '15') ? 'selected' : '' }} value="15">15%</option>
									</select>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-md-8 back">
						<div class="row">
							<div class="col-md-10">
								<div class="custom-set">
									<h5 class="estimated">Estimated Electricity Charge from Utility (1 Year)<br>(includes GST + Electrical Duty) </h5>
								</div>
							</div>
							<div class="col-md-2">
								<div class="amount_class">
									<span class="sp-num C63 lead_data_store">{{ ($leads->C63) ? $leads->C63 : 0 }}</span>
									<input type="hidden" class="C63" name="C63" value="{{ ($leads->C63) ? $leads->C63 : '' }}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h5 class="Estimated">Estimated Savings ²</h5>
							</div>
						</div>
						<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th class="font text-center"colspan="12" >	&nbsp;</th>
							      <th class="font text-center" >1st Year Payment to Utility (PKR)</th>
							      <th class="font text-center"colspan="4" >1st Year Savings (PKR)</th>
							      <th class="font text-center"colspan="4" >1st Year Savings (%)</th>
							      <th class="font text-center"colspan="4" >10 Years Savings ³(PKR)</th>
							      <th class="font text-center"colspan="4" >Years of ZERO Electricity Charge</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <td class="new-fomt text-center"colspan="12">Solar Only</td>
							      <td class="new-fomt text-center E20">{{ ($leads->E20) ? $leads->E20 : 'ZERO' }}</td>
							      <td class="new-fomt text-center E13"colspan="4">{{ ($leads->E13) ? $leads->E13 : '0' }}</td>
							      <td class="new-fomt text-center N13"colspan="4">{{ ($leads->N13) ? $leads->N13 : '0' }}</td>
							      <td class="new-fomt text-center E15"colspan="4">{{ ($leads->E15) ? $leads->E15 : '0' }}</td>
							      <td class="new-fomt text-center D19"colspan="4">{{ ($leads->D19) ? $leads->D19 : '0' }}</td>
							    </tr>
							    <tr>
							      <td class="new-fomt"colspan="12">Solar + Battery</td>
							      <td class="new-fomt H20">{{ ($leads->H20) ? $leads->H20 : 'ZERO' }}</td>
							      <td class="new-fomt H13"colspan="4">{{ ($leads->H13) ? $leads->H13 : '0' }}</td>
							      <td class="new-fomt O13"colspan="4">{{ ($leads->O13) ? $leads->O13 : '0' }}</td>
							      <td class="new-fomt H15"colspan="4">{{ ($leads->H15) ? $leads->H15 : '0' }}</td>
							      <td class="new-fomt G19"colspan="4">{{ ($leads->G19) ? $leads->G19 : '0' }}</td>
							    </tr>
							  </tbody>
						</table>
						<div class="row">
							<div>
								<div class="col-md-12">
									<p class="Voltaic family">2) Voltaic Power provides 10 years replacement warranty on complete system</p>
									<p class="Payback family">3) Payback period accounts for electricity tarrif escalation per year. Estimate is based on total system cost, installation, and O&M</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="Benefits-main">
								<div class="col-md-12">
									<h5 class="Benefit">Battery Benefits</h5>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="Additional-mai">
								<div class="col-md-8">
									<p class="Additiona family"><b>Additional Savings with Battery (in 10 Years) ⁵</b></p>
								</div>
							</div>
							<div class="Extends-mai">
								<div class="col-md-4">
									<p class="Extend family"><b><span class="J15">{{ ($leads->J15) ? $leads->J15 : '0 PKR' }}</span>
					      			<input type="hidden" class="J15" name="J15" value="{{ ($leads->J15) ? $leads->J15 : '' }}"></b></p>
								</div>
							</div>
							<!-- <div class="Extends">
								<div class="col-md-2">
									<p class="Extend family"><b></b></p>
								</div>
							</div> -->
						</div>
						<div class="row mistake">
							<div class="Additional-mai">
								<div class="col-md-8">
									<p class="Additiona family"><b>Extends ZERO Energy Bill Payment by 6</b></p>
								</div>
							</div>
							<div class="Extends-ma">
								<div class="col-md-4">
									<p class="Extend Extend-nex family"><b><span class="J19">{{ ($leads->J19) ? $leads->J19 : '0 YEARS' }}</span>
					      			<input type="hidden" class="J19" name="J19" value="{{ ($leads->J19) ? $leads->J19 : '' }}"></b></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="Power-mai">
								<div class="col-md-12">
									<p class="Powe family">4) Voltaic Power uses advanced technology Li-ion batteries.</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="Utility-main">
								<div class="col-md-12">
									<p class="Utilit family">5) Annual Benefit. Utility may still charge other fee and</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="six"> 
		<div class="container">
			<div class="pad-bottt">
					<div class="row">
					<div class="col-md-6">
						<label>Solar Only</label>
					</div>	
					<div class="col-md-6">
							<input type="number" name="solar_only" value="{{ $leads->solar_only }}" class="form-control lead_data">
					</div>
				</div>
			</div>
			<div class="pad-bottt">
					<div class="row">
					<div class="col-md-6">
						<label>Solar + Battery</label>
					</div>	
					<div class="col-md-6">
							<input type="number" name="solar_plus_battery" value="{{ $leads->solar_plus_battery }}" class="form-control lead_data">
					</div>
				</div>
			</div>
		</div>
	</section>

					      			<input type="hidden" class="E20" name="E20" value="{{ ($leads->E20) ? $leads->E20 : '' }}">

					      			<input type="hidden" class="E13" name="E13" value="{{ ($leads->E13) ? $leads->E13 : '' }}">

					      			<input type="hidden" class="N13" name="N13" value="{{ ($leads->N13) ? $leads->N13 : '' }}">

					      			<input type="hidden" class="E15" name="E15" value="{{ ($leads->E15) ? $leads->E15 : '' }}">

					      			<input type="hidden" class="D19" name="D19" value="{{ ($leads->D19) ? $leads->D19 : '' }}">

					      			<input type="hidden" class="H20" name="H20" value="{{ ($leads->H20) ? $leads->H20 : '' }}">

					      			<input type="hidden" class="H13" name="H13" value="{{ ($leads->H13) ? $leads->H13 : '' }}">

					      			<input type="hidden" class="O13" name="O13" value="{{ ($leads->O13) ? $leads->O13 : '' }}">

					      			<input type="hidden" class="H15" name="H15" value="{{ ($leads->H15) ? $leads->H15 : '' }}">

					      			<input type="hidden" class="G19" name="G19" value="{{ ($leads->G19) ? $leads->G19 : '' }}">

					      			<input type="hidden" class="E18" name="E18" value="{{ ($leads->E18) ? $leads->E18 : '' }}">

					      			<input type="hidden" class="H18" name="H18" value="{{ ($leads->H18) ? $leads->H18 : '' }}">

					      			<input type="hidden" class="C106" name="C106" value="{{ ($leads->C106) ? $leads->C106 : '' }}">
					      			
					      			<input type="hidden" class="B96" name="B96" value="{{ ($leads->B96) ? $leads->B96 : '' }}">


					      			<input type="hidden" class="B67" name="B67" value="{{ ($leads->B67) ? $leads->B67 : '' }}">

					      			<input type="hidden" class="C112" name="C112" value="{{ ($leads->C112) ? $leads->C112 : '' }}">
					      			<input type="hidden" class="C164" name="C164" value="{{ ($leads->C164) ? $leads->C164 : '' }}">


					      			

					      			<input type="hidden" class="annual_energy_grid_use_solar_only" name="annual_energy_grid_use_solar_only" value="{{ ($leads->annual_energy_grid_use_solar_only) ? $leads->annual_energy_grid_use_solar_only : '' }}">

					      			<input type="hidden" class="annual_energy_grid_use_solar_plus_battery" name="annual_energy_grid_use_solar_plus_battery" value="{{ ($leads->annual_energy_grid_use_solar_plus_battery) ? $leads->annual_energy_grid_use_solar_plus_battery : '' }}">


					      			<input type="hidden" class="annual_energy_self_use_solar_only" name="annual_energy_self_use_solar_only" value="{{ ($leads->annual_energy_self_use_solar_only) ? $leads->annual_energy_self_use_solar_only : '' }}">

					      			<input type="hidden" class="annual_energy_self_use_solar_plus_battery" name="annual_energy_self_use_solar_plus_battery" value="{{ ($leads->annual_energy_self_use_solar_plus_battery) ? $leads->annual_energy_self_use_solar_plus_battery : '' }}">


					      			<input type="hidden" class="annual_energy_net_metered_solar_only" name="annual_energy_net_metered_solar_only" value="{{ ($leads->annual_energy_net_metered_solar_only) ? $leads->annual_energy_net_metered_solar_only : '' }}">

					      			<input type="hidden" class="annual_energy_net_metered_solar_plus_battery" name="annual_energy_net_metered_solar_plus_battery" value="{{ ($leads->annual_energy_net_metered_solar_plus_battery) ? $leads->annual_energy_net_metered_solar_plus_battery : '' }}">

					      			<input type="hidden" class="net_monthly_charges_no_solar_jan" name="net_monthly_charges_no_solar_jan" value="{{ ($leads->net_monthly_charges_no_solar_jan) ? $leads->net_monthly_charges_no_solar_jan : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_feb" name="net_monthly_charges_no_solar_feb" value="{{ ($leads->net_monthly_charges_no_solar_feb) ? $leads->net_monthly_charges_no_solar_feb : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_mar" name="net_monthly_charges_no_solar_mar" value="{{ ($leads->net_monthly_charges_no_solar_mar) ? $leads->net_monthly_charges_no_solar_mar : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_apr" name="net_monthly_charges_no_solar_apr" value="{{ ($leads->net_monthly_charges_no_solar_apr) ? $leads->net_monthly_charges_no_solar_apr : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_may" name="net_monthly_charges_no_solar_may" value="{{ ($leads->net_monthly_charges_no_solar_may) ? $leads->net_monthly_charges_no_solar_may : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_jun" name="net_monthly_charges_no_solar_jun" value="{{ ($leads->net_monthly_charges_no_solar_jun) ? $leads->net_monthly_charges_no_solar_jun : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_jul" name="net_monthly_charges_no_solar_jul" value="{{ ($leads->net_monthly_charges_no_solar_jul) ? $leads->net_monthly_charges_no_solar_jul : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_aug" name="net_monthly_charges_no_solar_aug" value="{{ ($leads->net_monthly_charges_no_solar_aug) ? $leads->net_monthly_charges_no_solar_aug : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_sep" name="net_monthly_charges_no_solar_sep" value="{{ ($leads->net_monthly_charges_no_solar_sep) ? $leads->net_monthly_charges_no_solar_sep : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_oct" name="net_monthly_charges_no_solar_oct" value="{{ ($leads->net_monthly_charges_no_solar_oct) ? $leads->net_monthly_charges_no_solar_oct : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_nov" name="net_monthly_charges_no_solar_nov" value="{{ ($leads->net_monthly_charges_no_solar_nov) ? $leads->net_monthly_charges_no_solar_nov : '' }}"/>

									<input type="hidden" class="net_monthly_charges_no_solar_dec" name="net_monthly_charges_no_solar_dec" value="{{ ($leads->net_monthly_charges_no_solar_dec) ? $leads->net_monthly_charges_no_solar_dec : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_jan" name="net_monthly_charges_solar_only_jan" value="{{ ($leads->net_monthly_charges_solar_only_jan) ? $leads->net_monthly_charges_solar_only_jan : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_feb" name="net_monthly_charges_solar_only_feb" value="{{ ($leads->net_monthly_charges_solar_only_feb) ? $leads->net_monthly_charges_solar_only_feb : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_mar" name="net_monthly_charges_solar_only_mar" value="{{ ($leads->net_monthly_charges_solar_only_mar) ? $leads->net_monthly_charges_solar_only_mar : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_apr" name="net_monthly_charges_solar_only_apr" value="{{ ($leads->net_monthly_charges_solar_only_apr) ? $leads->net_monthly_charges_solar_only_apr : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_may" name="net_monthly_charges_solar_only_may" value="{{ ($leads->net_monthly_charges_solar_only_may) ? $leads->net_monthly_charges_solar_only_may : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_jun" name="net_monthly_charges_solar_only_jun" value="{{ ($leads->net_monthly_charges_solar_only_jun) ? $leads->net_monthly_charges_solar_only_jun : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_jul" name="net_monthly_charges_solar_only_jul" value="{{ ($leads->net_monthly_charges_solar_only_jul) ? $leads->net_monthly_charges_solar_only_jul : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_aug" name="net_monthly_charges_solar_only_aug" value="{{ ($leads->net_monthly_charges_solar_only_aug) ? $leads->net_monthly_charges_solar_only_aug : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_sep" name="net_monthly_charges_solar_only_sep" value="{{ ($leads->net_monthly_charges_solar_only_sep) ? $leads->net_monthly_charges_solar_only_sep : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_oct" name="net_monthly_charges_solar_only_oct" value="{{ ($leads->net_monthly_charges_solar_only_oct) ? $leads->net_monthly_charges_solar_only_oct : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_nov" name="net_monthly_charges_solar_only_nov" value="{{ ($leads->net_monthly_charges_solar_only_nov) ? $leads->net_monthly_charges_solar_only_nov : '' }}"/>

									<input type="hidden" class="net_monthly_charges_solar_only_dec" name="net_monthly_charges_solar_only_dec" value="{{ ($leads->net_monthly_charges_solar_only_dec) ? $leads->net_monthly_charges_solar_only_dec : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_jan" name="net_monthly_saving_solar_battery_chart_jan" value="{{ ($leads->net_monthly_saving_solar_battery_chart_jan) ? $leads->net_monthly_saving_solar_battery_chart_jan : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_feb" name="net_monthly_saving_solar_battery_chart_feb" value="{{ ($leads->net_monthly_saving_solar_battery_chart_feb) ? $leads->net_monthly_saving_solar_battery_chart_feb : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_mar" name="net_monthly_saving_solar_battery_chart_mar" value="{{ ($leads->net_monthly_saving_solar_battery_chart_mar) ? $leads->net_monthly_saving_solar_battery_chart_mar : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_apr" name="net_monthly_saving_solar_battery_chart_apr" value="{{ ($leads->net_monthly_saving_solar_battery_chart_apr) ? $leads->net_monthly_saving_solar_battery_chart_apr : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_may" name="net_monthly_saving_solar_battery_chart_may" value="{{ ($leads->net_monthly_saving_solar_battery_chart_may) ? $leads->net_monthly_saving_solar_battery_chart_may : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_jun" name="net_monthly_saving_solar_battery_chart_jun" value="{{ ($leads->net_monthly_saving_solar_battery_chart_jun) ? $leads->net_monthly_saving_solar_battery_chart_jun : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_jul" name="net_monthly_saving_solar_battery_chart_jul" value="{{ ($leads->net_monthly_saving_solar_battery_chart_jul) ? $leads->net_monthly_saving_solar_battery_chart_jul : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_aug" name="net_monthly_saving_solar_battery_chart_aug" value="{{ ($leads->net_monthly_saving_solar_battery_chart_aug) ? $leads->net_monthly_saving_solar_battery_chart_aug : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_sep" name="net_monthly_saving_solar_battery_chart_sep" value="{{ ($leads->net_monthly_saving_solar_battery_chart_sep) ? $leads->net_monthly_saving_solar_battery_chart_sep : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_oct" name="net_monthly_saving_solar_battery_chart_oct" value="{{ ($leads->net_monthly_saving_solar_battery_chart_oct) ? $leads->net_monthly_saving_solar_battery_chart_oct : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_nov" name="net_monthly_saving_solar_battery_chart_nov" value="{{ ($leads->net_monthly_saving_solar_battery_chart_nov) ? $leads->net_monthly_saving_solar_battery_chart_nov : '' }}"/>

									<input type="hidden" class="net_monthly_saving_solar_battery_chart_dec" name="net_monthly_saving_solar_battery_chart_dec" value="{{ ($leads->net_monthly_saving_solar_battery_chart_dec) ? $leads->net_monthly_saving_solar_battery_chart_dec : '' }}"/>

									<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_usage" name="solar_only_cumulative_payback_cash_flow_PKR_usage" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_usage) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_usage : '' }}" />

									<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_one" name="solar_only_cumulative_payback_cash_flow_PKR_one" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_one) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_one : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_two" name="solar_only_cumulative_payback_cash_flow_PKR_two" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_two) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_two : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_three" name="solar_only_cumulative_payback_cash_flow_PKR_three" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_three) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_three : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_four" name="solar_only_cumulative_payback_cash_flow_PKR_four" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_four) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_four : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_five" name="solar_only_cumulative_payback_cash_flow_PKR_five" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_five) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_five : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_six" name="solar_only_cumulative_payback_cash_flow_PKR_six" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_six) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_six : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_seven" name="solar_only_cumulative_payback_cash_flow_PKR_seven" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_seven) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_seven : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_eight" name="solar_only_cumulative_payback_cash_flow_PKR_eight" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_eight) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_eight : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_nine" name="solar_only_cumulative_payback_cash_flow_PKR_nine" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_nine) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_nine : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_ten" name="solar_only_cumulative_payback_cash_flow_PKR_ten" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_ten) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_ten : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_eleven" name="solar_only_cumulative_payback_cash_flow_PKR_eleven" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_eleven) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_eleven : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_twelve" name="solar_only_cumulative_payback_cash_flow_PKR_twelve" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_twelve) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_twelve : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_thirteen" name="solar_only_cumulative_payback_cash_flow_PKR_thirteen" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_thirteen) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_thirteen : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_fourteen" name="solar_only_cumulative_payback_cash_flow_PKR_fourteen" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_fourteen) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_fourteen : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_fifteen" name="solar_only_cumulative_payback_cash_flow_PKR_fifteen" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_fifteen) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_fifteen : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_sixteen" name="solar_only_cumulative_payback_cash_flow_PKR_sixteen" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_sixteen) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_sixteen : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_seventeen" name="solar_only_cumulative_payback_cash_flow_PKR_seventeen" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_seventeen) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_seventeen : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_eighteen" name="solar_only_cumulative_payback_cash_flow_PKR_eighteen" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_eighteen) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_eighteen : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_nineteen" name="solar_only_cumulative_payback_cash_flow_PKR_nineteen" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_nineteen) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_nineteen : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_twenty" name="solar_only_cumulative_payback_cash_flow_PKR_twenty" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_twenty) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_twenty : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_twenty_one" name="solar_only_cumulative_payback_cash_flow_PKR_twenty_one" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_one) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_one : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_twenty_two" name="solar_only_cumulative_payback_cash_flow_PKR_twenty_two" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_two) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_two : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_twenty_three" name="solar_only_cumulative_payback_cash_flow_PKR_twenty_three" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_three) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_three : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_twenty_four" name="solar_only_cumulative_payback_cash_flow_PKR_twenty_four" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_four) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_four : '' }}" />

										<input type="hidden" class="solar_only_cumulative_payback_cash_flow_PKR_twenty_five" name="solar_only_cumulative_payback_cash_flow_PKR_twenty_five" value="{{ ($leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_five) ? $leads->solar_only_cumulative_payback_cash_flow_PKR_twenty_five : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_usage" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_usage" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_usage) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_usage : '' }}" />


										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_one" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_one" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_one) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_one : '' }}" />
										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_two" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_two" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_two) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_two : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_three" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_three" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_three) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_three : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_four" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_four" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_four) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_four : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_five" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_five" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_five) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_five : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_six" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_six" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_six) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_six : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_seven" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_seven" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_seven) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_seven : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_eight" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_eight" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_eight) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_eight : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_nine" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_nine" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_nine) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_nine : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_ten" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_ten" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_ten) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_ten : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four : '' }}" />

										<input type="hidden" class="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five" name="solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five" value="{{ ($leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five) ? $leads->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five : '' }}" />








									
									
	{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}


@endsection