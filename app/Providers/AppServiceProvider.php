<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

use App\siteTitle;
use App\ShoppingCart;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Logo;
use App\Menu;
use View;

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
        $siteTitle = siteTitle::all();
        View::share('title',$siteTitle);


       
 
         $categories = Category::all();
        View::share('categories',$categories);

        $subcategories = Subcategory::where('categoryId',null)->get();
        View::share('subcategories',$subcategories);

        $subcategories2 = Subcategory::all();
        View::share('subcategories2',$subcategories2);

        $shopping_cart = new ShoppingCart;
        View::share('shopping_cart',$shopping_cart);

        $products_sidebar = Product::all();
        View::share('products_sidebar',$products_sidebar);

       
        $menus = Menu::all();
        View::share('menus',$menus);



        $logo = Logo::find(1);
        View::share('logo',$logo);


       // $cartCount = $cartItemes->count();



    }
}
