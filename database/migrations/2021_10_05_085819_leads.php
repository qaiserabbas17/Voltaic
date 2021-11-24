<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Leads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('bill_image')->nullable();
            $table->string('sale_person_name')->nullable();
            $table->string('sale_email')->nullable();
            $table->string('sale_phone')->nullable();
            $table->string('monthly_electricity_usage_jan')->nullable();
            $table->string('monthly_electricity_usage_feb')->nullable();
            $table->string('monthly_electricity_usage_mar')->nullable();
            $table->string('monthly_electricity_usage_apr')->nullable();
            $table->string('monthly_electricity_usage_may')->nullable();
            $table->string('monthly_electricity_usage_jun')->nullable();
            $table->string('monthly_electricity_usage_jul')->nullable();
            $table->string('monthly_electricity_usage_aug')->nullable();
            $table->string('monthly_electricity_usage_sep')->nullable();
            $table->string('monthly_electricity_usage_oct')->nullable();
            $table->string('monthly_electricity_usage_nov')->nullable();
            $table->string('monthly_electricity_usage_dec')->nullable();
            $table->string('on_peak_total')->nullable();
            $table->string('sanctioned_load')->nullable();
            $table->string('number_of_inverter')->nullable();
            $table->string('solar_only_select_solar_system_size_kw')->nullable();
            $table->string('select_battery_size_kwh')->nullable();
            $table->string('battery_and_solar_select_solar_system_size_kw')->nullable();
            $table->string('effcient_on_peak')->nullable();
            $table->string('escalation_rate')->nullable();
            $table->string('solar_only')->nullable();
            $table->string('solar_plus_battery')->nullable();
            $table->string('C63')->nullable();
            $table->string('C16')->nullable();
            $table->string('F18')->nullable();
            $table->string('F19')->nullable();
            $table->string('F20')->nullable();
            $table->string('F21')->nullable();
            $table->string('B31')->nullable();
            $table->string('B32')->nullable();
            $table->string('B33')->nullable(); 
            $table->string('E20')->nullable();
            $table->string('E13')->nullable();
            $table->string('N13')->nullable(); 
            $table->string('E15')->nullable();
            $table->string('D19')->nullable();
            $table->string('H20')->nullable();  
            $table->string('H13')->nullable(); 
            $table->string('O13')->nullable();
            $table->string('H15')->nullable();
            $table->string('G19')->nullable();
            $table->string('J15')->nullable();  
            $table->string('J19')->nullable();
            $table->string('E18')->nullable();  
            $table->string('H18')->nullable(); 
            $table->string('C106')->nullable();
            $table->string('B96')->nullable();   
            $table->string('B67')->nullable();  
            $table->string('C112')->nullable();   
            $table->string('C164')->nullable();
            $table->string('annual_energy_grid_use_solar_only')->nullable();
            $table->string('annual_energy_grid_use_solar_plus_battery')->nullable();
            $table->string('annual_energy_self_use_solar_only')->nullable();
            $table->string('annual_energy_self_use_solar_plus_battery')->nullable();
            $table->string('annual_energy_net_metered_solar_only')->nullable();
            $table->string('annual_energy_net_metered_solar_plus_battery')->nullable();
            $table->string('net_monthly_charges_no_solar_jan')->nullable();
            $table->string('net_monthly_charges_no_solar_feb')->nullable();
            $table->string('net_monthly_charges_no_solar_mar')->nullable();
            $table->string('net_monthly_charges_no_solar_apr')->nullable();
            $table->string('net_monthly_charges_no_solar_may')->nullable();
            $table->string('net_monthly_charges_no_solar_jun')->nullable();
            $table->string('net_monthly_charges_no_solar_jul')->nullable();
            $table->string('net_monthly_charges_no_solar_aug')->nullable();
            $table->string('net_monthly_charges_no_solar_sep')->nullable();
            $table->string('net_monthly_charges_no_solar_oct')->nullable();
            $table->string('net_monthly_charges_no_solar_nov')->nullable();
            $table->string('net_monthly_charges_no_solar_dec')->nullable();
            $table->string('net_monthly_charges_solar_only_jan')->nullable();
            $table->string('net_monthly_charges_solar_only_feb')->nullable();
            $table->string('net_monthly_charges_solar_only_mar')->nullable();
            $table->string('net_monthly_charges_solar_only_apr')->nullable();
            $table->string('net_monthly_charges_solar_only_may')->nullable();
            $table->string('net_monthly_charges_solar_only_jun')->nullable();
            $table->string('net_monthly_charges_solar_only_jul')->nullable();
            $table->string('net_monthly_charges_solar_only_aug')->nullable();
            $table->string('net_monthly_charges_solar_only_sep')->nullable();
            $table->string('net_monthly_charges_solar_only_oct')->nullable();
            $table->string('net_monthly_charges_solar_only_nov')->nullable();
            $table->string('net_monthly_charges_solar_only_dec')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_jan')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_feb')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_mar')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_apr')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_may')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_jun')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_jul')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_aug')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_sep')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_oct')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_nov')->nullable();
            $table->string('net_monthly_saving_solar_battery_chart_dec')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_usage')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_one')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_two')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_three')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_four')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_five')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_six')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_seven')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_eight')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_nine')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_ten')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_eleven')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_twelve')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_thirteen')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_fourteen')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_fifteen')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_sixteen')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_seventeen')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_eighteen')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_nineteen')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_twenty')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_twenty_one')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_twenty_two')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_twenty_three')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_twenty_four')->nullable();
            $table->string('solar_only_cumulative_payback_cash_flow_PKR_twenty_five')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_usage')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_one')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_two')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_three')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_four')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_five')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_six')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_seven')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_eight')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_nine')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_ten')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_eleven')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_twelve')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_thirteen')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_fourteen')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_fifteen')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_sixteen')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_seventeen')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_eighteen')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_nineteen')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_one')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_two')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_three')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_four')->nullable();
            $table->string('solar_plus_battery_cumulative_payback_cash_flow_PKR_twenty_five')->nullable();

            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
