<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $table = 'generalsetting';

    protected $fillable = [
       
       'on_peack_rate','off_peack_rate','export_rate','annual_rate_escalation','export_rate_escalation','daytime_use','on_peak_use','panel_structure_cost_per_kw','system_cost_per_kw','battery_cost_per_kwh','usd_to_pkr_exchange_rate','usage_distribution_jan','usage_distribution_feb','usage_distribution_mar','usage_distribution_apr','usage_distribution_may','usage_distribution_jun','usage_distribution_jul','usage_distribution_aug','usage_distribution_sep','usage_distribution_oct','usage_distribution_nov','usage_distribution_dec','solor_generation_per_kw_jan','solor_generation_per_kw_feb','solor_generation_per_kw_mar','solor_generation_per_kw_apr','solor_generation_per_kw_may','solor_generation_per_kw_jun','solor_generation_per_kw_jul','solor_generation_per_kw_aug','solor_generation_per_kw_sep','solor_generation_per_kw_oct','solor_generation_per_kw_nov','solor_generation_per_kw_dec'
    ];
}
