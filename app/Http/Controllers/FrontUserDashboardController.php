<?php

namespace App\Http\Controllers;

use App\FrontUser;
use App\JobDetail;
use App\ProductDetail;
use App\ProductDistrict;
use App\ProductInformation;
use App\PropertyDetail;
use Illuminate\Http\Request;
use DB;
use Session;

class FrontUserDashboardController extends Controller
{
    public function index(){
        $userid = Session::get('frontUserId');
        $user = FrontUser::where('id',$userid)->first();

        $products = DB::table('product_informations')
            ->where('product_informations.user_id','=',$userid)
            ->join('product_details','product_informations.id','=','product_details.information_id')
//            ->join('product_images','product_details.id','=','product_images.product_id')
//            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
//            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*')
            ->get();
        $properties = DB::table('product_informations')
            ->where('product_informations.user_id','=',$userid)
            ->join('property_details','product_informations.id','=','property_details.information_id')
            ->select('property_details.*')
            ->get();

        $jobs = DB::table('product_informations')
            ->where('product_informations.user_id','=',$userid)
            ->join('job_details','product_informations.id','=','job_details.information_id')
//            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*')
            ->get();

        $products = $products->merge($properties)->merge($jobs)->sortByDesc('updated_at')->values()->all();
//        $products = (new Collection($items))->paginate(5);

        $districts = ProductDistrict::all();
        return view('frontend.user-dashboard.my-account',[
            'user'=>$user,
            'districts'=>$districts,
            'products'=>$products,
            ]);
    }
    public function updateUser(Request $request){
//        return $request->all();
        $frontUser = FrontUser::find($request->front_user_id);
        $frontUser->name = $request->name;
        $frontUser->phone_number = $request->phone_number;
        $frontUser->district_name = $request->district_name;
        $frontUser->thana_upazila = $request->thana_upazila;
        $frontUser->save();

        return redirect('front-user-dashboard')->with('message','Information updated successfully.');
    }
    public function updateUserPassword(Request $request){
        if($request->password){
            $this->validate($request,[
                'password' => 'required|string|min:6',
                'new_password' => 'required|string|min:6|confirmed',
            ]);
        }else{
            $this->validate($request,[
                'new_password' => 'required|string|min:6|confirmed',
            ]);
        }

        $frontUser = FrontUser::find($request->front_user_id);
        if ($request->password){
            if(password_verify($request->password,$frontUser->password)){
                $frontUser->password = bcrypt($request->new_password);
                $frontUser->save();

                Session::forget('frontUserId');
                Session::forget('frontUserName');
                return redirect('/')->with('message','Password changed successfully.');
            }else{
                return redirect('front-user-dashboard')->with('message','বর্তমান পাসওয়ার্ড সঠিক দিন');
            }
        }else{
            $frontUser->password = bcrypt($request->new_password);
            $frontUser->save();

            Session::forget('frontUserId');
            Session::forget('frontUserName');
            return redirect('/')->with('message','Password set successfully.');
        }

    }
    public function viewAd($id){
        $productAd = DB::table('product_details')
            ->where('product_details.information_id','=',$id)
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->join('product_informations','product_details.information_id','=','product_informations.id')
            ->join('product_categories','product_informations.category_id','=','product_categories.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_countries','product_informations.country_id','=','product_countries.id')
            ->join('product_divisions','product_informations.division_id','=','product_divisions.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('product_details.*','product_images.product_image1','product_images.product_image2','product_images.product_image3','product_categories.category_name','product_subcategories.subcategory_name','product_countries.country_name','product_divisions.division_name','product_districts.district_name')
            ->first();

        $propertyAd = DB::table('property_details')
            ->where('property_details.information_id','=',$id)
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->join('product_informations','property_details.information_id','=','product_informations.id')
            ->join('product_categories','product_informations.category_id','=','product_categories.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_countries','product_informations.country_id','=','product_countries.id')
            ->join('product_divisions','product_informations.division_id','=','product_divisions.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('property_details.*','product_images.product_image1','product_images.product_image2','product_images.product_image3','product_categories.category_name','product_subcategories.subcategory_name','product_countries.country_name','product_divisions.division_name','product_districts.district_name')
            ->first();

        $jobAd = DB::table('job_details')
            ->where('job_details.information_id','=',$id)
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->join('product_categories','product_informations.category_id','=','product_categories.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_divisions','product_informations.division_id','=','product_divisions.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','product_categories.category_name','product_subcategories.subcategory_name','product_divisions.division_name','product_districts.district_name')
            ->first();
        if ($productAd){
            return view('frontend.user-dashboard.ad-detail',[
                'ad'=>$productAd
            ]);
        }elseif ($propertyAd){
            return view('frontend.user-dashboard.ad-detail',[
                'ad'=>$propertyAd
            ]);
        }elseif ($jobAd){
            return view('frontend.user-dashboard.ad-detail',[
                'ad'=>$jobAd
            ]);
        }

    }
    public function editAd($id){
        $productAd = DB::table('product_details')
            ->where('product_details.information_id','=',$id)
            ->join('product_images','product_details.id','=','product_images.product_id')
            ->select('product_details.*','product_images.product_image1','product_images.product_image2','product_images.product_image3')
            ->first();

        $propertyAd = DB::table('property_details')
            ->where('property_details.information_id','=',$id)
            ->join('product_images','property_details.id','=','product_images.property_id')
            ->select('property_details.*','product_images.product_image1','product_images.product_image2','product_images.product_image3')
            ->first();

        $jobAd = DB::table('job_details')
            ->where('job_details.information_id','=',$id)
            ->select('job_details.*')
            ->first();
        if ($productAd){
            return view('frontend.user-dashboard.edit-ad',[
                'ad'=>$productAd
            ]);
        }elseif ($propertyAd){
            return view('frontend.user-dashboard.edit-ad',[
                'ad'=>$propertyAd
            ]);
        }elseif ($jobAd){
            return view('frontend.user-dashboard.edit-ad',[
                'ad'=>$jobAd
            ]);
        }

    }
    public function deleteAd($id){
        $adInformation = ProductInformation::where('id',$id)->first();
        $productAd = ProductDetail::where('information_id',$id)->first();
        $propertyAd = PropertyDetail::where('information_id',$id)->first();
        $jobAd = JobDetail::where('information_id',$id)->first();
        $adInformation->delete();
        if ($productAd){
            $productAd->delete();
        }elseif($propertyAd){
            $propertyAd->delete();
        }else{
            $jobAd->delete();
        }
        return redirect('/front-user-dashboard')->with('message','Ad deleted successfully.');
    }

}
