<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsetting', function (Blueprint $table) {
            $table->id();
            $table->string('on_peack_rate');
            $table->string('off_peack_rate');
            $table->string('export_rate');
            $table->string('annual_rate_escalation');
            $table->string('export_rate_escalation');
            $table->string('daytime_use');
            $table->string('on_peak_use');
            $table->string('panel_structure_cost_per_kw');
            $table->string('system_cost_per_kw');
            $table->string('battery_cost_per_kwh');
            $table->string('usd_to_pkr_exchange_rate');
            $table->string('usage_distribution_jan');
            $table->string('usage_distribution_feb');
            $table->string('usage_distribution_mar');
            $table->string('usage_distribution_apr');
            $table->string('usage_distribution_may');
            $table->string('usage_distribution_jun');
            $table->string('usage_distribution_jul');
            $table->string('usage_distribution_aug');
            $table->string('usage_distribution_sep');
            $table->string('usage_distribution_oct');
            $table->string('usage_distribution_nov');
            $table->string('usage_distribution_dec');            
            $table->string('solor_generation_per_kw_jan');
            $table->string('solor_generation_per_kw_feb');
            $table->string('solor_generation_per_kw_mar');
            $table->string('solor_generation_per_kw_apr');
            $table->string('solor_generation_per_kw_may');
            $table->string('solor_generation_per_kw_jun');
            $table->string('solor_generation_per_kw_jul');
            $table->string('solor_generation_per_kw_aug');
            $table->string('solor_generation_per_kw_sep');
            $table->string('solor_generation_per_kw_oct');
            $table->string('solor_generation_per_kw_nov');
            $table->string('solor_generation_per_kw_dec');
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
        Schema::dropIfExists('generalsetting');
    }
}
