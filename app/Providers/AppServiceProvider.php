<?php

namespace App\Providers;

use App\Cart;
use App\Type_product;
use Session;
use Illuminate\Support\ServiceProvider;

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
        //
        view()->composer('layouts/headerfontend' ,function($view){
            $cate = Type_product::all();
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
            }
            $view->with('cate' ,$cate);
        });
        view()->composer('layouts/headerfontend', function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 
                'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty
                ]);
            }
        });

    }
}
