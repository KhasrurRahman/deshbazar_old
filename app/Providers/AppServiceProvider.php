<?php

namespace App\Providers;

use App\ProductCategory;
use App\ProductCountry;
use App\ProductDistrict;
use App\ProductDivision;
use App\ProductSubcategory;
use App\WebsiteInformation;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.includes.header',function($view){
            $view->with('websiteInformation' , WebsiteInformation::find(1));
        });
        View::composer('frontend.includes.location-modal',function($view){
//            $view->with('productCountries' , ProductCountry::where('publication_status',1)->get())
//                ->with('divisions' , ProductDivision::where('publication_status',1)->get())
//                ->with('productDistricts' , ProductDistrict::where('publication_status',1)->get());


            $view->with([
                'productCountries' => ProductCountry::where('publication_status',1)->get(),
                'divisions' => ProductDivision::where('publication_status',1)->get(),
                'productDistricts' => ProductDistrict::where('publication_status',1)->get()
            ]);
        });
        View::composer('frontend.includes.category-modal',function($view){

                        $view->with('productCategories' , ProductCategory::where('publication_status',1)->get())
                ->with('productSubcategories' , ProductSubcategory::where('publication_status',1)->get());

        });
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
