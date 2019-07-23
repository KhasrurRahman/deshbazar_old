<?php

namespace App\Http\Controllers;

use App\FrontUser;
use App\ProductCategory;
use App\ProductCountry;
use App\ProductDistrict;
use App\ProductDivision;
use App\ProductImage;
use App\ProductInformation;
use App\ProductSubcategory;
use App\PropertyDetail;
use Illuminate\Http\Request;
use Session;
use Image;

class PropertyRentController extends Controller
{
    public function index(){
        $propertyCategory = ProductCategory::where('category_name','প্রপার্টি অ্যান্ড ভাড়া')->first();
        $propertySubcategories = ProductSubcategory::where('category_id',$propertyCategory->id)->get();
        return view('frontend.property-category.property-category-content',[
            'propertyCategory'=>$propertyCategory,
            'propertySubcategories'=>$propertySubcategories
        ]);
    }
    public function propertyLocation($categoryId,$subcategoryId){
        $productCountries = ProductCountry::where('publication_status',1)->get();
        $productDivisions = ProductDivision::where('publication_status',1)->get();
        $productDistricts = ProductDistrict::where('publication_status',1)->get();
        return view('frontend.property-category.property-location',[
            'categoryId'=>$categoryId,
            'subcategoryId'=>$subcategoryId,
            'productCountries'=>$productCountries,
            'productDivisions'=>$productDivisions,
            'productDistricts'=>$productDistricts,
        ]);
    }
    public function propertyDescription($categoryId,$subcategoryId,$countryId,$divisionId,$districtId){
        $userId = Session::get('frontUserId');
        $frontUser = FrontUser::where('id',$userId)->first();

        return view('frontend.property-category.property-description',[
            'frontUser'=>$frontUser,
            'categoryId'=>$categoryId,
            'subcategoryId'=>$subcategoryId,
            'countryId'=>$countryId,
            'divisionId'=>$divisionId,
            'districtId'=>$districtId,
        ]);
    }
    protected function propertyInfoValidate($request){
        $this->validate($request,[
            'ad_title'=>'required|max:150',
            'product_image1'=>'required|image',
            'product_image2'=>'required|image',
            'product_image3'=>'image',
            'location_point'=>'max:150',
            'description'=>'required|max:1000',
            'phone_number'=>'required|numeric',
            'location'=>'required|max:50'
        ]);
    }
    public function savePropertyInformation(Request $request){
        $this->propertyInfoValidate($request);

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


        $propertyDetail = new PropertyDetail();
        $propertyDetail->information_id = $productInformation->id;
        $propertyDetail->ad_title = $request->ad_title;
        $propertyDetail->bed = $request->bed;
        $propertyDetail->bath = $request->bath;
        $propertyDetail->home_area = $request->home_area;
        $propertyDetail->home_area_unit = $request->home_area_unit;
        $propertyDetail->land_area = $request->land_area;
        $propertyDetail->land_area_unit = $request->land_area_unit;
        $propertyDetail->location_point = $request->location_point;
        $propertyDetail->description = $request->description;
        $propertyDetail->property_price = $request->property_price;
        $propertyDetail->property_price_check = $request->property_price_check;
        $propertyDetail->location = $request->location;
        $propertyDetail->save();


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
        $productImage->property_id = $propertyDetail->id;
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
