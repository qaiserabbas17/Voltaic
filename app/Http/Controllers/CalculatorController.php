<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use File;
use DB;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    public function setvalue($variable)
    {
        if (strpos($variable, '.')) {
            return substr($variable, 0, strpos($variable, "."));
        }
        return $variable;
    }
    public function index(Request $request)
    {
        $setting = GeneralSetting::first();
        $bill = $request->bill_amount;
        $on_peack_rate = $setting->on_peack_rate;
        $off_peack_rate = $setting->off_peack_rate;
        $export_rate = $setting->export_rate;
        $annual_rate_escalation = $setting->annual_rate_escalation;
        $export_rate_escalation = $setting->export_rate_escalation;
        $daytime_use = $setting->daytime_use;
        $on_peak_use = $setting->on_peak_use;
        $nighttime_use = $daytime_use - $on_peak_use;
        $panel_structure_cost_per_kw = $setting->panel_structure_cost_per_kw;

        $system_cost_per_kw = $setting->system_cost_per_kw;

        $battery_cost_per_kwh = $setting->battery_cost_per_kwh;

        $usd_to_pkr_exchange_rate = $setting->usd_to_pkr_exchange_rate;

        $on_peack_rate_with_gst = $on_peack_rate * 1.1875;
        $off_peack_rate_with_gst = $off_peack_rate * 1.1875;

        $effective_rate = $off_peack_rate_with_gst * ($daytime_use/100+$nighttime_use/100) + $on_peack_rate_with_gst * $on_peak_use/100;
        $maximum_monthly_energy_used = $bill/$effective_rate;
        $maximum_on_peak_monthly_energy_used = $maximum_monthly_energy_used * ($on_peak_use/100);
        $average_on_peak_daily_use_summer = '8';
        $annual_energy_use = $maximum_monthly_energy_used * 6.3;

        $recommended_solar_system_size_kw = ($daytime_use/100*$annual_energy_use+$nighttime_use/100*$annual_energy_use*1.1875+($on_peack_rate_with_gst/$export_rate)*$on_peak_use/100*$annual_energy_use)/(4.1*365);

        //$recommended_battery_size_kwh = 9.60;


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


        


        // Usage Distribution Month
        $usage_distribution_jan = $setting->usage_distribution_jan/100;
        $usage_distribution_feb = $setting->usage_distribution_feb/100;
        $usage_distribution_mar = $setting->usage_distribution_mar/100;
        $usage_distribution_apr = $setting->usage_distribution_apr/100;
        $usage_distribution_may = $setting->usage_distribution_may/100;
        $usage_distribution_jun = $setting->usage_distribution_jun/100;
        $usage_distribution_jul = $setting->usage_distribution_jul/100;
        $usage_distribution_aug = $setting->usage_distribution_aug/100;
        $usage_distribution_sep = $setting->usage_distribution_sep/100;
        $usage_distribution_oct = $setting->usage_distribution_oct/100;
        $usage_distribution_nov = $setting->usage_distribution_nov/100;
        $usage_distribution_dec = $setting->usage_distribution_dec/100;
        // Usage Distribution Month

        // Energy Use

        $energy_use_jan = ceil($annual_energy_use * $usage_distribution_jan);
        $energy_use_feb = ceil($annual_energy_use * $usage_distribution_feb);
        $energy_use_mar = ceil($annual_energy_use * $usage_distribution_mar);
        $energy_use_apr = ceil($annual_energy_use * $usage_distribution_apr);
        $energy_use_may = ceil($annual_energy_use * $usage_distribution_may);
        $energy_use_jun = ceil($annual_energy_use * $usage_distribution_jun);
        $energy_use_jul = ceil($annual_energy_use * $usage_distribution_jul);
        $energy_use_aug = ceil($annual_energy_use * $usage_distribution_aug);
        $energy_use_sep = ceil($annual_energy_use * $usage_distribution_sep);
        $energy_use_oct = ceil($annual_energy_use * $usage_distribution_oct);
        $energy_use_nov = ceil($annual_energy_use * $usage_distribution_nov);
        $energy_use_dec = ceil($annual_energy_use * $usage_distribution_dec);
        // Energy Use

        // Daytime Use Months
        $daytime_use_jan = ceil(($daytime_use/100) * $energy_use_jan);
        $daytime_use_feb = ceil(($daytime_use/100) * $energy_use_feb);
        $daytime_use_mar = ceil(($daytime_use/100) * $energy_use_mar);
        $daytime_use_apr = ceil(($daytime_use/100) * $energy_use_apr);
        $daytime_use_may = ceil(($daytime_use/100) * $energy_use_may);
        $daytime_use_jun = ceil(($daytime_use/100) * $energy_use_jun);
        $daytime_use_jul = ceil(($daytime_use/100) * $energy_use_jul);
        $daytime_use_aug = ceil(($daytime_use/100) * $energy_use_aug);
        $daytime_use_sep = ceil(($daytime_use/100) * $energy_use_sep);
        $daytime_use_oct = ceil(($daytime_use/100) * $energy_use_oct);
        $daytime_use_nov = ceil(($daytime_use/100) * $energy_use_nov);

        $daytime_use_dec = ceil(($daytime_use/100) * $energy_use_dec);
        // Daytime Use Months

        // 

        $nighttime_use_jan = ceil(($nighttime_use/100) * $energy_use_jan);
        $nighttime_use_feb = ceil(($nighttime_use/100) * $energy_use_feb);
        $nighttime_use_mar = ceil(($nighttime_use/100) * $energy_use_mar);
        $nighttime_use_apr = ceil(($nighttime_use/100) * $energy_use_apr);
        $nighttime_use_may = ceil(($nighttime_use/100) * $energy_use_may);
        $nighttime_use_jun = ceil(($nighttime_use/100) * $energy_use_jun);
        $nighttime_use_jul = ceil(($nighttime_use/100) * $energy_use_jul);
        $nighttime_use_aug = ceil(($nighttime_use/100) * $energy_use_aug);
        $nighttime_use_sep = ceil(($nighttime_use/100) * $energy_use_sep);
        $nighttime_use_oct = ceil(($nighttime_use/100) * $energy_use_oct);
        $nighttime_use_nov = ceil($this->setvalue(($nighttime_use/100) * $energy_use_nov));
        $nighttime_use_dec = ceil(($nighttime_use/100) * $energy_use_dec);
        // Nighttime Use Months

        // On-Peak Use Months
        $on_peak_use_jan = ceil(($on_peak_use/100) * $energy_use_jan);
        $on_peak_use_feb = ceil(($on_peak_use/100) * $energy_use_feb);
        $on_peak_use_mar = ceil(($on_peak_use/100) * $energy_use_mar);
        $on_peak_use_apr = ceil(($on_peak_use/100) * $energy_use_apr);
        $on_peak_use_may = ceil(($on_peak_use/100) * $energy_use_may);
        $on_peak_use_jun = ceil(($on_peak_use/100) * $energy_use_jun);
        $on_peak_use_jul = ceil(($on_peak_use/100) * $energy_use_jul);
        $on_peak_use_aug = ceil(($on_peak_use/100) * $energy_use_aug);
        $on_peak_use_sep = ceil(($on_peak_use/100) * $energy_use_sep);
        $on_peak_use_oct = ceil(($on_peak_use/100) * $energy_use_oct);
        $on_peak_use_nov = ceil(($on_peak_use/100) * $energy_use_nov);
        $on_peak_use_dec = ceil(($on_peak_use/100) * $energy_use_dec);
        // On-Peak Use Months

        $average_on_peak_daily_use_summer = (($on_peak_use_jan + $on_peak_use_feb + $on_peak_use_mar + $on_peak_use_apr + $on_peak_use_may + $on_peak_use_jun + $on_peak_use_jul + $on_peak_use_aug + $on_peak_use_sep + $on_peak_use_oct) / 10)/30;

        $recommended_battery_size_kwh = max(9.60,(round($average_on_peak_daily_use_summer/3.2,0,PHP_ROUND_HALF_DOWN)*3.2));
        $selected_system_size = $request->select_solar;
        $selected_battery_size = $recommended_battery_size_kwh;

        $selected_solar_for_battery = $selected_system_size + 0.67 * $selected_battery_size / 3.2;
        $solar_size_with_battery = $selected_solar_for_battery;

        $solor_system_cost = $selected_system_size * $system_cost_per_kw;
        $battery_cost = $selected_battery_size * $battery_cost_per_kwh;
        $cost_of_additional_panels_for_battery_charging = ($selected_solar_for_battery - $selected_system_size) * $panel_structure_cost_per_kw;

        // Energy Generation by System (KWh)
        $energy_generation_by_system_kwh_jan = $this->setvalue($selected_system_size * $solor_generation_per_kw_jan);
        $energy_generation_by_system_kwh_feb = $this->setvalue($selected_system_size * $solor_generation_per_kw_feb);
        $energy_generation_by_system_kwh_mar = $this->setvalue($selected_system_size * $solor_generation_per_kw_mar);
        $energy_generation_by_system_kwh_apr = $this->setvalue($selected_system_size * $solor_generation_per_kw_apr);
        $energy_generation_by_system_kwh_may = $this->setvalue($selected_system_size * $solor_generation_per_kw_may);
        $energy_generation_by_system_kwh_jun = $this->setvalue($selected_system_size * $solor_generation_per_kw_jun);
        $energy_generation_by_system_kwh_jul = $this->setvalue($selected_system_size * $solor_generation_per_kw_jul);
        $energy_generation_by_system_kwh_aug = $this->setvalue($selected_system_size * $solor_generation_per_kw_aug);
        $energy_generation_by_system_kwh_sep = $this->setvalue($selected_system_size * $solor_generation_per_kw_sep);
        $energy_generation_by_system_kwh_oct = $this->setvalue($selected_system_size * $solor_generation_per_kw_oct);
        $energy_generation_by_system_kwh_nov = $this->setvalue($selected_system_size * $solor_generation_per_kw_nov);
        $energy_generation_by_system_kwh_dec = $this->setvalue($selected_system_size * $solor_generation_per_kw_dec);
        // Energy Generation by System (KWh)  


        // Generation for Solar+Battery (KWh)

        $generation_for_solr_plus_battery_jan = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_jan);
        $generation_for_solr_plus_battery_feb = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_feb);
        $generation_for_solr_plus_battery_mar = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_mar);
        $generation_for_solr_plus_battery_apr = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_apr);
        $generation_for_solr_plus_battery_may = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_may);
        $generation_for_solr_plus_battery_jun = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_jun);
        $generation_for_solr_plus_battery_jul = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_jul);
        $generation_for_solr_plus_battery_aug = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_aug);
        $generation_for_solr_plus_battery_sep = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_sep);
        $generation_for_solr_plus_battery_oct = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_oct);
        $generation_for_solr_plus_battery_nov = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_nov);
        $generation_for_solr_plus_battery_dec = $this->setvalue($selected_solar_for_battery * $solor_generation_per_kw_dec);
        // Generation for Solar+Battery (KWh)


        // Total Battery Charge Available (KWh)
        
        $total_battery_charge_available_jan = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_feb = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_mar = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_apr = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_may = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_jun = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_jul = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_aug = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_sep = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_oct = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_nov = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_dec = $this->setvalue(0.9 * ($selected_battery_size * 30));
        $total_battery_charge_available_sum = $total_battery_charge_available_jan + $total_battery_charge_available_feb + $total_battery_charge_available_mar + $total_battery_charge_available_apr + $total_battery_charge_available_may + $total_battery_charge_available_jun + $total_battery_charge_available_jul + $total_battery_charge_available_aug + $total_battery_charge_available_sep + $total_battery_charge_available_oct + $total_battery_charge_available_nov + $total_battery_charge_available_dec;
        // Total Battery Charge Available (KWh)

        // Peak Battery Charge Available (KWh)
        
        $peak_battery_charge_available_jan = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_feb = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_mar = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_apr = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_may = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_jun = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_jul = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_aug = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_sep = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_oct = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_nov = $this->setvalue(0.8 * ($selected_battery_size * 30));
        $peak_battery_charge_available_dec = $this->setvalue(0.8 * ($selected_battery_size * 30));
        // Peak Battery Charge Available (KWh)


        // Solar Only
        $total_solar_generation = $this->setvalue($energy_generation_by_system_kwh_jan) + $this->setvalue($energy_generation_by_system_kwh_feb) + $this->setvalue($energy_generation_by_system_kwh_mar) + $this->setvalue($energy_generation_by_system_kwh_apr) + $this->setvalue($energy_generation_by_system_kwh_may) + $this->setvalue($energy_generation_by_system_kwh_jun) + $this->setvalue($energy_generation_by_system_kwh_jul) + $this->setvalue($energy_generation_by_system_kwh_aug) + $this->setvalue($energy_generation_by_system_kwh_sep) + $this->setvalue($energy_generation_by_system_kwh_oct) + $this->setvalue($energy_generation_by_system_kwh_nov) + $this->setvalue($energy_generation_by_system_kwh_dec);

        // Self Use
        $self_use_jan = ceil($daytime_use_jan);
        $self_use_feb = ceil($daytime_use_feb);
        $self_use_mar = ceil($daytime_use_mar);
        $self_use_apr = ceil($daytime_use_apr);
        $self_use_may = ceil($daytime_use_may);
        $self_use_jun = ceil($daytime_use_jun);
        $self_use_jul = ceil($daytime_use_jul);
        $self_use_aug = ceil($daytime_use_aug);
        $self_use_sep = ceil($daytime_use_sep);
        $self_use_oct = ceil($daytime_use_oct);
        $self_use_nov = ceil($daytime_use_nov);
        $self_use_dec = ceil($daytime_use_dec);
        $self_use = $self_use_jan + $self_use_feb + $self_use_mar + $self_use_apr + $self_use_may + $self_use_jun + $self_use_jul + $self_use_aug + $self_use_sep + $self_use_oct + $self_use_nov + $self_use_dec;

        // Self Use

        // Excess Generation 
        $excess_generation_jan = $energy_generation_by_system_kwh_jan - $self_use_jan;
        $excess_generation_feb = $energy_generation_by_system_kwh_feb - $self_use_feb;
        $excess_generation_mar = $energy_generation_by_system_kwh_mar - $self_use_mar;
        $excess_generation_apr = $energy_generation_by_system_kwh_apr - $self_use_apr;
        $excess_generation_may = $energy_generation_by_system_kwh_may - $self_use_may;
        $excess_generation_jun = $energy_generation_by_system_kwh_jun - $self_use_jun;
        $excess_generation_jul = $energy_generation_by_system_kwh_jul - $self_use_jul;
        $excess_generation_aug = $energy_generation_by_system_kwh_aug - $self_use_aug;
        $excess_generation_sep = $energy_generation_by_system_kwh_sep - $self_use_sep;
        $excess_generation_oct = $energy_generation_by_system_kwh_oct - $self_use_oct;
        $excess_generation_nov = $energy_generation_by_system_kwh_nov - $self_use_nov;
        $excess_generation_dec = $energy_generation_by_system_kwh_dec - $self_use_dec;
        $excess_generation = $excess_generation_jan + $excess_generation_feb + $excess_generation_mar + $excess_generation_apr + $excess_generation_may + $excess_generation_jun + $excess_generation_jul + $excess_generation_aug + $excess_generation_sep + $excess_generation_oct + $excess_generation_nov + $excess_generation_dec;

        //Excess Generation 

        // Off-Peak Imports
        $off_peak_imports_jan = $nighttime_use_jan;
        $off_peak_imports_feb = $nighttime_use_feb;
        $off_peak_imports_mar = $nighttime_use_mar;
        $off_peak_imports_apr = $nighttime_use_apr;
        $off_peak_imports_may = $nighttime_use_may;
        $off_peak_imports_jun = $nighttime_use_jun;
        $off_peak_imports_jul = $nighttime_use_jul;
        $off_peak_imports_aug = $nighttime_use_aug;
        $off_peak_imports_sep = $nighttime_use_sep;
        $off_peak_imports_oct = $nighttime_use_oct;
        $off_peak_imports_nov = $nighttime_use_nov;
        $off_peak_imports_dec = $nighttime_use_dec;

        $off_peak_imports_1st_year_usage = $nighttime_use_jan + $nighttime_use_feb + $nighttime_use_mar + $nighttime_use_apr + $nighttime_use_may + $nighttime_use_jun + $nighttime_use_jul + $nighttime_use_aug + $nighttime_use_sep + $nighttime_use_oct + $nighttime_use_nov + $nighttime_use_dec;
        $off_peak_imports_1st_year_charges = $off_peak_imports_1st_year_usage * (float)number_format($off_peack_rate_with_gst, 2, '.', '');
        // Off-Peak Imports

        // Net metered Off-Peak

        $net_metered_off_peak_jan = min($excess_generation_jan,$nighttime_use_jan);
        $net_metered_off_peak_feb = min($excess_generation_feb,$nighttime_use_feb);
        $net_metered_off_peak_mar = min($excess_generation_mar,$nighttime_use_mar);
        $net_metered_off_peak_apr = min($excess_generation_apr,$nighttime_use_apr);
        $net_metered_off_peak_may = min($excess_generation_may,$nighttime_use_may);
        $net_metered_off_peak_jun = min($excess_generation_jun,$nighttime_use_jun);
        $net_metered_off_peak_jul = min($excess_generation_jul,$nighttime_use_jul);
        $net_metered_off_peak_aug = min($excess_generation_aug,$nighttime_use_aug);
        $net_metered_off_peak_sep = min($excess_generation_sep,$nighttime_use_sep);
        $net_metered_off_peak_oct = min($excess_generation_oct,$nighttime_use_oct);
        $net_metered_off_peak_nov = min($excess_generation_nov,$nighttime_use_nov);
        $net_metered_off_peak_dec = min($excess_generation_dec,$nighttime_use_dec);

        $net_metered_off_peak_1st_year_usage = ceil($net_metered_off_peak_jan) + ceil($net_metered_off_peak_feb) + ceil($net_metered_off_peak_mar) + ceil($net_metered_off_peak_apr) + ceil($net_metered_off_peak_may) + ceil($net_metered_off_peak_jun) + ceil($net_metered_off_peak_jul) + ceil($net_metered_off_peak_aug) + ceil($net_metered_off_peak_sep) + ceil($net_metered_off_peak_oct) + ceil($net_metered_off_peak_nov) + ceil($net_metered_off_peak_dec);
        $net_metered_off_peak_1st_year_charges = $net_metered_off_peak_1st_year_usage * $off_peack_rate;

        // $self_use_jun.// echo ceil($net_metered_off_peak_jan).'<br/>';
        // echo round($net_metered_off_peak_feb).'<br/>';
        // echo round($net_metered_off_peak_mar).'<br/>';
        // echo round($net_metered_off_peak_apr).'<br/>';
        // echo round($net_metered_off_peak_may).'<br/>';
        // echo round($net_metered_off_peak_jun).'<br/>';
        // echo round($net_metered_off_peak_jul).'<br/>';
        // echo round($net_metered_off_peak_aug).'<br/>';
        // echo round($net_metered_off_peak_sep).'<br/>';
        // echo round($net_metered_off_peak_oct).'<br/>';
        // echo round($net_metered_off_peak_nov).'<br/>';
        // echo round($net_metered_off_peak_dec).'<br/>';

        // echo $net_metered_off_peak_jun.'<br/>';
        // echo $net_metered_off_peak_jul.'<br/>';
        // die($net_metered_off_peak_1st_year_usage);



        
        // Net metered Off-Peak

        // Excess Export
        $excess_export_jan = $excess_generation_jan - $net_metered_off_peak_jan;
        $excess_export_feb = $excess_generation_feb - $net_metered_off_peak_feb;
        $excess_export_mar = $excess_generation_mar - $net_metered_off_peak_mar;
        $excess_export_apr = $excess_generation_apr - $net_metered_off_peak_apr;
        $excess_export_may = $excess_generation_may - $net_metered_off_peak_may;
        $excess_export_jun = $excess_generation_jun - $net_metered_off_peak_jun;
        $excess_export_jul = $excess_generation_jul - $net_metered_off_peak_jul;
        $excess_export_aug = $excess_generation_aug - $net_metered_off_peak_aug;
        $excess_export_sep = $excess_generation_sep - $net_metered_off_peak_sep;
        $excess_export_oct = $excess_generation_oct - $net_metered_off_peak_oct;
        $excess_export_nov = $excess_generation_nov - $net_metered_off_peak_nov;
        $excess_export_dec = $excess_generation_dec - $net_metered_off_peak_dec;

        $excess_export_1st_year_usage = $excess_export_jan + $excess_export_feb + $excess_export_mar + $excess_export_apr + $excess_export_may + $excess_export_jun + $excess_export_jul + $excess_export_aug + $excess_export_sep + $excess_export_oct + $excess_export_nov + $excess_export_dec;
        $excess_export_1st_year_charges = $excess_export_1st_year_usage * $export_rate;
        
        // Excess Export


        // Off-Peak Import after netting off
        
        $off_peak_import_after_netting_off_jan = $nighttime_use_jan - $net_metered_off_peak_jan;
        $off_peak_import_after_netting_off_feb = $nighttime_use_feb - $net_metered_off_peak_feb;
        $off_peak_import_after_netting_off_mar = $nighttime_use_mar - $net_metered_off_peak_mar;
        $off_peak_import_after_netting_off_apr = $nighttime_use_apr - $net_metered_off_peak_apr;
        $off_peak_import_after_netting_off_may = $nighttime_use_may - $net_metered_off_peak_may;
        $off_peak_import_after_netting_off_jun = $nighttime_use_jun - $net_metered_off_peak_jun;
        $off_peak_import_after_netting_off_jul = $nighttime_use_jul - $net_metered_off_peak_jul;
        $off_peak_import_after_netting_off_aug = $nighttime_use_aug - $net_metered_off_peak_aug;
        $off_peak_import_after_netting_off_sep = $nighttime_use_sep - $net_metered_off_peak_sep;
        $off_peak_import_after_netting_off_oct = $nighttime_use_oct - $net_metered_off_peak_oct;
        $off_peak_import_after_netting_off_nov = $nighttime_use_nov - $net_metered_off_peak_nov;
        $off_peak_import_after_netting_off_dec = $nighttime_use_dec - $net_metered_off_peak_dec;
        // echo round($net_metered_off_peak_jun); 
        // echo round($nighttime_use_jun);die();

        $off_peak_import_after_netting_off_1st_year_usage = ceil($off_peak_import_after_netting_off_jan) + ceil($off_peak_import_after_netting_off_feb) + ceil($off_peak_import_after_netting_off_mar) + ceil($off_peak_import_after_netting_off_apr) + ceil($off_peak_import_after_netting_off_may) + ceil($off_peak_import_after_netting_off_jun) + ceil($off_peak_import_after_netting_off_jul) + ceil($off_peak_import_after_netting_off_aug) + ceil($off_peak_import_after_netting_off_sep) + ceil($off_peak_import_after_netting_off_oct) + ceil($off_peak_import_after_netting_off_nov) + ceil($off_peak_import_after_netting_off_dec);
        $off_peak_import_after_netting_off_1st_year_charges = $off_peak_import_after_netting_off_1st_year_usage * $off_peack_rate_with_gst;

        // Off-Peak Import after netting off

        // On-Peak Import

        
        $on_peak_import_jan = $on_peak_use_jan;
        $on_peak_import_feb = $on_peak_use_feb;
        $on_peak_import_mar = $on_peak_use_mar;
        $on_peak_import_apr = $on_peak_use_apr;
        $on_peak_import_may = $on_peak_use_may;
        $on_peak_import_jun = $on_peak_use_jun;
        $on_peak_import_jul = $on_peak_use_jul;
        $on_peak_import_aug = $on_peak_use_aug;
        $on_peak_import_sep = $on_peak_use_sep;
        $on_peak_import_oct = $on_peak_use_oct;
        $on_peak_import_nov = $on_peak_use_nov;
        $on_peak_import_dec = $on_peak_use_dec;

        $on_peak_import_1st_year_usage = $on_peak_import_jan + $on_peak_import_feb + $on_peak_import_mar + $on_peak_import_apr + $on_peak_import_may + $on_peak_import_jun + $on_peak_import_jul + $on_peak_import_aug + $on_peak_import_sep + $on_peak_import_oct + $on_peak_import_nov + $on_peak_import_dec;
        $on_peak_imports_1st_year_charges = $on_peak_import_1st_year_usage * $on_peack_rate_with_gst;
        // On-Peak Import

        // Credits from (+)/Payment to (-) Utlity
        $credits_from_payment_utlity = ($net_metered_off_peak_1st_year_charges + $excess_export_1st_year_charges) - ($off_peak_imports_1st_year_charges + $on_peak_imports_1st_year_charges);


        // echo round($net_metered_off_peak_1st_year_usage). '<br/>';
        // echo round($net_metered_off_peak_1st_year_charges). '<br/>';
        // echo round($excess_export_1st_year_charges). '<br/>';
        // echo round($on_peak_imports_1st_year_charges). '<br/>';
        // echo round($credits_from_payment_utlity). '<br/>';


        // Gird Only (No Solar)

        $no_solar_off_peak_first_year_usage = $daytime_use_jan + $daytime_use_feb + $daytime_use_mar + $daytime_use_apr + $daytime_use_may + $daytime_use_jun + $daytime_use_jul + $daytime_use_aug + $daytime_use_sep + $daytime_use_oct + $daytime_use_nov + $daytime_use_dec + $nighttime_use_jan + $nighttime_use_feb + $nighttime_use_mar + $nighttime_use_apr + $nighttime_use_may + $nighttime_use_jun + $nighttime_use_jul + $nighttime_use_aug + $nighttime_use_sep + $nighttime_use_oct + $nighttime_use_nov + $nighttime_use_dec;

        $no_solar_off_peak_first_year_charges = $no_solar_off_peak_first_year_usage  * (float)number_format($off_peack_rate_with_gst, 2, '.', '');
        //die($no_solar_off_peak_first_year_charges);

        $no_solar_on_peak_first_year_usage = $on_peak_use_jan + $on_peak_use_feb + $on_peak_use_mar + $on_peak_use_apr + $on_peak_use_may + $on_peak_use_jun + $on_peak_use_jul + $on_peak_use_aug + $on_peak_use_sep + $on_peak_use_oct + $on_peak_use_nov + $on_peak_use_dec;
        //die($no_solar_on_peak_first_year_usage-1);

        $no_solar_on_peak_first_year_charges = $no_solar_on_peak_first_year_usage * (float)number_format($on_peack_rate_with_gst, 2, '.', '');


        // Gird Only (No Solar)

        // Years
        $year1 = '1'; $year2 = '2'; $year3 = '3'; $year4 = '4'; $year5 = '5'; $year6 = '6'; $year7 = '7'; $year8 = '8'; $year9 = '9'; $year10 = '10'; $year11 = '11'; $year12 = '12'; $year13 = '13'; $year14 = '14'; $year15 = '15'; $year16 = '16'; $year17 = '17'; $year18 = '18'; $year19 = '19'; $year20 = '20'; $year21 = '21'; $year22 = '22'; $year23 = '23'; $year24 = '24'; $year25 = '25';

        // 1st Year Savings
        $no_solar_first_year_savings = ceil($no_solar_off_peak_first_year_charges) + ceil($no_solar_on_peak_first_year_charges);

        $solar_first_year_savings = $credits_from_payment_utlity + $no_solar_first_year_savings;


        //Electricity Charges without Solar
        $electricity_charges_without_solar_one = $no_solar_first_year_savings;

        $electricity_charges_without_solar_two = $electricity_charges_without_solar_one * pow(1.12,($year2-1));
        $electricity_charges_without_solar_three = $electricity_charges_without_solar_one * pow(1.12,($year3-1));
        $electricity_charges_without_solar_four = $electricity_charges_without_solar_one * pow(1.12,($year4-1));
        $electricity_charges_without_solar_five = $electricity_charges_without_solar_one * pow(1.12,($year5-1));
        $electricity_charges_without_solar_six = $electricity_charges_without_solar_one * pow(1.12,($year6-1));
        $electricity_charges_without_solar_seven = $electricity_charges_without_solar_one * pow(1.12,($year7-1));
        $electricity_charges_without_solar_eight = $electricity_charges_without_solar_one * pow(1.12,($year8-1));
        $electricity_charges_without_solar_nine = $electricity_charges_without_solar_one * pow(1.12,($year9-1));
        $electricity_charges_without_solar_ten = $electricity_charges_without_solar_one * pow(1.12,($year10-1));
        $electricity_charges_without_solar_eleven = $electricity_charges_without_solar_one * pow(1.12,($year11-1));
        $electricity_charges_without_solar_twelve = $electricity_charges_without_solar_one * pow(1.12,($year12-1));
        $electricity_charges_without_solar_thirteen = $electricity_charges_without_solar_one * pow(1.12,($year13-1));
        $electricity_charges_without_solar_fourteen = $electricity_charges_without_solar_one * pow(1.12,($year14-1));
        $electricity_charges_without_solar_fifteen = $electricity_charges_without_solar_one * pow(1.12,($year15-1));
        $electricity_charges_without_solar_sixteen = $electricity_charges_without_solar_one * pow(1.12,($year16-1));
        $electricity_charges_without_solar_seventeen = $electricity_charges_without_solar_one * pow(1.12,($year17-1));
        $electricity_charges_without_solar_eighteen = $electricity_charges_without_solar_one * pow(1.12,($year18-1));
        $electricity_charges_without_solar_nineteen = $electricity_charges_without_solar_one * pow(1.12,($year19-1));
        $electricity_charges_without_solar_twenty = $electricity_charges_without_solar_one * pow(1.12,($year20-1));
        $electricity_charges_without_solar_twenty_one = $electricity_charges_without_solar_one * pow(1.12,($year21-1));
        $electricity_charges_without_solar_twenty_two = $electricity_charges_without_solar_one * pow(1.12,($year22-1));
        $electricity_charges_without_solar_twenty_three = $electricity_charges_without_solar_one * pow(1.12,($year23-1));
        $electricity_charges_without_solar_twenty_four = $electricity_charges_without_solar_one * pow(1.12,($year24-1));
        $electricity_charges_without_solar_twenty_five = $electricity_charges_without_solar_one * pow(1.12,($year25-1));



        $solar_generation_after_degration_one = $total_solar_generation *(1-2/100);
        $solar_generation_after_degration_two = $solar_generation_after_degration_one * pow(0.995,($year2-1));
        // $solar_generation_after_degration_two = $solar_generation_after_degration_one * (1*(1-0.5/100))^($year2-1);
        $solar_generation_after_degration_three = $solar_generation_after_degration_one * pow(0.995,($year3-1));
        $solar_generation_after_degration_four = $solar_generation_after_degration_one * pow(0.995,($year4-1));
        $solar_generation_after_degration_five = $solar_generation_after_degration_one * pow(0.995,($year5-1));
        $solar_generation_after_degration_six = $solar_generation_after_degration_one * pow(0.995,($year6-1));
        $solar_generation_after_degration_seven = $solar_generation_after_degration_one * pow(0.995,($year7-1));
        $solar_generation_after_degration_eight = $solar_generation_after_degration_one * pow(0.995,($year8-1));
        $solar_generation_after_degration_nine = $solar_generation_after_degration_one * pow(0.995,($year9-1));
        $solar_generation_after_degration_ten = $solar_generation_after_degration_one * pow(0.995,($year10-1));
        $solar_generation_after_degration_eleven = $solar_generation_after_degration_one * pow(0.995,($year11-1));
        $solar_generation_after_degration_twelve = $solar_generation_after_degration_one * pow(0.995,($year12-1));
        $solar_generation_after_degration_thirteen = $solar_generation_after_degration_one * pow(0.995,($year13-1));
        $solar_generation_after_degration_fourteen = $solar_generation_after_degration_one * pow(0.995,($year14-1));
        $solar_generation_after_degration_fifteen = $solar_generation_after_degration_one * pow(0.995,($year15-1));
        $solar_generation_after_degration_sixteen = $solar_generation_after_degration_one * pow(0.995,($year16-1));
        $solar_generation_after_degration_seventeen = $solar_generation_after_degration_one * pow(0.995,($year17-1));
        $solar_generation_after_degration_eighteen = $solar_generation_after_degration_one * pow(0.995,($year18-1));
        $solar_generation_after_degration_nineteen = $solar_generation_after_degration_one * pow(0.995,($year19-1));
        $solar_generation_after_degration_twenty = $solar_generation_after_degration_one * pow(0.995,($year20-1));
        $solar_generation_after_degration_twenty_one = $solar_generation_after_degration_one * pow(0.995,($year21-1));
        $solar_generation_after_degration_twenty_two = $solar_generation_after_degration_one * pow(0.995,($year22-1));
        $solar_generation_after_degration_twenty_three = $solar_generation_after_degration_one * pow(0.995,($year23-1));
        $solar_generation_after_degration_twenty_four = $solar_generation_after_degration_one * pow(0.995,($year24-1));
        $solar_generation_after_degration_twenty_five = $solar_generation_after_degration_one * pow(0.995,($year25-1));

        //die($solar_generation_after_degration_three);

        $export_per_year_kwh_one = $excess_export_1st_year_usage - ($total_solar_generation - $solar_generation_after_degration_one);

        $export_per_year_kwh_two = $export_per_year_kwh_one - ($solar_generation_after_degration_one - $solar_generation_after_degration_two);

        $export_per_year_kwh_three = $export_per_year_kwh_two - ($solar_generation_after_degration_two - $solar_generation_after_degration_three);

        $export_per_year_kwh_four = $export_per_year_kwh_three - ($solar_generation_after_degration_three - $solar_generation_after_degration_four);

        $export_per_year_kwh_five = $export_per_year_kwh_four - ($solar_generation_after_degration_four - $solar_generation_after_degration_five);

        $export_per_year_kwh_six = $export_per_year_kwh_five - ($solar_generation_after_degration_five - $solar_generation_after_degration_six);

        $export_per_year_kwh_seven = $export_per_year_kwh_six - ($solar_generation_after_degration_six - $solar_generation_after_degration_seven);

        $export_per_year_kwh_eight = $export_per_year_kwh_seven - ($solar_generation_after_degration_seven - $solar_generation_after_degration_eight);

        $export_per_year_kwh_nine = $export_per_year_kwh_eight - ($solar_generation_after_degration_eight - $solar_generation_after_degration_nine);

        $export_per_year_kwh_ten = $export_per_year_kwh_nine - ($solar_generation_after_degration_nine - $solar_generation_after_degration_ten);

        $export_per_year_kwh_eleven = $export_per_year_kwh_ten - ($solar_generation_after_degration_ten - $solar_generation_after_degration_eleven);

        $export_per_year_kwh_twelve = $export_per_year_kwh_eleven - ($solar_generation_after_degration_eleven - $solar_generation_after_degration_twelve);

        $export_per_year_kwh_thirteen = $export_per_year_kwh_twelve - ($solar_generation_after_degration_twelve - $solar_generation_after_degration_thirteen);

        $export_per_year_kwh_fourteen = $export_per_year_kwh_thirteen - ($solar_generation_after_degration_thirteen - $solar_generation_after_degration_fourteen);

        $export_per_year_kwh_fifteen = $export_per_year_kwh_fourteen - ($solar_generation_after_degration_fourteen - $solar_generation_after_degration_fifteen);

        $export_per_year_kwh_sixteen = $export_per_year_kwh_fifteen - ($solar_generation_after_degration_fifteen - $solar_generation_after_degration_sixteen);

        $export_per_year_kwh_seventeen = $export_per_year_kwh_sixteen - ($solar_generation_after_degration_sixteen - $solar_generation_after_degration_seventeen);

        $export_per_year_kwh_eighteen = $export_per_year_kwh_seventeen - ($solar_generation_after_degration_seventeen - $solar_generation_after_degration_eighteen);

        $export_per_year_kwh_nineteen = $export_per_year_kwh_eighteen - ($solar_generation_after_degration_eighteen - $solar_generation_after_degration_nineteen);

        $export_per_year_kwh_twenty = $export_per_year_kwh_nineteen - ($solar_generation_after_degration_nineteen - $solar_generation_after_degration_twenty);

        $export_per_year_kwh_twenty_one = $export_per_year_kwh_twenty - ($solar_generation_after_degration_twenty - $solar_generation_after_degration_twenty_one);

        $export_per_year_kwh_twenty_two = $export_per_year_kwh_twenty_one - ($solar_generation_after_degration_twenty_one - $solar_generation_after_degration_twenty_two);

        $export_per_year_kwh_twenty_three = $export_per_year_kwh_twenty_two - ($solar_generation_after_degration_twenty_two - $solar_generation_after_degration_twenty_three);

        $export_per_year_kwh_twenty_four = $export_per_year_kwh_twenty_three - ($solar_generation_after_degration_twenty_three - $solar_generation_after_degration_twenty_four);

        $export_per_year_kwh_twenty_five = $export_per_year_kwh_twenty_four - ($solar_generation_after_degration_twenty_four - $solar_generation_after_degration_twenty_five);


        // Income from Export (PKR)
        $income_from_exports_PKR_one =  ceil($export_per_year_kwh_one) * $export_rate;
        $income_from_exports_PKR_two =  ceil($export_per_year_kwh_two) * ($export_rate * pow(1.05,($year2-1)));
        $income_from_exports_PKR_three =  ceil($export_per_year_kwh_three) * ($export_rate * pow(1.05,($year3-1)));
        $income_from_exports_PKR_four =  ceil($export_per_year_kwh_four) * ($export_rate * pow(1.05,($year4-1)));
        $income_from_exports_PKR_five =  ceil($export_per_year_kwh_five) * ($export_rate * pow(1.05,($year5-1)));
        $income_from_exports_PKR_six =  ceil($export_per_year_kwh_six) * ($export_rate * pow(1.05,($year6-1)));
        $income_from_exports_PKR_seven =  ceil($export_per_year_kwh_seven) * ($export_rate * pow(1.05,($year7-1)));
        $income_from_exports_PKR_eight =  ceil($export_per_year_kwh_eight) * ($export_rate * pow(1.05,($year8-1)));
        $income_from_exports_PKR_nine =  ceil($export_per_year_kwh_nine) * ($export_rate * pow(1.05,($year9-1)));
        $income_from_exports_PKR_ten =  ceil($export_per_year_kwh_ten) * ($export_rate * pow(1.05,($year10-1)));
        $income_from_exports_PKR_eleven =  ceil($export_per_year_kwh_eleven) * ($export_rate * pow(1.05,($year11-1)));
        $income_from_exports_PKR_twelve =  ceil($export_per_year_kwh_twelve) * ($export_rate * pow(1.05,($year12-1)));
        $income_from_exports_PKR_thirteen =  ceil($export_per_year_kwh_thirteen) * ($export_rate * pow(1.05,($year13-1)));
        $income_from_exports_PKR_fourteen =  ceil($export_per_year_kwh_fourteen) * ($export_rate * pow(1.05,($year14-1)));
        $income_from_exports_PKR_fifteen =  ceil($export_per_year_kwh_fifteen) * ($export_rate * pow(1.05,($year15-1)));
        $income_from_exports_PKR_sixteen =  ceil($export_per_year_kwh_sixteen) * ($export_rate * pow(1.05,($year16-1)));
        $income_from_exports_PKR_seventeen =  ceil($export_per_year_kwh_seventeen) * ($export_rate * pow(1.05,($year17-1)));
        $income_from_exports_PKR_eighteen =  ceil($export_per_year_kwh_eighteen) * ($export_rate * pow(1.05,($year18-1)));
        $income_from_exports_PKR_nineteen =  ceil($export_per_year_kwh_nineteen) * ($export_rate * pow(1.05,($year19-1)));
        $income_from_exports_PKR_twenty =  ceil($export_per_year_kwh_twenty) * ($export_rate * pow(1.05,($year20-1)));
        $income_from_exports_PKR_twenty_one =  ceil($export_per_year_kwh_twenty_one) * ($export_rate * pow(1.05,($year21-1)));
        $income_from_exports_PKR_twenty_two =  ceil($export_per_year_kwh_twenty_two) * ($export_rate * pow(1.05,($year22-1)));
        $income_from_exports_PKR_twenty_three =  ceil($export_per_year_kwh_twenty_three) * ($export_rate * pow(1.05,($year23-1)));
        $income_from_exports_PKR_twenty_four =  ceil($export_per_year_kwh_twenty_four) * ($export_rate * pow(1.05,($year24-1)));
        $income_from_exports_PKR_twenty_five =  ceil($export_per_year_kwh_twenty_five) * ($export_rate * pow(1.05,($year25-1)));

        //ceil($export_per_year_kwh_two) * $export_rate * pow(1.005,($year2-1));
        //die($income_from_exports_PKR_two);

        //die($income_from_exports_PKR_three);

        // Net meter benefits (PKR)

        $net_metered_benefits_one = $net_metered_off_peak_1st_year_charges;
        $net_metered_benefits_two = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year2-1));
        $net_metered_benefits_three = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year3-1));
        $net_metered_benefits_four = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year4-1));
        $net_metered_benefits_five = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year5-1));
        $net_metered_benefits_six = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year6-1));
        $net_metered_benefits_seven = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year7-1));
        $net_metered_benefits_eight = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year8-1));
        $net_metered_benefits_nine = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year9-1));
        $net_metered_benefits_ten = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year10-1));
        $net_metered_benefits_eleven = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year11-1));
        $net_metered_benefits_twelve = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year12-1));
        $net_metered_benefits_thirteen = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year13-1));
        $net_metered_benefits_fourteen = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year14-1));
        $net_metered_benefits_fifteen = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year15-1));
        $net_metered_benefits_sixteen = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year16-1));
        $net_metered_benefits_seventeen = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year17-1));
        $net_metered_benefits_eighteen = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year18-1));
        $net_metered_benefits_nineteen = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year19-1));
        $net_metered_benefits_twenty = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year20-1));
        $net_metered_benefits_twenty_one = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year21-1));
        $net_metered_benefits_twenty_two = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year22-1));
        $net_metered_benefits_twenty_three = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year23-1));
        $net_metered_benefits_twenty_four = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year24-1));
        $net_metered_benefits_twenty_five = ceil($net_metered_off_peak_1st_year_charges) * pow(1.12,($year25-1));
        //die($net_metered_benefits_two);
        //die($net_metered_benefits_twenty_four);

        // Off-Peak Imports + Tax(PKR)

        $off_peak_imports_plus_tax_PKR_one = $off_peak_imports_1st_year_charges;
        $off_peak_imports_plus_tax_PKR_two = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year2-1));
        $off_peak_imports_plus_tax_PKR_three = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year3-1));
        $off_peak_imports_plus_tax_PKR_four = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year4-1));
        $off_peak_imports_plus_tax_PKR_five = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year5-1));
        $off_peak_imports_plus_tax_PKR_six = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year6-1));
        $off_peak_imports_plus_tax_PKR_seven = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year7-1));
        $off_peak_imports_plus_tax_PKR_eight = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year8-1));
        $off_peak_imports_plus_tax_PKR_nine = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year9-1));
        $off_peak_imports_plus_tax_PKR_ten = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year10-1));
        $off_peak_imports_plus_tax_PKR_eleven = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year11-1));
        $off_peak_imports_plus_tax_PKR_twelve = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year12-1));
        $off_peak_imports_plus_tax_PKR_thirteen = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year13-1));
        $off_peak_imports_plus_tax_PKR_fourteen = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year14-1));
        $off_peak_imports_plus_tax_PKR_fifteen = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year15-1));
        $off_peak_imports_plus_tax_PKR_sixteen = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year16-1));
        $off_peak_imports_plus_tax_PKR_seventeen = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year17-1));
        $off_peak_imports_plus_tax_PKR_eighteen = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year18-1));
        $off_peak_imports_plus_tax_PKR_nineteen = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year19-1));
        $off_peak_imports_plus_tax_PKR_twenty = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year20-1));
        $off_peak_imports_plus_tax_PKR_twenty_one = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year21-1));
        $off_peak_imports_plus_tax_PKR_twenty_two = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year22-1));
        $off_peak_imports_plus_tax_PKR_twenty_three = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year23-1));
        $off_peak_imports_plus_tax_PKR_twenty_four = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year24-1));
        $off_peak_imports_plus_tax_PKR_twenty_five = ceil($off_peak_imports_1st_year_charges) * pow(1.12,($year25-1));
        //die($off_peak_imports_plus_tax_PKR_two);

        // On-Peak Imports + Tax(PKR)

        $on_peak_imports_plus_tax_PKR_one = $on_peak_imports_1st_year_charges;
        $on_peak_imports_plus_tax_PKR_two = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year2-1));
        $on_peak_imports_plus_tax_PKR_three = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year3-1));
        $on_peak_imports_plus_tax_PKR_four = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year4-1));
        $on_peak_imports_plus_tax_PKR_five = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year5-1));
        $on_peak_imports_plus_tax_PKR_six = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year6-1));
        $on_peak_imports_plus_tax_PKR_seven = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year7-1));
        $on_peak_imports_plus_tax_PKR_eight = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year8-1));
        $on_peak_imports_plus_tax_PKR_nine = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year9-1));
        $on_peak_imports_plus_tax_PKR_ten = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year10-1));
        $on_peak_imports_plus_tax_PKR_eleven = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year11-1));
        $on_peak_imports_plus_tax_PKR_twelve = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year12-1));
        $on_peak_imports_plus_tax_PKR_thirteen = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year13-1));
        $on_peak_imports_plus_tax_PKR_fourteen = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year14-1));
        $on_peak_imports_plus_tax_PKR_fifteen = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year15-1));
        $on_peak_imports_plus_tax_PKR_sixteen = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year16-1));
        $on_peak_imports_plus_tax_PKR_seventeen = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year17-1));
        $on_peak_imports_plus_tax_PKR_eighteen = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year18-1));
        $on_peak_imports_plus_tax_PKR_nineteen = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year19-1));
        $on_peak_imports_plus_tax_PKR_twenty = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year20-1));
        $on_peak_imports_plus_tax_PKR_twenty_one = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year21-1));
        $on_peak_imports_plus_tax_PKR_twenty_two = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year22-1));
        $on_peak_imports_plus_tax_PKR_twenty_three = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year23-1));
        $on_peak_imports_plus_tax_PKR_twenty_four = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year24-1));
        $on_peak_imports_plus_tax_PKR_twenty_five = ceil($on_peak_imports_1st_year_charges) * pow(1.12,($year25-1));
        //die($on_peak_imports_plus_tax_PKR_twenty_five);

        //Annual Credit (+) or Payment (-)
        $annual_credit_plus_or_payment_minus_one = ($income_from_exports_PKR_one+$net_metered_benefits_one) - ($off_peak_imports_plus_tax_PKR_one+$on_peak_imports_plus_tax_PKR_one); 
        $annual_credit_plus_or_payment_minus_two = ($income_from_exports_PKR_two+$net_metered_benefits_two) - ($off_peak_imports_plus_tax_PKR_two+$on_peak_imports_plus_tax_PKR_two); 
        $annual_credit_plus_or_payment_minus_three = ($income_from_exports_PKR_three+$net_metered_benefits_three) - ($off_peak_imports_plus_tax_PKR_three+$on_peak_imports_plus_tax_PKR_three); 
        $annual_credit_plus_or_payment_minus_four = ($income_from_exports_PKR_four+$net_metered_benefits_four) - ($off_peak_imports_plus_tax_PKR_four+$on_peak_imports_plus_tax_PKR_four); 
        $annual_credit_plus_or_payment_minus_five = ($income_from_exports_PKR_five+$net_metered_benefits_five) - ($off_peak_imports_plus_tax_PKR_five+$on_peak_imports_plus_tax_PKR_five); 
        $annual_credit_plus_or_payment_minus_six = ($income_from_exports_PKR_six+$net_metered_benefits_six) - ($off_peak_imports_plus_tax_PKR_six+$on_peak_imports_plus_tax_PKR_six); 
        $annual_credit_plus_or_payment_minus_seven = ($income_from_exports_PKR_seven+$net_metered_benefits_seven) - ($off_peak_imports_plus_tax_PKR_seven+$on_peak_imports_plus_tax_PKR_seven); 
        $annual_credit_plus_or_payment_minus_eight = ($income_from_exports_PKR_eight+$net_metered_benefits_eight) - ($off_peak_imports_plus_tax_PKR_eight+$on_peak_imports_plus_tax_PKR_eight); 
        $annual_credit_plus_or_payment_minus_nine = ($income_from_exports_PKR_nine+$net_metered_benefits_nine) - ($off_peak_imports_plus_tax_PKR_nine+$on_peak_imports_plus_tax_PKR_nine); 
        $annual_credit_plus_or_payment_minus_ten = ($income_from_exports_PKR_ten+$net_metered_benefits_ten) - ($off_peak_imports_plus_tax_PKR_ten+$on_peak_imports_plus_tax_PKR_ten);
        $annual_credit_plus_or_payment_minus_eleven = ($income_from_exports_PKR_eleven+$net_metered_benefits_eleven) - ($off_peak_imports_plus_tax_PKR_eleven+$on_peak_imports_plus_tax_PKR_eleven); 
        $annual_credit_plus_or_payment_minus_twelve = ($income_from_exports_PKR_twelve+$net_metered_benefits_twelve) - ($off_peak_imports_plus_tax_PKR_twelve+$on_peak_imports_plus_tax_PKR_twelve);  
        $annual_credit_plus_or_payment_minus_thirteen = ($income_from_exports_PKR_thirteen+$net_metered_benefits_thirteen) - ($off_peak_imports_plus_tax_PKR_thirteen+$on_peak_imports_plus_tax_PKR_thirteen); 
        $annual_credit_plus_or_payment_minus_fourteen = ($income_from_exports_PKR_fourteen+$net_metered_benefits_fourteen) - ($off_peak_imports_plus_tax_PKR_fourteen+$on_peak_imports_plus_tax_PKR_fourteen); 
        $annual_credit_plus_or_payment_minus_fifteen = ($income_from_exports_PKR_fifteen+$net_metered_benefits_fifteen) - ($off_peak_imports_plus_tax_PKR_fifteen+$on_peak_imports_plus_tax_PKR_fifteen); 
        $annual_credit_plus_or_payment_minus_sixteen = ($income_from_exports_PKR_sixteen+$net_metered_benefits_sixteen) - ($off_peak_imports_plus_tax_PKR_sixteen+$on_peak_imports_plus_tax_PKR_sixteen); 
        $annual_credit_plus_or_payment_minus_seventeen = ($income_from_exports_PKR_seventeen+$net_metered_benefits_seventeen) - ($off_peak_imports_plus_tax_PKR_seventeen+$on_peak_imports_plus_tax_PKR_seventeen); 
        $annual_credit_plus_or_payment_minus_eighteen = ($income_from_exports_PKR_eighteen+$net_metered_benefits_eighteen) - ($off_peak_imports_plus_tax_PKR_eighteen+$on_peak_imports_plus_tax_PKR_eighteen); 
        $annual_credit_plus_or_payment_minus_nineteen = ($income_from_exports_PKR_nineteen+$net_metered_benefits_nineteen) - ($off_peak_imports_plus_tax_PKR_nineteen+$on_peak_imports_plus_tax_PKR_nineteen); 
        $annual_credit_plus_or_payment_minus_twenty = ($income_from_exports_PKR_twenty+$net_metered_benefits_twenty) - ($off_peak_imports_plus_tax_PKR_twenty+$on_peak_imports_plus_tax_PKR_twenty);


        $annual_credit_plus_or_payment_minus_twenty_one = ($income_from_exports_PKR_twenty_one+$net_metered_benefits_twenty_one) - ($off_peak_imports_plus_tax_PKR_twenty_one+$on_peak_imports_plus_tax_PKR_twenty_one);


        $annual_credit_plus_or_payment_minus_twenty_two = ($income_from_exports_PKR_twenty_two+$net_metered_benefits_twenty_two) - ($off_peak_imports_plus_tax_PKR_twenty_two+$on_peak_imports_plus_tax_PKR_twenty_two);


        $annual_credit_plus_or_payment_minus_twenty_three = ($income_from_exports_PKR_twenty_three+$net_metered_benefits_twenty_three) - ($off_peak_imports_plus_tax_PKR_twenty_three+$on_peak_imports_plus_tax_PKR_twenty_three);


        $annual_credit_plus_or_payment_minus_twenty_four = ($income_from_exports_PKR_twenty_four+$net_metered_benefits_twenty_four) - ($off_peak_imports_plus_tax_PKR_twenty_four+$on_peak_imports_plus_tax_PKR_twenty_four);


        $annual_credit_plus_or_payment_minus_twenty_five = ($income_from_exports_PKR_twenty_five+$net_metered_benefits_twenty_five) - ($off_peak_imports_plus_tax_PKR_twenty_five+$on_peak_imports_plus_tax_PKR_twenty_five);



        // Zero Energy Charge
        $zero_energy_charge_one = 0;
        if($annual_credit_plus_or_payment_minus_one > 1){
            $zero_energy_charge_one = 1;
        }
        $zero_energy_charge_two = 0;
        if($annual_credit_plus_or_payment_minus_two > 1){
            $zero_energy_charge_two = 1;
        }
        $zero_energy_charge_three = 0;
        if($annual_credit_plus_or_payment_minus_three > 1){
            $zero_energy_charge_three = 1;
        }
        $zero_energy_charge_four = 0;
        if($annual_credit_plus_or_payment_minus_four > 1){
            $zero_energy_charge_four = 1;
        }

        $zero_energy_charge_five = 0;
        if($annual_credit_plus_or_payment_minus_five > 1){
            $zero_energy_charge_five = 1;
        }

        $zero_energy_charge_six = 0;
        if($annual_credit_plus_or_payment_minus_six > 1){
            $zero_energy_charge_six = 1;
        }

        $zero_energy_charge_seven = 0;
        if($annual_credit_plus_or_payment_minus_seven > 1){
            $zero_energy_charge_seven = 1;
        }

        $zero_energy_charge_eight = 0;
        if($annual_credit_plus_or_payment_minus_eight > 1){
            $zero_energy_charge_eight = 1;
        }

        $zero_energy_charge_nine = 0;
        if($annual_credit_plus_or_payment_minus_nine > 1){
            $zero_energy_charge_nine = 1;
        }

        $zero_energy_charge_ten = 0;
        if($annual_credit_plus_or_payment_minus_ten > 1){
            $zero_energy_charge_ten = 1;
        }

        $zero_energy_charge_eleven = 0;
        if($annual_credit_plus_or_payment_minus_eleven > 1){
            $zero_energy_charge_eleven = 1;
        }

        $zero_energy_charge_twelve = 0;
        if($annual_credit_plus_or_payment_minus_twelve > 1){
            $zero_energy_charge_twelve = 1;
        }

        $zero_energy_charge_thirteen = 0;
        if($annual_credit_plus_or_payment_minus_thirteen > 1){
            $zero_energy_charge_thirteen = 1;
        }

        $zero_energy_charge_fourteen = 0;
        if($annual_credit_plus_or_payment_minus_fourteen > 1){
            $zero_energy_charge_fourteen = 1;
        }
        
        $zero_energy_charge_fifteen = 0;
        if($annual_credit_plus_or_payment_minus_fifteen > 1){
            $zero_energy_charge_fifteen = 1;
        }

        $zero_energy_charge_sixteen = 0;
        if($annual_credit_plus_or_payment_minus_sixteen > 1){
            $zero_energy_charge_sixteen = 1;
        }

        $zero_energy_charge_seventeen = 0;
        if($annual_credit_plus_or_payment_minus_seventeen > 1){
            $zero_energy_charge_seventeen = 1;
        }

        $zero_energy_charge_eighteen = 0;
        if($annual_credit_plus_or_payment_minus_eighteen > 1){
            $zero_energy_charge_eighteen = 1;
        }

        $zero_energy_charge_nineteen = 0;
        if($annual_credit_plus_or_payment_minus_nineteen > 1){
            $zero_energy_charge_nineteen = 1;
        }

        $zero_energy_charge_twenty = 0;
        if($annual_credit_plus_or_payment_minus_twenty > 1){
            $zero_energy_charge_twenty = 1;
        }

        $zero_energy_charge_twenty_one = 0;
        if($annual_credit_plus_or_payment_minus_twenty_one > 1){
            $zero_energy_charge_twenty_one = 1;
        }

        $zero_energy_charge_twenty_two = 0;
        if($annual_credit_plus_or_payment_minus_twenty_two > 1){
            $zero_energy_charge_twenty_two = 1;
        }

        $zero_energy_charge_twenty_three = 0;
        if($annual_credit_plus_or_payment_minus_twenty_three > 1){
            $zero_energy_charge_twenty_three = 1;
        }

        $zero_energy_charge_twenty_four = 0;
        if($annual_credit_plus_or_payment_minus_twenty_four > 1){
            $zero_energy_charge_twenty_four = 1;
        }

        $zero_energy_charge_twenty_five = 0;
        if($annual_credit_plus_or_payment_minus_twenty_five > 1){
            $zero_energy_charge_twenty_five = 1;
        }

        // Total Savings in Electricity Charges

        $initial_investment_cum_savings_usage = $solor_system_cost;
        $total_savings_in_electricity_charges_usage = - 1* $initial_investment_cum_savings_usage;
        $total_savings_in_electricity_charges_one = $electricity_charges_without_solar_one + $annual_credit_plus_or_payment_minus_one;

        $total_savings_in_electricity_charges_two = $electricity_charges_without_solar_two + $annual_credit_plus_or_payment_minus_two;

        $total_savings_in_electricity_charges_three = $electricity_charges_without_solar_three + $annual_credit_plus_or_payment_minus_three;

        $total_savings_in_electricity_charges_four = $electricity_charges_without_solar_four + $annual_credit_plus_or_payment_minus_four;

        $total_savings_in_electricity_charges_five = $electricity_charges_without_solar_five + $annual_credit_plus_or_payment_minus_five;

        $total_savings_in_electricity_charges_six = $electricity_charges_without_solar_six + $annual_credit_plus_or_payment_minus_six;

        $total_savings_in_electricity_charges_seven = $electricity_charges_without_solar_seven + $annual_credit_plus_or_payment_minus_seven;

        $total_savings_in_electricity_charges_eight = $electricity_charges_without_solar_eight + $annual_credit_plus_or_payment_minus_eight;

        $total_savings_in_electricity_charges_nine = $electricity_charges_without_solar_nine + $annual_credit_plus_or_payment_minus_nine;

        $total_savings_in_electricity_charges_ten = $electricity_charges_without_solar_ten + $annual_credit_plus_or_payment_minus_ten;

        $total_savings_in_electricity_charges_eleven = $electricity_charges_without_solar_eleven + $annual_credit_plus_or_payment_minus_eleven;

        $total_savings_in_electricity_charges_twelve = $electricity_charges_without_solar_twelve + $annual_credit_plus_or_payment_minus_twelve;


        $total_savings_in_electricity_charges_thirteen = $electricity_charges_without_solar_thirteen + $annual_credit_plus_or_payment_minus_thirteen;

        $total_savings_in_electricity_charges_fourteen = $electricity_charges_without_solar_fourteen + $annual_credit_plus_or_payment_minus_fourteen;

        $total_savings_in_electricity_charges_fifteen = $electricity_charges_without_solar_fifteen + $annual_credit_plus_or_payment_minus_fifteen;

        $total_savings_in_electricity_charges_sixteen = $electricity_charges_without_solar_sixteen + $annual_credit_plus_or_payment_minus_sixteen;

        $total_savings_in_electricity_charges_seventeen = $electricity_charges_without_solar_seventeen + $annual_credit_plus_or_payment_minus_seventeen;

        $total_savings_in_electricity_charges_eighteen = $electricity_charges_without_solar_eighteen + $annual_credit_plus_or_payment_minus_eighteen;

        $total_savings_in_electricity_charges_nineteen = $electricity_charges_without_solar_nineteen + $annual_credit_plus_or_payment_minus_nineteen;

        $total_savings_in_electricity_charges_twenty = $electricity_charges_without_solar_twenty + $annual_credit_plus_or_payment_minus_twenty;

        $total_savings_in_electricity_charges_twenty_one = $electricity_charges_without_solar_twenty_one + $annual_credit_plus_or_payment_minus_twenty_one;

        $total_savings_in_electricity_charges_twenty_two = $electricity_charges_without_solar_twenty_two + $annual_credit_plus_or_payment_minus_twenty_two;

        $total_savings_in_electricity_charges_twenty_three = $electricity_charges_without_solar_twenty_three + $annual_credit_plus_or_payment_minus_twenty_three;

        $total_savings_in_electricity_charges_twenty_four = $electricity_charges_without_solar_twenty_four + $annual_credit_plus_or_payment_minus_twenty_four;

        $total_savings_in_electricity_charges_twenty_five = $electricity_charges_without_solar_twenty_five + $annual_credit_plus_or_payment_minus_twenty_five;

        // Initial Investment/Cum Savings

        $initial_investment_cum_savings_one = $total_savings_in_electricity_charges_one;
        $initial_investment_cum_savings_two = $initial_investment_cum_savings_one + $total_savings_in_electricity_charges_two;
        $initial_investment_cum_savings_three = $initial_investment_cum_savings_two + $total_savings_in_electricity_charges_three;

        $initial_investment_cum_savings_four = $initial_investment_cum_savings_three + $total_savings_in_electricity_charges_four;

        $initial_investment_cum_savings_five = $initial_investment_cum_savings_four + $total_savings_in_electricity_charges_five;

        $initial_investment_cum_savings_six = $initial_investment_cum_savings_five + $total_savings_in_electricity_charges_six;

        $initial_investment_cum_savings_seven = $initial_investment_cum_savings_six + $total_savings_in_electricity_charges_seven;

        $initial_investment_cum_savings_eight = $initial_investment_cum_savings_seven + $total_savings_in_electricity_charges_eight;

        $initial_investment_cum_savings_nine = $initial_investment_cum_savings_eight + $total_savings_in_electricity_charges_nine;

        $initial_investment_cum_savings_ten = $initial_investment_cum_savings_nine + $total_savings_in_electricity_charges_ten;

        $initial_investment_cum_savings_eleven = $initial_investment_cum_savings_ten + $total_savings_in_electricity_charges_eleven;

        $initial_investment_cum_savings_twelve = $initial_investment_cum_savings_eleven + $total_savings_in_electricity_charges_twelve;


        $initial_investment_cum_savings_thirteen = $initial_investment_cum_savings_twelve + $total_savings_in_electricity_charges_thirteen;

        $initial_investment_cum_savings_fourteen = $initial_investment_cum_savings_thirteen + $total_savings_in_electricity_charges_fourteen;

        $initial_investment_cum_savings_fifteen = $initial_investment_cum_savings_fourteen + $total_savings_in_electricity_charges_fifteen;

        $initial_investment_cum_savings_sixteen = $initial_investment_cum_savings_fifteen + $total_savings_in_electricity_charges_sixteen;

        $initial_investment_cum_savings_seventeen = $initial_investment_cum_savings_sixteen + $total_savings_in_electricity_charges_seventeen;

        $initial_investment_cum_savings_eighteen = $initial_investment_cum_savings_seventeen + $total_savings_in_electricity_charges_eighteen;

        $initial_investment_cum_savings_nineteen = $initial_investment_cum_savings_eighteen + $total_savings_in_electricity_charges_nineteen;

        $initial_investment_cum_savings_twenty = $initial_investment_cum_savings_nineteen + $total_savings_in_electricity_charges_twenty;

        $initial_investment_cum_savings_twenty_one = $initial_investment_cum_savings_twenty + $total_savings_in_electricity_charges_twenty_one;

        $initial_investment_cum_savings_twenty_two = $initial_investment_cum_savings_twenty_one + $total_savings_in_electricity_charges_twenty_two;

        $initial_investment_cum_savings_twenty_three = $initial_investment_cum_savings_twenty_two + $total_savings_in_electricity_charges_twenty_three;
        

        $initial_investment_cum_savings_twenty_four = $initial_investment_cum_savings_twenty_three + $total_savings_in_electricity_charges_twenty_four;
        
        $initial_investment_cum_savings_twenty_five = $initial_investment_cum_savings_twenty_four + $total_savings_in_electricity_charges_twenty_five;
        

        // Cumulative Payback cash flow (PKR)

        $cumulative_payback_cash_flow_PKR_usage = - 1* $initial_investment_cum_savings_usage;
        $cumulative_payback_cash_flow_PKR_one = $cumulative_payback_cash_flow_PKR_usage + $total_savings_in_electricity_charges_one;
        $cumulative_payback_cash_flow_PKR_two = $cumulative_payback_cash_flow_PKR_one + $total_savings_in_electricity_charges_two;
        $cumulative_payback_cash_flow_PKR_three = $cumulative_payback_cash_flow_PKR_two + $total_savings_in_electricity_charges_three;
        $cumulative_payback_cash_flow_PKR_four = $cumulative_payback_cash_flow_PKR_three + $total_savings_in_electricity_charges_four;
        $cumulative_payback_cash_flow_PKR_five = $cumulative_payback_cash_flow_PKR_four + $total_savings_in_electricity_charges_five;
        $cumulative_payback_cash_flow_PKR_six = $cumulative_payback_cash_flow_PKR_five + $total_savings_in_electricity_charges_six;
        $cumulative_payback_cash_flow_PKR_seven = $cumulative_payback_cash_flow_PKR_six + $total_savings_in_electricity_charges_seven;
        $cumulative_payback_cash_flow_PKR_eight = $cumulative_payback_cash_flow_PKR_seven + $total_savings_in_electricity_charges_eight;
        $cumulative_payback_cash_flow_PKR_nine = $cumulative_payback_cash_flow_PKR_eight + $total_savings_in_electricity_charges_nine;
        $cumulative_payback_cash_flow_PKR_ten = $cumulative_payback_cash_flow_PKR_nine + $total_savings_in_electricity_charges_ten;
        $cumulative_payback_cash_flow_PKR_eleven = $cumulative_payback_cash_flow_PKR_ten + $total_savings_in_electricity_charges_eleven;
        $cumulative_payback_cash_flow_PKR_twelve = $cumulative_payback_cash_flow_PKR_eleven + $total_savings_in_electricity_charges_twelve;
        $cumulative_payback_cash_flow_PKR_thirteen = $cumulative_payback_cash_flow_PKR_twelve + $total_savings_in_electricity_charges_thirteen;
        $cumulative_payback_cash_flow_PKR_fourteen = $cumulative_payback_cash_flow_PKR_thirteen + $total_savings_in_electricity_charges_fourteen;
        $cumulative_payback_cash_flow_PKR_fifteen = $cumulative_payback_cash_flow_PKR_fourteen + $total_savings_in_electricity_charges_fifteen;
        $cumulative_payback_cash_flow_PKR_sixteen = $cumulative_payback_cash_flow_PKR_fifteen + $total_savings_in_electricity_charges_sixteen;
        $cumulative_payback_cash_flow_PKR_seventeen = $cumulative_payback_cash_flow_PKR_sixteen + $total_savings_in_electricity_charges_seventeen;
        $cumulative_payback_cash_flow_PKR_eighteen = $cumulative_payback_cash_flow_PKR_seventeen + $total_savings_in_electricity_charges_eighteen;
        $cumulative_payback_cash_flow_PKR_nineteen = $cumulative_payback_cash_flow_PKR_eighteen + $total_savings_in_electricity_charges_nineteen;
        $cumulative_payback_cash_flow_PKR_twenty = $cumulative_payback_cash_flow_PKR_nineteen + $total_savings_in_electricity_charges_twenty;
        $cumulative_payback_cash_flow_PKR_twenty_one = $cumulative_payback_cash_flow_PKR_twenty + $total_savings_in_electricity_charges_twenty_one;
        $cumulative_payback_cash_flow_PKR_twenty_two = $cumulative_payback_cash_flow_PKR_twenty_one + $total_savings_in_electricity_charges_twenty_two;
        $cumulative_payback_cash_flow_PKR_twenty_three = $cumulative_payback_cash_flow_PKR_twenty_two + $total_savings_in_electricity_charges_twenty_three;
        $cumulative_payback_cash_flow_PKR_twenty_four = $cumulative_payback_cash_flow_PKR_twenty_three + $total_savings_in_electricity_charges_twenty_four;
        $cumulative_payback_cash_flow_PKR_twenty_five = $cumulative_payback_cash_flow_PKR_twenty_four + $total_savings_in_electricity_charges_twenty_five;

        //die($cumulative_payback_cash_flow_PKR_one);

        // Simple Payback Period
        // =IF(C74<=0,1,IF(B74>0,0,IF(-B74/C72>0,-B74/C72,0)))


        // Simple Payback Period One
        if ($cumulative_payback_cash_flow_PKR_one <= 0) {
            $simple_payback_period_one = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_usage > 0){
            $simple_payback_period_one = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_usage/$total_savings_in_electricity_charges_one) > 0){
            $simple_payback_period_one = (-$cumulative_payback_cash_flow_PKR_usage/$total_savings_in_electricity_charges_one);
        }
        else{
            $simple_payback_period_one = 0;
        }

        // Simple Payback Period two
        if ($cumulative_payback_cash_flow_PKR_two <= 0) {
            $simple_payback_period_two = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_one > 0){
            $simple_payback_period_two = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_one/$total_savings_in_electricity_charges_two) > 0){
            $simple_payback_period_two = (-$cumulative_payback_cash_flow_PKR_one/$total_savings_in_electricity_charges_two);
        }
        else{
            $simple_payback_period_two = 0;
        }


        // Simple Payback Period three
        if ($cumulative_payback_cash_flow_PKR_three <= 0) {
            $simple_payback_period_three = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_two > 0){
            $simple_payback_period_three = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_two/$total_savings_in_electricity_charges_three) > 0){
            $simple_payback_period_three = (-$cumulative_payback_cash_flow_PKR_two/$total_savings_in_electricity_charges_three);
        }
        else{
            $simple_payback_period_three = 0;
        }


        // Simple Payback Period four
        if ($cumulative_payback_cash_flow_PKR_four <= 0) {
            $simple_payback_period_four = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_three > 0){
            $simple_payback_period_four = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_three/$total_savings_in_electricity_charges_four) > 0){
            $simple_payback_period_four = (-$cumulative_payback_cash_flow_PKR_three/$total_savings_in_electricity_charges_four);
        }
        else{
            $simple_payback_period_four = 0;
        }


        // Simple Payback Period five
        if ($cumulative_payback_cash_flow_PKR_five <= 0) {
            $simple_payback_period_five = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_four > 0){
            $simple_payback_period_five = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_four/$total_savings_in_electricity_charges_five) > 0){
            $simple_payback_period_five = (-$cumulative_payback_cash_flow_PKR_four/$total_savings_in_electricity_charges_five);
        }
        else{
            $simple_payback_period_five = 0;
        }


        // Simple Payback Period six
        if ($cumulative_payback_cash_flow_PKR_six <= 0) {
            $simple_payback_period_six = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_five > 0){
            $simple_payback_period_six = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_five/$total_savings_in_electricity_charges_six) > 0){
            $simple_payback_period_six = (-$cumulative_payback_cash_flow_PKR_five/$total_savings_in_electricity_charges_six);
        }
        else{
            $simple_payback_period_six = 0;
        }

        // Simple Payback Period seven
        if ($cumulative_payback_cash_flow_PKR_seven <= 0) {
            $simple_payback_period_seven = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_six > 0){
            $simple_payback_period_seven = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_six/$total_savings_in_electricity_charges_seven) > 0){
            $simple_payback_period_seven = (-$cumulative_payback_cash_flow_PKR_six/$total_savings_in_electricity_charges_seven);
        }
        else{
            $simple_payback_period_seven = 0;
        }


        // Simple Payback Period eight
        if ($cumulative_payback_cash_flow_PKR_eight <= 0) {
            $simple_payback_period_eight = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_seven > 0){
            $simple_payback_period_eight = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_seven/$total_savings_in_electricity_charges_eight) > 0){
            $simple_payback_period_eight = (-$cumulative_payback_cash_flow_PKR_seven/$total_savings_in_electricity_charges_eight);
        }
        else{
            $simple_payback_period_eight = 0;
        }

        // Simple Payback Period nine
        if ($cumulative_payback_cash_flow_PKR_nine <= 0) {
            $simple_payback_period_nine = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_eight > 0){
            $simple_payback_period_nine = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_eight/$total_savings_in_electricity_charges_nine) > 0){
            $simple_payback_period_nine = (-$cumulative_payback_cash_flow_PKR_eight/$total_savings_in_electricity_charges_nine);
        }
        else{
            $simple_payback_period_nine = 0;
        }

        // Simple Payback Period ten
        if ($cumulative_payback_cash_flow_PKR_ten <= 0) {
            $simple_payback_period_ten = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_nine > 0){
            $simple_payback_period_ten = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_nine/$total_savings_in_electricity_charges_ten) > 0){
            $simple_payback_period_ten = (-$cumulative_payback_cash_flow_PKR_nine/$total_savings_in_electricity_charges_ten);
        }
        else{
            $simple_payback_period_ten = 0;
        }

        // Simple Payback Period eleven
        if ($cumulative_payback_cash_flow_PKR_eleven <= 0) {
            $simple_payback_period_eleven = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_ten > 0){
            $simple_payback_period_eleven = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_ten/$total_savings_in_electricity_charges_eleven) > 0){
            $simple_payback_period_eleven = (-$cumulative_payback_cash_flow_PKR_ten/$total_savings_in_electricity_charges_eleven);
        }
        else{
            $simple_payback_period_eleven = 0;
        }

        // Simple Payback Period twelve
        if ($cumulative_payback_cash_flow_PKR_twelve <= 0) {
            $simple_payback_period_twelve = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_eleven > 0){
            $simple_payback_period_twelve = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_eleven/$total_savings_in_electricity_charges_twelve) > 0){
            $simple_payback_period_twelve = (-$cumulative_payback_cash_flow_PKR_eleven/$total_savings_in_electricity_charges_twelve);
        }
        else{
            $simple_payback_period_twelve = 0;
        }



        // Simple Payback Period thirteen
        if ($cumulative_payback_cash_flow_PKR_thirteen <= 0) {
            $simple_payback_period_thirteen = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_twelve > 0){
            $simple_payback_period_thirteen = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_twelve/$total_savings_in_electricity_charges_thirteen) > 0){
            $simple_payback_period_thirteen = (-$cumulative_payback_cash_flow_PKR_twelve/$total_savings_in_electricity_charges_thirteen);
        }
        else{
            $simple_payback_period_thirteen = 0;
        }


        // Simple Payback Period fourteen
        if ($cumulative_payback_cash_flow_PKR_fourteen <= 0) {
            $simple_payback_period_fourteen = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_thirteen > 0){
            $simple_payback_period_fourteen = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_thirteen/$total_savings_in_electricity_charges_fourteen) > 0){
            $simple_payback_period_fourteen = (-$cumulative_payback_cash_flow_PKR_thirteen/$total_savings_in_electricity_charges_fourteen);
        }
        else{
            $simple_payback_period_fourteen = 0;
        }


        // Simple Payback Period fifteen
        if ($cumulative_payback_cash_flow_PKR_fifteen <= 0) {
            $simple_payback_period_fifteen = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_fourteen > 0){
            $simple_payback_period_fifteen = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_fourteen/$total_savings_in_electricity_charges_fifteen) > 0){
            $simple_payback_period_fifteen = (-$cumulative_payback_cash_flow_PKR_fourteen/$total_savings_in_electricity_charges_fifteen);
        }
        else{
            $simple_payback_period_fifteen = 0;
        }


        // Simple Payback Period sixteen
        if ($cumulative_payback_cash_flow_PKR_sixteen <= 0) {
            $simple_payback_period_sixteen = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_fifteen > 0){
            $simple_payback_period_sixteen = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_fifteen/$total_savings_in_electricity_charges_sixteen) > 0){
            $simple_payback_period_sixteen = (-$cumulative_payback_cash_flow_PKR_fifteen/$total_savings_in_electricity_charges_sixteen);
        }
        else{
            $simple_payback_period_sixteen = 0;
        }


        // Simple Payback Period seventeen
        if ($cumulative_payback_cash_flow_PKR_seventeen <= 0) {
            $simple_payback_period_seventeen = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_sixteen > 0){
            $simple_payback_period_seventeen = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_sixteen/$total_savings_in_electricity_charges_seventeen) > 0){
            $simple_payback_period_seventeen = (-$cumulative_payback_cash_flow_PKR_sixteen/$total_savings_in_electricity_charges_seventeen);
        }
        else{
            $simple_payback_period_seventeen = 0;
        }


        // Simple Payback Period eighteen
        if ($cumulative_payback_cash_flow_PKR_eighteen <= 0) {
            $simple_payback_period_eighteen = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_seventeen > 0){
            $simple_payback_period_eighteen = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_seventeen/$total_savings_in_electricity_charges_eighteen) > 0){
            $simple_payback_period_eighteen = (-$cumulative_payback_cash_flow_PKR_seventeen/$total_savings_in_electricity_charges_eighteen);
        }
        else{
            $simple_payback_period_eighteen = 0;
        }

        // Simple Payback Period nineteen
        if ($cumulative_payback_cash_flow_PKR_nineteen <= 0) {
            $simple_payback_period_nineteen = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_eighteen > 0){
            $simple_payback_period_nineteen = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_eighteen/$total_savings_in_electricity_charges_nineteen) > 0){
            $simple_payback_period_nineteen = (-$cumulative_payback_cash_flow_PKR_eighteen/$total_savings_in_electricity_charges_nineteen);
        }
        else{
            $simple_payback_period_nineteen = 0;
        }

        // Simple Payback Period twenty
        if ($cumulative_payback_cash_flow_PKR_twenty <= 0) {
            $simple_payback_period_twenty = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_nineteen > 0){
            $simple_payback_period_twenty = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_nineteen/$total_savings_in_electricity_charges_twenty) > 0){
            $simple_payback_period_twenty = (-$cumulative_payback_cash_flow_PKR_nineteen/$total_savings_in_electricity_charges_twenty);
        }
        else{
            $simple_payback_period_twenty = 0;
        }

        // Simple Payback Period twenty_one
        if ($cumulative_payback_cash_flow_PKR_twenty_one <= 0) {
            $simple_payback_period_twenty_one = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_twenty > 0){
            $simple_payback_period_twenty_one = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_twenty/$total_savings_in_electricity_charges_twenty_one) > 0){
            $simple_payback_period_twenty_one = (-$cumulative_payback_cash_flow_PKR_twenty/$total_savings_in_electricity_charges_twenty_one);
        }
        else{
            $simple_payback_period_twenty_one = 0;
        }

        // Simple Payback Period twenty_two
        if ($cumulative_payback_cash_flow_PKR_twenty_two <= 0) {
            $simple_payback_period_twenty_two = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_twenty_one > 0){
            $simple_payback_period_twenty_two = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_twenty_one/$total_savings_in_electricity_charges_twenty_two) > 0){
            $simple_payback_period_twenty_two = (-$cumulative_payback_cash_flow_PKR_twenty_one/$total_savings_in_electricity_charges_twenty_two);
        }
        else{
            $simple_payback_period_twenty_two = 0;
        }


        // Simple Payback Period twenty_three
        if ($cumulative_payback_cash_flow_PKR_twenty_three <= 0) {
            $simple_payback_period_twenty_three = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_twenty_two > 0){
            $simple_payback_period_twenty_three = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_twenty_two/$total_savings_in_electricity_charges_twenty_three) > 0){
            $simple_payback_period_twenty_three = (-$cumulative_payback_cash_flow_PKR_twenty_two/$total_savings_in_electricity_charges_twenty_three);
        }
        else{
            $simple_payback_period_twenty_three = 0;
        }


        // Simple Payback Period twenty_four
        if ($cumulative_payback_cash_flow_PKR_twenty_four <= 0) {
            $simple_payback_period_twenty_four = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_twenty_three > 0){
            $simple_payback_period_twenty_four = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_twenty_three/$total_savings_in_electricity_charges_twenty_four) > 0){
            $simple_payback_period_twenty_four = (-$cumulative_payback_cash_flow_PKR_twenty_three/$total_savings_in_electricity_charges_twenty_four);
        }
        else{
            $simple_payback_period_twenty_four = 0;
        }

        // Simple Payback Period twenty_five
        if ($cumulative_payback_cash_flow_PKR_twenty_five <= 0) {
            $simple_payback_period_twenty_five = 1;
        }
        elseif($cumulative_payback_cash_flow_PKR_twenty_four > 0){
            $simple_payback_period_twenty_five = 0;
        }
        elseif((-$cumulative_payback_cash_flow_PKR_twenty_four/$total_savings_in_electricity_charges_twenty_five) > 0){
            $simple_payback_period_twenty_five = (-$cumulative_payback_cash_flow_PKR_twenty_four/$total_savings_in_electricity_charges_twenty_five);
        }
        else{
            $simple_payback_period_twenty_five = 0;
        }


        $D23 = $simple_payback_period_one + $simple_payback_period_two + $simple_payback_period_three + $simple_payback_period_four + $simple_payback_period_five + $simple_payback_period_six + $simple_payback_period_seven + $simple_payback_period_eight + $simple_payback_period_nine + $simple_payback_period_ten + $simple_payback_period_eleven + $simple_payback_period_twelve + $simple_payback_period_thirteen + $simple_payback_period_fourteen + $simple_payback_period_fifteen + $simple_payback_period_sixteen + $simple_payback_period_seventeen + $simple_payback_period_eighteen + $simple_payback_period_nineteen + $simple_payback_period_twenty + $simple_payback_period_twenty_one + $simple_payback_period_twenty_two + $simple_payback_period_twenty_three + $simple_payback_period_twenty_four + $simple_payback_period_twenty_five;
        //echo (float)number_format($D23, 2, '.', '');


        // Discount Rate
        $discount_rate = 5/100;

        // Discounted Savings
        $discounted_savings_usage = - 1 * $initial_investment_cum_savings_usage;
        $discounted_savings_one = $total_savings_in_electricity_charges_one / pow(1.05,$year1);
        $discounted_savings_two = $total_savings_in_electricity_charges_two / pow(1.05,$year2);
        $discounted_savings_three = $total_savings_in_electricity_charges_three / pow(1.05,$year3);
        $discounted_savings_four = $total_savings_in_electricity_charges_four / pow(1.05,$year4);
        $discounted_savings_five = $total_savings_in_electricity_charges_five / pow(1.05,$year5);
        $discounted_savings_six = $total_savings_in_electricity_charges_six / pow(1.05,$year6);
        $discounted_savings_seven = $total_savings_in_electricity_charges_seven / pow(1.05,$year7);
        $discounted_savings_eight = $total_savings_in_electricity_charges_eight / pow(1.05,$year8);
        $discounted_savings_nine = $total_savings_in_electricity_charges_nine / pow(1.05,$year9);
        $discounted_savings_ten = $total_savings_in_electricity_charges_ten / pow(1.05,$year10);
        $discounted_savings_eleven = $total_savings_in_electricity_charges_eleven / pow(1.05,$year11);
        $discounted_savings_twelve = $total_savings_in_electricity_charges_twelve / pow(1.05,$year12);
        $discounted_savings_thirteen = $total_savings_in_electricity_charges_thirteen / pow(1.05,$year13);
        $discounted_savings_fourteen = $total_savings_in_electricity_charges_fourteen / pow(1.05,$year14);
        $discounted_savings_fifteen = $total_savings_in_electricity_charges_fifteen / pow(1.05,$year15);
        $discounted_savings_sixteen = $total_savings_in_electricity_charges_sixteen / pow(1.05,$year16);
        $discounted_savings_seventeen = $total_savings_in_electricity_charges_seventeen / pow(1.05,$year17);
        $discounted_savings_eighteen = $total_savings_in_electricity_charges_eighteen / pow(1.05,$year18);
        $discounted_savings_nineteen = $total_savings_in_electricity_charges_nineteen / pow(1.05,$year19);
        $discounted_savings_twenty = $total_savings_in_electricity_charges_twenty / pow(1.05,$year20);
        $discounted_savings_twenty_one = $total_savings_in_electricity_charges_twenty_one / pow(1.05,$year21);
        $discounted_savings_twenty_two = $total_savings_in_electricity_charges_twenty_two / pow(1.05,$year22);
        $discounted_savings_twenty_three = $total_savings_in_electricity_charges_twenty_three / pow(1.05,$year23);
        $discounted_savings_twenty_four = $total_savings_in_electricity_charges_twenty_four / pow(1.05,$year24);
        $discounted_savings_twenty_five = $total_savings_in_electricity_charges_twenty_five / pow(1.05,$year25);
        //die($discounted_savings_one);

        // Initial Investment/Cumulative Savings


        $initial_investment_cumulative_Savings_usage = $initial_investment_cum_savings_usage;
        $initial_investment_cumulative_Savings_one = $discounted_savings_one;
        $initial_investment_cumulative_Savings_two = $initial_investment_cum_savings_one + $discounted_savings_two;
        
        $initial_investment_cumulative_Savings_three = $initial_investment_cumulative_Savings_two + $discounted_savings_three;

        $initial_investment_cumulative_Savings_four = $initial_investment_cumulative_Savings_three + $discounted_savings_four;

        $initial_investment_cumulative_Savings_five = $initial_investment_cumulative_Savings_four + $discounted_savings_five;

        $initial_investment_cumulative_Savings_six = $initial_investment_cumulative_Savings_five + $discounted_savings_six;

        $initial_investment_cumulative_Savings_seven = $initial_investment_cumulative_Savings_six + $discounted_savings_seven;

        $initial_investment_cumulative_Savings_eight = $initial_investment_cumulative_Savings_seven + $discounted_savings_eight;

        $initial_investment_cumulative_Savings_nine = $initial_investment_cumulative_Savings_eight + $discounted_savings_nine;

        $initial_investment_cumulative_Savings_ten = $initial_investment_cumulative_Savings_nine + $discounted_savings_ten;

        $initial_investment_cumulative_Savings_eleven = $initial_investment_cumulative_Savings_ten + $discounted_savings_eleven;

        $initial_investment_cumulative_Savings_twelve = $initial_investment_cumulative_Savings_eleven + $discounted_savings_twelve;


        $initial_investment_cumulative_Savings_thirteen = $initial_investment_cumulative_Savings_twelve + $discounted_savings_thirteen;

        $initial_investment_cumulative_Savings_fourteen = $initial_investment_cumulative_Savings_thirteen + $discounted_savings_fourteen;

        $initial_investment_cumulative_Savings_fifteen = $initial_investment_cumulative_Savings_fourteen + $discounted_savings_fifteen;

        $initial_investment_cumulative_Savings_sixteen = $initial_investment_cumulative_Savings_fifteen + $discounted_savings_sixteen;

        $initial_investment_cumulative_Savings_seventeen = $initial_investment_cumulative_Savings_sixteen + $discounted_savings_seventeen;

        $initial_investment_cumulative_Savings_eighteen = $initial_investment_cumulative_Savings_seventeen + $discounted_savings_eighteen;

        $initial_investment_cumulative_Savings_nineteen = $initial_investment_cumulative_Savings_eighteen + $discounted_savings_nineteen;

        $initial_investment_cumulative_Savings_twenty = $initial_investment_cumulative_Savings_nineteen + $discounted_savings_twenty;

        $initial_investment_cumulative_Savings_twenty_one = $initial_investment_cumulative_Savings_twenty + $discounted_savings_twenty_one;

        $initial_investment_cumulative_Savings_twenty_two = $initial_investment_cumulative_Savings_twenty_one + $discounted_savings_twenty_two;

        $initial_investment_cumulative_Savings_twenty_three = $initial_investment_cumulative_Savings_twenty_two + $discounted_savings_twenty_three;
        

        $initial_investment_cumulative_Savings_twenty_four = $initial_investment_cumulative_Savings_twenty_three + $discounted_savings_twenty_four;
        
        $initial_investment_cumulative_Savings_twenty_five = $initial_investment_cumulative_Savings_twenty_four + $discounted_savings_twenty_five;

        // Discounted Cumulative Payback cash flow (PKR)

        $discounted_cumulative_payback_cash_flow_PKR_usage = - 1 *$initial_investment_cumulative_Savings_usage;

        $discounted_cumulative_payback_cash_flow_PKR_one = $discounted_cumulative_payback_cash_flow_PKR_usage + $initial_investment_cumulative_Savings_one;

        $discounted_cumulative_payback_cash_flow_PKR_two = $discounted_cumulative_payback_cash_flow_PKR_one + $discounted_savings_two; 

        $discounted_cumulative_payback_cash_flow_PKR_three = $discounted_cumulative_payback_cash_flow_PKR_two + $discounted_savings_three;
        $discounted_cumulative_payback_cash_flow_PKR_four = $discounted_cumulative_payback_cash_flow_PKR_three + $discounted_savings_four;
        $discounted_cumulative_payback_cash_flow_PKR_five = $discounted_cumulative_payback_cash_flow_PKR_four + $discounted_savings_five; 
        $discounted_cumulative_payback_cash_flow_PKR_six = $discounted_cumulative_payback_cash_flow_PKR_five + $discounted_savings_six; 
        $discounted_cumulative_payback_cash_flow_PKR_seven = $discounted_cumulative_payback_cash_flow_PKR_six + $discounted_savings_seven;
        $discounted_cumulative_payback_cash_flow_PKR_eight = $discounted_cumulative_payback_cash_flow_PKR_seven + $discounted_savings_eight;
        $discounted_cumulative_payback_cash_flow_PKR_nine = $discounted_cumulative_payback_cash_flow_PKR_eight + $discounted_savings_nine; 
        $discounted_cumulative_payback_cash_flow_PKR_ten = $discounted_cumulative_payback_cash_flow_PKR_nine + $discounted_savings_ten; 
        $discounted_cumulative_payback_cash_flow_PKR_eleven = $discounted_cumulative_payback_cash_flow_PKR_ten+ $discounted_savings_eleven; 
        $discounted_cumulative_payback_cash_flow_PKR_twelve = $discounted_cumulative_payback_cash_flow_PKR_eleven + $discounted_savings_twelve; 
        $discounted_cumulative_payback_cash_flow_PKR_thirteen = $discounted_cumulative_payback_cash_flow_PKR_twelve + $discounted_savings_thirteen;
        $discounted_cumulative_payback_cash_flow_PKR_fourteen = $discounted_cumulative_payback_cash_flow_PKR_thirteen + $discounted_savings_fourteen; 
        $discounted_cumulative_payback_cash_flow_PKR_fifteen = $discounted_cumulative_payback_cash_flow_PKR_fourteen + $discounted_savings_fifteen; 
        $discounted_cumulative_payback_cash_flow_PKR_sixteen = $discounted_cumulative_payback_cash_flow_PKR_fifteen + $discounted_savings_sixteen; 
        $discounted_cumulative_payback_cash_flow_PKR_seventeen = $discounted_cumulative_payback_cash_flow_PKR_sixteen + $discounted_savings_seventeen; 
        $discounted_cumulative_payback_cash_flow_PKR_eighteen = $discounted_cumulative_payback_cash_flow_PKR_seventeen + $discounted_savings_eighteen; 
        $discounted_cumulative_payback_cash_flow_PKR_nineteen = $discounted_cumulative_payback_cash_flow_PKR_eighteen + $discounted_savings_nineteen; 
        $discounted_cumulative_payback_cash_flow_PKR_twenty = $discounted_cumulative_payback_cash_flow_PKR_nineteen + $discounted_savings_twenty; 
        $discounted_cumulative_payback_cash_flow_PKR_twenty_one = $discounted_cumulative_payback_cash_flow_PKR_twenty + $discounted_savings_twenty_one;
        $discounted_cumulative_payback_cash_flow_PKR_twenty_two = $discounted_cumulative_payback_cash_flow_PKR_twenty_one + $discounted_savings_twenty_two; 
        $discounted_cumulative_payback_cash_flow_PKR_twenty_three = $discounted_cumulative_payback_cash_flow_PKR_twenty_two + $discounted_savings_twenty_three; 
        $discounted_cumulative_payback_cash_flow_PKR_twenty_four = $discounted_cumulative_payback_cash_flow_PKR_twenty_three + $discounted_savings_twenty_four; 
        $discounted_cumulative_payback_cash_flow_PKR_twenty_five = $discounted_cumulative_payback_cash_flow_PKR_twenty_four + $discounted_savings_twenty_five; 


        // Discounted ROI
        $discounted_roi_one = $discounted_savings_one/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_two = $discounted_savings_two/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_three = $discounted_savings_three/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_four = $discounted_savings_four/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_five = $discounted_savings_five/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_six = $discounted_savings_six/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_seven = $discounted_savings_seven/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_eight = $discounted_savings_eight/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_nine = $discounted_savings_nine/$initial_investment_cumulative_Savings_usage;
        $discounted_roi_ten = $discounted_savings_ten/$initial_investment_cumulative_Savings_usage;
        //die(ceil($discounted_roi_one));


        // NPV Comparison (at discount rate) //

        // Present Value of Cash Flow Out //
        $present_value_of_cash_flow_out = $cumulative_payback_cash_flow_PKR_usage;


        // Present Value of Cash Flow In //
        $cash_flow_data = array(0,$total_savings_in_electricity_charges_one,$total_savings_in_electricity_charges_two,$total_savings_in_electricity_charges_three,$total_savings_in_electricity_charges_four,$total_savings_in_electricity_charges_five,$total_savings_in_electricity_charges_six,$total_savings_in_electricity_charges_seven,$total_savings_in_electricity_charges_eight,$total_savings_in_electricity_charges_nine,$total_savings_in_electricity_charges_ten,$total_savings_in_electricity_charges_eleven,$total_savings_in_electricity_charges_twelve,$total_savings_in_electricity_charges_thirteen,$total_savings_in_electricity_charges_fourteen,$total_savings_in_electricity_charges_fifteen,$total_savings_in_electricity_charges_sixteen,$total_savings_in_electricity_charges_seventeen,$total_savings_in_electricity_charges_eighteen,$total_savings_in_electricity_charges_nineteen,$total_savings_in_electricity_charges_twenty,$total_savings_in_electricity_charges_twenty_one,$total_savings_in_electricity_charges_twenty_two,$total_savings_in_electricity_charges_twenty_three,$total_savings_in_electricity_charges_twenty_four,$total_savings_in_electricity_charges_twenty_five);
        $present_value_of_cash_flow_in = ceil($this->npv($discount_rate, $cash_flow_data, 25));
        //echo $present_value_of_cash_flow_in;die;

        // NPV //
        $NPV = ($present_value_of_cash_flow_in + $present_value_of_cash_flow_out);


        // IRR (When NPV is 0) //
        $IRR_when_NPV_is_zero = '';

        // Modified IRR (MIRR) - discount rate accounted for //
        $modified_IRR_MIRR_discount_rate_accounted_for = '';

        // Payback //
        $payback = '';

        // Discounted Payback //
        $discount_payback = '';

        // Average ROI (discounted) //
        $average_roi_discounted = '';

        // LCOE //
        $lcoe = '';


        // Solar + Battery //


        // Total Solar Generation //

        $solar_battery_total_solar_generation = $generation_for_solr_plus_battery_jan + $generation_for_solr_plus_battery_feb + $generation_for_solr_plus_battery_mar + $generation_for_solr_plus_battery_apr + $generation_for_solr_plus_battery_may + $generation_for_solr_plus_battery_jun + $generation_for_solr_plus_battery_jul + $generation_for_solr_plus_battery_aug + $generation_for_solr_plus_battery_sep + $generation_for_solr_plus_battery_oct + $generation_for_solr_plus_battery_nov + $generation_for_solr_plus_battery_dec;
        // echo $solar_battery_total_solar_generation;
        // die($solar_battery_total_solar_generation);

        // Self Use //

        $solar_battery_self_use_jan = $daytime_use_jan + $total_battery_charge_available_jan;
        $solar_battery_self_use_feb = $daytime_use_feb + $total_battery_charge_available_feb;
        $solar_battery_self_use_mar = $daytime_use_mar + $total_battery_charge_available_mar;
        $solar_battery_self_use_apr = $daytime_use_apr + $total_battery_charge_available_apr;
        $solar_battery_self_use_may = $daytime_use_may + $total_battery_charge_available_may;
        $solar_battery_self_use_jun = $daytime_use_jun + $total_battery_charge_available_jun;
        $solar_battery_self_use_jul = $daytime_use_jul + $total_battery_charge_available_jul;
        $solar_battery_self_use_aug = $daytime_use_aug + $total_battery_charge_available_aug;
        $solar_battery_self_use_sep = $daytime_use_sep + $total_battery_charge_available_sep;
        $solar_battery_self_use_oct = $daytime_use_oct + $total_battery_charge_available_oct;
        $solar_battery_self_use_nov = $daytime_use_nov + $total_battery_charge_available_nov;
        $solar_battery_self_use_dec = $daytime_use_dec + $total_battery_charge_available_dec;
        $solar_battery_self_use_usage = $solar_battery_self_use_jan + $solar_battery_self_use_feb + $solar_battery_self_use_mar + $solar_battery_self_use_apr + $solar_battery_self_use_may + $solar_battery_self_use_jun + $solar_battery_self_use_jul + $solar_battery_self_use_aug + $solar_battery_self_use_sep + $solar_battery_self_use_oct + $solar_battery_self_use_nov + $solar_battery_self_use_dec;
        
        //die($solar_battery_self_use_usage);

        // Excess Generation //
        $solar_battery_excess_generation_jan = $generation_for_solr_plus_battery_jan - $solar_battery_self_use_jan;
        $solar_battery_excess_generation_feb = $generation_for_solr_plus_battery_feb - $solar_battery_self_use_feb;
        $solar_battery_excess_generation_mar = $generation_for_solr_plus_battery_mar - $solar_battery_self_use_mar;
        $solar_battery_excess_generation_apr = $generation_for_solr_plus_battery_apr - $solar_battery_self_use_apr;
        $solar_battery_excess_generation_may = $generation_for_solr_plus_battery_may - $solar_battery_self_use_may;
        $solar_battery_excess_generation_jun = $generation_for_solr_plus_battery_jun - $solar_battery_self_use_jun;
        $solar_battery_excess_generation_jul = $generation_for_solr_plus_battery_jul - $solar_battery_self_use_jul;
        $solar_battery_excess_generation_aug = $generation_for_solr_plus_battery_aug - $solar_battery_self_use_aug;
        $solar_battery_excess_generation_sep = $generation_for_solr_plus_battery_sep - $solar_battery_self_use_sep;
        $solar_battery_excess_generation_oct = $generation_for_solr_plus_battery_oct - $solar_battery_self_use_oct;
        $solar_battery_excess_generation_nov = $generation_for_solr_plus_battery_nov - $solar_battery_self_use_nov;
        $solar_battery_excess_generation_dec = $generation_for_solr_plus_battery_dec - $solar_battery_self_use_dec;
        $solar_battery_excess_generation_usage = $solar_battery_excess_generation_jan + $solar_battery_excess_generation_feb + $solar_battery_excess_generation_mar + $solar_battery_excess_generation_apr + $solar_battery_excess_generation_may + $solar_battery_excess_generation_jun + $solar_battery_excess_generation_jul + $solar_battery_excess_generation_aug + $solar_battery_excess_generation_sep + $solar_battery_excess_generation_oct + $solar_battery_excess_generation_nov + $solar_battery_excess_generation_dec; 
        //die($solar_battery_excess_generation_usage);

        // On-Peak Battery Usage (KWh) //
        $solar_battery_on_peak_battery_usage_kwh_jan = min($on_peak_use_jan,$peak_battery_charge_available_jan);
        $solar_battery_on_peak_battery_usage_kwh_feb = min($on_peak_use_feb,$peak_battery_charge_available_feb);
        $solar_battery_on_peak_battery_usage_kwh_mar = min($on_peak_use_mar,$peak_battery_charge_available_mar);
        $solar_battery_on_peak_battery_usage_kwh_apr = min($on_peak_use_apr,$peak_battery_charge_available_apr);
        $solar_battery_on_peak_battery_usage_kwh_may = min($on_peak_use_may,$peak_battery_charge_available_may);
        $solar_battery_on_peak_battery_usage_kwh_jun = min($on_peak_use_jun,$peak_battery_charge_available_jun);
        $solar_battery_on_peak_battery_usage_kwh_jul = min($on_peak_use_jul,$peak_battery_charge_available_jul);
        $solar_battery_on_peak_battery_usage_kwh_aug = min($on_peak_use_aug,$peak_battery_charge_available_aug);
        $solar_battery_on_peak_battery_usage_kwh_sep = min($on_peak_use_sep,$peak_battery_charge_available_sep);
        $solar_battery_on_peak_battery_usage_kwh_oct = min($on_peak_use_oct,$peak_battery_charge_available_oct);
        $solar_battery_on_peak_battery_usage_kwh_nov = min($on_peak_use_nov,$peak_battery_charge_available_nov);
        $solar_battery_on_peak_battery_usage_kwh_dec = min($on_peak_use_dec,$peak_battery_charge_available_dec);
        $solar_battery_on_peak_battery_usage_kwh = $solar_battery_on_peak_battery_usage_kwh_jan + $solar_battery_on_peak_battery_usage_kwh_feb + $solar_battery_on_peak_battery_usage_kwh_mar + $solar_battery_on_peak_battery_usage_kwh_apr + $solar_battery_on_peak_battery_usage_kwh_may + $solar_battery_on_peak_battery_usage_kwh_jun + $solar_battery_on_peak_battery_usage_kwh_jul + $solar_battery_on_peak_battery_usage_kwh_aug + $solar_battery_on_peak_battery_usage_kwh_sep + $solar_battery_on_peak_battery_usage_kwh_oct + $solar_battery_on_peak_battery_usage_kwh_nov + $solar_battery_on_peak_battery_usage_kwh_dec;
        //die($solar_battery_on_peak_battery_usage_kwh);

        // Off-Peak battery charge available //

        $solar_battery_off_peak_battery_charge_available_jan = $total_battery_charge_available_jan - $solar_battery_on_peak_battery_usage_kwh_jan;
        $solar_battery_off_peak_battery_charge_available_feb = $total_battery_charge_available_feb - $solar_battery_on_peak_battery_usage_kwh_feb;
        $solar_battery_off_peak_battery_charge_available_mar = $total_battery_charge_available_mar - $solar_battery_on_peak_battery_usage_kwh_mar;
        $solar_battery_off_peak_battery_charge_available_apr = $total_battery_charge_available_apr - $solar_battery_on_peak_battery_usage_kwh_apr;
        $solar_battery_off_peak_battery_charge_available_may = $total_battery_charge_available_may - $solar_battery_on_peak_battery_usage_kwh_may;
        $solar_battery_off_peak_battery_charge_available_jun = $total_battery_charge_available_jun - $solar_battery_on_peak_battery_usage_kwh_jun;
        $solar_battery_off_peak_battery_charge_available_jul = $total_battery_charge_available_jul - $solar_battery_on_peak_battery_usage_kwh_jul;
        $solar_battery_off_peak_battery_charge_available_aug = $total_battery_charge_available_aug - $solar_battery_on_peak_battery_usage_kwh_aug;
        $solar_battery_off_peak_battery_charge_available_sep = $total_battery_charge_available_sep - $solar_battery_on_peak_battery_usage_kwh_sep;
        $solar_battery_off_peak_battery_charge_available_oct = $total_battery_charge_available_oct - $solar_battery_on_peak_battery_usage_kwh_oct;
        $solar_battery_off_peak_battery_charge_available_nov = $total_battery_charge_available_nov - $solar_battery_on_peak_battery_usage_kwh_nov;
        $solar_battery_off_peak_battery_charge_available_dec = $total_battery_charge_available_dec - $solar_battery_on_peak_battery_usage_kwh_dec;
        $solar_battery_off_peak_battery_charge_available_usage = $solar_battery_off_peak_battery_charge_available_jan + $solar_battery_off_peak_battery_charge_available_feb + $solar_battery_off_peak_battery_charge_available_mar + $solar_battery_off_peak_battery_charge_available_apr + $solar_battery_off_peak_battery_charge_available_may + $solar_battery_off_peak_battery_charge_available_jun + $solar_battery_off_peak_battery_charge_available_jul + $solar_battery_off_peak_battery_charge_available_aug + $solar_battery_off_peak_battery_charge_available_sep + $solar_battery_off_peak_battery_charge_available_oct + $solar_battery_off_peak_battery_charge_available_nov + $solar_battery_off_peak_battery_charge_available_dec;
        //die($off_peak_battery_charge_available_usage);

        // Off-Peak Nighttime Import //
        $solar_battery_off_peak_nighttime_import_jan = max($nighttime_use_jan - $solar_battery_off_peak_battery_charge_available_jan,0);
        $solar_battery_off_peak_nighttime_import_feb = max($nighttime_use_feb - $solar_battery_off_peak_battery_charge_available_feb,0);
        $solar_battery_off_peak_nighttime_import_mar = max($nighttime_use_mar - $solar_battery_off_peak_battery_charge_available_mar,0);
        $solar_battery_off_peak_nighttime_import_apr = max($nighttime_use_apr - $solar_battery_off_peak_battery_charge_available_apr,0);
        $solar_battery_off_peak_nighttime_import_may = max($nighttime_use_may - $solar_battery_off_peak_battery_charge_available_may,0);
        $solar_battery_off_peak_nighttime_import_jun = max($nighttime_use_jun - $solar_battery_off_peak_battery_charge_available_jun,0);
        $solar_battery_off_peak_nighttime_import_jul = max($nighttime_use_jul - $solar_battery_off_peak_battery_charge_available_jul,0);
        $solar_battery_off_peak_nighttime_import_aug = max($nighttime_use_aug - $solar_battery_off_peak_battery_charge_available_aug,0);
        $solar_battery_off_peak_nighttime_import_sep = max($nighttime_use_sep - $solar_battery_off_peak_battery_charge_available_sep,0);
        $solar_battery_off_peak_nighttime_import_oct = max($nighttime_use_oct - $solar_battery_off_peak_battery_charge_available_oct,0);
        $solar_battery_off_peak_nighttime_import_nov = max($nighttime_use_nov - $solar_battery_off_peak_battery_charge_available_nov,0);
        $solar_battery_off_peak_nighttime_import_dec = max($nighttime_use_dec - $solar_battery_off_peak_battery_charge_available_dec,0);
        $solar_battery_off_peak_nighttime_import_usage = $solar_battery_off_peak_nighttime_import_jan + $solar_battery_off_peak_nighttime_import_feb + $solar_battery_off_peak_nighttime_import_mar + $solar_battery_off_peak_nighttime_import_apr + $solar_battery_off_peak_nighttime_import_may + $solar_battery_off_peak_nighttime_import_jun + $solar_battery_off_peak_nighttime_import_jul + $solar_battery_off_peak_nighttime_import_aug + $solar_battery_off_peak_nighttime_import_sep + $solar_battery_off_peak_nighttime_import_oct + $solar_battery_off_peak_nighttime_import_nov + $solar_battery_off_peak_nighttime_import_dec;
        $solar_battery_off_peak_nighttime_import_charges = $solar_battery_off_peak_nighttime_import_usage * $off_peack_rate_with_gst;
        //echo max($solar_battery_off_peak_nighttime_import_feb, 0);
        //die($off_peack_rate_with_gst);

        // Net metered Off-Peak //

        $solar_battery_net_metered_off_peak_jan = min($solar_battery_excess_generation_jan,$solar_battery_off_peak_nighttime_import_jan);
        $solar_battery_net_metered_off_peak_feb = min($solar_battery_excess_generation_feb,$solar_battery_off_peak_nighttime_import_feb);
        $solar_battery_net_metered_off_peak_mar = min($solar_battery_excess_generation_mar,$solar_battery_off_peak_nighttime_import_mar);
        $solar_battery_net_metered_off_peak_apr = min($solar_battery_excess_generation_apr,$solar_battery_off_peak_nighttime_import_apr);
        $solar_battery_net_metered_off_peak_may = min($solar_battery_excess_generation_may,$solar_battery_off_peak_nighttime_import_may);
        $solar_battery_net_metered_off_peak_jun = min($solar_battery_excess_generation_jun,$solar_battery_off_peak_nighttime_import_jun);
        $solar_battery_net_metered_off_peak_jul = min($solar_battery_excess_generation_jul,$solar_battery_off_peak_nighttime_import_jul);
        $solar_battery_net_metered_off_peak_aug = min($solar_battery_excess_generation_aug,$solar_battery_off_peak_nighttime_import_aug);
        $solar_battery_net_metered_off_peak_sep = min($solar_battery_excess_generation_sep,$solar_battery_off_peak_nighttime_import_sep);
        $solar_battery_net_metered_off_peak_oct = min($solar_battery_excess_generation_oct,$solar_battery_off_peak_nighttime_import_oct);
        $solar_battery_net_metered_off_peak_nov = min($solar_battery_excess_generation_nov,$solar_battery_off_peak_nighttime_import_nov);
        $solar_battery_net_metered_off_peak_dec = min($solar_battery_excess_generation_dec,$solar_battery_off_peak_nighttime_import_dec);

        $solar_battery_net_metered_off_peak_usage = $solar_battery_net_metered_off_peak_jan + $solar_battery_net_metered_off_peak_feb + $solar_battery_net_metered_off_peak_mar + $solar_battery_net_metered_off_peak_apr + $solar_battery_net_metered_off_peak_may + $solar_battery_net_metered_off_peak_jun + $solar_battery_net_metered_off_peak_jul + $solar_battery_net_metered_off_peak_aug + $solar_battery_net_metered_off_peak_sep + $solar_battery_net_metered_off_peak_oct + $solar_battery_net_metered_off_peak_nov + $solar_battery_net_metered_off_peak_dec;
        $solar_battery_net_metered_off_peak_charges = $solar_battery_net_metered_off_peak_usage * $off_peack_rate;
        // echo $solar_battery_net_metered_off_peak_mar;
        // die($solar_battery_net_metered_off_peak_jan);


        // Excess Export //
        $solar_battery_excess_export_jan = $solar_battery_excess_generation_jan - $solar_battery_net_metered_off_peak_jan;
        $solar_battery_excess_export_feb = $solar_battery_excess_generation_feb - $solar_battery_net_metered_off_peak_feb;
        $solar_battery_excess_export_mar = $solar_battery_excess_generation_mar - $solar_battery_net_metered_off_peak_mar;
        $solar_battery_excess_export_apr = $solar_battery_excess_generation_apr - $solar_battery_net_metered_off_peak_apr;
        $solar_battery_excess_export_may = $solar_battery_excess_generation_may - $solar_battery_net_metered_off_peak_may;
        $solar_battery_excess_export_jun = $solar_battery_excess_generation_jun - $solar_battery_net_metered_off_peak_jun;
        $solar_battery_excess_export_jul = $solar_battery_excess_generation_jul - $solar_battery_net_metered_off_peak_jul;
        $solar_battery_excess_export_aug = $solar_battery_excess_generation_aug - $solar_battery_net_metered_off_peak_aug;
        $solar_battery_excess_export_sep = $solar_battery_excess_generation_sep - $solar_battery_net_metered_off_peak_sep;
        $solar_battery_excess_export_oct = $solar_battery_excess_generation_oct - $solar_battery_net_metered_off_peak_oct;
        $solar_battery_excess_export_nov = $solar_battery_excess_generation_nov - $solar_battery_net_metered_off_peak_nov;
        $solar_battery_excess_export_dec = $solar_battery_excess_generation_dec - $solar_battery_net_metered_off_peak_dec;
        $solar_battery_excess_export_usage = $solar_battery_excess_export_jan + $solar_battery_excess_export_feb + $solar_battery_excess_export_mar + $solar_battery_excess_export_apr + $solar_battery_excess_export_may + $solar_battery_excess_export_jun + $solar_battery_excess_export_jul + $solar_battery_excess_export_aug + $solar_battery_excess_export_sep + $solar_battery_excess_export_oct + $solar_battery_excess_export_nov + $solar_battery_excess_export_dec;;
        $solar_battery_excess_export_charges = $solar_battery_excess_export_usage * $export_rate;


        // Off-Peak Import after netting off //
        $solar_battery_off_peak_import_after_netting_off_jan = $solar_battery_off_peak_nighttime_import_jan - $solar_battery_net_metered_off_peak_jan;
        $solar_battery_off_peak_import_after_netting_off_feb = $solar_battery_off_peak_nighttime_import_feb - $solar_battery_net_metered_off_peak_feb;
        $solar_battery_off_peak_import_after_netting_off_mar = $solar_battery_off_peak_nighttime_import_mar - $solar_battery_net_metered_off_peak_mar;
        $solar_battery_off_peak_import_after_netting_off_apr = $solar_battery_off_peak_nighttime_import_apr - $solar_battery_net_metered_off_peak_apr;
        $solar_battery_off_peak_import_after_netting_off_may = $solar_battery_off_peak_nighttime_import_may - $solar_battery_net_metered_off_peak_may;
        $solar_battery_off_peak_import_after_netting_off_jun = $solar_battery_off_peak_nighttime_import_jun - $solar_battery_net_metered_off_peak_jun;
        $solar_battery_off_peak_import_after_netting_off_jul = $solar_battery_off_peak_nighttime_import_jul - $solar_battery_net_metered_off_peak_jul;
        $solar_battery_off_peak_import_after_netting_off_aug = $solar_battery_off_peak_nighttime_import_aug - $solar_battery_net_metered_off_peak_aug;
        $solar_battery_off_peak_import_after_netting_off_sep = $solar_battery_off_peak_nighttime_import_sep - $solar_battery_net_metered_off_peak_sep;
        $solar_battery_off_peak_import_after_netting_off_oct = $solar_battery_off_peak_nighttime_import_oct - $solar_battery_net_metered_off_peak_oct;
        $solar_battery_off_peak_import_after_netting_off_nov = $solar_battery_off_peak_nighttime_import_nov - $solar_battery_net_metered_off_peak_nov;
        $solar_battery_off_peak_import_after_netting_off_dec = $solar_battery_off_peak_nighttime_import_dec - $solar_battery_net_metered_off_peak_dec;
        $solar_battery_off_peak_import_after_netting_off_usage = $solar_battery_off_peak_import_after_netting_off_jan + $solar_battery_off_peak_import_after_netting_off_feb + $solar_battery_off_peak_import_after_netting_off_mar + $solar_battery_off_peak_import_after_netting_off_apr + $solar_battery_off_peak_import_after_netting_off_may + $solar_battery_off_peak_import_after_netting_off_jun + $solar_battery_off_peak_import_after_netting_off_jul + $solar_battery_off_peak_import_after_netting_off_aug + $solar_battery_off_peak_import_after_netting_off_sep + $solar_battery_off_peak_import_after_netting_off_oct + $solar_battery_off_peak_import_after_netting_off_nov + $solar_battery_off_peak_import_after_netting_off_dec;
        $solar_battery_off_peak_import_after_netting_off_charges = $solar_battery_off_peak_import_after_netting_off_usage * $off_peack_rate_with_gst;


        // On-Peak Import //
        $solar_battery_on_peak_import_jan = $on_peak_use_jan - $solar_battery_on_peak_battery_usage_kwh_jan;
        $solar_battery_on_peak_import_feb = $on_peak_use_feb - $solar_battery_on_peak_battery_usage_kwh_feb;
        $solar_battery_on_peak_import_mar = $on_peak_use_mar - $solar_battery_on_peak_battery_usage_kwh_mar;
        $solar_battery_on_peak_import_apr = $on_peak_use_apr - $solar_battery_on_peak_battery_usage_kwh_apr;
        $solar_battery_on_peak_import_may = $on_peak_use_may - $solar_battery_on_peak_battery_usage_kwh_may;
        $solar_battery_on_peak_import_jun = $on_peak_use_jun - $solar_battery_on_peak_battery_usage_kwh_jun;
        $solar_battery_on_peak_import_jul = $on_peak_use_jul - $solar_battery_on_peak_battery_usage_kwh_jul;
        $solar_battery_on_peak_import_aug = $on_peak_use_aug - $solar_battery_on_peak_battery_usage_kwh_aug;
        $solar_battery_on_peak_import_sep = $on_peak_use_sep - $solar_battery_on_peak_battery_usage_kwh_sep;
        $solar_battery_on_peak_import_oct = $on_peak_use_oct - $solar_battery_on_peak_battery_usage_kwh_oct;
        $solar_battery_on_peak_import_nov = $on_peak_use_nov - $solar_battery_on_peak_battery_usage_kwh_nov;
        $solar_battery_on_peak_import_dec = $on_peak_use_dec - $solar_battery_on_peak_battery_usage_kwh_dec;
        $solar_battery_on_peak_import_usage = $solar_battery_on_peak_import_jan + $solar_battery_on_peak_import_feb + $solar_battery_on_peak_import_mar + $solar_battery_on_peak_import_apr + $solar_battery_on_peak_import_may + $solar_battery_on_peak_import_jun + $solar_battery_on_peak_import_jul + $solar_battery_on_peak_import_aug + $solar_battery_on_peak_import_sep + $solar_battery_on_peak_import_oct + $solar_battery_on_peak_import_nov + $solar_battery_on_peak_import_dec;
        $solar_battery_on_peak_import_charges = $solar_battery_on_peak_import_usage * $on_peack_rate_with_gst;

        $solar_battery_credits_from_payment_utlity = ($solar_battery_net_metered_off_peak_charges + $solar_battery_excess_export_charges) - ($solar_battery_off_peak_nighttime_import_charges + $solar_battery_on_peak_import_charges);
        $solar_battery_first_year_savings = $solar_battery_credits_from_payment_utlity + $no_solar_first_year_savings;
        //die($solar_battery_first_year_savings);

        // Solar generation after degration (2% 1st year, 0.5% subsquent years) //

        $solar_battery_solar_generation_after_degration_one = $solar_battery_total_solar_generation * (1-2/100);
        $solar_battery_solar_generation_after_degration_two = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year2-1));
        $solar_battery_solar_generation_after_degration_three = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year3-1));
        $solar_battery_solar_generation_after_degration_four = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year4-1));
        $solar_battery_solar_generation_after_degration_five = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year5-1));
        $solar_battery_solar_generation_after_degration_six = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year6-1));
        $solar_battery_solar_generation_after_degration_seven = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year7-1));
        $solar_battery_solar_generation_after_degration_eight = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year8-1));
        $solar_battery_solar_generation_after_degration_nine = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year9-1));
        $solar_battery_solar_generation_after_degration_ten = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year10-1));
        $solar_battery_solar_generation_after_degration_eleven = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year11-1));
        $solar_battery_solar_generation_after_degration_twelve = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year12-1));
        $solar_battery_solar_generation_after_degration_thirteen = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year13-1));
        $solar_battery_solar_generation_after_degration_fourteen = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year14-1));
        $solar_battery_solar_generation_after_degration_fifteen = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year15-1));
        $solar_battery_solar_generation_after_degration_sixteen = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year16-1));
        $solar_battery_solar_generation_after_degration_seventeen = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year17-1));
        $solar_battery_solar_generation_after_degration_eighteen = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year18-1));
        $solar_battery_solar_generation_after_degration_nineteen = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year19-1));
        $solar_battery_solar_generation_after_degration_twenty = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year20-1));
        $solar_battery_solar_generation_after_degration_twenty_one = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year21-1));
        $solar_battery_solar_generation_after_degration_twenty_two = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year22-1));
        $solar_battery_solar_generation_after_degration_twenty_three = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year23-1));
        $solar_battery_solar_generation_after_degration_twenty_four = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year24-1));
        $solar_battery_solar_generation_after_degration_twenty_five = $solar_battery_solar_generation_after_degration_one * pow(0.995,($year25-1));


        //die(round($solar_battery_solar_generation_after_degration_twenty_five));


        // Export per year (KWh) //

        $solar_battery_export_per_year_KWh_one = $solar_battery_excess_export_usage - ($solar_battery_total_solar_generation - $solar_battery_solar_generation_after_degration_one);

        $solar_battery_export_per_year_KWh_two = $solar_battery_export_per_year_KWh_one - ($solar_battery_solar_generation_after_degration_one - $solar_battery_solar_generation_after_degration_two);

        $solar_battery_export_per_year_KWh_three = $solar_battery_export_per_year_KWh_two - ($solar_battery_solar_generation_after_degration_two - $solar_battery_solar_generation_after_degration_three);

        $solar_battery_export_per_year_KWh_four = $solar_battery_export_per_year_KWh_three - ($solar_battery_solar_generation_after_degration_three - $solar_battery_solar_generation_after_degration_four);

        $solar_battery_export_per_year_KWh_five = $solar_battery_export_per_year_KWh_four - ($solar_battery_solar_generation_after_degration_four - $solar_battery_solar_generation_after_degration_five);

        $solar_battery_export_per_year_KWh_six = $solar_battery_export_per_year_KWh_five - ($solar_battery_solar_generation_after_degration_five - $solar_battery_solar_generation_after_degration_six);

        $solar_battery_export_per_year_KWh_seven = $solar_battery_export_per_year_KWh_six - ($solar_battery_solar_generation_after_degration_six - $solar_battery_solar_generation_after_degration_seven);

        $solar_battery_export_per_year_KWh_eight = $solar_battery_export_per_year_KWh_seven - ($solar_battery_solar_generation_after_degration_seven - $solar_battery_solar_generation_after_degration_eight);

        $solar_battery_export_per_year_KWh_nine = $solar_battery_export_per_year_KWh_eight - ($solar_battery_solar_generation_after_degration_eight - $solar_battery_solar_generation_after_degration_nine);

        $solar_battery_export_per_year_KWh_ten = $solar_battery_export_per_year_KWh_nine - ($solar_battery_solar_generation_after_degration_nine - $solar_battery_solar_generation_after_degration_ten);

        $solar_battery_export_per_year_KWh_eleven = $solar_battery_export_per_year_KWh_ten - ($solar_battery_solar_generation_after_degration_ten - $solar_battery_solar_generation_after_degration_eleven);

        $solar_battery_export_per_year_KWh_twelve = $solar_battery_export_per_year_KWh_eleven - ($solar_battery_solar_generation_after_degration_eleven - $solar_battery_solar_generation_after_degration_twelve);



        $solar_battery_export_per_year_KWh_thirteen = $solar_battery_export_per_year_KWh_twelve - ($solar_battery_solar_generation_after_degration_twelve - $solar_battery_solar_generation_after_degration_thirteen);

        $solar_battery_export_per_year_KWh_fourteen = $solar_battery_export_per_year_KWh_thirteen - ($solar_battery_solar_generation_after_degration_thirteen - $solar_battery_solar_generation_after_degration_fourteen);

        $solar_battery_export_per_year_KWh_fifteen = $solar_battery_export_per_year_KWh_fourteen - ($solar_battery_solar_generation_after_degration_fourteen - $solar_battery_solar_generation_after_degration_fifteen);

        $solar_battery_export_per_year_KWh_sixteen = $solar_battery_export_per_year_KWh_fifteen - ($solar_battery_solar_generation_after_degration_fifteen - $solar_battery_solar_generation_after_degration_sixteen);

        $solar_battery_export_per_year_KWh_seventeen = $solar_battery_export_per_year_KWh_sixteen - ($solar_battery_solar_generation_after_degration_sixteen - $solar_battery_solar_generation_after_degration_seventeen);

        $solar_battery_export_per_year_KWh_eighteen = $solar_battery_export_per_year_KWh_seventeen - ($solar_battery_solar_generation_after_degration_seventeen - $solar_battery_solar_generation_after_degration_eighteen);

        $solar_battery_export_per_year_KWh_nineteen = $solar_battery_export_per_year_KWh_eighteen - ($solar_battery_solar_generation_after_degration_eighteen - $solar_battery_solar_generation_after_degration_nineteen);

        $solar_battery_export_per_year_KWh_twenty = $solar_battery_export_per_year_KWh_nineteen - ($solar_battery_solar_generation_after_degration_nineteen - $solar_battery_solar_generation_after_degration_twenty);

        $solar_battery_export_per_year_KWh_twenty_one = $solar_battery_export_per_year_KWh_twenty - ($solar_battery_solar_generation_after_degration_twenty - $solar_battery_solar_generation_after_degration_twenty_one);

        $solar_battery_export_per_year_KWh_twenty_two = $solar_battery_export_per_year_KWh_twenty_one - ($solar_battery_solar_generation_after_degration_twenty_one - $solar_battery_solar_generation_after_degration_twenty_two);

        $solar_battery_export_per_year_KWh_twenty_three = $solar_battery_export_per_year_KWh_twenty_two - ($solar_battery_solar_generation_after_degration_twenty_two - $solar_battery_solar_generation_after_degration_twenty_three);

        $solar_battery_export_per_year_KWh_twenty_four = $solar_battery_export_per_year_KWh_twenty_three - ($solar_battery_solar_generation_after_degration_twenty_three - $solar_battery_solar_generation_after_degration_twenty_four);

        $solar_battery_export_per_year_KWh_twenty_five = $solar_battery_export_per_year_KWh_twenty_four - ($solar_battery_solar_generation_after_degration_twenty_four - $solar_battery_solar_generation_after_degration_twenty_five);



        //die($solar_battery_export_per_year_KWh_twenty_five);


        // Income from Export (PKR) //

        $solar_battery_income_from_exports_PKR_one = $solar_battery_export_per_year_KWh_one * $export_rate;

        $solar_battery_income_from_exports_PKR_two =  ceil($solar_battery_export_per_year_KWh_two) * ($export_rate * pow(1.05,($year2-1)));
        $solar_battery_income_from_exports_PKR_three =  ceil($solar_battery_export_per_year_KWh_three) * ($export_rate * pow(1.05,($year3-1)));
        $solar_battery_income_from_exports_PKR_four =  ceil($solar_battery_export_per_year_KWh_four) * ($export_rate * pow(1.05,($year4-1)));
        $solar_battery_income_from_exports_PKR_five =  ceil($solar_battery_export_per_year_KWh_five) * ($export_rate * pow(1.05,($year5-1)));
        $solar_battery_income_from_exports_PKR_six =  ceil($solar_battery_export_per_year_KWh_six) * ($export_rate * pow(1.05,($year6-1)));
        $solar_battery_income_from_exports_PKR_seven =  ceil($solar_battery_export_per_year_KWh_seven) * ($export_rate * pow(1.05,($year7-1)));
        $solar_battery_income_from_exports_PKR_eight =  ceil($solar_battery_export_per_year_KWh_eight) * ($export_rate * pow(1.05,($year8-1)));
        $solar_battery_income_from_exports_PKR_nine =  ceil($solar_battery_export_per_year_KWh_nine) * ($export_rate * pow(1.05,($year9-1)));
        $solar_battery_income_from_exports_PKR_ten =  ceil($solar_battery_export_per_year_KWh_ten) * ($export_rate * pow(1.05,($year10-1)));
        $solar_battery_income_from_exports_PKR_eleven =  ceil($solar_battery_export_per_year_KWh_eleven) * ($export_rate * pow(1.05,($year11-1)));
        $solar_battery_income_from_exports_PKR_twelve =  ceil($solar_battery_export_per_year_KWh_twelve) * ($export_rate * pow(1.05,($year12-1)));
        $solar_battery_income_from_exports_PKR_thirteen =  ceil($solar_battery_export_per_year_KWh_thirteen) * ($export_rate * pow(1.05,($year13-1)));
        $solar_battery_income_from_exports_PKR_fourteen =  ceil($solar_battery_export_per_year_KWh_fourteen) * ($export_rate * pow(1.05,($year14-1)));
        $solar_battery_income_from_exports_PKR_fifteen =  ceil($solar_battery_export_per_year_KWh_fifteen) * ($export_rate * pow(1.05,($year15-1)));
        $solar_battery_income_from_exports_PKR_sixteen =  ceil($solar_battery_export_per_year_KWh_sixteen) * ($export_rate * pow(1.05,($year16-1)));
        $solar_battery_income_from_exports_PKR_seventeen =  ceil($solar_battery_export_per_year_KWh_seventeen) * ($export_rate * pow(1.05,($year17-1)));
        $solar_battery_income_from_exports_PKR_eighteen =  ceil($solar_battery_export_per_year_KWh_eighteen) * ($export_rate * pow(1.05,($year18-1)));
        $solar_battery_income_from_exports_PKR_nineteen =  ceil($solar_battery_export_per_year_KWh_nineteen) * ($export_rate * pow(1.05,($year19-1)));
        $solar_battery_income_from_exports_PKR_twenty =  ceil($solar_battery_export_per_year_KWh_twenty) * ($export_rate * pow(1.05,($year20-1)));
        $solar_battery_income_from_exports_PKR_twenty_one =  ceil($solar_battery_export_per_year_KWh_twenty_one) * ($export_rate * pow(1.05,($year21-1)));
        $solar_battery_income_from_exports_PKR_twenty_two =  ceil($solar_battery_export_per_year_KWh_twenty_two) * ($export_rate * pow(1.05,($year22-1)));
        $solar_battery_income_from_exports_PKR_twenty_three =  ceil($solar_battery_export_per_year_KWh_twenty_three) * ($export_rate * pow(1.05,($year23-1)));
        $solar_battery_income_from_exports_PKR_twenty_four =  ceil($solar_battery_export_per_year_KWh_twenty_four) * ($export_rate * pow(1.05,($year24-1)));
        $solar_battery_income_from_exports_PKR_twenty_five =  ceil($solar_battery_export_per_year_KWh_twenty_five) * ($export_rate * pow(1.05,($year25-1)));
        //die($solar_battery_income_from_exports_PKR_twenty_five);


        // Net meter benefits (PKR) //

        $solar_battery_net_metered_benefits_one = $solar_battery_net_metered_off_peak_charges;
        $solar_battery_net_metered_benefits_two = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year2-1));
        $solar_battery_net_metered_benefits_three = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year3-1));
        $solar_battery_net_metered_benefits_four = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year4-1));
        $solar_battery_net_metered_benefits_five = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year5-1));
        $solar_battery_net_metered_benefits_six = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year6-1));
        $solar_battery_net_metered_benefits_seven = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year7-1));
        $solar_battery_net_metered_benefits_eight = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year8-1));
        $solar_battery_net_metered_benefits_nine = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year9-1));
        $solar_battery_net_metered_benefits_ten = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year10-1));
        $solar_battery_net_metered_benefits_eleven = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year11-1));
        $solar_battery_net_metered_benefits_twelve = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year12-1));
        $solar_battery_net_metered_benefits_thirteen = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year13-1));
        $solar_battery_net_metered_benefits_fourteen = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year14-1));
        $solar_battery_net_metered_benefits_fifteen = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year15-1));
        $solar_battery_net_metered_benefits_sixteen = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year16-1));
        $solar_battery_net_metered_benefits_seventeen = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year17-1));
        $solar_battery_net_metered_benefits_eighteen = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year18-1));
        $solar_battery_net_metered_benefits_nineteen = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year19-1));
        $solar_battery_net_metered_benefits_twenty = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year20-1));
        $solar_battery_net_metered_benefits_twenty_one = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year21-1));
        $solar_battery_net_metered_benefits_twenty_two = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year22-1));
        $solar_battery_net_metered_benefits_twenty_three = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year23-1));
        $solar_battery_net_metered_benefits_twenty_four = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year24-1));
        $solar_battery_net_metered_benefits_twenty_five = ceil($solar_battery_net_metered_benefits_one) * pow(1.12,($year25-1));



        // Off-Peak Imports + Tax(PKR) //

                $solar_battery_off_peak_imports_plus_tax_PKR_one = $solar_battery_off_peak_nighttime_import_charges;
        $solar_battery_off_peak_imports_plus_tax_PKR_two = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year2-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_three = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year3-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_four = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year4-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_five = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year5-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_six = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year6-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_seven = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year7-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_eight = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year8-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_nine = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year9-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_ten = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year10-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_eleven = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year11-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_twelve = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year12-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_thirteen = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year13-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_fourteen = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year14-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_fifteen = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year15-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_sixteen = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year16-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_seventeen = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year17-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_eighteen = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year18-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_nineteen = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year19-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_twenty = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year20-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_twenty_one = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year21-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_twenty_two = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year22-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_twenty_three = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year23-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_twenty_four = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year24-1));
        $solar_battery_off_peak_imports_plus_tax_PKR_twenty_five = ceil($solar_battery_off_peak_imports_plus_tax_PKR_one) * pow(1.12,($year25-1));

        // On-Peak Imports + Tax (PKR) //

                $solar_battery_on_peak_imports_plus_tax_PKR_one = $solar_battery_on_peak_import_charges;
        $solar_battery_on_peak_imports_plus_tax_PKR_two = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year2-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_three = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year3-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_four = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year4-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_five = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year5-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_six = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year6-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_seven = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year7-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_eight = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year8-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_nine = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year9-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_ten = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year10-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_eleven = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year11-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_twelve = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year12-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_thirteen = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year13-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_fourteen = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year14-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_fifteen = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year15-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_sixteen = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year16-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_seventeen = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year17-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_eighteen = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year18-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_nineteen = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year19-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_twenty = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year20-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_twenty_one = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year21-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_twenty_two = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year22-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_twenty_three = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year23-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_twenty_four = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year24-1));
        $solar_battery_on_peak_imports_plus_tax_PKR_twenty_five = ceil($solar_battery_on_peak_imports_plus_tax_PKR_one) * pow(1.12,($year25-1));


        // Annual Credit (+) or Payment (-) //

        $solar_battery_annual_credit_plus_or_payment_minus_one = ($solar_battery_income_from_exports_PKR_one+$solar_battery_net_metered_benefits_one) - ($solar_battery_off_peak_imports_plus_tax_PKR_one+$solar_battery_on_peak_imports_plus_tax_PKR_one); 
        $solar_battery_annual_credit_plus_or_payment_minus_two = ($solar_battery_income_from_exports_PKR_two+$solar_battery_net_metered_benefits_two) - ($solar_battery_off_peak_imports_plus_tax_PKR_two+$solar_battery_on_peak_imports_plus_tax_PKR_two); 
        $solar_battery_annual_credit_plus_or_payment_minus_three = ($solar_battery_income_from_exports_PKR_three+$solar_battery_net_metered_benefits_three) - ($solar_battery_off_peak_imports_plus_tax_PKR_three+$solar_battery_on_peak_imports_plus_tax_PKR_three); 
        $solar_battery_annual_credit_plus_or_payment_minus_four = ($solar_battery_income_from_exports_PKR_four+$solar_battery_net_metered_benefits_four) - ($solar_battery_off_peak_imports_plus_tax_PKR_four+$solar_battery_on_peak_imports_plus_tax_PKR_four); 
        $solar_battery_annual_credit_plus_or_payment_minus_five = ($solar_battery_income_from_exports_PKR_five+$solar_battery_net_metered_benefits_five) - ($solar_battery_off_peak_imports_plus_tax_PKR_five+$solar_battery_on_peak_imports_plus_tax_PKR_five); 
        $solar_battery_annual_credit_plus_or_payment_minus_six = ($solar_battery_income_from_exports_PKR_six+$solar_battery_net_metered_benefits_six) - ($solar_battery_off_peak_imports_plus_tax_PKR_six+$solar_battery_on_peak_imports_plus_tax_PKR_six); 
        $solar_battery_annual_credit_plus_or_payment_minus_seven = ($solar_battery_income_from_exports_PKR_seven+$solar_battery_net_metered_benefits_seven) - ($solar_battery_off_peak_imports_plus_tax_PKR_seven+$solar_battery_on_peak_imports_plus_tax_PKR_seven); 
        $solar_battery_annual_credit_plus_or_payment_minus_eight = ($solar_battery_income_from_exports_PKR_eight+$solar_battery_net_metered_benefits_eight) - ($solar_battery_off_peak_imports_plus_tax_PKR_eight+$solar_battery_on_peak_imports_plus_tax_PKR_eight); 
        $solar_battery_annual_credit_plus_or_payment_minus_nine = ($solar_battery_income_from_exports_PKR_nine+$solar_battery_net_metered_benefits_nine) - ($solar_battery_off_peak_imports_plus_tax_PKR_nine+$solar_battery_on_peak_imports_plus_tax_PKR_nine); 
        $solar_battery_annual_credit_plus_or_payment_minus_ten = ($solar_battery_income_from_exports_PKR_ten+$solar_battery_net_metered_benefits_ten) - ($solar_battery_off_peak_imports_plus_tax_PKR_ten+$solar_battery_on_peak_imports_plus_tax_PKR_ten);
        $solar_battery_annual_credit_plus_or_payment_minus_eleven = ($solar_battery_income_from_exports_PKR_eleven+$solar_battery_net_metered_benefits_eleven) - ($solar_battery_off_peak_imports_plus_tax_PKR_eleven+$solar_battery_on_peak_imports_plus_tax_PKR_eleven); 
        $solar_battery_annual_credit_plus_or_payment_minus_twelve = ($solar_battery_income_from_exports_PKR_twelve+$solar_battery_net_metered_benefits_twelve) - ($solar_battery_off_peak_imports_plus_tax_PKR_twelve+$solar_battery_on_peak_imports_plus_tax_PKR_twelve);  
        $solar_battery_annual_credit_plus_or_payment_minus_thirteen = ($solar_battery_income_from_exports_PKR_thirteen+$solar_battery_net_metered_benefits_thirteen) - ($solar_battery_off_peak_imports_plus_tax_PKR_thirteen+$solar_battery_on_peak_imports_plus_tax_PKR_thirteen); 
        $solar_battery_annual_credit_plus_or_payment_minus_fourteen = ($solar_battery_income_from_exports_PKR_fourteen+$solar_battery_net_metered_benefits_fourteen) - ($solar_battery_off_peak_imports_plus_tax_PKR_fourteen+$solar_battery_on_peak_imports_plus_tax_PKR_fourteen); 
        $solar_battery_annual_credit_plus_or_payment_minus_fifteen = ($solar_battery_income_from_exports_PKR_fifteen+$solar_battery_net_metered_benefits_fifteen) - ($solar_battery_off_peak_imports_plus_tax_PKR_fifteen+$solar_battery_on_peak_imports_plus_tax_PKR_fifteen); 
        $solar_battery_annual_credit_plus_or_payment_minus_sixteen = ($solar_battery_income_from_exports_PKR_sixteen+$solar_battery_net_metered_benefits_sixteen) - ($solar_battery_off_peak_imports_plus_tax_PKR_sixteen+$solar_battery_on_peak_imports_plus_tax_PKR_sixteen); 
        $solar_battery_annual_credit_plus_or_payment_minus_seventeen = ($solar_battery_income_from_exports_PKR_seventeen+$solar_battery_net_metered_benefits_seventeen) - ($solar_battery_off_peak_imports_plus_tax_PKR_seventeen+$solar_battery_on_peak_imports_plus_tax_PKR_seventeen); 
        $solar_battery_annual_credit_plus_or_payment_minus_eighteen = ($solar_battery_income_from_exports_PKR_eighteen+$solar_battery_net_metered_benefits_eighteen) - ($solar_battery_off_peak_imports_plus_tax_PKR_eighteen+$solar_battery_on_peak_imports_plus_tax_PKR_eighteen); 

        $solar_battery_annual_credit_plus_or_payment_minus_nineteen = ($solar_battery_income_from_exports_PKR_nineteen+$solar_battery_net_metered_benefits_nineteen) - ($solar_battery_off_peak_imports_plus_tax_PKR_nineteen+$solar_battery_on_peak_imports_plus_tax_PKR_nineteen); 

        $solar_battery_annual_credit_plus_or_payment_minus_twenty = ($solar_battery_income_from_exports_PKR_twenty+$solar_battery_net_metered_benefits_twenty) - ($solar_battery_off_peak_imports_plus_tax_PKR_twenty+$solar_battery_on_peak_imports_plus_tax_PKR_twenty);

        $solar_battery_annual_credit_plus_or_payment_minus_twenty_one = ($solar_battery_income_from_exports_PKR_twenty_one+$solar_battery_net_metered_benefits_twenty_one) - ($solar_battery_off_peak_imports_plus_tax_PKR_twenty_one+$solar_battery_on_peak_imports_plus_tax_PKR_twenty_one);

        $solar_battery_annual_credit_plus_or_payment_minus_twenty_two = ($solar_battery_income_from_exports_PKR_twenty_two+$solar_battery_net_metered_benefits_twenty_two) - ($solar_battery_off_peak_imports_plus_tax_PKR_twenty_two+$solar_battery_on_peak_imports_plus_tax_PKR_twenty_two);

        $solar_battery_annual_credit_plus_or_payment_minus_twenty_three = ($solar_battery_income_from_exports_PKR_twenty_three+$solar_battery_net_metered_benefits_twenty_three) - ($solar_battery_off_peak_imports_plus_tax_PKR_twenty_three+$solar_battery_on_peak_imports_plus_tax_PKR_twenty_three);

        $solar_battery_annual_credit_plus_or_payment_minus_twenty_four = ($solar_battery_income_from_exports_PKR_twenty_four+$solar_battery_net_metered_benefits_twenty_four) - ($solar_battery_off_peak_imports_plus_tax_PKR_twenty_four+$solar_battery_on_peak_imports_plus_tax_PKR_twenty_four);

        $solar_battery_annual_credit_plus_or_payment_minus_twenty_five = ($solar_battery_income_from_exports_PKR_twenty_five+$solar_battery_net_metered_benefits_twenty_five) - ($solar_battery_off_peak_imports_plus_tax_PKR_twenty_five+$solar_battery_on_peak_imports_plus_tax_PKR_twenty_five);

        // ZERO Energy Charge //

        $solar_battery_zero_energy_charge_one = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_one > 1){
            $solar_battery_zero_energy_charge_one = 1;
        }
        $solar_battery_zero_energy_charge_two = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_two > 1){
            $solar_battery_zero_energy_charge_two = 1;
        }
        $solar_battery_zero_energy_charge_three = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_three > 1){
            $solar_battery_zero_energy_charge_three = 1;
        }
        $solar_battery_zero_energy_charge_four = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_four > 1){
            $solar_battery_zero_energy_charge_four = 1;
        }

        $solar_battery_zero_energy_charge_five = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_five > 1){
            $solar_battery_zero_energy_charge_five = 1;
        }

        $solar_battery_zero_energy_charge_six = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_six > 1){
            $solar_battery_zero_energy_charge_six = 1;
        }

        $solar_battery_zero_energy_charge_seven = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_seven > 1){
            $solar_battery_zero_energy_charge_seven = 1;
        }

        $solar_battery_zero_energy_charge_eight = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_eight > 1){
            $solar_battery_zero_energy_charge_eight = 1;
        }

        $solar_battery_zero_energy_charge_nine = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_nine > 1){
            $solar_battery_zero_energy_charge_nine = 1;
        }

        $solar_battery_zero_energy_charge_ten = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_ten > 1){
            $solar_battery_zero_energy_charge_ten = 1;
        }

        $solar_battery_zero_energy_charge_eleven = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_eleven > 1){
            $solar_battery_zero_energy_charge_eleven = 1;
        }

        $solar_battery_zero_energy_charge_twelve = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_twelve > 1){
            $solar_battery_zero_energy_charge_twelve = 1;
        }

        $solar_battery_zero_energy_charge_thirteen = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_thirteen > 1){
            $solar_battery_zero_energy_charge_thirteen = 1;
        }

        $solar_battery_zero_energy_charge_fourteen = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_fourteen > 1){
            $solar_battery_zero_energy_charge_fourteen = 1;
        }
        
        $solar_battery_zero_energy_charge_fifteen = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_fifteen > 1){
            $solar_battery_zero_energy_charge_fifteen = 1;
        }

        $solar_battery_zero_energy_charge_sixteen = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_sixteen > 1){
            $solar_battery_zero_energy_charge_sixteen = 1;
        }

        $solar_battery_zero_energy_charge_seventeen = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_seventeen > 1){
            $solar_battery_zero_energy_charge_seventeen = 1;
        }

        $solar_battery_zero_energy_charge_eighteen = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_eighteen > 1){
            $solar_battery_zero_energy_charge_eighteen = 1;
        }

        $solar_battery_zero_energy_charge_nineteen = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_nineteen > 1){
            $solar_battery_zero_energy_charge_nineteen = 1;
        }

        $solar_battery_zero_energy_charge_twenty = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_twenty > 1){
            $solar_battery_zero_energy_charge_twenty = 1;
        }

        $solar_battery_zero_energy_charge_twenty_one = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_twenty_one > 1){
            $solar_battery_zero_energy_charge_twenty_one = 1;
        }

        $solar_battery_zero_energy_charge_twenty_two = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_twenty_two > 1){
            $solar_battery_zero_energy_charge_twenty_two = 1;
        }

        $solar_battery_zero_energy_charge_twenty_three = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_twenty_three > 1){
            $solar_battery_zero_energy_charge_twenty_three = 1;
        }

        $solar_battery_zero_energy_charge_twenty_four = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_twenty_four > 1){
            $solar_battery_zero_energy_charge_twenty_four = 1;
        }

        $solar_battery_zero_energy_charge_twenty_five = 0;
        if($solar_battery_annual_credit_plus_or_payment_minus_twenty_five > 1){
            $solar_battery_zero_energy_charge_twenty_five = 1;
        }

        // Total Savings in Electricity Charges //
        $solar_battery_initial_investment_cum_savings_usage = ($solor_system_cost + $battery_cost + $cost_of_additional_panels_for_battery_charging);

        $solar_battery_total_savings_in_electricity_charges_usage = - 1* $solar_battery_initial_investment_cum_savings_usage;

                $solar_battery_total_savings_in_electricity_charges_one = $electricity_charges_without_solar_one + $solar_battery_annual_credit_plus_or_payment_minus_one;

        $solar_battery_total_savings_in_electricity_charges_two = $electricity_charges_without_solar_two + $solar_battery_annual_credit_plus_or_payment_minus_two;

        $solar_battery_total_savings_in_electricity_charges_three = $electricity_charges_without_solar_three + $solar_battery_annual_credit_plus_or_payment_minus_three;

        $solar_battery_total_savings_in_electricity_charges_four = $electricity_charges_without_solar_four + $solar_battery_annual_credit_plus_or_payment_minus_four;

        $solar_battery_total_savings_in_electricity_charges_five = $electricity_charges_without_solar_five + $solar_battery_annual_credit_plus_or_payment_minus_five;

        $solar_battery_total_savings_in_electricity_charges_six = $electricity_charges_without_solar_six + $solar_battery_annual_credit_plus_or_payment_minus_six;

        $solar_battery_total_savings_in_electricity_charges_seven = $electricity_charges_without_solar_seven + $solar_battery_annual_credit_plus_or_payment_minus_seven;

        $solar_battery_total_savings_in_electricity_charges_eight = $electricity_charges_without_solar_eight + $solar_battery_annual_credit_plus_or_payment_minus_eight;

        $solar_battery_total_savings_in_electricity_charges_nine = $electricity_charges_without_solar_nine + $solar_battery_annual_credit_plus_or_payment_minus_nine;

        $solar_battery_total_savings_in_electricity_charges_ten = $electricity_charges_without_solar_ten + $solar_battery_annual_credit_plus_or_payment_minus_ten;

        $solar_battery_total_savings_in_electricity_charges_eleven = $electricity_charges_without_solar_eleven + $solar_battery_annual_credit_plus_or_payment_minus_eleven;

        $solar_battery_total_savings_in_electricity_charges_twelve = $electricity_charges_without_solar_twelve + $solar_battery_annual_credit_plus_or_payment_minus_twelve;


        $solar_battery_total_savings_in_electricity_charges_thirteen = $electricity_charges_without_solar_thirteen + $solar_battery_annual_credit_plus_or_payment_minus_thirteen;

        $solar_battery_total_savings_in_electricity_charges_fourteen = $electricity_charges_without_solar_fourteen + $solar_battery_annual_credit_plus_or_payment_minus_fourteen;

        $solar_battery_total_savings_in_electricity_charges_fifteen = $electricity_charges_without_solar_fifteen + $solar_battery_annual_credit_plus_or_payment_minus_fifteen;

        $solar_battery_total_savings_in_electricity_charges_sixteen = $electricity_charges_without_solar_sixteen + $solar_battery_annual_credit_plus_or_payment_minus_sixteen;

        $solar_battery_total_savings_in_electricity_charges_seventeen = $electricity_charges_without_solar_seventeen + $solar_battery_annual_credit_plus_or_payment_minus_seventeen;

        $solar_battery_total_savings_in_electricity_charges_eighteen = $electricity_charges_without_solar_eighteen + $solar_battery_annual_credit_plus_or_payment_minus_eighteen;

        $solar_battery_total_savings_in_electricity_charges_nineteen = $electricity_charges_without_solar_nineteen + $solar_battery_annual_credit_plus_or_payment_minus_nineteen;

        $solar_battery_total_savings_in_electricity_charges_twenty = $electricity_charges_without_solar_twenty + $solar_battery_annual_credit_plus_or_payment_minus_twenty;

        $solar_battery_total_savings_in_electricity_charges_twenty_one = $electricity_charges_without_solar_twenty_one + $solar_battery_annual_credit_plus_or_payment_minus_twenty_one;

        $solar_battery_total_savings_in_electricity_charges_twenty_two = $electricity_charges_without_solar_twenty_two + $solar_battery_annual_credit_plus_or_payment_minus_twenty_two;

        $solar_battery_total_savings_in_electricity_charges_twenty_three = $electricity_charges_without_solar_twenty_three + $solar_battery_annual_credit_plus_or_payment_minus_twenty_three;

        $solar_battery_total_savings_in_electricity_charges_twenty_four = $electricity_charges_without_solar_twenty_four + $solar_battery_annual_credit_plus_or_payment_minus_twenty_four;

        $solar_battery_total_savings_in_electricity_charges_twenty_five = $electricity_charges_without_solar_twenty_five + $solar_battery_annual_credit_plus_or_payment_minus_twenty_five;

        // Initial Investment/Cum Savings //

        $solar_battery_initial_investment_cum_savings_one = $solar_battery_total_savings_in_electricity_charges_one;

        $solar_battery_initial_investment_cum_savings_two = $solar_battery_initial_investment_cum_savings_one + $solar_battery_total_savings_in_electricity_charges_two;

        $solar_battery_initial_investment_cum_savings_three = $solar_battery_initial_investment_cum_savings_two + $solar_battery_total_savings_in_electricity_charges_three;

        $solar_battery_initial_investment_cum_savings_four = $solar_battery_initial_investment_cum_savings_three + $solar_battery_total_savings_in_electricity_charges_four;

        $solar_battery_initial_investment_cum_savings_five = $solar_battery_initial_investment_cum_savings_four + $solar_battery_total_savings_in_electricity_charges_five;

        $solar_battery_initial_investment_cum_savings_six = $solar_battery_initial_investment_cum_savings_five + $solar_battery_total_savings_in_electricity_charges_six;

        $solar_battery_initial_investment_cum_savings_seven = $solar_battery_initial_investment_cum_savings_six + $solar_battery_total_savings_in_electricity_charges_seven;

        $solar_battery_initial_investment_cum_savings_eight = $solar_battery_initial_investment_cum_savings_seven + $solar_battery_total_savings_in_electricity_charges_eight;

        $solar_battery_initial_investment_cum_savings_nine = $solar_battery_initial_investment_cum_savings_eight + $solar_battery_total_savings_in_electricity_charges_nine;

        $solar_battery_initial_investment_cum_savings_ten = $solar_battery_initial_investment_cum_savings_nine + $solar_battery_total_savings_in_electricity_charges_ten;

        $solar_battery_initial_investment_cum_savings_eleven = $solar_battery_initial_investment_cum_savings_ten + $solar_battery_total_savings_in_electricity_charges_eleven;

        $solar_battery_initial_investment_cum_savings_twelve = $solar_battery_initial_investment_cum_savings_eleven + $solar_battery_total_savings_in_electricity_charges_twelve;


        $solar_battery_initial_investment_cum_savings_thirteen = $solar_battery_initial_investment_cum_savings_twelve + $solar_battery_total_savings_in_electricity_charges_thirteen;

        $solar_battery_initial_investment_cum_savings_fourteen = $solar_battery_initial_investment_cum_savings_thirteen + $solar_battery_total_savings_in_electricity_charges_fourteen;

        $solar_battery_initial_investment_cum_savings_fifteen = $solar_battery_initial_investment_cum_savings_fourteen + $solar_battery_total_savings_in_electricity_charges_fifteen;

        $solar_battery_initial_investment_cum_savings_sixteen = $solar_battery_initial_investment_cum_savings_fifteen + $solar_battery_total_savings_in_electricity_charges_sixteen;

        $solar_battery_initial_investment_cum_savings_seventeen = $solar_battery_initial_investment_cum_savings_sixteen + $solar_battery_total_savings_in_electricity_charges_seventeen;

        $solar_battery_initial_investment_cum_savings_eighteen = $solar_battery_initial_investment_cum_savings_seventeen + $solar_battery_total_savings_in_electricity_charges_eighteen;

        $solar_battery_initial_investment_cum_savings_nineteen = $solar_battery_initial_investment_cum_savings_eighteen + $solar_battery_total_savings_in_electricity_charges_nineteen;

        $solar_battery_initial_investment_cum_savings_twenty = $solar_battery_initial_investment_cum_savings_nineteen + $solar_battery_total_savings_in_electricity_charges_twenty;

        $solar_battery_initial_investment_cum_savings_twenty_one = $solar_battery_initial_investment_cum_savings_twenty + $solar_battery_total_savings_in_electricity_charges_twenty_one;

        $solar_battery_initial_investment_cum_savings_twenty_two = $solar_battery_initial_investment_cum_savings_twenty_one + $solar_battery_total_savings_in_electricity_charges_twenty_two;

        $solar_battery_initial_investment_cum_savings_twenty_three = $solar_battery_initial_investment_cum_savings_twenty_two + $solar_battery_total_savings_in_electricity_charges_twenty_three;
        

        $solar_battery_initial_investment_cum_savings_twenty_four = $solar_battery_initial_investment_cum_savings_twenty_three + $solar_battery_total_savings_in_electricity_charges_twenty_four;
        
        $solar_battery_initial_investment_cum_savings_twenty_five = $solar_battery_initial_investment_cum_savings_twenty_four + $solar_battery_total_savings_in_electricity_charges_twenty_five;


        // Cumulative Payback cash flow (PKR) //
        $solar_battery_cumulative_payback_cash_flow_PKR_usage = - 1* $solar_battery_initial_investment_cum_savings_usage;
        $solar_battery_cumulative_payback_cash_flow_PKR_one = $solar_battery_cumulative_payback_cash_flow_PKR_usage + $solar_battery_total_savings_in_electricity_charges_one;
        $solar_battery_cumulative_payback_cash_flow_PKR_two = $solar_battery_cumulative_payback_cash_flow_PKR_one + $solar_battery_total_savings_in_electricity_charges_two;
        $solar_battery_cumulative_payback_cash_flow_PKR_three = $solar_battery_cumulative_payback_cash_flow_PKR_two + $solar_battery_total_savings_in_electricity_charges_three;
        $solar_battery_cumulative_payback_cash_flow_PKR_four = $solar_battery_cumulative_payback_cash_flow_PKR_three + $solar_battery_total_savings_in_electricity_charges_four;
        $solar_battery_cumulative_payback_cash_flow_PKR_five = $solar_battery_cumulative_payback_cash_flow_PKR_four + $solar_battery_total_savings_in_electricity_charges_five;
        $solar_battery_cumulative_payback_cash_flow_PKR_six = $solar_battery_cumulative_payback_cash_flow_PKR_five + $solar_battery_total_savings_in_electricity_charges_six;
        $solar_battery_cumulative_payback_cash_flow_PKR_seven = $solar_battery_cumulative_payback_cash_flow_PKR_six + $solar_battery_total_savings_in_electricity_charges_seven;
        $solar_battery_cumulative_payback_cash_flow_PKR_eight = $solar_battery_cumulative_payback_cash_flow_PKR_seven + $solar_battery_total_savings_in_electricity_charges_eight;
        $solar_battery_cumulative_payback_cash_flow_PKR_nine = $solar_battery_cumulative_payback_cash_flow_PKR_eight + $solar_battery_total_savings_in_electricity_charges_nine;
        $solar_battery_cumulative_payback_cash_flow_PKR_ten = $solar_battery_cumulative_payback_cash_flow_PKR_nine + $solar_battery_total_savings_in_electricity_charges_ten;
        $solar_battery_cumulative_payback_cash_flow_PKR_eleven = $solar_battery_cumulative_payback_cash_flow_PKR_ten + $solar_battery_total_savings_in_electricity_charges_eleven;
        $solar_battery_cumulative_payback_cash_flow_PKR_twelve = $solar_battery_cumulative_payback_cash_flow_PKR_eleven + $solar_battery_total_savings_in_electricity_charges_twelve;
        $solar_battery_cumulative_payback_cash_flow_PKR_thirteen = $solar_battery_cumulative_payback_cash_flow_PKR_twelve + $solar_battery_total_savings_in_electricity_charges_thirteen;
        $solar_battery_cumulative_payback_cash_flow_PKR_fourteen = $solar_battery_cumulative_payback_cash_flow_PKR_thirteen + $solar_battery_total_savings_in_electricity_charges_fourteen;
        $solar_battery_cumulative_payback_cash_flow_PKR_fifteen = $solar_battery_cumulative_payback_cash_flow_PKR_fourteen + $solar_battery_total_savings_in_electricity_charges_fifteen;
        $solar_battery_cumulative_payback_cash_flow_PKR_sixteen = $solar_battery_cumulative_payback_cash_flow_PKR_fifteen + $solar_battery_total_savings_in_electricity_charges_sixteen;
        $solar_battery_cumulative_payback_cash_flow_PKR_seventeen = $solar_battery_cumulative_payback_cash_flow_PKR_sixteen + $solar_battery_total_savings_in_electricity_charges_seventeen;
        $solar_battery_cumulative_payback_cash_flow_PKR_eighteen = $solar_battery_cumulative_payback_cash_flow_PKR_seventeen + $solar_battery_total_savings_in_electricity_charges_eighteen;
        $solar_battery_cumulative_payback_cash_flow_PKR_nineteen = $solar_battery_cumulative_payback_cash_flow_PKR_eighteen + $solar_battery_total_savings_in_electricity_charges_nineteen;
        $solar_battery_cumulative_payback_cash_flow_PKR_twenty = $solar_battery_cumulative_payback_cash_flow_PKR_nineteen + $solar_battery_total_savings_in_electricity_charges_twenty;
        $solar_battery_cumulative_payback_cash_flow_PKR_twenty_one = $solar_battery_cumulative_payback_cash_flow_PKR_twenty + $solar_battery_total_savings_in_electricity_charges_twenty_one;
        $solar_battery_cumulative_payback_cash_flow_PKR_twenty_two = $solar_battery_cumulative_payback_cash_flow_PKR_twenty_one + $solar_battery_total_savings_in_electricity_charges_twenty_two;
        $solar_battery_cumulative_payback_cash_flow_PKR_twenty_three = $solar_battery_cumulative_payback_cash_flow_PKR_twenty_two + $solar_battery_total_savings_in_electricity_charges_twenty_three;
        $solar_battery_cumulative_payback_cash_flow_PKR_twenty_four = $solar_battery_cumulative_payback_cash_flow_PKR_twenty_three + $solar_battery_total_savings_in_electricity_charges_twenty_four;
        $solar_battery_cumulative_payback_cash_flow_PKR_twenty_five = $solar_battery_cumulative_payback_cash_flow_PKR_twenty_four + $solar_battery_total_savings_in_electricity_charges_twenty_five;


        // Simple Payback Period One
        if ($solar_battery_cumulative_payback_cash_flow_PKR_one <= 0) {
            $solar_battery_simple_payback_period_one = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_usage > 0){
            $solar_battery_simple_payback_period_one = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_usage/$solar_battery_total_savings_in_electricity_charges_one) > 0){
            $solar_battery_simple_payback_period_one = (-$solar_battery_cumulative_payback_cash_flow_PKR_usage/$solar_battery_total_savings_in_electricity_charges_one);
        }
        else{
            $solar_battery_simple_payback_period_one = 0;
        }

        // Simple Payback Period two
        if ($solar_battery_cumulative_payback_cash_flow_PKR_two <= 0) {
            $solar_battery_simple_payback_period_two = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_one > 0){
            $solar_battery_simple_payback_period_two = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_one/$solar_battery_total_savings_in_electricity_charges_two) > 0){
            $solar_battery_simple_payback_period_two = (-$solar_battery_cumulative_payback_cash_flow_PKR_one/$solar_battery_total_savings_in_electricity_charges_two);
        }
        else{
            $solar_battery_simple_payback_period_two = 0;
        }


        // Simple Payback Period three
        if ($solar_battery_cumulative_payback_cash_flow_PKR_three <= 0) {
            $solar_battery_simple_payback_period_three = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_two > 0){
            $solar_battery_simple_payback_period_three = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_two/$solar_battery_total_savings_in_electricity_charges_three) > 0){
            $solar_battery_simple_payback_period_three = (-$solar_battery_cumulative_payback_cash_flow_PKR_two/$solar_battery_total_savings_in_electricity_charges_three);
        }
        else{
            $solar_battery_simple_payback_period_three = 0;
        }


        // Simple Payback Period four
        if ($solar_battery_cumulative_payback_cash_flow_PKR_four <= 0) {
            $solar_battery_simple_payback_period_four = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_three > 0){
            $solar_battery_simple_payback_period_four = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_three/$solar_battery_total_savings_in_electricity_charges_four) > 0){
            $solar_battery_simple_payback_period_four = (-$solar_battery_cumulative_payback_cash_flow_PKR_three/$solar_battery_total_savings_in_electricity_charges_four);
        }
        else{
            $solar_battery_simple_payback_period_four = 0;
        }


        // Simple Payback Period five
        if ($solar_battery_cumulative_payback_cash_flow_PKR_five <= 0) {
            $solar_battery_simple_payback_period_five = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_four > 0){
            $solar_battery_simple_payback_period_five = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_four/$solar_battery_total_savings_in_electricity_charges_five) > 0){
            $solar_battery_simple_payback_period_five = (-$solar_battery_cumulative_payback_cash_flow_PKR_four/$solar_battery_total_savings_in_electricity_charges_five);
        }
        else{
            $solar_battery_simple_payback_period_five = 0;
        }


        // Simple Payback Period six
        if ($solar_battery_cumulative_payback_cash_flow_PKR_six <= 0) {
            $solar_battery_simple_payback_period_six = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_five > 0){
            $solar_battery_simple_payback_period_six = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_five/$solar_battery_total_savings_in_electricity_charges_six) > 0){
            $solar_battery_simple_payback_period_six = (-$solar_battery_cumulative_payback_cash_flow_PKR_five/$solar_battery_total_savings_in_electricity_charges_six);
        }
        else{
            $solar_battery_simple_payback_period_six = 0;
        }

        // Simple Payback Period seven
        if ($solar_battery_cumulative_payback_cash_flow_PKR_seven <= 0) {
            $solar_battery_simple_payback_period_seven = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_six > 0){
            $solar_battery_simple_payback_period_seven = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_six/$solar_battery_total_savings_in_electricity_charges_seven) > 0){
            $solar_battery_simple_payback_period_seven = (-$solar_battery_cumulative_payback_cash_flow_PKR_six/$solar_battery_total_savings_in_electricity_charges_seven);
        }
        else{
            $solar_battery_simple_payback_period_seven = 0;
        }


        // Simple Payback Period eight
        if ($solar_battery_cumulative_payback_cash_flow_PKR_eight <= 0) {
            $solar_battery_simple_payback_period_eight = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_seven > 0){
            $solar_battery_simple_payback_period_eight = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_seven/$solar_battery_total_savings_in_electricity_charges_eight) > 0){
            $solar_battery_simple_payback_period_eight = (-$solar_battery_cumulative_payback_cash_flow_PKR_seven/$solar_battery_total_savings_in_electricity_charges_eight);
        }
        else{
            $solar_battery_simple_payback_period_eight = 0;
        }

        // Simple Payback Period nine
        if ($solar_battery_cumulative_payback_cash_flow_PKR_nine <= 0) {
            $solar_battery_simple_payback_period_nine = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_eight > 0){
            $solar_battery_simple_payback_period_nine = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_eight/$solar_battery_total_savings_in_electricity_charges_nine) > 0){
            $solar_battery_simple_payback_period_nine = (-$solar_battery_cumulative_payback_cash_flow_PKR_eight/$solar_battery_total_savings_in_electricity_charges_nine);
        }
        else{
            $solar_battery_simple_payback_period_nine = 0;
        }

        // Simple Payback Period ten
        if ($solar_battery_cumulative_payback_cash_flow_PKR_ten <= 0) {
            $solar_battery_simple_payback_period_ten = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_nine > 0){
            $solar_battery_simple_payback_period_ten = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_nine/$solar_battery_total_savings_in_electricity_charges_ten) > 0){
            $solar_battery_simple_payback_period_ten = (-$solar_battery_cumulative_payback_cash_flow_PKR_nine/$solar_battery_total_savings_in_electricity_charges_ten);
        }
        else{
            $solar_battery_simple_payback_period_ten = 0;
        }

        // Simple Payback Period eleven
        if ($solar_battery_cumulative_payback_cash_flow_PKR_eleven <= 0) {
            $solar_battery_simple_payback_period_eleven = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_ten > 0){
            $solar_battery_simple_payback_period_eleven = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_ten/$solar_battery_total_savings_in_electricity_charges_eleven) > 0){
            $solar_battery_simple_payback_period_eleven = (-$solar_battery_cumulative_payback_cash_flow_PKR_ten/$solar_battery_total_savings_in_electricity_charges_eleven);
        }
        else{
            $solar_battery_simple_payback_period_eleven = 0;
        }

        // Simple Payback Period twelve
        if ($solar_battery_cumulative_payback_cash_flow_PKR_twelve <= 0) {
            $solar_battery_simple_payback_period_twelve = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_eleven > 0){
            $solar_battery_simple_payback_period_twelve = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_eleven/$solar_battery_total_savings_in_electricity_charges_twelve) > 0){
            $solar_battery_simple_payback_period_twelve = (-$solar_battery_cumulative_payback_cash_flow_PKR_eleven/$solar_battery_total_savings_in_electricity_charges_twelve);
        }
        else{
            $solar_battery_simple_payback_period_twelve = 0;
        }



        // Simple Payback Period thirteen
        if ($solar_battery_cumulative_payback_cash_flow_PKR_thirteen <= 0) {
            $solar_battery_simple_payback_period_thirteen = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_twelve > 0){
            $solar_battery_simple_payback_period_thirteen = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_twelve/$solar_battery_total_savings_in_electricity_charges_thirteen) > 0){
            $solar_battery_simple_payback_period_thirteen = (-$solar_battery_cumulative_payback_cash_flow_PKR_twelve/$solar_battery_total_savings_in_electricity_charges_thirteen);
        }
        else{
            $solar_battery_simple_payback_period_thirteen = 0;
        }


        // Simple Payback Period fourteen
        if ($solar_battery_cumulative_payback_cash_flow_PKR_fourteen <= 0) {
            $solar_battery_simple_payback_period_fourteen = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_thirteen > 0){
            $solar_battery_simple_payback_period_fourteen = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_thirteen/$solar_battery_total_savings_in_electricity_charges_fourteen) > 0){
            $solar_battery_simple_payback_period_fourteen = (-$solar_battery_cumulative_payback_cash_flow_PKR_thirteen/$solar_battery_total_savings_in_electricity_charges_fourteen);
        }
        else{
            $solar_battery_simple_payback_period_fourteen = 0;
        }


        // Simple Payback Period fifteen
        if ($solar_battery_cumulative_payback_cash_flow_PKR_fifteen <= 0) {
            $solar_battery_simple_payback_period_fifteen = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_fourteen > 0){
            $solar_battery_simple_payback_period_fifteen = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_fourteen/$solar_battery_total_savings_in_electricity_charges_fifteen) > 0){
            $solar_battery_simple_payback_period_fifteen = (-$solar_battery_cumulative_payback_cash_flow_PKR_fourteen/$solar_battery_total_savings_in_electricity_charges_fifteen);
        }
        else{
            $solar_battery_simple_payback_period_fifteen = 0;
        }


        // Simple Payback Period sixteen
        if ($solar_battery_cumulative_payback_cash_flow_PKR_sixteen <= 0) {
            $solar_battery_simple_payback_period_sixteen = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_fifteen > 0){
            $solar_battery_simple_payback_period_sixteen = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_fifteen/$solar_battery_total_savings_in_electricity_charges_sixteen) > 0){
            $solar_battery_simple_payback_period_sixteen = (-$solar_battery_cumulative_payback_cash_flow_PKR_fifteen/$solar_battery_total_savings_in_electricity_charges_sixteen);
        }
        else{
            $solar_battery_simple_payback_period_sixteen = 0;
        }


        // Simple Payback Period seventeen
        if ($solar_battery_cumulative_payback_cash_flow_PKR_seventeen <= 0) {
            $solar_battery_simple_payback_period_seventeen = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_sixteen > 0){
            $solar_battery_simple_payback_period_seventeen = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_sixteen/$solar_battery_total_savings_in_electricity_charges_seventeen) > 0){
            $solar_battery_simple_payback_period_seventeen = (-$solar_battery_cumulative_payback_cash_flow_PKR_sixteen/$solar_battery_total_savings_in_electricity_charges_seventeen);
        }
        else{
            $solar_battery_simple_payback_period_seventeen = 0;
        }


        // Simple Payback Period eighteen
        if ($solar_battery_cumulative_payback_cash_flow_PKR_eighteen <= 0) {
            $solar_battery_simple_payback_period_eighteen = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_seventeen > 0){
            $solar_battery_simple_payback_period_eighteen = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_seventeen/$solar_battery_total_savings_in_electricity_charges_eighteen) > 0){
            $solar_battery_simple_payback_period_eighteen = (-$solar_battery_cumulative_payback_cash_flow_PKR_seventeen/$solar_battery_total_savings_in_electricity_charges_eighteen);
        }
        else{
            $solar_battery_simple_payback_period_eighteen = 0;
        }

        // Simple Payback Period nineteen
        if ($solar_battery_cumulative_payback_cash_flow_PKR_nineteen <= 0) {
            $solar_battery_simple_payback_period_nineteen = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_eighteen > 0){
            $solar_battery_simple_payback_period_nineteen = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_eighteen/$solar_battery_total_savings_in_electricity_charges_nineteen) > 0){
            $solar_battery_simple_payback_period_nineteen = (-$solar_battery_cumulative_payback_cash_flow_PKR_eighteen/$solar_battery_total_savings_in_electricity_charges_nineteen);
        }
        else{
            $solar_battery_simple_payback_period_nineteen = 0;
        }

        // Simple Payback Period twenty
        if ($solar_battery_cumulative_payback_cash_flow_PKR_twenty <= 0) {
            $solar_battery_simple_payback_period_twenty = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_nineteen > 0){
            $solar_battery_simple_payback_period_twenty = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_nineteen/$solar_battery_total_savings_in_electricity_charges_twenty) > 0){
            $solar_battery_simple_payback_period_twenty = (-$solar_battery_cumulative_payback_cash_flow_PKR_nineteen/$solar_battery_total_savings_in_electricity_charges_twenty);
        }
        else{
            $solar_battery_simple_payback_period_twenty = 0;
        }

        // Simple Payback Period twenty_one
        if ($solar_battery_cumulative_payback_cash_flow_PKR_twenty_one <= 0) {
            $solar_battery_simple_payback_period_twenty_one = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_twenty > 0){
            $solar_battery_simple_payback_period_twenty_one = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_twenty/$solar_battery_total_savings_in_electricity_charges_twenty_one) > 0){
            $solar_battery_simple_payback_period_twenty_one = (-$solar_battery_cumulative_payback_cash_flow_PKR_twenty/$solar_battery_total_savings_in_electricity_charges_twenty_one);
        }
        else{
            $solar_battery_simple_payback_period_twenty_one = 0;
        }

        // Simple Payback Period twenty_two
        if ($solar_battery_cumulative_payback_cash_flow_PKR_twenty_two <= 0) {
            $solar_battery_simple_payback_period_twenty_two = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_twenty_one > 0){
            $solar_battery_simple_payback_period_twenty_two = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_twenty_one/$solar_battery_total_savings_in_electricity_charges_twenty_two) > 0){
            $solar_battery_simple_payback_period_twenty_two = (-$solar_battery_cumulative_payback_cash_flow_PKR_twenty_one/$solar_battery_total_savings_in_electricity_charges_twenty_two);
        }
        else{
            $solar_battery_simple_payback_period_twenty_two = 0;
        }


        // Simple Payback Period twenty_three
        if ($solar_battery_cumulative_payback_cash_flow_PKR_twenty_three <= 0) {
            $solar_battery_simple_payback_period_twenty_three = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_twenty_two > 0){
            $solar_battery_simple_payback_period_twenty_three = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_twenty_two/$solar_battery_total_savings_in_electricity_charges_twenty_three) > 0){
            $solar_battery_simple_payback_period_twenty_three = (-$solar_battery_cumulative_payback_cash_flow_PKR_twenty_two/$solar_battery_total_savings_in_electricity_charges_twenty_three);
        }
        else{
            $solar_battery_simple_payback_period_twenty_three = 0;
        }


        // Simple Payback Period twenty_four
        if ($solar_battery_cumulative_payback_cash_flow_PKR_twenty_four <= 0) {
            $solar_battery_simple_payback_period_twenty_four = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_twenty_three > 0){
            $solar_battery_simple_payback_period_twenty_four = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_twenty_three/$solar_battery_total_savings_in_electricity_charges_twenty_four) > 0){
            $solar_battery_simple_payback_period_twenty_four = (-$solar_battery_cumulative_payback_cash_flow_PKR_twenty_three/$solar_battery_total_savings_in_electricity_charges_twenty_four);
        }
        else{
            $solar_battery_simple_payback_period_twenty_four = 0;
        }

        // Simple Payback Period twenty_five
        if ($solar_battery_cumulative_payback_cash_flow_PKR_twenty_five <= 0) {
            $solar_battery_simple_payback_period_twenty_five = 1;
        }
        elseif($solar_battery_cumulative_payback_cash_flow_PKR_twenty_four > 0){
            $solar_battery_simple_payback_period_twenty_five = 0;
        }
        elseif((-$solar_battery_cumulative_payback_cash_flow_PKR_twenty_four/$solar_battery_total_savings_in_electricity_charges_twenty_five) > 0){
            $solar_battery_simple_payback_period_twenty_five = (-$solar_battery_cumulative_payback_cash_flow_PKR_twenty_four/$solar_battery_total_savings_in_electricity_charges_twenty_five);
        }
        else{
            $solar_battery_simple_payback_period_twenty_five = 0;
        }


        $G23 = $solar_battery_simple_payback_period_one + $solar_battery_simple_payback_period_two + $solar_battery_simple_payback_period_three + $solar_battery_simple_payback_period_four + $solar_battery_simple_payback_period_five + $solar_battery_simple_payback_period_six + $solar_battery_simple_payback_period_seven + $solar_battery_simple_payback_period_eight + $solar_battery_simple_payback_period_nine + $solar_battery_simple_payback_period_ten + $solar_battery_simple_payback_period_eleven + $solar_battery_simple_payback_period_twelve + $solar_battery_simple_payback_period_thirteen + $solar_battery_simple_payback_period_fourteen + $solar_battery_simple_payback_period_fifteen + $solar_battery_simple_payback_period_sixteen + $solar_battery_simple_payback_period_seventeen + $solar_battery_simple_payback_period_eighteen + $solar_battery_simple_payback_period_nineteen + $solar_battery_simple_payback_period_twenty + $solar_battery_simple_payback_period_twenty_one + $solar_battery_simple_payback_period_twenty_two + $solar_battery_simple_payback_period_twenty_three + $solar_battery_simple_payback_period_twenty_four + $solar_battery_simple_payback_period_twenty_five;

        // echo (float)number_format($D23, 2, '.', '');
        // echo '<br/>';
        // echo (float)number_format($G23, 2, '.', '');
        // die();



        // Webpage OutPut //

        $total_solar_generation_solar_only = $total_solar_generation;
        $total_solar_generation_solar_plus_battery = $solar_battery_total_solar_generation;

        $self_use_solar_only = $self_use;
        $self_use_solar_plus_battery = $solar_battery_self_use_usage;

        $net_metered_solar_only = $net_metered_off_peak_1st_year_usage;
        $net_metered_solar_plus_battery = $solar_battery_net_metered_off_peak_usage;

        $export_solar_only = $excess_export_1st_year_usage;
        $export_solar_plus_battery = $solar_battery_excess_export_usage;

        $on_peak_import_without_solar = $no_solar_on_peak_first_year_usage;
        $on_peak_import_solar_only = $on_peak_import_1st_year_usage;
        $on_peak_import_solar_plus_battery = $solar_battery_on_peak_import_usage;

        $off_peak_import_without_solar = $no_solar_off_peak_first_year_usage;
        $off_peak_import_solar_only = $off_peak_import_after_netting_off_1st_year_usage;
        $off_peak_import_solar_plus_battery = $solar_battery_off_peak_import_after_netting_off_usage;
        

        $battery_use_solar_only = 0;
        $battery_use_solar_plus_battery = $total_battery_charge_available_sum;

        $export_plus_net_metered_solar_only = $net_metered_solar_only + $export_solar_only;
        $export_plus_net_metered_solar_plus_battery = $net_metered_solar_plus_battery + $export_solar_plus_battery;

        $solar_self_use_solar_only = $self_use;
        $solar_self_use_solar_plus_battery = $self_use_solar_plus_battery - $battery_use_solar_plus_battery;

        $grid_use_without_solar = $on_peak_import_without_solar + $off_peak_import_without_solar;
        $grid_use_solar_only = $on_peak_import_solar_only + $off_peak_import_solar_only;
        $grid_use_solar_plus_battery = $on_peak_import_solar_plus_battery + $off_peak_import_solar_plus_battery;

        $self_use_solar_only = $solar_self_use_solar_only;
        $self_use_solar_plus_battery = $solar_self_use_solar_plus_battery + $battery_use_solar_plus_battery;

        $net_metered_plus_export_solar_only = $export_plus_net_metered_solar_only;
        $net_metered_plus_export_solar_plus_battery = $export_plus_net_metered_solar_plus_battery;



        $sum_solar_only = $grid_use_solar_only + $self_use_solar_only + $net_metered_plus_export_solar_only;
        $sum_solar_plus_battery = $grid_use_solar_plus_battery + $self_use_solar_plus_battery + $net_metered_plus_export_solar_plus_battery;


        $grid_use_without_solar_percentage = '100%';
        $grid_use_solar_only_percentage = round(number_format(($grid_use_solar_only/$sum_solar_only) * 100, 2));
        $grid_use_solar_plus_battery_percentage = round(number_format(($grid_use_solar_plus_battery/$sum_solar_plus_battery) * 100, 2));


        $self_use_solar_only_percentage = round(number_format(($self_use_solar_only/$sum_solar_only) * 100, 2));
        $self_use_solar_plus_battery_percentage = round(number_format(($self_use_solar_plus_battery/$sum_solar_plus_battery) * 100, 2));

        $net_metered_plus_export_solar_only_percentage = round(number_format(($net_metered_plus_export_solar_only/$sum_solar_only) * 100, 2));
        $net_metered_plus_export_solar_plus_battery_percentage = round(number_format(($net_metered_plus_export_solar_plus_battery/$sum_solar_plus_battery) * 100, 2));

        $webpage_savings_one = $electricity_charges_without_solar_one + $annual_credit_plus_or_payment_minus_one;
        
        $webpage_savings_five = $electricity_charges_without_solar_five + $annual_credit_plus_or_payment_minus_five;
        
        $webpage_savings_ten = $electricity_charges_without_solar_ten + $annual_credit_plus_or_payment_minus_ten;
        
        $webpage_savings_fifteen = $electricity_charges_without_solar_fifteen + $annual_credit_plus_or_payment_minus_fifteen;
        
        $webpage_savings_twenty = $electricity_charges_without_solar_twenty + $annual_credit_plus_or_payment_minus_twenty;
        
        $webpage_savings_twenty_five = $electricity_charges_without_solar_twenty_five + $annual_credit_plus_or_payment_minus_twenty_five;
        
        
        $saving_solar_only_one = round(number_format(($webpage_savings_one/$electricity_charges_without_solar_one)*100, 2));
        
        $saving_solar_only_five = round(number_format(($webpage_savings_five/$electricity_charges_without_solar_five)*100, 2));
        
        $saving_solar_only_ten = round(number_format(($webpage_savings_ten/$electricity_charges_without_solar_ten)*100, 2));
        
        $saving_solar_only_fifteen = round(number_format(($webpage_savings_fifteen/$electricity_charges_without_solar_fifteen)*100, 2));
        
        $saving_solar_only_twenty = round(number_format(($webpage_savings_twenty/$electricity_charges_without_solar_twenty)*100, 2));
        
        $saving_solar_only_twenty_five = round(number_format(($webpage_savings_twenty_five/$electricity_charges_without_solar_twenty_five)*100, 2));
        


        $webpage_solar_plus_battery_savings_one = $electricity_charges_without_solar_one + $solar_battery_annual_credit_plus_or_payment_minus_one;
        
        $webpage_solar_plus_battery_savings_five = $electricity_charges_without_solar_five + $solar_battery_annual_credit_plus_or_payment_minus_five;
        
        $webpage_solar_plus_battery_savings_ten = $electricity_charges_without_solar_ten + $solar_battery_annual_credit_plus_or_payment_minus_ten;
        
        $webpage_solar_plus_battery_savings_fifteen = $electricity_charges_without_solar_fifteen + $solar_battery_annual_credit_plus_or_payment_minus_fifteen;
        
        $webpage_solar_plus_battery_savings_twenty = $electricity_charges_without_solar_twenty + $solar_battery_annual_credit_plus_or_payment_minus_twenty;
        
        $webpage_solar_plus_battery_savings_twenty_five = $electricity_charges_without_solar_twenty_five + $solar_battery_annual_credit_plus_or_payment_minus_twenty_five;
        
 
        $saving_solar_plus_battery_one = round(number_format(($webpage_solar_plus_battery_savings_one/$electricity_charges_without_solar_one)*100, 2));
        
        $saving_solar_plus_battery_five = round(number_format(($webpage_solar_plus_battery_savings_five/$electricity_charges_without_solar_five)*100, 2));
        
        $saving_solar_plus_battery_ten = round(number_format(($webpage_solar_plus_battery_savings_ten/$electricity_charges_without_solar_ten)*100, 2));
        
        $saving_solar_plus_battery_fifteen = round(number_format(($webpage_solar_plus_battery_savings_fifteen/$electricity_charges_without_solar_fifteen)*100, 2));
        
        $saving_solar_plus_battery_twenty = round(number_format(($webpage_solar_plus_battery_savings_twenty/$electricity_charges_without_solar_twenty)*100, 2));
        
        $saving_solar_plus_battery_twenty_five = round(number_format(($webpage_solar_plus_battery_savings_twenty_five/$electricity_charges_without_solar_twenty_five)*100, 2));


        $daytime_use_chart_jan = $off_peack_rate_with_gst * $daytime_use_jan;
        $daytime_use_chart_feb = $off_peack_rate_with_gst * $daytime_use_feb;
        $daytime_use_chart_mar = $off_peack_rate_with_gst * $daytime_use_mar;
        $daytime_use_chart_apr = $off_peack_rate_with_gst * $daytime_use_apr;
        $daytime_use_chart_may = $off_peack_rate_with_gst * $daytime_use_may;
        $daytime_use_chart_jun = $off_peack_rate_with_gst * $daytime_use_jun;
        $daytime_use_chart_jul = $off_peack_rate_with_gst * $daytime_use_jul;
        $daytime_use_chart_aug = $off_peack_rate_with_gst * $daytime_use_aug;
        $daytime_use_chart_sep = $off_peack_rate_with_gst * $daytime_use_sep;
        $daytime_use_chart_oct = $off_peack_rate_with_gst * $daytime_use_oct;
        $daytime_use_chart_nov = $off_peack_rate_with_gst * $daytime_use_nov;
        $daytime_use_chart_dec = $off_peack_rate_with_gst * $daytime_use_dec;


        $nighttime_use_chart_jan = $off_peack_rate_with_gst * $nighttime_use_jan;
        $nighttime_use_chart_feb = $off_peack_rate_with_gst * $nighttime_use_feb;
        $nighttime_use_chart_mar = $off_peack_rate_with_gst * $nighttime_use_mar;
        $nighttime_use_chart_apr = $off_peack_rate_with_gst * $nighttime_use_apr;
        $nighttime_use_chart_may = $off_peack_rate_with_gst * $nighttime_use_may;
        $nighttime_use_chart_jun = $off_peack_rate_with_gst * $nighttime_use_jun;
        $nighttime_use_chart_jul = $off_peack_rate_with_gst * $nighttime_use_jul;
        $nighttime_use_chart_aug = $off_peack_rate_with_gst * $nighttime_use_aug;
        $nighttime_use_chart_sep = $off_peack_rate_with_gst * $nighttime_use_sep;
        $nighttime_use_chart_oct = $off_peack_rate_with_gst * $nighttime_use_oct;
        $nighttime_use_chart_nov = $off_peack_rate_with_gst * $nighttime_use_nov;
        $nighttime_use_chart_dec = $off_peack_rate_with_gst * $nighttime_use_dec;

        $on_peak_use_chart_jan = ceil($on_peack_rate_with_gst * $on_peak_use_jan);
        $on_peak_use_chart_feb = ceil($on_peack_rate_with_gst * $on_peak_use_feb);
        $on_peak_use_chart_mar = ceil($on_peack_rate_with_gst * $on_peak_use_mar);
        $on_peak_use_chart_apr = ceil($on_peack_rate_with_gst * $on_peak_use_apr);
        $on_peak_use_chart_may = ceil($on_peack_rate_with_gst * $on_peak_use_may);
        $on_peak_use_chart_jun = ceil($on_peack_rate_with_gst * $on_peak_use_jun);
        $on_peak_use_chart_jul = ceil($on_peack_rate_with_gst * $on_peak_use_jul);
        $on_peak_use_chart_aug = ceil($on_peack_rate_with_gst * $on_peak_use_aug);
        $on_peak_use_chart_sep = ceil($on_peack_rate_with_gst * $on_peak_use_sep);
        $on_peak_use_chart_oct = ceil($on_peack_rate_with_gst * $on_peak_use_oct);
        $on_peak_use_chart_nov = ceil($on_peack_rate_with_gst * $on_peak_use_nov);
        $on_peak_use_chart_dec = ceil($on_peack_rate_with_gst * $on_peak_use_dec);


        $net_monthly_charges_no_solar_jan = $daytime_use_chart_jan + ($nighttime_use_chart_jan + $on_peak_use_chart_jan);
        $net_monthly_charges_no_solar_feb = $daytime_use_chart_feb + ($nighttime_use_chart_feb + $on_peak_use_chart_feb);
        $net_monthly_charges_no_solar_mar = $daytime_use_chart_mar + ($nighttime_use_chart_mar + $on_peak_use_chart_mar);
        $net_monthly_charges_no_solar_apr = $daytime_use_chart_apr + ($nighttime_use_chart_apr + $on_peak_use_chart_apr);
        $net_monthly_charges_no_solar_may = $daytime_use_chart_may + ($nighttime_use_chart_may + $on_peak_use_chart_may);
        $net_monthly_charges_no_solar_jun = $daytime_use_chart_jun + ($nighttime_use_chart_jun + $on_peak_use_chart_jun);
        $net_monthly_charges_no_solar_jul = $daytime_use_chart_jul + ($nighttime_use_chart_jul + $on_peak_use_chart_jul);
        $net_monthly_charges_no_solar_aug = $daytime_use_chart_aug + ($nighttime_use_chart_aug + $on_peak_use_chart_aug);
        $net_monthly_charges_no_solar_sep = $daytime_use_chart_sep + ($nighttime_use_chart_sep + $on_peak_use_chart_sep);
        $net_monthly_charges_no_solar_oct = $daytime_use_chart_oct + ($nighttime_use_chart_oct + $on_peak_use_chart_oct);
        $net_monthly_charges_no_solar_nov = $daytime_use_chart_nov + ($nighttime_use_chart_nov + $on_peak_use_chart_nov);
        $net_monthly_charges_no_solar_dec = $daytime_use_chart_dec + ($nighttime_use_chart_dec + $on_peak_use_chart_dec);


        $net_monthly_charges_jan = $daytime_use_chart_jan + ($nighttime_use_chart_jan + $on_peak_use_chart_jan);
        $net_monthly_charges_feb = $daytime_use_chart_feb + ($nighttime_use_chart_feb + $on_peak_use_chart_feb);
        $net_monthly_charges_mar = $daytime_use_chart_mar + ($nighttime_use_chart_mar + $on_peak_use_chart_mar);
        $net_monthly_charges_apr = $daytime_use_chart_apr + ($nighttime_use_chart_apr + $on_peak_use_chart_apr);
        $net_monthly_charges_may = $daytime_use_chart_may + ($nighttime_use_chart_may + $on_peak_use_chart_may);
        $net_monthly_charges_jun = $daytime_use_chart_jun + ($nighttime_use_chart_jun + $on_peak_use_chart_jun);
        $net_monthly_charges_jul = $daytime_use_chart_jul + ($nighttime_use_chart_jul + $on_peak_use_chart_jul);
        $net_monthly_charges_aug = $daytime_use_chart_aug + ($nighttime_use_chart_aug + $on_peak_use_chart_aug);
        $net_monthly_charges_sep = $daytime_use_chart_sep + ($nighttime_use_chart_sep + $on_peak_use_chart_sep);
        $net_monthly_charges_oct = $daytime_use_chart_oct + ($nighttime_use_chart_oct + $on_peak_use_chart_oct);
        $net_monthly_charges_nov = $daytime_use_chart_nov + ($nighttime_use_chart_nov + $on_peak_use_chart_nov);
        $net_monthly_charges_dec = $daytime_use_chart_dec + ($nighttime_use_chart_dec + $on_peak_use_chart_dec);
        
        $off_peak_imports_chart_jan = ceil($off_peack_rate_with_gst * $off_peak_imports_jan);
        $off_peak_imports_chart_feb = ceil($off_peack_rate_with_gst * $off_peak_imports_feb);
        $off_peak_imports_chart_mar = ceil($off_peack_rate_with_gst * $off_peak_imports_mar);
        $off_peak_imports_chart_apr = ceil($off_peack_rate_with_gst * $off_peak_imports_apr);
        $off_peak_imports_chart_may = ceil($off_peack_rate_with_gst * $off_peak_imports_may);
        $off_peak_imports_chart_jun = ceil($off_peack_rate_with_gst * $off_peak_imports_jun);
        $off_peak_imports_chart_jul = ceil($off_peack_rate_with_gst * $off_peak_imports_jul);
        $off_peak_imports_chart_aug = ceil($off_peack_rate_with_gst * $off_peak_imports_aug);
        $off_peak_imports_chart_sep = ceil($off_peack_rate_with_gst * $off_peak_imports_sep);
        $off_peak_imports_chart_oct = ceil($off_peack_rate_with_gst * $off_peak_imports_oct);
        $off_peak_imports_chart_nov = ceil($off_peack_rate_with_gst * $off_peak_imports_nov);
        $off_peak_imports_chart_dec = ceil($off_peack_rate_with_gst * $off_peak_imports_dec);

        $net_metered_off_peak_chart_jan = max(0,ceil($off_peack_rate * $net_metered_off_peak_jan));
        $net_metered_off_peak_chart_feb = max(0,ceil($off_peack_rate * $net_metered_off_peak_feb));
        $net_metered_off_peak_chart_mar = max(0,ceil($off_peack_rate * $net_metered_off_peak_mar));
        $net_metered_off_peak_chart_apr = max(0,ceil($off_peack_rate * $net_metered_off_peak_apr));
        $net_metered_off_peak_chart_may = max(0,ceil($off_peack_rate * $net_metered_off_peak_may));
        $net_metered_off_peak_chart_jun = max(0,ceil($off_peack_rate * $net_metered_off_peak_jun));
        $net_metered_off_peak_chart_jul = max(0,ceil($off_peack_rate * $net_metered_off_peak_jul));
        $net_metered_off_peak_chart_aug = max(0,ceil($off_peack_rate * $net_metered_off_peak_aug));
        $net_metered_off_peak_chart_sep = max(0,ceil($off_peack_rate * $net_metered_off_peak_sep));
        $net_metered_off_peak_chart_oct = max(0,ceil($off_peack_rate * $net_metered_off_peak_oct));
        $net_metered_off_peak_chart_nov = max(0,ceil($off_peack_rate * $net_metered_off_peak_nov));
        $net_metered_off_peak_chart_dec = max(0,ceil($off_peack_rate * $net_metered_off_peak_dec));

        $excess_export_chart_jan = max(0,ceil($export_rate * $excess_export_jan));
        $excess_export_chart_feb = max(0,ceil($export_rate * $excess_export_feb));
        $excess_export_chart_mar = max(0,ceil($export_rate * $excess_export_mar));
        $excess_export_chart_apr = max(0,ceil($export_rate * $excess_export_apr));
        $excess_export_chart_may = max(0,ceil($export_rate * $excess_export_may));
        $excess_export_chart_jun = max(0,ceil($export_rate * $excess_export_jun));
        $excess_export_chart_jul = max(0,ceil($export_rate * $excess_export_jul));
        $excess_export_chart_aug = max(0,ceil($export_rate * $excess_export_aug));
        $excess_export_chart_sep = max(0,ceil($export_rate * $excess_export_sep));
        $excess_export_chart_oct = max(0,ceil($export_rate * $excess_export_oct));
        $excess_export_chart_nov = max(0,ceil($export_rate * $excess_export_nov));
        $excess_export_chart_dec = max(0,ceil($export_rate * $excess_export_dec));


        $on_peak_import_chart_jan = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_jan));
        $on_peak_import_chart_feb = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_feb));
        $on_peak_import_chart_mar = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_mar));
        $on_peak_import_chart_apr = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_apr));
        $on_peak_import_chart_may = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_may));
        $on_peak_import_chart_jun = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_jun));
        $on_peak_import_chart_jul = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_jul));
        $on_peak_import_chart_aug = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_aug));
        $on_peak_import_chart_sep = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_sep));
        $on_peak_import_chart_oct = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_oct));
        $on_peak_import_chart_nov = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_nov));
        $on_peak_import_chart_dec = max(0,ceil($on_peack_rate_with_gst * $on_peak_import_dec));


        $net_monthly_charge_solar_only_chart_jan =  $off_peak_imports_chart_jan + $on_peak_import_chart_jan;
        $net_monthly_charge_solar_only_chart_feb =  $off_peak_imports_chart_feb + $on_peak_import_chart_feb;
        $net_monthly_charge_solar_only_chart_mar =  $off_peak_imports_chart_mar + $on_peak_import_chart_mar;
        $net_monthly_charge_solar_only_chart_apr =  $off_peak_imports_chart_apr + $on_peak_import_chart_apr;
        $net_monthly_charge_solar_only_chart_may =  $off_peak_imports_chart_may + $on_peak_import_chart_may;
        $net_monthly_charge_solar_only_chart_jun =  $off_peak_imports_chart_jun + $on_peak_import_chart_jun;
        $net_monthly_charge_solar_only_chart_jul =  $off_peak_imports_chart_jul + $on_peak_import_chart_jul;
        $net_monthly_charge_solar_only_chart_aug =  $off_peak_imports_chart_aug + $on_peak_import_chart_aug;
        $net_monthly_charge_solar_only_chart_sep =  $off_peak_imports_chart_sep + $on_peak_import_chart_sep;
        $net_monthly_charge_solar_only_chart_oct =  $off_peak_imports_chart_oct + $on_peak_import_chart_oct;
        $net_monthly_charge_solar_only_chart_nov =  $off_peak_imports_chart_nov + $on_peak_import_chart_nov;
        $net_monthly_charge_solar_only_chart_dec =  $off_peak_imports_chart_dec + $on_peak_import_chart_dec;

        $net_monthly_credit_solar_only_chart_jan =  $net_metered_off_peak_chart_jan + $excess_export_chart_jan;
        $net_monthly_credit_solar_only_chart_feb =  $net_metered_off_peak_chart_feb + $excess_export_chart_feb;
        $net_monthly_credit_solar_only_chart_mar =  $net_metered_off_peak_chart_mar + $excess_export_chart_mar;
        $net_monthly_credit_solar_only_chart_apr =  $net_metered_off_peak_chart_apr + $excess_export_chart_apr;
        $net_monthly_credit_solar_only_chart_may =  $net_metered_off_peak_chart_may + $excess_export_chart_may;
        $net_monthly_credit_solar_only_chart_jun =  $net_metered_off_peak_chart_jun + $excess_export_chart_jun;
        $net_monthly_credit_solar_only_chart_jul =  $net_metered_off_peak_chart_jul + $excess_export_chart_jul;
        $net_monthly_credit_solar_only_chart_aug =  $net_metered_off_peak_chart_aug + $excess_export_chart_aug;
        $net_monthly_credit_solar_only_chart_sep =  $net_metered_off_peak_chart_sep + $excess_export_chart_sep;
        $net_monthly_credit_solar_only_chart_oct =  $net_metered_off_peak_chart_oct + $excess_export_chart_oct;
        $net_monthly_credit_solar_only_chart_nov =  $net_metered_off_peak_chart_nov + $excess_export_chart_nov;
        $net_monthly_credit_solar_only_chart_dec =  $net_metered_off_peak_chart_dec + $excess_export_chart_dec;


        $net_monthly_saving_solar_only_chart_jan =  ($net_metered_off_peak_chart_jan + $excess_export_chart_jan) + $net_monthly_charges_no_solar_jan;
        $net_monthly_saving_solar_only_chart_feb =  ($net_metered_off_peak_chart_feb + $excess_export_chart_feb) + $net_monthly_charges_no_solar_feb;
        $net_monthly_saving_solar_only_chart_mar =  ($net_metered_off_peak_chart_mar + $excess_export_chart_mar) + $net_monthly_charges_no_solar_mar;
        $net_monthly_saving_solar_only_chart_apr =  ($net_metered_off_peak_chart_apr + $excess_export_chart_apr) + $net_monthly_charges_no_solar_apr;
        $net_monthly_saving_solar_only_chart_may =  ($net_metered_off_peak_chart_may + $excess_export_chart_may) + $net_monthly_charges_no_solar_may;
        $net_monthly_saving_solar_only_chart_jun =  ($net_metered_off_peak_chart_jun + $excess_export_chart_jun) + $net_monthly_charges_no_solar_jun;
        $net_monthly_saving_solar_only_chart_jul =  ($net_metered_off_peak_chart_jul + $excess_export_chart_jul) + $net_monthly_charges_no_solar_jul;
        $net_monthly_saving_solar_only_chart_aug =  ($net_metered_off_peak_chart_aug + $excess_export_chart_aug) + $net_monthly_charges_no_solar_aug;
        $net_monthly_saving_solar_only_chart_sep =  ($net_metered_off_peak_chart_sep + $excess_export_chart_sep) + $net_monthly_charges_no_solar_sep;
        $net_monthly_saving_solar_only_chart_oct =  ($net_metered_off_peak_chart_oct + $excess_export_chart_oct) + $net_monthly_charges_no_solar_oct;
        $net_monthly_saving_solar_only_chart_nov =  ($net_metered_off_peak_chart_nov + $excess_export_chart_nov) + $net_monthly_charges_no_solar_nov;
        $net_monthly_saving_solar_only_chart_dec =  ($net_metered_off_peak_chart_dec + $excess_export_chart_dec) + $net_monthly_charges_no_solar_dec;

        $net_monthly_charges_solar_only_jan = $net_monthly_charge_solar_only_chart_jan - $net_monthly_credit_solar_only_chart_jan;
        $net_monthly_charges_solar_only_feb = $net_monthly_charge_solar_only_chart_feb - $net_monthly_credit_solar_only_chart_feb;
        $net_monthly_charges_solar_only_mar = $net_monthly_charge_solar_only_chart_mar - $net_monthly_credit_solar_only_chart_mar;
        $net_monthly_charges_solar_only_apr = $net_monthly_charge_solar_only_chart_apr - $net_monthly_credit_solar_only_chart_apr;
        $net_monthly_charges_solar_only_may = $net_monthly_charge_solar_only_chart_may - $net_monthly_credit_solar_only_chart_may;
        $net_monthly_charges_solar_only_jun = $net_monthly_charge_solar_only_chart_jun - $net_monthly_credit_solar_only_chart_jun;
        $net_monthly_charges_solar_only_jul = $net_monthly_charge_solar_only_chart_jul - $net_monthly_credit_solar_only_chart_jul;
        $net_monthly_charges_solar_only_aug = $net_monthly_charge_solar_only_chart_aug - $net_monthly_credit_solar_only_chart_aug;
        $net_monthly_charges_solar_only_sep = $net_monthly_charge_solar_only_chart_sep - $net_monthly_credit_solar_only_chart_sep;
        $net_monthly_charges_solar_only_oct = $net_monthly_charge_solar_only_chart_oct - $net_monthly_credit_solar_only_chart_oct;
        $net_monthly_charges_solar_only_nov = $net_monthly_charge_solar_only_chart_nov - $net_monthly_credit_solar_only_chart_nov;
        $net_monthly_charges_solar_only_dec = $net_monthly_charge_solar_only_chart_dec - $net_monthly_credit_solar_only_chart_dec;



        $solar_battery_off_peak_nighttime_import_chart_jan = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_jan));
        $solar_battery_off_peak_nighttime_import_chart_feb = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_feb));
        $solar_battery_off_peak_nighttime_import_chart_mar = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_mar));
        $solar_battery_off_peak_nighttime_import_chart_apr = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_apr));
        $solar_battery_off_peak_nighttime_import_chart_may = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_may));
        $solar_battery_off_peak_nighttime_import_chart_jun = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_jun));
        $solar_battery_off_peak_nighttime_import_chart_jul = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_jul));
        $solar_battery_off_peak_nighttime_import_chart_aug = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_aug));
        $solar_battery_off_peak_nighttime_import_chart_sep = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_sep));
        $solar_battery_off_peak_nighttime_import_chart_oct = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_oct));
        $solar_battery_off_peak_nighttime_import_chart_nov = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_nov));
        $solar_battery_off_peak_nighttime_import_chart_dec = max(0,ceil($off_peack_rate_with_gst * $solar_battery_off_peak_nighttime_import_dec));


        $solar_battery_net_metered_off_peak_chart_jan = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_jan));
        $solar_battery_net_metered_off_peak_chart_feb = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_feb));
        $solar_battery_net_metered_off_peak_chart_mar = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_mar));
        $solar_battery_net_metered_off_peak_chart_apr = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_apr));
        $solar_battery_net_metered_off_peak_chart_may = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_may));
        $solar_battery_net_metered_off_peak_chart_jun = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_jun));
        $solar_battery_net_metered_off_peak_chart_jul = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_jul));
        $solar_battery_net_metered_off_peak_chart_aug = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_aug));
        $solar_battery_net_metered_off_peak_chart_sep = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_sep));
        $solar_battery_net_metered_off_peak_chart_oct = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_oct));
        $solar_battery_net_metered_off_peak_chart_nov = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_nov));
        $solar_battery_net_metered_off_peak_chart_dec = max(0,ceil($off_peack_rate * $solar_battery_net_metered_off_peak_dec));


        $solar_battery_excess_export_chart_jan = max(0,ceil($export_rate * $solar_battery_excess_export_jan));
        $solar_battery_excess_export_chart_feb = max(0,ceil($export_rate * $solar_battery_excess_export_feb));
        $solar_battery_excess_export_chart_mar = max(0,ceil($export_rate * $solar_battery_excess_export_mar));
        $solar_battery_excess_export_chart_apr = max(0,ceil($export_rate * $solar_battery_excess_export_apr));
        $solar_battery_excess_export_chart_may = max(0,ceil($export_rate * $solar_battery_excess_export_may));
        $solar_battery_excess_export_chart_jun = max(0,ceil($export_rate * $solar_battery_excess_export_jun));
        $solar_battery_excess_export_chart_jul = max(0,ceil($export_rate * $solar_battery_excess_export_jul));
        $solar_battery_excess_export_chart_aug = max(0,ceil($export_rate * $solar_battery_excess_export_aug));
        $solar_battery_excess_export_chart_sep = max(0,ceil($export_rate * $solar_battery_excess_export_sep));
        $solar_battery_excess_export_chart_oct = max(0,ceil($export_rate * $solar_battery_excess_export_oct));
        $solar_battery_excess_export_chart_nov = max(0,ceil($export_rate * $solar_battery_excess_export_nov));
        $solar_battery_excess_export_chart_dec = max(0,ceil($export_rate * $solar_battery_excess_export_dec));


        $solar_battery_on_peak_import_chart_jan = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_jan));
        $solar_battery_on_peak_import_chart_feb = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_feb));
        $solar_battery_on_peak_import_chart_mar = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_mar));
        $solar_battery_on_peak_import_chart_apr = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_apr));
        $solar_battery_on_peak_import_chart_may = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_may));
        $solar_battery_on_peak_import_chart_jun = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_jun));
        $solar_battery_on_peak_import_chart_jul = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_jul));
        $solar_battery_on_peak_import_chart_aug = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_aug));
        $solar_battery_on_peak_import_chart_sep = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_sep));
        $solar_battery_on_peak_import_chart_oct = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_oct));
        $solar_battery_on_peak_import_chart_nov = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_nov));
        $solar_battery_on_peak_import_chart_dec = max(0,ceil($on_peack_rate_with_gst * $solar_battery_on_peak_import_dec));


        $net_monthly_charge_solar_plus_battery_chart_jan =  $solar_battery_off_peak_nighttime_import_chart_jan + $solar_battery_on_peak_import_chart_jan;
        $net_monthly_charge_solar_plus_battery_chart_feb =  $solar_battery_off_peak_nighttime_import_chart_feb + $solar_battery_on_peak_import_chart_feb;
        $net_monthly_charge_solar_plus_battery_chart_mar =  $solar_battery_off_peak_nighttime_import_chart_mar + $solar_battery_on_peak_import_chart_mar;
        $net_monthly_charge_solar_plus_battery_chart_apr =  $solar_battery_off_peak_nighttime_import_chart_apr + $solar_battery_on_peak_import_chart_apr;
        $net_monthly_charge_solar_plus_battery_chart_may =  $solar_battery_off_peak_nighttime_import_chart_may + $solar_battery_on_peak_import_chart_may;
        $net_monthly_charge_solar_plus_battery_chart_jun =  $solar_battery_off_peak_nighttime_import_chart_jun + $solar_battery_on_peak_import_chart_jun;
        $net_monthly_charge_solar_plus_battery_chart_jul =  $solar_battery_off_peak_nighttime_import_chart_jul + $solar_battery_on_peak_import_chart_jul;
        $net_monthly_charge_solar_plus_battery_chart_aug =  $solar_battery_off_peak_nighttime_import_chart_aug + $solar_battery_on_peak_import_chart_aug;
        $net_monthly_charge_solar_plus_battery_chart_sep =  $solar_battery_off_peak_nighttime_import_chart_sep + $solar_battery_on_peak_import_chart_sep;
        $net_monthly_charge_solar_plus_battery_chart_oct =  $solar_battery_off_peak_nighttime_import_chart_oct + $solar_battery_on_peak_import_chart_oct;
        $net_monthly_charge_solar_plus_battery_chart_nov =  $solar_battery_off_peak_nighttime_import_chart_nov + $solar_battery_on_peak_import_chart_nov;
        $net_monthly_charge_solar_plus_battery_chart_dec =  $solar_battery_off_peak_nighttime_import_chart_dec + $solar_battery_on_peak_import_chart_dec;


        $net_monthly_credit_solar_plus_battery_chart_jan =  $solar_battery_net_metered_off_peak_chart_jan + $solar_battery_excess_export_chart_jan;
        $net_monthly_credit_solar_plus_battery_chart_feb =  $solar_battery_net_metered_off_peak_chart_feb + $solar_battery_excess_export_chart_feb;
        $net_monthly_credit_solar_plus_battery_chart_mar =  $solar_battery_net_metered_off_peak_chart_mar + $solar_battery_excess_export_chart_mar;
        $net_monthly_credit_solar_plus_battery_chart_apr =  $solar_battery_net_metered_off_peak_chart_apr + $solar_battery_excess_export_chart_apr;
        $net_monthly_credit_solar_plus_battery_chart_may =  $solar_battery_net_metered_off_peak_chart_may + $solar_battery_excess_export_chart_may;
        $net_monthly_credit_solar_plus_battery_chart_jun =  $solar_battery_net_metered_off_peak_chart_jun + $solar_battery_excess_export_chart_jun;
        $net_monthly_credit_solar_plus_battery_chart_jul =  $solar_battery_net_metered_off_peak_chart_jul + $solar_battery_excess_export_chart_jul;
        $net_monthly_credit_solar_plus_battery_chart_aug =  $solar_battery_net_metered_off_peak_chart_aug + $solar_battery_excess_export_chart_aug;
        $net_monthly_credit_solar_plus_battery_chart_sep =  $solar_battery_net_metered_off_peak_chart_sep + $solar_battery_excess_export_chart_sep;
        $net_monthly_credit_solar_plus_battery_chart_oct =  $solar_battery_net_metered_off_peak_chart_oct + $solar_battery_excess_export_chart_oct;
        $net_monthly_credit_solar_plus_battery_chart_nov =  $solar_battery_net_metered_off_peak_chart_nov + $solar_battery_excess_export_chart_nov;
        $net_monthly_credit_solar_plus_battery_chart_dec =  $solar_battery_net_metered_off_peak_chart_dec + $solar_battery_excess_export_chart_dec;


        $net_monthly_saving_solar_battery_chart_jan = $net_monthly_charge_solar_plus_battery_chart_jan - $net_monthly_credit_solar_plus_battery_chart_jan;
        $net_monthly_saving_solar_battery_chart_feb = $net_monthly_charge_solar_plus_battery_chart_feb - $net_monthly_credit_solar_plus_battery_chart_feb;
        $net_monthly_saving_solar_battery_chart_mar = $net_monthly_charge_solar_plus_battery_chart_mar - $net_monthly_credit_solar_plus_battery_chart_mar;
        $net_monthly_saving_solar_battery_chart_apr = $net_monthly_charge_solar_plus_battery_chart_apr - $net_monthly_credit_solar_plus_battery_chart_apr;
        $net_monthly_saving_solar_battery_chart_may = $net_monthly_charge_solar_plus_battery_chart_may - $net_monthly_credit_solar_plus_battery_chart_may;
        $net_monthly_saving_solar_battery_chart_jun = $net_monthly_charge_solar_plus_battery_chart_jun - $net_monthly_credit_solar_plus_battery_chart_jun;
        $net_monthly_saving_solar_battery_chart_jul = $net_monthly_charge_solar_plus_battery_chart_jul - $net_monthly_credit_solar_plus_battery_chart_jul;
        $net_monthly_saving_solar_battery_chart_aug = $net_monthly_charge_solar_plus_battery_chart_aug - $net_monthly_credit_solar_plus_battery_chart_aug;
        $net_monthly_saving_solar_battery_chart_sep = $net_monthly_charge_solar_plus_battery_chart_sep - $net_monthly_credit_solar_plus_battery_chart_sep;
        $net_monthly_saving_solar_battery_chart_oct = $net_monthly_charge_solar_plus_battery_chart_oct - $net_monthly_credit_solar_plus_battery_chart_oct;
        $net_monthly_saving_solar_battery_chart_nov = $net_monthly_charge_solar_plus_battery_chart_nov - $net_monthly_credit_solar_plus_battery_chart_nov;
        $net_monthly_saving_solar_battery_chart_dec = $net_monthly_charge_solar_plus_battery_chart_dec - $net_monthly_credit_solar_plus_battery_chart_dec;



        // 'Webpage Output' //

        $E13 = $electricity_charges_without_solar_one + $annual_credit_plus_or_payment_minus_one;
        $N13 = $E13/$electricity_charges_without_solar_one;
        $electricity_charges_without_solar_10 = $electricity_charges_without_solar_one + $electricity_charges_without_solar_two + $electricity_charges_without_solar_three + $electricity_charges_without_solar_four + $electricity_charges_without_solar_five + $electricity_charges_without_solar_six + $electricity_charges_without_solar_seven + $electricity_charges_without_solar_eight + $electricity_charges_without_solar_nine + $electricity_charges_without_solar_ten;
        $annual_credit_plus_or_payment_minus_10 = $annual_credit_plus_or_payment_minus_one + $annual_credit_plus_or_payment_minus_two + $annual_credit_plus_or_payment_minus_three + $annual_credit_plus_or_payment_minus_four + $annual_credit_plus_or_payment_minus_five + $annual_credit_plus_or_payment_minus_six + $annual_credit_plus_or_payment_minus_seven + $annual_credit_plus_or_payment_minus_eight + $annual_credit_plus_or_payment_minus_nine + $annual_credit_plus_or_payment_minus_ten;

        $E15 = $electricity_charges_without_solar_10 +$annual_credit_plus_or_payment_minus_10;
        $E20 = number_format($electricity_charges_without_solar_one - $E13);

        $H20_total = ceil($electricity_charges_without_solar_one + $solar_battery_annual_credit_plus_or_payment_minus_one);
        $H20 = number_format($electricity_charges_without_solar_one - $H20_total);
        $H13 = $electricity_charges_without_solar_one + $solar_battery_annual_credit_plus_or_payment_minus_one;
        $O13 = $H20_total/$electricity_charges_without_solar_one;


        $solar_battery_annual_credit_plus_or_payment_minus_10 = $solar_battery_annual_credit_plus_or_payment_minus_one + $solar_battery_annual_credit_plus_or_payment_minus_two + $solar_battery_annual_credit_plus_or_payment_minus_three + $solar_battery_annual_credit_plus_or_payment_minus_four + $solar_battery_annual_credit_plus_or_payment_minus_five + $solar_battery_annual_credit_plus_or_payment_minus_six + $solar_battery_annual_credit_plus_or_payment_minus_seven + $solar_battery_annual_credit_plus_or_payment_minus_eight + $solar_battery_annual_credit_plus_or_payment_minus_nine + $solar_battery_annual_credit_plus_or_payment_minus_ten;

        $H15 = $electricity_charges_without_solar_10 +$solar_battery_annual_credit_plus_or_payment_minus_10;

        
        if ($E20 < 1) {
            $E20 = 'ZERO';
        }
        if ($H20 < 1) {
            $H20 = 'ZERO';
        }
        $D19 = $zero_energy_charge_one + $zero_energy_charge_two + $zero_energy_charge_three + $zero_energy_charge_four + $zero_energy_charge_five + $zero_energy_charge_six + $zero_energy_charge_seven + $zero_energy_charge_eight + $zero_energy_charge_nine + $zero_energy_charge_ten + $zero_energy_charge_eleven + $zero_energy_charge_twelve + $zero_energy_charge_thirteen + $zero_energy_charge_fourteen + $zero_energy_charge_fifteen + $zero_energy_charge_sixteen + $zero_energy_charge_seventeen + $zero_energy_charge_eighteen + $zero_energy_charge_nineteen + $zero_energy_charge_twenty + $zero_energy_charge_twenty_one + $zero_energy_charge_twenty_two + $zero_energy_charge_twenty_three + $zero_energy_charge_twenty_four + $zero_energy_charge_twenty_five;

        $G19 = $solar_battery_zero_energy_charge_one + $solar_battery_zero_energy_charge_two + $solar_battery_zero_energy_charge_three + $solar_battery_zero_energy_charge_four + $solar_battery_zero_energy_charge_five + $solar_battery_zero_energy_charge_six + $solar_battery_zero_energy_charge_seven + $solar_battery_zero_energy_charge_eight + $solar_battery_zero_energy_charge_nine + $solar_battery_zero_energy_charge_ten + $solar_battery_zero_energy_charge_eleven + $solar_battery_zero_energy_charge_twelve + $solar_battery_zero_energy_charge_thirteen + $solar_battery_zero_energy_charge_fourteen + $solar_battery_zero_energy_charge_fifteen + $solar_battery_zero_energy_charge_sixteen + $solar_battery_zero_energy_charge_seventeen + $solar_battery_zero_energy_charge_eighteen + $solar_battery_zero_energy_charge_nineteen + $solar_battery_zero_energy_charge_twenty + $solar_battery_zero_energy_charge_twenty_one + $solar_battery_zero_energy_charge_twenty_two + $solar_battery_zero_energy_charge_twenty_three + $solar_battery_zero_energy_charge_twenty_four + $solar_battery_zero_energy_charge_twenty_five;
        $J19 = $G19 - $D19;
        $J15 = $solar_battery_annual_credit_plus_or_payment_minus_10 - $annual_credit_plus_or_payment_minus_10;

        // =IF(-1183255<=0,1,
        //     IF(-1500000>0,0,
        //         IF(--1500000/316745>0,--1500000/316745,0)))
        //die($recommended_solar_system_size_kw);
        $data = array(
            "B28" => (float)number_format($recommended_solar_system_size_kw, 1, '.', ''),
            "B30" => (float)number_format($recommended_battery_size_kwh, 2, '.', ''),
            "B33" => (float)number_format($selected_solar_for_battery, 1, '.', ''),
            "C44" => number_format($no_solar_first_year_savings),
            "E20" => $E20,
            "E13" => number_format($E13),
            "N13" => ceil($N13*100),
            "E15" => number_format($E15),
            "D19" => ceil($D19),
            "D23" => (float)number_format($D23, 1, '.', ''),
            "H20" => $H20,
            "H13" => number_format($H13),
            "O13" => ceil($O13*100),
            "H15" => number_format($H15),
            "G19" => ceil($G19),
            "G23" => (float)number_format($G23, 1, '.', ''),
            "J15" => number_format($J15),
            "J19" => ceil($J19),
            "ChartOne_grid_use_without_solar" => $grid_use_without_solar_percentage,
            "ChartOne_grid_use_solar_only" => $grid_use_solar_only_percentage,
            "ChartOne_grid_use_solar_plus_battery" => $grid_use_solar_plus_battery_percentage,
            "ChartOne_self_use_without_solar" => '0',
            "ChartOne_self_use_solar_only" => $self_use_solar_only_percentage,
            "ChartOne_self_use_solar_plus_battery" => $self_use_solar_plus_battery_percentage,
            "ChartOne_net_metered_plus_export_use_without_solar" => '0',
            "ChartOne_net_metered_plus_export_solar_only" => $self_use_solar_only_percentage,
            "ChartOne_net_metered_plus_export_solar_solar_plus_battery" => $net_metered_plus_export_solar_plus_battery_percentage,
            "saving_solar_only_one" => $saving_solar_only_one,
            "saving_solar_only_five" => $saving_solar_only_five,
            "saving_solar_only_ten" => $saving_solar_only_ten,
            "saving_solar_only_fifteen" => $saving_solar_only_fifteen,
            "saving_solar_only_twenty" => $saving_solar_only_twenty,
            "saving_solar_only_twenty_five" => $saving_solar_only_twenty_five,
            "saving_solar_plus_battery_one" => $saving_solar_plus_battery_one,
            "saving_solar_plus_battery_five" => $saving_solar_plus_battery_five,
            "saving_solar_plus_battery_ten" => $saving_solar_plus_battery_ten,
            "saving_solar_plus_battery_fifteen" => $saving_solar_plus_battery_fifteen,
            "saving_solar_plus_battery_twenty" => $saving_solar_plus_battery_twenty,
            "saving_solar_plus_battery_twenty_five" => $saving_solar_plus_battery_twenty_five,
            "net_monthly_charges_no_solar_jan" => ceil($net_monthly_charges_no_solar_jan),
            "net_monthly_charges_no_solar_feb" => ceil($net_monthly_charges_no_solar_feb),
            "net_monthly_charges_no_solar_mar" => ceil($net_monthly_charges_no_solar_mar),
            "net_monthly_charges_no_solar_apr" => ceil($net_monthly_charges_no_solar_apr),
            "net_monthly_charges_no_solar_may" => ceil($net_monthly_charges_no_solar_may),
            "net_monthly_charges_no_solar_jun" => ceil($net_monthly_charges_no_solar_jun),
            "net_monthly_charges_no_solar_jul" => ceil($net_monthly_charges_no_solar_jul),
            "net_monthly_charges_no_solar_aug" => ceil($net_monthly_charges_no_solar_aug),
            "net_monthly_charges_no_solar_sep" => ceil($net_monthly_charges_no_solar_sep),
            "net_monthly_charges_no_solar_oct" => ceil($net_monthly_charges_no_solar_oct),
            "net_monthly_charges_no_solar_nov" => ceil($net_monthly_charges_no_solar_nov),
            "net_monthly_charges_no_solar_dec" => ceil($net_monthly_charges_no_solar_dec),
            "net_monthly_charges_solar_only_jan" => ceil($net_monthly_charges_solar_only_jan),
            "net_monthly_charges_solar_only_feb" => ceil($net_monthly_charges_solar_only_feb),
            "net_monthly_charges_solar_only_mar" => ceil($net_monthly_charges_solar_only_mar),
            "net_monthly_charges_solar_only_apr" => ceil($net_monthly_charges_solar_only_apr),
            "net_monthly_charges_solar_only_may" => ceil($net_monthly_charges_solar_only_may),
            "net_monthly_charges_solar_only_jun" => ceil($net_monthly_charges_solar_only_jun),
            "net_monthly_charges_solar_only_jul" => ceil($net_monthly_charges_solar_only_jul),
            "net_monthly_charges_solar_only_aug" => ceil($net_monthly_charges_solar_only_aug),
            "net_monthly_charges_solar_only_sep" => ceil($net_monthly_charges_solar_only_sep),
            "net_monthly_charges_solar_only_oct" => ceil($net_monthly_charges_solar_only_oct),
            "net_monthly_charges_solar_only_nov" => ceil($net_monthly_charges_solar_only_nov),
            "net_monthly_charges_solar_only_dec" => ceil($net_monthly_charges_solar_only_dec),
            "net_monthly_saving_solar_battery_chart_jan" => ceil($net_monthly_saving_solar_battery_chart_jan),
            "net_monthly_saving_solar_battery_chart_feb" => ceil($net_monthly_saving_solar_battery_chart_feb),
            "net_monthly_saving_solar_battery_chart_mar" => ceil($net_monthly_saving_solar_battery_chart_mar),
            "net_monthly_saving_solar_battery_chart_apr" => ceil($net_monthly_saving_solar_battery_chart_apr),
            "net_monthly_saving_solar_battery_chart_may" => ceil($net_monthly_saving_solar_battery_chart_may),
            "net_monthly_saving_solar_battery_chart_jun" => ceil($net_monthly_saving_solar_battery_chart_jun),
            "net_monthly_saving_solar_battery_chart_jul" => ceil($net_monthly_saving_solar_battery_chart_jul),
            "net_monthly_saving_solar_battery_chart_aug" => ceil($net_monthly_saving_solar_battery_chart_aug),
            "net_monthly_saving_solar_battery_chart_sep" => ceil($net_monthly_saving_solar_battery_chart_sep),
            "net_monthly_saving_solar_battery_chart_oct" => ceil($net_monthly_saving_solar_battery_chart_oct),
            "net_monthly_saving_solar_battery_chart_nov" => ceil($net_monthly_saving_solar_battery_chart_nov),
            "net_monthly_saving_solar_battery_chart_dec" => ceil($net_monthly_saving_solar_battery_chart_dec),
        );
       return response()->json([
            'data' => $data
        ]);
    }


    function npv($rate, $values, $year) {
        $npv = 0;
        for ($i=$year;$i>=0;$i-=1) {
            $npv = ($values[$i] + $npv) / (1 + $rate);
        }
        return $npv;
        // return '$'.number_format($npv,2,'.',' ');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
