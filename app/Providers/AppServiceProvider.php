<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product_type;
use App\Models\Wishlist;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        View::composer('layouts.main', function ($view) {
            if (Auth::guest()) {
                $view->with('current_locale', App::currentLocale())
                    ->with('all_locales', config('app.all_locales'));
            }
            if (!Auth::guest()) {
                $view->with('current_locale', App::currentLocale())
                    ->with('all_locales', config('app.all_locales'))
                    ->with('wishlist', Wishlist::where('user_id', Auth()->user()->id))
                    ->with('orders', Order::where('user_id', Auth()->user()->id)->limit(5)->get())
                    ->with('orders_count', Order::where('user_id', Auth()->user()->id)->count());
            }
        });
    }
}
