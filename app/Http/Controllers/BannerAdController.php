<?php

namespace App\Http\Controllers;

use App\BannerAd;
use Illuminate\Http\Request;
use Image;

class BannerAdController extends Controller
{
    public function index(){
        return view('admin.banner-ad.add-banner-ad');
    }
    public function saveBannerAd(Request $request){
        $bannerAd = new BannerAd();

        $bannerImage = $request->file('banner_image');
        $imageName = $bannerImage->getClientOriginalName();
        $directory = 'banner-images/';
        $imageUrl = $directory.$imageName;
        $image = Image::make($bannerImage)->resize(1920,400);
        $image-> save($imageUrl);

        $bannerAd->banner_url = $request->banner_url;
        $bannerAd->banner_image = $imageUrl;
        $bannerAd->save();

        return redirect('/add-banner-ad')->with('message','Banner Ad info save successsfully');
    }
    public function manageBannerAd(){
        $bannerAds = BannerAd::all();
        return view('admin.banner-ad.manage-banner-ad',['bannerAds'=>$bannerAds]);
    }
    public function editBannerAd($id){
        $bannerAd = BannerAd::find($id);
        return view('admin.banner-ad.edit-banner-ad',['bannerAd'=>$bannerAd]);
    }
    public function updateBannerAd(Request $request){
        $bannerImage = $request->file('banner_image');
        $bannerAd = BannerAd::find($request->banner_id);
        if($bannerImage){
            unlink($bannerAd->banner_image);
            $imageName = $bannerImage->getClientOriginalName();
            $directory = 'banner-images/';
            $imageUrl = $directory.$imageName;
            $image = Image::make($bannerImage)->resize(1920,400);
            $image-> save($imageUrl);

            $bannerAd->banner_image = $imageUrl;
        }
        $bannerAd->banner_url = $request->banner_url;
        $bannerAd->save();
        return redirect('/manage-banner-ad')->with('message','Banner Ad Updated');
    }
    public function deleteBannerAd($id){
        $bannerAd = BannerAd::find($id);
        $bannerAd->delete();

        return redirect('/manage-banner-ad')->with('message','Banner Ad Deleted');
    }
}
