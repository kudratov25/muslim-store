<?php

namespace App\Providers;

use App\Models\Product_type;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();
        Schema::defaultStringLength(191);
        View::composer('layouts.main', function ($view){
            $view->with('current_locale', App::currentLocale());
            $view->with('all_locales', ['uz', 'en', 'ru']);
        });
        View::composer('components.navbar', function($view){
            $view->with('navbar_menu', Product_type::all()->load('product_type_items'));
        });
    }
}
