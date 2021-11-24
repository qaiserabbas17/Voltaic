<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/pdf.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="html-content">
	<section class="sec-firts">
		<div class="container">
			<div class="row pad-top">
				<div class="col-md-6">
					<form class="form-firts">
						<div class="row">
							<div class="col-md-6">
								<label for="staticEmail" class="-form-label">Customer</label>
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
	      							<input type="text" class="form-control next-place-four" placeholder="Name" value="{{ $lead->name }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Email Address</label>
								</div>	
								<div class="col-md-6">
	      							<input type="email" class="form-control next-place-four" placeholder="Eamil" value="{{ $lead->email }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Phone Number</label>
								</div>	
								<div class="col-md-6">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="Number" value="{{ $lead->phone }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-12">
									<label for="inputPassword6"><b>Current Energy Use</b></label>
								</div>	
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-9">
									<label for="inputPassword6">Annual Energy Use (KWh)</label>
								</div>	
								<div class="col-md-3">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="" value="{{ $lead->F18 }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-9">
									<label for="inputPassword6">On-Peak Use (% of Total)</label>
								</div>	
								<div class="col-md-3">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="" value="{{ $lead->on_peak_total }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-9">
									<label for="inputPassword6">Energy Charge for last 12 months (inc. GST + ED) - PKR</label>
								</div>	
								<div class="col-md-3">
	      							<input type="text" class="form-control next-place-four" name=""  min="0" placeholder="" value="{{ $lead->C63 }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-9">
									<label for="inputPassword6">Sanctioned Load (KW)</label>
								</div>	
								<div class="col-md-3">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="" value="{{ $lead->sanctioned_load }}" disabled="">
	    						</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<form class="form-firts">
						<div class="row">
							<div class="col-md-12">
								<label for="staticEmail" class="-form-label">Sales Person</label>
							</div>
						</div>
						<div class="pad-bottt">
	  						<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Name:</label>
								</div>	
								<div class="col-md-6">
	      							<input type="text" class="form-control next-place-four" placeholder="First name" value="{{ $user->firstname }} {{ $user->lastname }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Email Address</label>
								</div>	
								<div class="col-md-6">
	      							<input type="email" class="form-control next-place-four" placeholder="Eamil" name="email" value="{{ $user->email }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">Phone Number</label>
								</div>	
								<div class="col-md-6">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="Number" value="{{ $user->phone }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">&nbsp;</label>
								</div>	
								<div class="col-md-2">
	      							<label for="">Size (Ton)</label>
	    						</div>
	    						<div class="col-md-2">
	      							<label for="">Qty</label>
	    						</div>
	    						<div class="col-md-2">
	      							<label for="">Load (KW)</label>
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-6">
									<label for="inputPassword6">&nbsp;</label>
								</div>	
								<div class="col-md-2">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="">
	    						</div>
	    						<div class="col-md-2">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="">
	    						</div>
	    						<div class="col-md-2">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-12">
									<label for="inputPassword6">Compressor AC</label>
								</div>	
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-12">
									<label for="inputPassword6">Inverter AC</label>
								</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-9">
									<label for="inputPassword6">Essentail Loads (KW)</label>
								</div>	
								<div class="col-md-3">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="" value="{{ $lead->F19 }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-9">
									<label for="inputPassword6">On-Peak Summer Load (KW</label>
								</div>	
								<div class="col-md-3">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="" value="{{ $lead->F20 }}" disabled="">
	    						</div>
							</div>
						</div>
						<div class="pad-bottt">
							<div class="row">
								<div class="col-md-9">
									<label for="inputPassword6">Energy Efficient On-Peak Summer Load (KW)</label>
								</div>	
								<div class="col-md-3">
	      							<input type="Number" class="form-control next-place-four" name=""  min="0" placeholder="" value="{{ $lead->F21 }}" disabled="">
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
			<h2 class="text-center pad-h2">Recommended System Options</h2>
			<table class="table">
			  <thead>
			  	<div class="col-12">
			  		<div class="row whi-bord">
			  		<span class="toi table-primary for-border col-md-2 bod whi-bord" >&nbsp;</span>
			  		<span class="toi table-primary for-border col-md-3 whi-bord" >System Size</span>
			  		<span class="toi-one table-primary for-border col-md-7 whi-bord">Estimated Savings</span>
			  		</div>
			  	</div>
			    <tr class="whi-bord">
			    	<th class="table-primary whi wdh-one whi-bord" scope="col" colspan="2">Options</th>
			      	<th class="table-primary whi wdh whi-bord" scope="col" colspan="2">Solar Panel 
					(KW)</th>
			      	<th class="table-primary whi whi-bord" scope="col" colspan="2">Battery 
					(KWh)</th>
			      	<th class="table-primary whi whi-bord" scope="col" colspan="2">1st Year Payment to Utility 
					(PKR)</th>
			      	<th class="table-primary whi whi-bord" scope="col" colspan="2">1st Year Savings 
					(PKR)</th>
			      	<th class="table-primary whi whi-bord" scope="col" colspan="2">1st Year Savings 
					(%)</th>
			      	<th class="table-primary whi whi-bord" scope="col" colspan="2">10 Years Savings 
					(PKR)</th>
			      	<th class="table-primary whi whi-bord" scope="col" colspan="2">Years of ZERO Electricity Charge from Utility</th>
			    </tr>
			  </thead>
			  <tbody class="whi-bord">
			  	<tr class="whi-bord">
			    	<td class="clo-two whi-bord" class="pad0boo" colspan="2">Solar Only</td>
			      <td class="clo-two whi-bord Bold-text" class="font-weight-bold" colspan="2">{{ $lead->solar_only_select_solar_system_size_kw }}</td>
			      <td class="clo-two whi-bord Bold-text" class="font-weight-bold" colspan="2">N/A</td>
			      <td class="clo-two whi-bord Bold-text" class="font-weight-bold" colspan="2">{{ $lead->E20 }}</td>
			      <td class="clo-two whi-bord Bold-text" class="font-weight-bold" colspan="2">{{ $lead->E13 }}</td>
			      <td class="clo-two whi-bord Bold-text" class="font-weight-bold" colspan="2">{{ $lead->N13 }}</td>
			      <td class="clo-two whi-bord Bold-text" class="font-weight-bold" colspan="2">{{ $lead->E15 }}</td>
			      <td class="clo-two whi-bord Bold-text" class="font-weight-bold" colspan="2">{{ $lead->D19 }}</td>
			    </tr>
			    <tr class="whi-bord">
			    	<td class="clo-one whi-bord" colspan="2">Solar + Battery</td>
			      <td class="flop-inpt" colspan="2">{{ $lead->battery_and_solar_select_solar_system_size_kw }}</td>
			      <td class="flop-inpt" colspan="2">{{ $lead->select_battery_size_kwh }}</td>
			      <td class="flop-inpt" colspan="2">{{ $lead->H20 }}</td>
			      <td class="flop-inpt" colspan="2">{{ $lead->H13 }}</td>
			      <td class="flop-inpt" colspan="2">{{ $lead->O13 }}</td>
			      <td class="flop-inpt" colspan="2">{{ $lead->H15 }}</td>
			      <td class="flop-inpt" colspan="2">{{ $lead->G19 }}</td>
			    </tr>
			    
			  </tbody>
			</table>	
		</div>
	</section>
	<section class="sec-three">
		<div class="container">
				<h2 class="text-ce">Battery Benefit</h2>	
			<div class="col-md-12">	
				<div class="row">
					
					<div class="col-md-10">
						<p class="tex-si"><b>Additional Savings with Battery (in 10 Years)</b></p>
					</div>
					<div class="col-md-2">
						<p class="tex-si"><b>{{ $lead->J15 }}</b></p>
					</div>
				</div>
			</div>	
			<div class="col-md-12">	
				<div class="row">
					<div class="col-md-10">
						<p class="tex-si"><b>Extends ZERO Energy Bill Payment to Utility by</b></p>
					</div>
					<div class="col-md-2">
						<p class="tex-si"><b>{{ $lead->J19 }} Years</b></p>
					</div>
				</div>
			</div>				
		</div>
	</section>
	<section class="sec-four">
		<div class="container">
			<div class="col-md-12">
				<div class="row">	
					<table class="fot-nt" style="border: none;" class="info-table">	
						<tr style="border: none;">
							<th class="table-primary whi right-border" scope="col" colspan="2" style="border: none; text-align: center;">Options</th>
						<div class="row disk">
							<span class="col-6 line">&nbsp;</span>
							<span class="col-6 back-dis" >Net Financial Impact (PKR)</span>
						</div>
							<th class="table-primary whi wdh-one" colspan="4"Savings scope="col"  style="border: none; text-align: center;">System Cost</th>
							<th class="table-primary whi wdh-one" scope="col"  style="border: none; text-align: center;">25 Years Utility Bill Savings</th>
							<th class="table-primary whi wdh-one" scope="col"  style="border: none; text-align: center;">Net Lifetime Savings</th>
							<th class="table-primary whi wdh-one" scope="col"  style="border: none; text-align: center;">10 Years Eqp Replacement Cost*</th>
						</tr>
						<tr style="border: none;">
							<td class="clo-one right-border whi-bord" colspan="4" style="border: none; background-color: #ffd6b2 ;"> Option 1: Solar Only</td>
							<td class="clo-one whi-bord"colspan="2" style="border: none; text-align: center; background-color: #ffd6b2 ;"><b>{{ $lead->solar_only }}</b></td>
							<td class="clo-one whi-bord" style="border: none; text-align: center; background-color: #ffd6b2 ;"><b>{{ $lead->E18 }}</b></td>
							<td class="clo-one whi-bord" style="border: none; text-align: center; background-color: #ffd6b2 ;"><b>{{ $lead->E18 - $lead->solar_only }}</b></td>
							<td class="clo-one whi-bord" colspan="1" style="border: none; text-align: center; background-color: #ffd6b2 ;"><b>ZERO</b></td>
						</tr>
						<tr class="whi-bord" style="border: none;">
							<td class="clo-one right-border " colspan="4" style="border: none;">Option 2: Solar + Battery</td>
							<td class="flop-inpt"colspan="2">{{ $lead->solar_plus_battery }}</td>
							<td class="flop-inpt">{{ $lead->H18 }}</td>
							<td class="flop-inpt">{{ $lead->H18 - $lead->solar_plus_battery }}
								</td>
							<td class="flop-inpt" >ZERO</td>
						</tr>
					</table>
					<p class="siz-pad">* Voltaic Power offers 10 years full replacement warranty on equipments. No cost of replacement to customer</p>
					<p class="siz-pad-one">** Equipment with leass than 5 years warranty typically need to be replaced within 10 years with additional cost of PKR 200,000 to 700,000 </p>
				</div>
			</div>
		</div>
	</section>
	<section class="sec-four">
		<div class="container">
			<div class="col-md-12">
				<div class="row">	
					<table class="fot-nt" style="border: none;" class="info-table">	
						<tr style="border: none;">
							<th class="table-primary whi right-border" scope="col" colspan="2" style="border: none; text-align: center;">Options</th>
						<div class="row disk">
							<span class="col-6 line">&nbsp;</span>
							<span class="col-6 back-dis" >Investment Metrics</span>
						</div>
							<th class="table-primary whi wdh-one" scope="col"  style="border: none; text-align: center;">Net Present Value (NPV)<br> %</th>
							<th class="table-primary whi wdh-one" scope="col"  style="border: none; text-align: center;">Payback 
							Period<br> %</th>
							<th class="table-primary whi wdh-one" scope="col"  style="border: none; text-align: center;">Total Return on Investment<br> %</th>
							<th class="table-primary whi wdh-one" scope="col"  style="border: none; text-align: center;">Rate of Return (IRR)<br> %</th>
						</tr>
						<tr style="border: none;">
							<td class="clo-one right-border whi-bord" colspan="2" style="border: none; background-color: #ffd6b2;"> Solar Only</td>
							<td class="clo-one whi-bord" style="border: none; text-align: center; background-color: #ffd6b2;"><b>{{ $lead->C106 }}</b></td>
							<td class="clo-one whi-bord" style="border: none; text-align: center; background-color: #ffd6b2;"><b>{{ $lead->B96 }}</b></td>
							<td class="clo-one whi-bord" style="border: none; text-align: center; background-color: #ffd6b2;"><b>902%</b></td>
							<td class="clo-one whi-bord" style="border: none; text-align: center; background-color: #ffd6b2;"><b>26%</b></td>
						</tr>
						<tr class="whi-bord" style="border: none;">
							<td class="clo-one right-border" colspan="2" style="border: none;"> Solar + Battery</td>
							<td class="flop-inpt">5,606,218</td>
							<td class="flop-inpt">5.1</td>
							<td class="flop-inpt">735%</td>
							<td class="flop-inpt">22%</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
	<section class="sec-six">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<table class="table">
						<thead>
						    <tr class="border-wh last-ab-colo">
						      <td class="border-wh bod-ol" scope="col" colspan="6">Levelized Cost of Energy (LCoE)</td>
						      <td class="border-wh bod-ol Bold-text" scope="col">PKR</td>
						    </tr>
						</thead>
						<tbody>
							<tr class="border-wh last-ab-colo-two">
								<td class="border-wh bac-co-lo" colspan="6">100% Grid</td>
							    <td class="border-wh bac-co-lo Bold-text">{{ $lead->B67 }}</td>
							</tr>
							<tr class="border-wh tab-colo-three">
								<td class="border-wh" colspan="6">Solar Only</td>
							    <td class="border-wh Bold-text" colspan="">{{ $lead->C112 }}</td>
							</tr>
							<tr class="border-wh tab-colo-three">
								<td class=" bac-co-lo-one" colspan="6">Solar + Battery</td>
							    <td class="flop-inpt"  colspan="">{{ $lead->C164 }}</td>
							</tr>
							
						</tbody>
					</table>	
				</div>
				<div class="col-md-6">
					<div class=" last-ko">
						<a href="#">Levelized Cost of Energy (LCoE)</a>
						<p class="padi-para">The cost of the power produced over 25 Years (Solar) or power purchased from utility</p>
					</div>
				</div>	
				<p class="siz-pad">* Grid LCoE is based on Annual Price Escalation Rate</p>	
				<p class="siz-pad-one">** LCoE for Solar & Battery is not affected by inflation but includes equipment replacement and O&M cost over the lifetime</p>	   
			</div>
		</div>

	</section>
	<section class="charts">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div id="firstchartContainer" style="height: 370px; width: 100%; margin: 20px auto;"></div>
				</div>

				<div class="col-md-4">
					<div id="netmonthcharges" style="height: 405px; width: 100%; margin: 20px auto;"></div>
				</div>

				<div class="col-md-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="cumulativecashflow" style="height: 405px; width: 100%; margin: 20px auto;"></div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div id="annualcashflow" style="height: 405px; width: 100%; margin: 20px auto;"></div>
				</div>
			</div>
		</div>
	</section>
</div>
<button id="cmd" onclick="CreatePDFfromHTML()">generate PDF</button>
	

	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
var annual = new CanvasJS.Chart("firstchartContainer", {
	animationEnabled: true,
	title:{
		text: "Annual Energy Use Distribution",
		fontSize: "16",
		shared: "true",
		horizontalAlign: "center"
	},
	axisX: {
		interval: 1,
		intervalType: "year",
		valueFormatString: "YYYY"
	},
	axisY: {
		suffix: "%"
	},
	toolTip: {
		shared: true
	},
	legend: {
		reversed: true,
		verticalAlign: "top",
		horizontalAlign: "center"
	},
	data: [ 
	{
		type: "stackedColumn100",
		name: "Net metered + Export",
		color: "#21409a",
		showInLegend: true,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0\"%\"",
		dataPoints: [
			{ label: "Without Solar", y: 0 },
			{ label: "Solar Only", y: {{ $lead->annual_energy_net_metered_solar_only }} },
			{ label: "Solar + Battery", y: {{ $lead->annual_energy_net_metered_solar_plus_battery }} }
		]
	}, 
	{
		type: "stackedColumn100",
		name: "Self Use",
		color: "#f90",
		showInLegend: true,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0\"%\"",
		dataPoints: [
			{ label: "Without Solar", y: 0 },
			{ label: "Solar Only", y: {{ $lead->annual_energy_self_use_solar_only }} },
			{ label: "Solar + Battery", y: {{ $lead->annual_energy_self_use_solar_plus_battery }} }
		]
	},{
		type: "stackedColumn100",
		name: "Grid use",
		color: "#ff5349",
		showInLegend: true,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0\"%\"",
		dataPoints: [
			{ label: "Without Solar", y: 100 },
			{ label: "Solar Only", y: {{ $lead->annual_energy_grid_use_solar_only }} },
			{ label: "Solar + Battery", y: {{ $lead->annual_energy_grid_use_solar_plus_battery }} }
		]
	}]
});
annual.render();

var netmonthcharges = new CanvasJS.Chart("netmonthcharges", {
	animationEnabled: true,
	//exportEnabled: true,
	title:{
		text: "Net Monthly Charges from Utility (PKR)",
		//text: "Net Monthly Charges From Utility (PKR) +ve values: Payments to Utility, -ve values: Credits from Utility",
        fontSize: "16",
		shared: "true",
		horizontalAlign: "center"
	},
	axisX: {
		valueFormatString: "MMM",
		title: "+ve values: Payments to Utility, -ve values: Credits from Utility",
		titleFontSize: "14",
		lineThickness: 1
	},
	axisY: {
		suffix: ""
	},
	toolTip: {
		shared: "true",
		horizontalAlign: "center"
	},
	legend: {
		cursor: "pointer",
		verticalAlign: "top",
		horizontalAlign: "center",
	},
	data: [{
		type: "rangeColumn",
		name: "100% Grid (No Solar)",
		color: "#ff5349",
		showInLegend: true,
		yValueFormatString: "#0.##",
		xValueFormatString: "MMM",
		dataPoints: [   
			{ label: "Jan", y: [0, {{ $lead->net_monthly_charges_no_solar_jan }}] },
			{ label: "Feb", y: [0, {{ $lead->net_monthly_charges_no_solar_feb }}] },
			{ label: "Mar", y: [0, {{ $lead->net_monthly_charges_no_solar_mar }}] },
			{ label: "Apr", y: [0, {{ $lead->net_monthly_charges_no_solar_apr }}] },
			{ label: "May", y: [0, {{ $lead->net_monthly_charges_no_solar_may }}] },
			{ label: "Jun", y: [0, {{ $lead->net_monthly_charges_no_solar_jun }}] },
			{ label: "Jul", y: [0, {{ $lead->net_monthly_charges_no_solar_jul }}] },
			{ label: "Aug", y: [0, {{ $lead->net_monthly_charges_no_solar_aug }}] },
			{ label: "Sep", y: [0, {{ $lead->net_monthly_charges_no_solar_sep }}] },
			{ label: "Oct", y: [0, {{ $lead->net_monthly_charges_no_solar_oct }}] },
			{ label: "Nov", y: [0, {{ $lead->net_monthly_charges_no_solar_nov }}] },
			{ label: "Dec", y: [0, {{ $lead->net_monthly_charges_no_solar_dec }}] }
		]
		},
		{
			type: "rangeColumn",
			name: "Solar Only",
			color: "#f90",
			showInLegend: true,
			yValueFormatString: "#0.##",
			xValueFormatString: "MMM, YYYY",
			dataPoints: [   
				{ label: "Jan", y: [0, {{ $lead->net_monthly_charges_solar_only_jan }}] },
				{ label: "Feb", y: [0, {{ $lead->net_monthly_charges_solar_only_feb }}] },
				{ label: "Mar", y: [0, {{ $lead->net_monthly_charges_solar_only_mar }}] },
				{ label: "Apr", y: [0, {{ $lead->net_monthly_charges_solar_only_apr }}] },
				{ label: "May", y: [0, {{ $lead->net_monthly_charges_solar_only_may }}] },
				{ label: "Jun", y: [0, {{ $lead->net_monthly_charges_solar_only_jun }}] },
				{ label: "Jul", y: [0, {{ $lead->net_monthly_charges_solar_only_jul }}] },
				{ label: "Aug", y: [0, {{ $lead->net_monthly_charges_solar_only_aug }}] },
				{ label: "Sep", y: [0, {{ $lead->net_monthly_charges_solar_only_sep }}] },
				{ label: "Oct", y: [0, {{ $lead->net_monthly_charges_solar_only_oct }}] },
				{ label: "Nov", y: [0, {{ $lead->net_monthly_charges_solar_only_nov }}] },
				{ label: "Dec", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] }
			]
		},
		{
			type: "rangeColumn",
			name: "Solar + Battery",
			color: "#21409a",
			showInLegend: true,
			yValueFormatString: "#0.##",
			xValueFormatString: "MMM, YYYY",
			dataPoints: [   
				{ label: "Jan", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_jan }}] },
				{ label: "Feb", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_feb }}] },
				{ label: "Mar", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_mar }}] },
				{ label: "Apr", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_apr }}] },
				{ label: "May", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_may }}] },
				{ label: "Jun", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_jun }}] },
				{ label: "Jul", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_jul }}] },
				{ label: "Aug", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_aug }}] },
				{ label: "Sep", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_sep }}] },
				{ label: "Oct", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_oct }}] },
				{ label: "Nov", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_nov }}] },
				{ label: "Dec", y: [0, {{ $lead->net_monthly_saving_solar_battery_chart_dec }}] }
			]
	}]
});
netmonthcharges.render();


