<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;
use App\Models\CategorySub;
use App\Models\Category;

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
        //Cart

        view()->composer('*', function ($view) {
            
            $cart = \Cart::content();
            $cart_count = \Cart::count();
            $totalprice_cart = array();
            $sku_cart = count($cart);
            foreach($cart as $key => $item){
                $totalprice_cart[] = ($item->options->subproduct['price'] * $item->qty);
            }

            $top_netcart = array_sum($totalprice_cart);

            $top_netcart = number_format($top_netcart,2);

            $categorie_sub = CategorySub::where('conf_categorysub_active', 1)->orderBy('conf_category_id', 'asc')->get();


            $catmanu = Category::where('conf_category_active',1)
            ->whereIn('conf_category_id',[20,21,22,23,24,28,29,30,31,35])->get();

    
            $arr_cate = array();
    
            foreach($categorie_sub as $cate){
    
    
                if(!in_array($cate->conf_category_id, $arr_cate)){
    
                    $arr_cate[] = $cate->conf_category_id;
                
                }
                
            }



            $view->with(['cart' => $cart, 'cart_count' => $cart_count, 'totalprice_cart' => $top_netcart, 'sku_cart' => $sku_cart, 'categorie_sub' => $categorie_sub, 'catmanu' => $catmanu, 'arr_cate' => $arr_cate]);
        });
        
    }
}
