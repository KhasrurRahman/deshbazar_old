<?php

namespace App\Http\Controllers;

use App\BannerAd;
use App\FamilyMember;
use App\footer;
use App\footer2;
use App\JobDetail;
use App\ProductCategory;
use App\ProductDetail;
use App\ProductDivision;
use App\PropertyDetail;
use App\TopAdDetail;
use App\WebsiteInformation;
use Illuminate\Http\Request;
use Session;
use DB;
use Mail;
use App\Support\Collection;

class MarketplaceController extends Controller
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
        $items = $topAds1->concat($topAds2)->concat($topAds3)->sortByDesc('updated_at');
        $topAds = (new Collection($items))->paginate(5);


        $categories = ProductCategory::withCount('products')
//            ->withCount('jobs')
            ->orderBy('products_count','desc')->get();
        $divisions = ProductDivision::where('publication_status',1)
            ->withCount('divisionalProducts')
            ->orderBy('divisional_products_count','desc')->get();
        $websiteInformation = WebsiteInformation::find(1);
        $firstbanner = BannerAd::where('id',1)->first();
        $bannerAds = BannerAd::where('id','!=',1)->get();
//        return $bannerAds;
        return view('frontend.home.home-content',[
            'topAds'=>$topAds,
            'categories'=>$categories,
            'divisions'=>$divisions,
            'websiteInformation'=>$websiteInformation,
            'firstbanner'=>$firstbanner,
            'bannerAds'=>$bannerAds,
            ]);
    }
    public function ghoreybosheFamily(){
        $members = FamilyMember::all();
        return view('frontend.home.ghoreyboshe-family',['members'=>$members]);
    }
    public function fastSell(){
        $footer = footer::all()->first()->fast_sell;
        return view('frontend.home.fast-sell',compact('footer'));
    }

    public function membership(){
        $footer = footer::all()->first()->membership;
        return view('frontend.home.membership',compact('footer'));
    }
    public function quesAns(){
        $footer = footer::all()->first()->jana_ojana;
        return view('frontend.home.ques-ans',compact('footer'));
    }
    public function aboutUs(){
        $footer = footer::all()->first()->about_us;
        return view('frontend.home.about-us',compact('footer'));
    }
    public function secretTerms(){
        $footer = footer::all()->first()->secret_terms;
        return view('frontend.home.secret-terms',compact('footer'));
    }
    public function adRules(){
        $footer = footer::all()->first()->ad_rules;
        return view('frontend.home.ad-rules',compact('footer'));
    }
    public function paymentInformation(){
        $footer = footer::all()->first()->payment_information;
        return view('frontend.home.payment-information',compact('footer'));
    }
    public function customerDeal(){
        $footer = footer::all()->first()->customer_deal;
        return view('frontend.home.customer-deal',compact('footer'));
    }
    public function terms(){
        $footer = footer::all()->first()->terms;
        return view('frontend.home.terms',compact('footer'));
    }
    public function delivery(){
        $footer = footer::all()->first()->delivery;
        return view('frontend.home.delivery',compact('footer'));
    }
    public function businessDemand(){
        $footer = footer::all()->first()->business_demand;
        return view('frontend.home.business-demand',compact('footer'));
    }
    public function ghoreybosheCareer(){
        $footer = footer2::all()->first()->ghoreyboshe_career;
        return view('frontend.home.ghoreyboshe-career');
    }

    public function postAd(){
        return view('frontend.post-ad.post-ad-content');
    }

    public function userComplain(Request $request){
        $this->validate($request,[
            'email' => 'required|string|email|max:255',
            'sms' => 'required|string|max:1000',
        ]);

        $data['prob_type']= $request->prob_type;
        $data['email']= $request->email;
        $data['sms']= $request->sms;

        Mail::send('frontend.mail.user-complain',$data,function ($message)use($data){
            $message->to('complain@ghoreyboshe.com');
            $message->subject('User Complain from Ghoreyboshe.com');
        });

        return redirect('/')->with('message','Your complain has been successfully received.');
    }
    public function userSms(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:255',
            'sms' => 'required|string|max:5000',
        ]);

        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['sms']= $request->sms;

        Mail::send('frontend.mail.user-sms',$data,function ($message)use($data){
            $message->to('support@ghoreyboshe.com');
            $message->subject('User SMS from Ghoreyboshe.com');
        });

        return redirect('/')->with('message','Your SMS has been received.');
    }

    public function house_category_find(){
        return view('frontend.house_category_find.house_category_find-content');
    }
    public function others_category_find(){
        return view('frontend.products-category-find.products-category-find-content');
    }

    public function location_for_job_foren(){
        return view('frontend.jobs-category.location_for_job_foren_content');
    }

    public function post_from_home_ext(){
        return view('frontend.property-category.post_from_home_ext_content');
    }

}
