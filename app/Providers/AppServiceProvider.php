<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Model\Partner;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {

        if (file_exists(base_path('config/itconfiguration.php'))) {
            Schema::defaultStringLength(config('itconfiguration.SchemadefaultStringLength'));
            if (config('itconfiguration.ForeignKeyConstraints')) {
                Schema::enableForeignKeyConstraints();
            } else {
                Schema::disableForeignKeyConstraints();
            }
        }

        // $Partners = Partner::all();
        // view()->share('Partners', $Partners);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