var cumulativecashflow = new CanvasJS.Chart("cumulativecashflow", {
	animationEnabled: true,
	//exportEnabled: true,
	title:{
		text: "Cumulative Cash Flow (PKR)",
        fontSize: "16",
		shared: "true",
		horizontalAlign: "center"
	},
	axisX: {
		title: "Years",
		titleFontSize: "14",
		lineThickness: 1
	},
	axisY: {
		suffix: "",
		title: "Cash Flow (PKR)",
		titleFontSize: "14",
		lineThickness: 1

	},
	toolTip: {
		shared: "true",
		horizontalAlign: "center"
	},
	legend: {
		cursor: "pointer",
		verticalAlign: "top",
		horizontalAlign: "center",
	},
	data: [{
			type: "rangeColumn",
			name: "Solar Only",
			color: "#f90",
			showInLegend: true,
			dataPoints: [   
				{ label: "0", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_usage }}] },
				{ label: "1 Year", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_one }}] },
				{ label: "2 Years", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_two }}] },
				{ label: "3", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_three }}] },
				{ label: "4", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_four }}] },
				{ label: "5", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_five }}] },
				{ label: "6", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_six }}] },
				{ label: "7", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_seven }}] },
				{ label: "8", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_eight }}] },
				{ label: "9", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_nine }}] },
				{ label: "10", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_ten }}] },
				{ label: "11", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_eleven }}] },
				{ label: "12", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_twelve }}] },
				{ label: "13", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_thirteen }}] },
				{ label: "14", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_fourteen }}] },
				{ label: "15", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_fifteen }}] },
				{ label: "16", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_sixteen }}] },
				{ label: "17", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_seventeen }}] },
				{ label: "18", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_eighteen }}] },
				{ label: "19", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_nineteen }}] },
				{ label: "20", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_twenty }}] },
				{ label: "21", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_twenty_one }}] },
				{ label: "22", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_twenty_two }}] },
				{ label: "23", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_twenty_three }}] },
				{ label: "24", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_twenty_four }}] },
				{ label: "25", y: [0, {{ $lead->solar_only_cumulative_payback_cash_flow_PKR_twenty_five }}] }
			]
		},
		{
			type: "rangeColumn",
			name: "Solar + Battery",
			color: "#21409a",
			showInLegend: true,
			yValueFormatString: "#0.##",
			xValueFormatString: "MMM YYYY",
			dataPoints: [   
				{ label: "0", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_usage }}] },
				{ label: "1 Year", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_one }}] },
				{ label: "2 Years", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_two }}] },
				{ label: "3", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_three }}] },
				{ label: "4", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_four }}] },
				{ label: "5", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_five }}] },
				{ label: "6", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_six }}] },
				{ label: "7", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_seven }}] },
				{ label: "8", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_eight }}] },
				{ label: "9", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_nine }}] },
				{ label: "10", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_ten }}] },
				{ label: "11", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven }}] },
				{ label: "12", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve }}] },
				{ label: "13", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen }}] },
				{ label: "14", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen }}] },
				{ label: "15", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen }}] },
				{ label: "16", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen }}] },
				{ label: "17", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen }}] },
				{ label: "18", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen }}] },
				{ label: "19", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen }}] },
				{ label: "20", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty }}] },
				{ label: "21", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one }}] },
				{ label: "22", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two }}] },
				{ label: "23", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three }}] },
				{ label: "24", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four }}] },
				{ label: "25", y: [0, {{ $lead->solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five }}] }
			]
	}]
});
cumulativecashflow.render();



