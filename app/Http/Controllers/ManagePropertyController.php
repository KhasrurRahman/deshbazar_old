<?php

namespace App\Http\Controllers;

use App\FrontUser;
use App\ProductImage;
use App\ProductInformation;
use App\PropertyDetail;
use Illuminate\Http\Request;
use Image;
use DB;
use Session;

class ManagePropertyController extends Controller
{
    public function index(){
        $ads = PropertyDetail::orderBy('created_at','DESC')->get();
        return view('admin.manage-property.manage-property',['ads'=>$ads]);
    }
    public function viewPropertyAd($id){
        $property = DB::table('property_details')
            ->where('property_details.id','=',$id)
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->join('product_informations','property_details.information_id','=','product_informations.id')
            ->join('front_users','product_informations.user_id','=','front_users.id')
            ->join('product_categories','product_informations.category_id','=','product_categories.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_countries','product_informations.country_id','=','product_countries.id')
            ->join('product_divisions','product_informations.division_id','=','product_divisions.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('property_details.*','product_images.product_image1','product_images.product_image2','product_images.product_image3','front_users.name','front_users.email','front_users.phone_number','product_categories.category_name','product_subcategories.subcategory_name','product_countries.country_name','product_divisions.division_name','product_districts.district_name')
            ->first();
        return view('admin.manage-property.view-property',['property'=>$property]);
    }
    public function publishPropertyAd($id){
        $property = PropertyDetail::find($id);
        $property ->publication_status = 'Published';
        $property ->save();

        $informationId = $property->information_id;
        $adInformation = ProductInformation::find($informationId);
        $adInformation ->publication_status = 'Published';
        $adInformation ->save();

        $user_mobile = FrontUser::find($adInformation->user_id)->phone_number;

        return redirect('/manage-property-ad')->with('message','Property Ad Published successfully',$user_mobile);
    }
    public function unpublishPropertyAd($id){
        $property = PropertyDetail::find($id);
        $property ->publication_status = 'Pending';
        $property ->save();

        $informationId = $property->information_id;
        $adInformation = ProductInformation::find($informationId);
        $adInformation ->publication_status = 'Pending';
        $adInformation ->save();

        $user_mobile = FrontUser::find($adInformation->user_id)->phone_number;

        Session::flash('mobile',$user_mobile);
        return redirect('/manage-property-ad')->with('message','Property Ad Unpublished successfully');
    }
    public function topPropertyAd($id){
        $properties = PropertyDetail::find($id);
        $properties ->top_ad = 1;
        $properties ->save();

        return redirect('/manage-property-ad')->with('message','Property Ad is now top');
    }
    public function normalPropertyAd($id){
        $properties = PropertyDetail::find($id);
        $properties ->top_ad = 0;
        $properties ->save();

        return redirect('/manage-property-ad')->with('message','Property Ad is now normal');
    }
    public function editPropertyAd($id){
        $property = DB::table('property_details')
            ->where('property_details.id','=',$id)
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->select('property_details.*','product_images.product_image1','product_images.product_image2','product_images.product_image3')
            ->first();
        return view('admin.manage-property.edit-property-ad',['property'=>$property]);
    }
    public function updatePropertyAd(Request $request){
        $productImage1 = $request->file('product_image1');
        $productImage2 = $request->file('product_image2');
        $productImage3 = $request->file('product_image3');
        $productImage = ProductImage::where('property_id','=',$request->property_id)->first();

        if($productImage1){
            if ($productImage->product_image1){
                unlink($productImage->product_image1);
            }

            $rand1 = rand(1,123456);
            $imageName1 = $rand1.'-'.$productImage1->getClientOriginalName();
            $directory1 = 'product-images/';
            $imageUrl1 = $directory1.$imageName1;
            Image::make($productImage1)->save($imageUrl1);

            $productImage->product_image1 = $imageUrl1;
            $productImage->save();
        }
        if($productImage2){
            if ($productImage->product_image2){
                unlink($productImage->product_image2);
            }

            $rand2 = rand(1,123456);
            $imageName2 = $rand2.'-'.$productImage2->getClientOriginalName();
            $directory2 = 'product-images/';
            $imageUrl2 = $directory2.$imageName2;
            Image::make($productImage2)->save($imageUrl2);

            $productImage->product_image2 = $imageUrl2;
            $productImage->save();
        }
        if($productImage3){
            if ($productImage->product_image3){
                unlink($productImage->product_image3);
            }

            $rand3 = rand(1,123456);
            $imageName3 = $rand3.'-'.$productImage3->getClientOriginalName();
            $directory3 = 'product-images/';
            $imageUrl3 = $directory3.$imageName3;
            Image::make($productImage3)->save($imageUrl3);

            $productImage->product_image3 = $imageUrl3;
            $productImage->save();
        }

        $propertyDetail = PropertyDetail::find($request->property_id);
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
        $propertyDetail->village_word = $request->village_word;
        $propertyDetail->palce_type = $request->palce_type;
        $propertyDetail->save();

        $userid = Session::get('frontUserId');
        if ($userid){
            return redirect('front-user-dashboard')->with('message','Property info Updated.');
        }else{
            return redirect('/manage-property-ad')->with('message','Property info Updated');
        }
    }
    public function deleteAd($id){
        $adInformation = ProductInformation::where('id',$id)->first();
        $ad = PropertyDetail::where('information_id',$id)->first();
        $adInformation->delete();
        $ad->delete();
        return redirect('/manage-property-ad')->with('message','Ad deleted successfully.');
    }
}
