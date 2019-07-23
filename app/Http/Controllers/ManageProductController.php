<?php

namespace App\Http\Controllers;

use App\JobDetail;
use App\ProductDetail;
use App\ProductImage;
use App\ProductInformation;
use Illuminate\Http\Request;
use DB;
use Image;
use Session;

class ManageProductController extends Controller
{
    public function index(){
        $products = ProductDetail::orderBy('created_at','DESC')->get();
        return view('admin.manage-product.manage-product',['products'=>$products]);
    }
    public function viewProductAd($id){
        $product = DB::table('product_details')
            ->where('product_details.id','=',$id)
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('front_users','product_informations.user_id','=','front_users.id')
            ->join('product_categories','product_informations.category_id','=','product_categories.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_countries','product_informations.country_id','=','product_countries.id')
            ->join('product_divisions','product_informations.division_id','=','product_divisions.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_images.product_image2','product_images.product_image3','front_users.name','front_users.email','front_users.phone_number','product_categories.category_name','product_subcategories.subcategory_name','product_countries.country_name','product_divisions.division_name','product_districts.district_name')
            ->first();
        return view('admin.manage-product.view-product',['product'=>$product]);
    }
    public function editProductAd($id){
        $product = DB::table('product_details')
            ->where('product_details.id','=',$id)
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->select('product_details.*','product_images.product_image1','product_images.product_image2','product_images.product_image3')
            ->first();
        return view('admin.manage-product.edit-product-ad',['product'=>$product]);
    }
    public function updateProductAd(Request $request){
        $productImage1 = $request->file('product_image1');
        $productImage2 = $request->file('product_image2');
        $productImage3 = $request->file('product_image3');
        $productImage = ProductImage::where('product_id','=',$request->product_id)->first();

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
        $productAd = ProductDetail::find($request->product_id);
        $productAd->ad_title = $request->ad_title;
        $productAd->product_condition = $request->product_condition;
        $productAd->product_brand = $request->product_brand;
        $productAd->product_model = $request->product_model;
        $productAd->product_reality = $request->product_reality;
        $productAd->product_price = $request->product_price;
        $productAd->product_price_check = $request->product_price_check;
        $productAd->product_description = $request->product_description;
        $productAd->save();

        $userid = Session::get('frontUserId');
        if ($userid){
            return redirect('front-user-dashboard')->with('message','Product info Updated.');
        }else{
            return redirect('/manage-product-ad')->with('message','Product info Updated');
        }
    }

    public function publishProductAd($id){
        $product = ProductDetail::find($id);
        $product ->publication_status = 'Published';
        $product ->save();

        $informationId = $product->information_id;
        $adInformation = ProductInformation::find($informationId);
        $adInformation ->publication_status = 'Published';
        $adInformation ->save();


        return redirect('/manage-product-ad')->with('message','Product Ad Published successfully');
    }
    public function unpublishProductAd($id){
        $product = ProductDetail::find($id);
        $product ->publication_status = 'Pending';
        $product ->save();

        $informationId = $product->information_id;
        $adInformation = ProductInformation::find($informationId);
        $adInformation ->publication_status = 'Pending';
        $adInformation ->save();

        return redirect('/manage-product-ad')->with('message','Product Ad Unpublished successfully');
    }
    public function topProductAd($id){
        $products = ProductDetail::find($id);
        $products ->top_ad = 1;
        $products ->save();

        return redirect('/manage-product-ad')->with('message','Product Ad is now top');
    }
    public function normalProductAd($id){
        $products = ProductDetail::find($id);
        $products ->top_ad = 0;
        $products ->save();

        return redirect('/manage-product-ad')->with('message','Product Ad is now normal');
    }
    public function deleteAd($id){
        $adInformation = ProductInformation::where('id',$id)->first();
        $productAd = ProductDetail::where('information_id',$id)->first();
        $adInformation->delete();
        $productAd->delete();
        return redirect('/manage-product-ad')->with('message','Ad deleted successfully.');
    }
}