var annualcashflow = new CanvasJS.Chart("annualcashflow", {
	animationEnabled: true,
	//exportEnabled: true,
	title:{
		text: "Cumulative Cash Flow (PKR)",
        fontSize: "16",
		shared: "true",
		horizontalAlign: "center"
	},
	axisX: {
		title: "Years",
		titleFontSize: "14",
		lineThickness: 1
	},
	axisY: {
		suffix: "",
		title: "Cash Flow (PKR)",
		titleFontSize: "14",
		lineThickness: 1

	},
	toolTip: {
		shared: "true",
		horizontalAlign: "center"
	},
	legend: {
		cursor: "pointer",
		verticalAlign: "top",
		horizontalAlign: "center",
	},
	data: [{
			type: "rangeColumn",
			name: "Solar Only",
			color: "#f90",
			showInLegend: true,
			dataPoints: [   
				{ label: "0", y: [0, {{ $lead->net_monthly_charges_solar_only_jan }}] },
				{ label: "1 Year", y: [0, {{ $lead->net_monthly_charges_solar_only_feb }}] },
				{ label: "2 Years", y: [0, {{ $lead->net_monthly_charges_solar_only_mar }}] },
				{ label: "3", y: [0, {{ $lead->net_monthly_charges_solar_only_apr }}] },
				{ label: "4", y: [0, {{ $lead->net_monthly_charges_solar_only_may }}] },
				{ label: "5", y: [0, {{ $lead->net_monthly_charges_solar_only_jun }}] },
				{ label: "6", y: [0, {{ $lead->net_monthly_charges_solar_only_jul }}] },
				{ label: "7", y: [0, {{ $lead->net_monthly_charges_solar_only_aug }}] },
				{ label: "8", y: [0, {{ $lead->net_monthly_charges_solar_only_sep }}] },
				{ label: "9", y: [0, {{ $lead->net_monthly_charges_solar_only_oct }}] },
				{ label: "10", y: [0, {{ $lead->net_monthly_charges_solar_only_nov }}] },
				{ label: "11", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "12", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "13", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "14", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "15", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "16", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "17", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "18", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "19", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "20", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "21", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "22", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "23", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "24", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "25", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] }
			]
		},
		{
			type: "rangeColumn",
			name: "Solar + Battery",
			color: "#21409a",
			showInLegend: true,
			yValueFormatString: "#0.##",
			xValueFormatString: "MMM YYYY",
			dataPoints: [   
				{ label: "0", y: [0, {{ $lead->net_monthly_charges_solar_only_jan }}] },
				{ label: "1 Year", y: [0, {{ $lead->net_monthly_charges_solar_only_feb }}] },
				{ label: "2 Years", y: [0, {{ $lead->net_monthly_charges_solar_only_mar }}] },
				{ label: "3", y: [0, {{ $lead->net_monthly_charges_solar_only_apr }}] },
				{ label: "4", y: [0, {{ $lead->net_monthly_charges_solar_only_may }}] },
				{ label: "5", y: [0, {{ $lead->net_monthly_charges_solar_only_jun }}] },
				{ label: "6", y: [0, {{ $lead->net_monthly_charges_solar_only_jul }}] },
				{ label: "7", y: [0, {{ $lead->net_monthly_charges_solar_only_aug }}] },
				{ label: "8", y: [0, {{ $lead->net_monthly_charges_solar_only_sep }}] },
				{ label: "9", y: [0, {{ $lead->net_monthly_charges_solar_only_oct }}] },
				{ label: "10", y: [0, {{ $lead->net_monthly_charges_solar_only_nov }}] },
				{ label: "11", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "12", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "13", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "14", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "15", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "16", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "17", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "18", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "19", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "20", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "21", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "22", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "23", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "24", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] },
				{ label: "25", y: [0, {{ $lead->net_monthly_charges_solar_only_dec }}] }
			]
	}]
});
annualcashflow.render();
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
	<script type="text/javascript">
		//Create PDf from HTML...
function CreatePDFfromHTML() {
    var HTML_Width = $(".html-content").width();
    var HTML_Height = $(".html-content").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".html-content")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Your_PDF_Name.pdf");
        $(".html-content").hide();
    });
}
	</script>
