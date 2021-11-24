<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'sale_person_name',
        'sale_email',
        'sale_phone',
        'monthly_electricity_usage_jan',
        'monthly_electricity_usage_feb',
        'monthly_electricity_usage_mar',
        'monthly_electricity_usage_apr',
        'monthly_electricity_usage_may',
        'monthly_electricity_usage_jun',
        'monthly_electricity_usage_jul',
        'monthly_electricity_usage_aug',
        'monthly_electricity_usage_sep',
        'monthly_electricity_usage_oct',
        'monthly_electricity_usage_nov',
        'monthly_electricity_usage_dec',
        'on_peak_total',
        'sanctioned_load',
        'number_of_inverter',
        'solar_only_select_solar_system_size_kw',
        'select_battery_size_kwh',
        'battery_and_solar_select_solar_system_size_kw_',
        'effcient_on_peak',
        'escalation_rate',
        'solar_only',
        'solar_plus_battery',
        'status'
    ];
}
