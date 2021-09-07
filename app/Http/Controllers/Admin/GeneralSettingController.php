<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use File;
use DB;

class GeneralSettingController extends Controller
{

    public function testcalc()
    {
        $setting = GeneralSetting::first();
        $on_peack_rate = $setting->on_peack_rate;
        $off_peack_rate = $setting->off_peack_rate;
        $export_rate = $setting->export_rate;
        $annual_rate_escalation = $setting->annual_rate_escalation;
        $export_rate_escalation = $setting->export_rate_escalation;
        $daytime_use = $setting->daytime_use;
        $on_peak_use = $setting->on_peak_use;
        $panel_structure_cost_per_kw = $setting->panel_structure_cost_per_kw;
        $system_cost_per_kw = $setting->system_cost_per_kw;
        $battery_cost_per_kwh = $setting->battery_cost_per_kwh;
        $usd_to_pkr_exchange_rate = $setting->usd_to_pkr_exchange_rate;
        $nighttime_use = $daytime_use - $on_peak_use;
        $on_peack_rate_with_gst = $on_peack_rate * 1.1875;
        $off_peack_rate_with_gst = $off_peack_rate * 1.1875;
        $effective_rate = $off_peack_rate_with_gst * ($daytime_use+$nighttime_use) + $on_peack_rate_with_gst * $on_peak_use;
        $maximum_monthly_energy_used = 50000/$effective_rate;
        $maximum_on_peak_monthly_energy_used = $maximum_monthly_energy_used * $on_peak_use;

        $average_on_peak_daily_use_summer = '8';
        $annual_energy_use = $maximum_monthly_energy_used * 6.3;

        $recommended_solar_system_size_kw = ($daytime_use*$annual_energy_use+$nighttime_use*$annual_energy_use*1.1875+($on_peack_rate_with_gst/$export_rate)*$on_peak_use*$annual_energy_use)/(4.1*365);

        $recommended_battery_size_kwh = 9.60;

        $selected_system_size = 12.0;
        $selected_battery_size = $recommended_battery_size_kwh;

        $selected_solar_for_battery = $selected_system_size + 0.67 * $selected_battery_size / 3.2;
        $solar_size_with_battery = $selected_solar_for_battery;

        $solor_system_cost = $selected_system_size * $system_cost_per_kw;
        $battery_cost = $selected_battery_size * $battery_cost_per_kwh;
        $cost_of_additional_panels_for_battery_charging = ($selected_solar_for_battery - $selected_system_size) * $panel_structure_cost_per_kw;

        // Solar Generation per KW
        $solor_generation_per_kw_jan = $setting->solor_generation_per_kw_jan;
        $solor_generation_per_kw_feb = $setting->solor_generation_per_kw_feb;
        $solor_generation_per_kw_mar = $setting->solor_generation_per_kw_mar;
        $solor_generation_per_kw_apr = $setting->solor_generation_per_kw_apr;
        $solor_generation_per_kw_may = $setting->solor_generation_per_kw_may;
        $solor_generation_per_kw_jun = $setting->solor_generation_per_kw_jun;
        $solor_generation_per_kw_jul = $setting->solor_generation_per_kw_jul;
        $solor_generation_per_kw_aug = $setting->solor_generation_per_kw_aug;
        $solor_generation_per_kw_sep = $setting->solor_generation_per_kw_sep;
        $solor_generation_per_kw_oct = $setting->solor_generation_per_kw_oct;
        $solor_generation_per_kw_nov = $setting->solor_generation_per_kw_nov;
        $solor_generation_per_kw_dec = $setting->solor_generation_per_kw_dec;
        // Solar Generation per KW


        // Energy Generation by System (KWh)
        $energy_generation_by_system_kwh_jan = $selected_system_size * $solor_generation_per_kw_jan;
        $energy_generation_by_system_kwh_feb = $selected_system_size * $solor_generation_per_kw_feb;
        $energy_generation_by_system_kwh_mar = $selected_system_size * $solor_generation_per_kw_mar;
        $energy_generation_by_system_kwh_apr = $selected_system_size * $solor_generation_per_kw_apr;
        $energy_generation_by_system_kwh_may = $selected_system_size * $solor_generation_per_kw_may;
        $energy_generation_by_system_kwh_jun = $selected_system_size * $solor_generation_per_kw_jun;
        $energy_generation_by_system_kwh_jul = $selected_system_size * $solor_generation_per_kw_jul;
        $energy_generation_by_system_kwh_aug = $selected_system_size * $solor_generation_per_kw_aug;
        $energy_generation_by_system_kwh_sep = $selected_system_size * $solor_generation_per_kw_sep;
        $energy_generation_by_system_kwh_oct = $selected_system_size * $solor_generation_per_kw_oct;
        $energy_generation_by_system_kwh_nov = $selected_system_size * $solor_generation_per_kw_nov;
        $energy_generation_by_system_kwh_dec = $selected_system_size * $solor_generation_per_kw_dec;
        // Energy Generation by System (KWh)


        // Generation for Solar+Battery (KWh)
        $generation_for_solr_plus_battery_jan = $selected_solar_for_battery * $solor_generation_per_kw_jan;

        $generation_for_solr_plus_battery_feb = $selected_solar_for_battery * $solor_generation_per_kw_feb;

        $generation_for_solr_plus_battery_mar = $selected_solar_for_battery * $solor_generation_per_kw_mar;

        $generation_for_solr_plus_battery_apr = $selected_solar_for_battery * $solor_generation_per_kw_apr;

        $generation_for_solr_plus_battery_may = $selected_solar_for_battery * $solor_generation_per_kw_jan;

        $generation_for_solr_plus_battery_jun = $selected_solar_for_battery * $solor_generation_per_kw_jun;

        $generation_for_solr_plus_battery_jul = $selected_solar_for_battery * $solor_generation_per_kw_jul;

        $generation_for_solr_plus_battery_aug = $selected_solar_for_battery * $solor_generation_per_kw_aug;

        $generation_for_solr_plus_battery_sep = $selected_solar_for_battery * $solor_generation_per_kw_sep;

        $generation_for_solr_plus_battery_oct = $selected_solar_for_battery * $solor_generation_per_kw_oct;

        $generation_for_solr_plus_battery_nov = $selected_solar_for_battery * $solor_generation_per_kw_nov;

        $generation_for_solr_plus_battery_dec = $selected_solar_for_battery * $solor_generation_per_kw_dec;
        // Generation for Solar+Battery (KWh)


        // Total Battery Charge Available (KWh)
        $total_battery_charge_available_jan = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_feb = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_mar = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_apr = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_may = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_jun = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_jul = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_aug = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_sep = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_oct = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_nov = 0.9 * $selected_battery_size * 30;
        $total_battery_charge_available_dec = 0.9 * $selected_battery_size * 30;
        // Total Battery Charge Available (KWh)

        // Peak Battery Charge Available (KWh)
        $peak_battery_charge_available_jan = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_feb = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_mar = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_apr = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_may = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_jun = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_jul = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_aug = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_sep = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_oct = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_nov = 0.8 * $selected_battery_size * 30;
        $peak_battery_charge_available_dec = 0.8 * $selected_battery_size * 30;
        // Peak Battery Charge Available (KWh)


        // Solar Only
        $total_solar_generation = $energy_generation_by_system_kwh_jan + $energy_generation_by_system_kwh_feb + $energy_generation_by_system_kwh_mar + $energy_generation_by_system_kwh_apr + $energy_generation_by_system_kwh_may + $energy_generation_by_system_kwh_jun + $energy_generation_by_system_kwh_jul + $energy_generation_by_system_kwh_aug + $energy_generation_by_system_kwh_sep + $energy_generation_by_system_kwh_oct + $energy_generation_by_system_kwh_nov + $energy_generation_by_system_kwh_dec;



        return $total_solar_generation;
        //return round($annual_energy_use);
    }

