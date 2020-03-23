<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent;
use App\Models\Product;

use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site3.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
            //dd($view);
        });

        View::composer('site3.partials.nav', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });

//        View::composer('site3.pages.cart', function ($view) {
//            $view->with('product', Product::all());
//        });

    }
}
