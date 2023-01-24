<?php

namespace App\Providers;

use App\Models\Product_type;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class MenuProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.navbar', function ($view) {

            $view->with('navbar_menu', Product_type::all()->load('product_type_items'));
        });
    }
}