    public function index()
    {
    	$setting = GeneralSetting::first();
    	return view('admin/generalsetting/index', compact('setting'));
    }

    public function create()
    {
    	return view('admin/generalsetting/index');
    }

   public function store(Request $request)
   {

      $generalsetting = new GeneralSetting([
			'on_peack_rate' => $request->get('on_peack_rate'),
            'off_peack_rate' => $request->get('off_peack_rate'),
            'export_rate' => $request->get('export_rate'),
            'annual_rate_escalation' => $request->get('annual_rate_escalation'),
            'export_rate_escalation' => $request->get('export_rate_escalation'),
            'daytime_use' => $request->get('daytime_use'),
            'on_peak_use' => $request->get('on_peak_use'),
            'panel_structure_cost_per_kw' => $request->get('panel_structure_cost_per_kw'),
            'system_cost_per_kw' => $request->get('system_cost_per_kw'),
            'battery_cost_per_kwh' => $request->get('battery_cost_per_kwh'),
            'usd_to_pkr_exchange_rate' => $request->get('usd_to_pkr_exchange_rate'),
            'usage_distribution_jan' => $request->get('usage_distribution_jan'),
            'usage_distribution_feb' => $request->get('usage_distribution_feb'),
            'usage_distribution_mar' => $request->get('usage_distribution_mar'),
            'usage_distribution_apr' => $request->get('usage_distribution_apr'),
            'usage_distribution_may' => $request->get('usage_distribution_may'),
            'usage_distribution_jun' => $request->get('usage_distribution_jun'),
            'usage_distribution_jul' => $request->get('usage_distribution_jul'),
            'usage_distribution_aug' => $request->get('usage_distribution_aug'),
            'usage_distribution_sep' => $request->get('usage_distribution_sep'),
            'usage_distribution_oct' => $request->get('usage_distribution_oct'),
            'usage_distribution_nov' => $request->get('usage_distribution_nov'),
            'usage_distribution_dec' => $request->get('usage_distribution_dec'),
            'solor_generation_per_kw_jan' => $request->get('solor_generation_per_kw_jan'),
            'solor_generation_per_kw_feb' => $request->get('solor_generation_per_kw_feb'),
            'solor_generation_per_kw_mar' => $request->get('solor_generation_per_kw_mar'),
            'solor_generation_per_kw_apr' => $request->get('solor_generation_per_kw_apr'),
            'solor_generation_per_kw_may' => $request->get('solor_generation_per_kw_may'),
            'solor_generation_per_kw_jun' => $request->get('solor_generation_per_kw_jun'),
            'solor_generation_per_kw_jul' => $request->get('solor_generation_per_kw_jul'),
            'solor_generation_per_kw_aug' => $request->get('solor_generation_per_kw_aug'),
            'solor_generation_per_kw_sep' => $request->get('solor_generation_per_kw_sep'),
            'solor_generation_per_kw_oct' => $request->get('solor_generation_per_kw_oct'),
            'solor_generation_per_kw_nov' => $request->get('solor_generation_per_kw_nov'),
            'solor_generation_per_kw_dec' => $request->get('solor_generation_per_kw_dec')			
		]);

		$generalsetting->save();
   	 return redirect('admin/generalsetting')->with('success', 'General Setting is Successfully created');
   }

