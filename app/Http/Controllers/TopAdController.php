<?php

namespace App\Http\Controllers;


use App\JobDetail;
use App\OrderInformation;
use App\ProductDetail;
use App\PropertyDetail;
use App\TopAdDetail;
use App\TopAdPackage;
use Illuminate\Http\Request;
use Session;

class TopAdController extends Controller
{
    public function addPackage(){
        return view('admin.top-ad-package.add-package');
    }

    public function savePackage(Request $request){
        $topAdPackage = new TopAdPackage();
        $topAdPackage->package_name = $request->package_name;
        $topAdPackage->description = $request->description;
        $topAdPackage->package_duration = $request->package_duration;
        $topAdPackage->package_price = $request->package_price;
        $topAdPackage->save();

        return redirect('add-top-ad-package')->with('message','Package added successfully');
    }
    public function managePackage(){
        $topAdPackages = TopAdPackage::all();
        return view('admin.top-ad-package.manage-package',[
            'topAdPackages' =>$topAdPackages
        ]);
    }
    public function editPackage($id){
        $topAdPackage = TopAdPackage::find($id);
        return view('admin.top-ad-package.edit-package',[
            'topAdPackage' =>$topAdPackage
        ]);
    }
    public function updatePackage(Request $request){
        $topAdPackage = TopAdPackage::find($request->package_id);
        $topAdPackage->package_name = $request->package_name;
        $topAdPackage->description = $request->description;
        $topAdPackage->package_duration = $request->package_duration;
        $topAdPackage->package_price = $request->package_price;
        $topAdPackage->save();

        return redirect('/manage-top-ad-package')->with('message','Package updated successfully');
    }
    public function deletePackage($id){
        $topAdPackage = TopAdPackage::find($id);
        $topAdPackage->delete();

        return redirect('/manage-top-ad-package')->with('message','Package deleted');
    }
    public function promoteAd($id,$infoId){
        $user = Session::get('frontUserId');
        if ($user){
            $topAdPackages = TopAdPackage::all();
            $productAd = ProductDetail::where('id',$id)->where('information_id',$infoId)->first();
            $propertyAd = PropertyDetail::where('id',$id)->where('information_id',$infoId)->first();
            $jobAd = JobDetail::where('id',$id)->where('information_id',$infoId)->first();
            if ($productAd){
                return view('frontend.top-ad.select-package',[
                    'topAdPackages' =>$topAdPackages,
                    'topAd' =>$productAd
                ]);
            }elseif ($propertyAd){
                return view('frontend.top-ad.select-package',[
                    'topAdPackages' =>$topAdPackages,
                    'topAd' =>$propertyAd
                ]);
            }elseif ($jobAd){
                return view('frontend.top-ad.select-package',[
                    'topAdPackages' =>$topAdPackages,
                    'topAd' =>$jobAd
                ]);
            }
        }else{
            return view('frontend.login.login-form',[
                'message'=>'Please login to promote your ad'
            ]);
        }

    }
    public function saveTopAdInformation($orderId){
        $orderInfo = OrderInformation::where('id',$orderId)->first();
        $topPackageId = $orderInfo->top_package_id;

        $topAdPackage = TopAdPackage::where('id',$topPackageId)->first();
        $duration = $topAdPackage->package_duration;
        $startDate = date("Y-m-d h:i:s");
        $endDate = date("Y-m-d h:i:s",strtotime($startDate."+".$duration."day"));
//        $endDate = date("Y-m-d h:i:s",strtotime($startDate."+6 day"));

        $topAdDetail = new TopAdDetail();
        $topAdDetail->ad_id = $orderInfo->ad_id;
        $topAdDetail->ad_info_id = $orderInfo->ad_info_id;
        $topAdDetail->top_package_id = $orderInfo->top_package_id;
        $topAdDetail->start_date = $startDate;
        $topAdDetail->end_date = $endDate;
        $topAdDetail->save();

        $productAd = ProductDetail::where('id',$orderInfo->ad_id)->where('information_id',$orderInfo->ad_info_id)->first();
        $propertyAd = PropertyDetail::where('id',$orderInfo->ad_id)->where('information_id',$orderInfo->ad_info_id)->first();
        $jobAd = JobDetail::where('id',$orderInfo->ad_id)->where('information_id',$orderInfo->ad_info_id)->first();
        if ($productAd){
            $productAd->top_ad = 1;
            $productAd->save();
        }elseif ($propertyAd){
            $propertyAd->top_ad = 1;
            $propertyAd->save();
        }elseif ($jobAd){
            $jobAd->top_ad = 1;
            $jobAd->save();
        }


        return redirect('/all-ad')->with('message','Thanks for promote your ad.');
    }

}

