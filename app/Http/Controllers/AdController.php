<?php

namespace App\Http\Controllers;

use App\JobDetail;
use App\ProductCategory;
use App\ProductDetail;
use App\ProductDistrict;
use App\ProductDivision;
use App\ProductInformation;
use App\ProductSubcategory;
use App\PropertyDetail;
use App\TopAdDetail;
use Illuminate\Http\Request;
use DB;
use App\Support\Collection;

class AdController extends Controller
{
    public function index(){
        $topAds1 = ProductDetail::where('top_ad',1)->get();
        $topAds2 = PropertyDetail::where('top_ad',1)->get();
        $topAds3 = JobDetail::where('top_ad',1)->get();
        $currentTime = date("Y-m-d h:i:s");
        foreach ($topAds1 as $topAd1){
            $id = $topAd1->information_id;
            $getValidAd = TopAdDetail::where('ad_info_id',$id)->first();
            if ($currentTime > $getValidAd->end_date){
                $topAd1->top_ad = 0;
                $topAd1->save();

//                $getValidAd->delete();
            }
        }
        foreach ($topAds2 as $topAd2){
            $id = $topAd2->information_id;
            $getValidAd = TopAdDetail::where('ad_info_id',$id)->first();
            if ($currentTime > $getValidAd->end_date){
                $topAd2->top_ad = 0;
                $topAd2->save();
            }
        }
        foreach ($topAds3 as $topAd3){
            $id = $topAd3->information_id;
            $getValidAd = TopAdDetail::where('ad_info_id',$id)->first();
            if ($currentTime > $getValidAd->end_date){
                $topAd3->top_ad = 0;
                $topAd3->save();
            }
        }

        $topAds1 = DB::table('product_details')
            ->where('product_details.top_ad','=',1)
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->get();
        $topAds2 = DB::table('property_details')
            ->where('property_details.top_ad','=',1)
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->join('product_informations','property_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('property_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->get();
        $topAds3 = DB::table('job_details')
            ->where('job_details.top_ad','=',1)
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_subcategories.subcategory_name','product_districts.district_name')
            ->get();
        $topAds = $topAds1->concat($topAds2)->concat($topAds3)->sortByDesc('updated_at')->take(4);

        $products = DB::table('product_details')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
//            ->orderBy('product_details.product_price','asc')
            ->get();
//return $products;
        $properties = DB::table('property_details')
            ->where('property_details.publication_status','=','Published')
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->join('product_informations','property_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('property_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
//            ->orderBy('product_details.product_price','asc')
            ->get();
        $jobs = DB::table('job_details')
            ->where('job_details.publication_status','=','Published')
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_subcategories.subcategory_name','product_districts.district_name')
            ->get();

//        $items = $products->concat($jobs)->sortByDesc('updated_at');
        $items = $products->merge($properties)->merge($jobs)->sortByDesc('updated_at')->values()->all();
//        return $items;
        $products = (new Collection($items))->paginate(20);
//        $totalAd = $products->total();
//        $currentPage = $products->currentPage();
//        $perPage = $products->perPage();
        $categories = ProductCategory::withCount('products')
            ->orderBy('products_count','desc')->get();
//
        $divisions = ProductDivision::where('publication_status',1)
            ->withCount('divisionalProducts')
            ->orderBy('divisional_products_count','desc')->get();
        return view('frontend.all-ad.all-ad-view',[
            'topAds'=>$topAds,
            'products'=>$products,
            'categories'=>$categories,
            'divisions'=>$divisions,
            ]);
    }
    public function singleProductView($id){
        $product = DB::table('product_details')
            ->where('product_details.id','=',$id)
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('front_users','product_informations.user_id','=','front_users.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_informations.subcategory_id','product_informations.district_id','product_images.product_image1','product_images.product_image2','product_images.product_image3','front_users.name','front_users.phone_number','product_districts.district_name')
            ->first();

        $subCategory = ProductSubcategory::where('id',$product->subcategory_id)->first();
        $cat = ProductCategory::where('id',$subCategory->category_id)->first();
        $district = ProductDistrict::where('id',$product->district_id)->first();
        $div = ProductDivision::where('id',$district->division_id)->first();

        $similarAds1 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$product->subcategory_id)
            ->join('product_details','product_informations.id','=','product_details.information_id')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('product_details.updated_at','DESC')
            ->take(4)
            ->get();
        $similarAds2 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$product->subcategory_id)
            ->join('product_details','product_informations.id','=','product_details.information_id')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('product_details.updated_at','DESC')
            ->skip(4)->take(4)
            ->get();
        $similarAds3 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$product->subcategory_id)
            ->join('product_details','product_informations.id','=','product_details.information_id')
            ->where('product_details.publication_status','=','Published')
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('product_details.updated_at','DESC')
            ->skip(8)->take(4)
            ->get();