   public function edit($id)
   {

	$setting = GeneralSetting::findOrFail($id);
   	return redirect('admin/generalsetting', compact('setting'));
   }

   public function update(Request $request, $id)
   {
        $generalsetting = array(
			'on_peack_rate' => $request->get('on_peack_rate'),
            'off_peack_rate' => $request->get('off_peack_rate'),
            'export_rate' => $request->get('export_rate'),
            'annual_rate_escalation' => $request->get('annual_rate_escalation'),
            'export_rate_escalation' => $request->get('export_rate_escalation'),
            'daytime_use' => $request->get('daytime_use'),
            'on_peak_use' => $request->get('on_peak_use'),
            'panel_structure_cost_per_kw' => $request->get('panel_structure_cost_per_kw'),
            'system_cost_per_kw' => $request->get('system_cost_per_kw'),
            'battery_cost_per_kwh' => $request->get('battery_cost_per_kwh'),
            'usd_to_pkr_exchange_rate' => $request->get('usd_to_pkr_exchange_rate'),
            'usage_distribution_jan' => $request->get('usage_distribution_jan'),
            'usage_distribution_feb' => $request->get('usage_distribution_feb'),
            'usage_distribution_mar' => $request->get('usage_distribution_mar'),
            'usage_distribution_apr' => $request->get('usage_distribution_apr'),
            'usage_distribution_may' => $request->get('usage_distribution_may'),
            'usage_distribution_jun' => $request->get('usage_distribution_jun'),
            'usage_distribution_jul' => $request->get('usage_distribution_jul'),
            'usage_distribution_aug' => $request->get('usage_distribution_aug'),
            'usage_distribution_sep' => $request->get('usage_distribution_sep'),
            'usage_distribution_oct' => $request->get('usage_distribution_oct'),
            'usage_distribution_nov' => $request->get('usage_distribution_nov'),
            'usage_distribution_dec' => $request->get('usage_distribution_dec'),
            'solor_generation_per_kw_jan' => $request->get('solor_generation_per_kw_jan'),
            'solor_generation_per_kw_feb' => $request->get('solor_generation_per_kw_feb'),
            'solor_generation_per_kw_mar' => $request->get('solor_generation_per_kw_mar'),
            'solor_generation_per_kw_apr' => $request->get('solor_generation_per_kw_apr'),
            'solor_generation_per_kw_may' => $request->get('solor_generation_per_kw_may'),
            'solor_generation_per_kw_jun' => $request->get('solor_generation_per_kw_jun'),
            'solor_generation_per_kw_jul' => $request->get('solor_generation_per_kw_jul'),
            'solor_generation_per_kw_aug' => $request->get('solor_generation_per_kw_aug'),
            'solor_generation_per_kw_sep' => $request->get('solor_generation_per_kw_sep'),
            'solor_generation_per_kw_oct' => $request->get('solor_generation_per_kw_oct'),
            'solor_generation_per_kw_nov' => $request->get('solor_generation_per_kw_nov'),
            'solor_generation_per_kw_dec' => $request->get('solor_generation_per_kw_dec')
		);
		  
        GeneralSetting::whereId($id)->update($generalsetting);
   	 return redirect('admin/generalsetting')->with('success', 'General Setting is Successfully Updated');
   }
}
