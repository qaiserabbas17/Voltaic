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
        $bill = 50000;
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
        $maximum_monthly_energy_used = $bill/$effective_rate;
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
        $peak_battery_charge_available_jan = 0.8 * ($selected_battery_size * 30);
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


        // Usage Distribution Month

        $usage_distribution_jan = $setting->usage_distribution_jan;
        $usage_distribution_feb = $setting->usage_distribution_feb;
        $usage_distribution_mar = $setting->usage_distribution_mar;
        $usage_distribution_apr = $setting->usage_distribution_apr;
        $usage_distribution_may = $setting->usage_distribution_may;
        $usage_distribution_jun = $setting->usage_distribution_jun;
        $usage_distribution_jul = $setting->usage_distribution_jul;
        $usage_distribution_aug = $setting->usage_distribution_aug;
        $usage_distribution_sep = $setting->usage_distribution_sep;
        $usage_distribution_oct = $setting->usage_distribution_oct;
        $usage_distribution_nov = $setting->usage_distribution_nov;
        $usage_distribution_dec = $setting->usage_distribution_dec;
        // Usage Distribution Month

        // Energy Use
        $energy_use_jan = $annual_energy_use * $usage_distribution_jan;
        $energy_use_feb = $annual_energy_use * $usage_distribution_feb;
        $energy_use_mar = $annual_energy_use * $usage_distribution_mar;
        $energy_use_apr = $annual_energy_use * $usage_distribution_apr;
        $energy_use_may = $annual_energy_use * $usage_distribution_may;
        $energy_use_jun = $annual_energy_use * $usage_distribution_jun;
        $energy_use_jul = $annual_energy_use * $usage_distribution_jul;
        $energy_use_aug = $annual_energy_use * $usage_distribution_aug;
        $energy_use_sep = $annual_energy_use * $usage_distribution_sep;
        $energy_use_oct = $annual_energy_use * $usage_distribution_oct;
        $energy_use_nov = $annual_energy_use * $usage_distribution_nov;
        $energy_use_dec = $annual_energy_use * $usage_distribution_dec;
        // Energy Use

        // Daytime Use Months
        $daytime_use_jan = ($daytime_use/100) * $energy_use_jan;
        $daytime_use_feb = $daytime_use/100 * $energy_use_feb;
        $daytime_use_mar = $daytime_use/100 * $energy_use_mar;
        $daytime_use_apr = $daytime_use/100 * $energy_use_apr;
        $daytime_use_may = $daytime_use/100 * $energy_use_may;
        $daytime_use_jun = $daytime_use/100 * $energy_use_jun;
        $daytime_use_jul = $daytime_use/100 * $energy_use_jul;
        $daytime_use_aug = $daytime_use/100 * $energy_use_aug;
        $daytime_use_sep = $daytime_use/100 * $energy_use_sep;
        $daytime_use_oct = $daytime_use/100 * $energy_use_oct;
        $daytime_use_nov = $daytime_use/100 * $energy_use_nov;
        $daytime_use_dec = $daytime_use/100 * $energy_use_dec;
        // Daytime Use Months

        // Nighttime Use Months
        $nighttime_use_jan = $nighttime_use/100 * $energy_use_jan;
        $nighttime_use_feb = $nighttime_use/100 * $energy_use_feb;
        $nighttime_use_mar = $nighttime_use/100 * $energy_use_mar;
        $nighttime_use_apr = $nighttime_use/100 * $energy_use_apr;
        $nighttime_use_may = $nighttime_use/100 * $energy_use_may;
        $nighttime_use_jun = $nighttime_use/100 * $energy_use_jun;
        $nighttime_use_jul = $nighttime_use/100 * $energy_use_jul;
        $nighttime_use_aug = $nighttime_use/100 * $energy_use_aug;
        $nighttime_use_sep = $nighttime_use/100 * $energy_use_sep;
        $nighttime_use_oct = $nighttime_use/100 * $energy_use_oct;
        $nighttime_use_nov = $nighttime_use/100 * $energy_use_nov;
        $nighttime_use_dec = $nighttime_use/100 * $energy_use_dec;
        // Nighttime Use Months

        // On-Peak Use Months
        $on_peak_use_jan = $on_peak_use/100 * $energy_use_jan;
        $on_peak_use_feb = $on_peak_use/100 * $energy_use_feb;
        $on_peak_use_mar = $on_peak_use/100 * $energy_use_mar;
        $on_peak_use_apr = $on_peak_use/100 * $energy_use_apr;
        $on_peak_use_may = $on_peak_use/100 * $energy_use_may;
        $on_peak_use_jun = $on_peak_use/100 * $energy_use_jun;
        $on_peak_use_jul = $on_peak_use/100 * $energy_use_jul;
        $on_peak_use_aug = $on_peak_use/100 * $energy_use_aug;
        $on_peak_use_sep = $on_peak_use/100 * $energy_use_sep;
        $on_peak_use_oct = $on_peak_use/100 * $energy_use_oct;
        $on_peak_use_nov = $on_peak_use/100 * $energy_use_nov;
        $on_peak_use_dec = $on_peak_use/100 * $energy_use_dec;
        // On-Peak Use Months

        // Self Use

        $self_use_jan = $daytime_use_jan;
        $self_use_feb = $daytime_use_feb;
        $self_use_mar = $daytime_use_mar;
        $self_use_apr = $daytime_use_apr;
        $self_use_may = $daytime_use_may;
        $self_use_jun = $daytime_use_jun;
        $self_use_jul = $daytime_use_jul;
        $self_use_aug = $daytime_use_aug;
        $self_use_sep = $daytime_use_sep;
        $self_use_oct = $daytime_use_oct;
        $self_use_nov = $daytime_use_nov;
        $self_use_dec = $daytime_use_dec;
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

        // echo $excess_generation_jan. '<br/>';
        // echo $excess_generation_feb. '<br/>';
        // echo $excess_generation_mar. '<br/>';
        // echo $excess_generation_apr. '<br/>';
        // echo $excess_generation_may. '<br/>';
        // echo $excess_generation_jun. '<br/>';
        // echo $excess_generation_jul. '<br/>';
        // echo $excess_generation_aug. '<br/>';
        // echo $excess_generation_sep. '<br/>';
        // echo $excess_generation_oct. '<br/>';
        // echo $excess_generation_nov. '<br/>';
        // echo $excess_generation_dec. '<br/>';
        // echo $excess_generation;die;

        //Excess Generation 

        // Off-Peak Imports
        $off_peak_imports_1st_year_usage = 4135;
        $off_peak_imports_1st_year_charges = $off_peak_imports_1st_year_usage * $off_peack_rate_with_gst;

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
        $net_metered_off_peak_oct = min($excess_generation_oct,$nighttime_use_oct);
        $net_metered_off_peak_sep = min($excess_generation_sep,$nighttime_use_sep);
        $net_metered_off_peak_nov = min($excess_generation_nov,$nighttime_use_nov);
        $net_metered_off_peak_dec = min($excess_generation_dec,$nighttime_use_dec);

        $net_metered_off_peak_1st_year_usage = 3779;
        $net_metered_off_peak_1st_year_charges = $net_metered_off_peak_1st_year_usage * $off_peack_rate;

        
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
        $excess_export_oct = $excess_generation_oct - $net_metered_off_peak_oct;
        $excess_export_nov = $excess_generation_nov - $net_metered_off_peak_nov;
        $excess_export_dec = $excess_generation_dec - $net_metered_off_peak_dec;

        $excess_export_1st_year_usage = 8215;
        $excess_export_1st_year_charges = 8215 * $export_rate;
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
        // echo round($net_metered_off_peak_jun); echo '<br/>';
        // echo round($nighttime_use_jun);die();

        $off_peak_import_after_netting_off_1st_year_usage = round($off_peak_import_after_netting_off_jan) + round($off_peak_import_after_netting_off_feb) + round($off_peak_import_after_netting_off_mar) + round($off_peak_import_after_netting_off_apr) + round($off_peak_import_after_netting_off_may) + round($off_peak_import_after_netting_off_jun) + round($off_peak_import_after_netting_off_jul) + round($off_peak_import_after_netting_off_aug) + round($off_peak_import_after_netting_off_sep) + round($off_peak_import_after_netting_off_oct) + round($off_peak_import_after_netting_off_nov) + round($off_peak_import_after_netting_off_dec);
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

        $on_peak_import_1st_year_usage = 2757;
        $on_peak_import_1st_year_charges = $on_peak_import_1st_year_usage * $on_peack_rate_with_gst;
        // On-Peak Import

        // Credits from (+)/Payment to (-) Utlity
        $credits_from_payment_utlity = ($net_metered_off_peak_1st_year_charges + $excess_export_1st_year_charges) - ($off_peak_imports_1st_year_charges + $on_peak_import_1st_year_charges);


        // Gird Only (No Solar)

        $no_solar_off_peak_first_year_usage = $daytime_use_jan + $daytime_use_feb + $daytime_use_mar + $daytime_use_apr + $daytime_use_may + $daytime_use_jun + $daytime_use_jul + $daytime_use_aug + $daytime_use_sep + $daytime_use_oct + $daytime_use_nov + $daytime_use_dec + $nighttime_use_jan + $nighttime_use_feb + $nighttime_use_mar + $nighttime_use_apr + $nighttime_use_may + $nighttime_use_jun + $nighttime_use_jul + $nighttime_use_aug + $nighttime_use_sep + $nighttime_use_oct + $nighttime_use_nov + $nighttime_use_dec;

        $no_solar_off_peak_first_year_charges = $no_solar_off_peak_first_year_usage  * $off_peack_rate_with_gst;

        $no_solar_on_peak_first_year_usage = $on_peak_use_jan + $on_peak_use_feb + $on_peak_use_mar + $on_peak_use_apr + $on_peak_use_may + $on_peak_use_jun + $on_peak_use_jul + $on_peak_use_aug + $on_peak_use_sep + $on_peak_use_oct + $on_peak_use_nov + $on_peak_use_dec;

        $no_solar_on_peak_first_year_charges = $no_solar_on_peak_first_year_usage * $on_peack_rate_with_gst;


        // Gird Only (No Solar)



        // 1st Year Savings
        $first_year_savings = $no_solar_off_peak_first_year_charges + $no_solar_on_peak_first_year_charges;

        //Electricity Charges without Solar
        $electricity_charges_without_solar = $first_year_savings;

        $electricity_charges_without_solar_2nd = $electricity_charges_without_solar * (1+$annual_rate_escalation/100) / (2-1);



        echo '<h1 style="width: 100%;">Gird Only (No Solar)</h1>';

        echo '<p style="width: 400px;float: left;margin: 0;">Off-Peak</p>'. round($no_solar_off_peak_first_year_usage).' - ' . round($no_solar_off_peak_first_year_charges) .'<br/>';
         echo '<p style="width: 400px;float: left;margin: 0;">On-Peak</p>'. round($no_solar_on_peak_first_year_usage).' - ' . round($no_solar_on_peak_first_year_charges) .'<br/>';

        echo '<p style="width: 400px;float: left;margin: 0;">1st Year Energy Charge</p> '.' ------ '. round($first_year_savings).'<br/>';

         echo '<p style="width: 400px;float: left;margin: 0;">Year</p> '.' ------ '. round(1).'<br/>';
         echo '<p style="width: 400px;float: left;margin: 0;">Electricity Charges without Solar</p> '.' ------ '. round($electricity_charges_without_solar).'<br/>';

         echo '<p style="width: 400px;float: left;margin: 0;">Year</p> '.' ------ '.round(2).'<br/>';
         echo '<p style="width: 400px;float: left;margin: 0;">Electricity Charges without Solar</p> '.' ------ ' . round($electricity_charges_without_solar_2nd).'<br/>';


        echo '<h1 style="width: 100%;">Solar Only</h1>';

        echo '<p style="width: 400px;float: left;margin: 0;">Total Solar Generation</p>'. round($total_solar_generation).' ------ '.'<br/>';
        echo '<p style="width: 400px;float: left;margin: 0;">Self Use</p>'. round($self_use).' ------ '.'<br/>';
        echo '<p style="width: 400px;float: left;margin: 0;">Excess Generation</p>'. round($excess_generation).'<br/>';

        echo '<br/>';


        echo '<p style="width: 400px;float: left;margin: 0;">Off-Peak Imports</p>'. round($off_peak_imports_1st_year_charges).'<br/>';
        echo '<p style="width: 400px;float: left;margin: 0;">Net metered Off-Peak</p>'. round($net_metered_off_peak_1st_year_charges).'<br/>';
        echo '<p style="width: 400px;float: left;margin: 0;">Excess Export</p>'. round($excess_export_1st_year_charges).'<br/>';
        echo '<p style="width: 400px;float: left;margin: 0;">On-Peak Import</p>'. round($on_peak_import_1st_year_charges).'<br/>';
        echo '<p style="width: 400px;float: left;margin: 0;">Credits from (+)/Payment to (-) Utlity</p> ' . round($off_peack_rate_with_gst);

        //return round($credits_from_payment_utlity);
        //return round($daytime_use_jan);
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
