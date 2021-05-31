<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Famille;
use Illuminate\Support\ServiceProvider;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {      
        view::composer('frontend.partials.navbar', function ($view){
            $view->with('cartCount', \Cart::getContent()->count());
            $view->with('carts', \Cart::getContent());
            $view->with('total_price', \Cart::getSubTotal());
        });

        view::composer('frontend.partials.mobil_menu', function($view) {
            $view->with('cartCount', \Cart::getContent()->count());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $familles = Famille::where('status', 1)
                            ->with('categories')
                            ->orderBy('name', 'asc')
                            ->get();

        view::composer('frontend.partials.navbar', function ($view) use ($familles) {
            $view->with('familles', $familles);
        });

        $currencies = DB::table('currencies')
                                ->orderBy('name', 'asc')
                                ->get();


        view::composer('frontend.partials.header', function($view)  use ($currencies){
            $view->with('currencies', $currencies);
        });
    }
}
