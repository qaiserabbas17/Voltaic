<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSetting;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('setting_data', function () {
            $data = GeneralSetting::orderBy('id','desc')->paginate(1);
            return $data;
        });
        $this->app->singleton('products', function () {
            $data = Product::get();
            return $data;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
