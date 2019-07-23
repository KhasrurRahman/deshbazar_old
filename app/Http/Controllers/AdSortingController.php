<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductDetail;
use App\ProductDivision;
use App\TopAdDetail;
use Illuminate\Http\Request;
use App\Support\Collection;
use DB;

class AdSortingController extends Controller
{
    private function topAdCollection(){
        $topAds = ProductDetail::where('top_ad',1)->get();
        $currentTime = date("Y-m-d h:i:s");
        foreach ($topAds as $topAd){
            $id = $topAd->id;
            $getValidAd = TopAdDetail::where('ad_id',$id)->first();
            if ($currentTime > $getValidAd->end_date){
                $topAd->top_ad = 0;
                $topAd->save();

                $getValidAd->delete();
            }
        }

        $topAds = DB::table('product_details')
            ->where('product_details.top_ad','=',1)
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('product_details.updated_at','DESC')
            ->take(3)
            ->get();
        return $topAds;
    }
    private function category(){
        $categories = ProductCategory::withCount('products')
            ->orderBy('products_count','desc')->get();
        return $categories;
    }
    private function division(){
        $divisions = ProductDivision::where('publication_status',1)
            ->withCount('divisionalProducts')
            ->orderBy('divisional_products_count','desc')->get();
        return $divisions;
    }
    public function index(){
        $topAds = $this ->topAdCollection();
        $categories = $this->category();
        $divisions = $this->division();
        $products = DB::table('product_details')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->get();
        $jobs = DB::table('job_details')
            ->where('job_details.publication_status','=','Published')
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_districts.district_name')
            ->get();
        $items = $products->merge($jobs)->sortBy('updated_at')->values()->all();
        $products = (new Collection($items))->paginate(5);
        return view('frontend.all-ad.asc-date-ad', [
            'topAds'=>$topAds,
            'products'=>$products,
            'categories'=>$categories,
            'divisions'=>$divisions,
        ]);
    }
    public function priceDesc(){
        $topAds = $this ->topAdCollection();
        $categories = $this->category();
        $divisions = $this->division();
        $products = DB::table('product_details')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('product_details.product_price','desc')
            ->get();
        $jobs = DB::table('job_details')
            ->where('job_details.publication_status','=','Published')
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_districts.district_name')
            ->get();
        $items = $products->merge($jobs);
        $products = (new Collection($items))->paginate(5);
        return view('frontend.all-ad.desc-price-ad', [
            'topAds'=>$topAds,
            'products'=>$products,
            'categories'=>$categories,
            'divisions'=>$divisions,
        ]);
    }
    public function priceAsc(){
        $topAds = $this ->topAdCollection();
        $categories = $this->category();
        $divisions = $this->division();
        $products = DB::table('product_details')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('product_details.product_price','asc')
            ->get();
        $jobs = DB::table('job_details')
            ->where('job_details.publication_status','=','Published')
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_districts.district_name')
            ->get();
        $items = $products->merge($jobs);
        $products = (new Collection($items))->paginate(5);
        return view('frontend.all-ad.asc-price-ad', [
            'topAds'=>$topAds,
            'products'=>$products,
            'categories'=>$categories,
            'divisions'=>$divisions,
        ]);

    }
}