        return view('frontend.all-ad.single-product-content',[
            'product'=>$product,
            'cat'=>$cat,
            'div'=>$div,
            'subCategory'=>$subCategory,
            'district'=>$district,
            'similarAds1'=>$similarAds1,
            'similarAds2'=>$similarAds2,
            'similarAds3'=>$similarAds3,
            ]);
    }



    public function singlePropertyView($id){
        $property = DB::table('property_details')
            ->where('property_details.id','=',$id)
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->join('product_informations','property_details.information_id','=','product_informations.id')
            ->join('front_users','product_informations.user_id','=','front_users.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('property_details.*','product_informations.subcategory_id','product_informations.district_id','product_images.product_image1','product_images.product_image2','product_images.product_image3','front_users.name','front_users.phone_number','product_districts.district_name')
            ->first();
//return $property;

        $subCategory = ProductSubcategory::where('id',$property->subcategory_id)->first();
        $cat = ProductCategory::where('id',$subCategory->category_id)->first();
        $district = ProductDistrict::where('id',$property->district_id)->first();
        $div = ProductDivision::where('id',$district->division_id)->first();

        $similarAds1 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$property->subcategory_id)
            ->join('property_details','product_informations.id','=','property_details.information_id')
            ->where('property_details.publication_status','=','Published')
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('property_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('property_details.updated_at','DESC')
            ->take(4)
            ->get();
        $similarAds2 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$property->subcategory_id)
            ->join('property_details','product_informations.id','=','property_details.information_id')
            ->where('property_details.publication_status','=','Published')
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('property_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('property_details.updated_at','DESC')
            ->skip(4)->take(4)
            ->get();
        $similarAds3 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$property->subcategory_id)
            ->join('property_details','product_informations.id','=','property_details.information_id')
            ->where('property_details.publication_status','=','Published')
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('property_details.*','product_images.product_image1','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('property_details.updated_at','DESC')
            ->skip(8)->take(4)
            ->get();

        return view('frontend.all-ad.single-property-content',[
            'property'=>$property,
            'cat'=>$cat,
            'div'=>$div,
            'subCategory'=>$subCategory,
            'district'=>$district,
            'similarAds1'=>$similarAds1,
            'similarAds2'=>$similarAds2,
            'similarAds3'=>$similarAds3,
        ]);
    }
    public function singleJobView($id){
        $job = DB::table('job_details')
            ->where('job_details.id','=',$id)
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->join('front_users','product_informations.user_id','=','front_users.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_informations.subcategory_id','product_informations.district_id','front_users.name','front_users.phone_number','product_districts.district_name')
            ->first();

        $subCategory = ProductSubcategory::where('id',$job->subcategory_id)->first();
        $cat = ProductCategory::where('id',$subCategory->category_id)->first();
        $district = ProductDistrict::where('id',$job->district_id)->first();
        $div = ProductDivision::where('id',$district->division_id)->first();

        $similarAds1 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$job->subcategory_id)
            ->join('job_details','product_informations.id','=','job_details.information_id')
            ->where('job_details.publication_status','=','Published')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('job_details.updated_at','DESC')
            ->take(4)
            ->get();
        $similarAds2 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$job->subcategory_id)
            ->join('job_details','product_informations.id','=','job_details.information_id')
            ->where('job_details.publication_status','=','Published')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('job_details.updated_at','DESC')
            ->skip(4)->take(4)
            ->get();
        $similarAds3 = DB::table('product_informations')
            ->where('product_informations.subcategory_id','=',$job->subcategory_id)
            ->join('job_details','product_informations.id','=','job_details.information_id')
            ->where('job_details.publication_status','=','Published')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_subcategories.subcategory_name','product_districts.district_name')
            ->orderBy('job_details.updated_at','DESC')
            ->skip(8)->take(4)
            ->get();
        return view('frontend.all-ad.single-job-content',[
            'job'=>$job,
            'cat'=>$cat,
            'div'=>$div,
            'subCategory'=>$subCategory,
            'district'=>$district,
            'similarAds1'=>$similarAds1,
            'similarAds2'=>$similarAds2,
            'similarAds3'=>$similarAds3,
            ]);
    }

}
