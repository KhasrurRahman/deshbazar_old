<?php

namespace App\Http\Controllers;

use App\FrontUser;
use App\ProductCategory;
use App\ProductCountry;
use App\ProductDetail;
use App\ProductDistrict;
use App\ProductDivision;
use App\ProductImage;
use App\ProductInformation;
use App\ProductSubcategory;
use Illuminate\Http\Request;
use DB;
use Session;
use Image;

class ProductSellController extends Controller
{
    public function index(){
        $productCategories = DB::table('product_categories')
            ->where('publication_status','=',1)
            ->whereNotIn('category_name',['চাকরি ও নিয়োগ বিজ্ঞপ্তি','প্রপার্টি অ্যান্ড ভাড়া'])->get();
        $productSubcategories = ProductSubcategory::where('publication_status',1)->get();

        return view('frontend.products-category.product-category-content',[
            'productCategories'=>$productCategories,
            'productSubcategories'=>$productSubcategories,
        ]);
    }
    public function productLocation($categoryId,$subcategoryId){
        $productCountries = ProductCountry::where('publication_status',1)->get();
        $productDivisions = ProductDivision::where('publication_status',1)->get();
        $productDistricts = ProductDistrict::where('publication_status',1)->get();
        return view('frontend.products-location.product-location',[
            'categoryId'=>$categoryId,
            'subcategoryId'=>$subcategoryId,
            'productCountries'=>$productCountries,
            'productDivisions'=>$productDivisions,
            'productDistricts'=>$productDistricts,
        ]);
    }
    public function productDescription($categoryId,$subcategoryId,$countryId,$divisionId,$districtId){
        $userId = Session::get('frontUserId');
        $frontUser = FrontUser::where('id',$userId)->first();
        $product_category = ProductCategory::find($categoryId);

        return view('frontend.product-description.product-description',[
            'frontUser'=>$frontUser,
            'categoryId'=>$categoryId,
            'subcategoryId'=>$subcategoryId,
            'countryId'=>$countryId,
            'divisionId'=>$divisionId,
            'districtId'=>$districtId,
            'product_category'=>$product_category,
        ]);
    }
    protected function productInfoValidate($request){
        $this->validate($request,[
            'ad_title'=>'required|max:150',
            'product_image1'=>'required|image',
            'product_image2'=>'required|image',
            'product_image3'=>'image',
            'product_condition'=>'required',
            'product_brand'=>'max:50',
            'product_model'=>'max:50',
            'product_description'=>'required|max:1000',
            'product_reality'=>'required',
            'phone_number'=>'required|numeric',
            'location'=>'required|max:50'
        ]);
    }
    public function saveProductInformation(Request $request){
        $this->productInfoValidate($request);

        $frontUser = FrontUser::find($request->user_id);
        $frontUser->phone_number = $request->phone_number;
        $frontUser->save();

        $productInformation = new ProductInformation();
        $productInformation->user_id = $request->user_id;
        $productInformation->category_id = $request->category_id;
        $productInformation->subcategory_id = $request->subcategory_id;
        $productInformation->country_id = $request->country_id;
        $productInformation->division_id = $request->division_id;
        $productInformation->district_id = $request->district_id;
        $productInformation->save();


        $productDetail = new ProductDetail();
        $productDetail->information_id = $productInformation->id;
        $productDetail->ad_title = $request->ad_title;
        $productDetail->product_condition = $request->product_condition;
        $productDetail->product_brand = $request->product_brand;
        $productDetail->product_model = $request->product_model;
        $productDetail->product_description = $request->product_description;
        $productDetail->product_reality = $request->product_reality;
        $productDetail->product_price = $request->product_price;
        $productDetail->product_price_check = $request->product_price_check;
        $productDetail->location = $request->location;

        $productDetail->product_model_year_cc = $request->product_model_year_cc;
        $productDetail->nibondhon_year = $request->product_publish_year;
        $productDetail->fuel = $request->product_oil;
        $productDetail->km_ride = $request->product_km_ride;
        $productDetail->servising = $request->product_servising_time;
        $productDetail->village_ord = $request->product_village_word;
        $productDetail->save();


        $productImage1 = $request->file('product_image1');
        $rand1 = rand(1,123456);
        $imageName1 = $rand1.'-'.$productImage1->getClientOriginalName();
        $directory1 = 'product-images/';
        $imageUrl1 = $directory1.$imageName1;
        Image::make($productImage1)->save($imageUrl1);

        $productImage2 = $request->file('product_image2');
        $rand2 = rand(1,123456);
        $imageName2 = $rand2.'-'.$productImage2->getClientOriginalName();
        $directory2 = 'product-images/';
        $imageUrl2 = $directory2.$imageName2;
        Image::make($productImage2)->save($imageUrl2);

        $productImage = new ProductImage();
        $productImage->product_id = $productDetail->id;
        $productImage->product_image1 = $imageUrl1;
        $productImage->product_image2 = $imageUrl2;

        $productImage3 = $request->file('product_image3');
        if ($productImage3){
            $rand3 = rand(1,123456);
            $imageName3 = $rand3.'-'.$productImage3->getClientOriginalName();
            $directory3 = 'product-images/';
            $imageUrl3 = $directory3.$imageName3;
            Image::make($productImage3)->save($imageUrl3);

            $productImage->product_image3 = $imageUrl3;
            $productImage->save();
        }else{
            $productImage->save();
        }

        return redirect('/post-ad-page')->with('message','Your ad is posted successfully. We will contact with you soon.');
    }
}
