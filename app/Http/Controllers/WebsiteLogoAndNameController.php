<?php

namespace App\Http\Controllers;

use App\WebsiteInformation;
use Illuminate\Http\Request;
use Image;

class WebsiteLogoAndNameController extends Controller
{
    public function index(){
        return view('admin.home.site-logo-name');
    }
    public function saveSiteInformation(Request $request){
        $websiteInformation = new WebsiteInformation();

        $logo = $request->file('logo');
        $imageName = $logo->getClientOriginalName();
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        $image = Image::make($logo)->resize(133,154);
        $image-> save($imageUrl);

        $websiteInformation->site_name = $request->site_name;
        $websiteInformation->description = $request->description;
        $websiteInformation->logo = $imageUrl;
        $websiteInformation->save();

        return redirect('/edit-logo-name')->with('message','Website info save successsfully');
    }
    public function editLogoAndName(){
        $websiteInformation = WebsiteInformation::find(1);
        return view('admin.home.edit-site-logo-name',['websiteInformation'=>$websiteInformation]);

    }
    public function updateLogoAndName(Request $request){
        $logo = $request->file('logo');
        $websiteInformation = WebsiteInformation::find(1);
        if($logo){
            unlink($websiteInformation->logo);

            $imageName = $logo->getClientOriginalName();
            $directory = 'product-images/';
            $imageUrl = $directory.$imageName;
            $image = Image::make($logo)->resize(133,154);
            $image-> save($imageUrl);

            $websiteInformation->logo = $imageUrl;
        }

        $websiteInformation->site_name = $request->site_name;
        $websiteInformation->description = $request->description;
        $websiteInformation->save();

        return redirect('/edit-logo-name')->with('message','Website info update successsfully');
    }

}
