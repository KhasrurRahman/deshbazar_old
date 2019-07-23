<?php

namespace App\Http\Controllers;

use App\FrontUser;
use App\ProductCategory;
use App\ProductSubcategory;
use Illuminate\Http\Request;
use App\JobDetail;
use App\ProductDistrict;
use App\ProductDivision;
use App\ProductImage;
use App\ProductInformation;
use DB;
use Session;
use Image;

class JobPostController extends Controller
{
    public function index(){
        $jobCategory = ProductCategory::where('category_name','চাকরি ও নিয়োগ বিজ্ঞপ্তি')->first();
        $jobSubcategories = ProductSubcategory::where('category_id',$jobCategory->id)->get();
        return view('frontend.jobs-category.jobs-category-content',[
            'jobCategory'=>$jobCategory,
            'jobSubcategories'=>$jobSubcategories
        ]);
    }
    public function jobLocation($categoryId,$subcategoryId){
        $productDivisions = ProductDivision::where('publication_status',1)->get();
        $productDistricts = ProductDistrict::where('publication_status',1)->get();

        return view('frontend.jobs-category.job-location',[
            'categoryId'=>$categoryId,
            'subcategoryId'=>$subcategoryId,
            'productDivisions'=>$productDivisions,
            'productDistricts'=>$productDistricts,
        ]);
    }
    public function jobDescription($categoryId,$subcategoryId,$divisionId,$districtId){
        $userId = Session::get('frontUserId');
        $frontUser = FrontUser::where('id',$userId)->first();

        return view('frontend.jobs-category.job-description',[
            'frontUser'=>$frontUser,
            'categoryId'=>$categoryId,
            'subcategoryId'=>$subcategoryId,
            'divisionId'=>$divisionId,
            'districtId'=>$districtId,
        ]);
    }
    protected function jobInfoValidate($request){
        $this ->validate($request,[
            'ad_title'=>'required|max:150',
            'description'=>'required|max:5000',
            'job_type'=>'required',
            'industry'=>'required',
            'designation'=>'max:150',
            'expire_date'=>'max:150',
            'company_name'=>'required|max:150',
            'company_logo'=>'image',
            'skill'=>'max:150',
            'phone_number'=>'required|numeric',
        ]);
    }
    public function saveJobInformation(Request $request){
        $this ->jobInfoValidate($request);

        $frontUser = FrontUser::find($request->user_id);
        $frontUser->phone_number = $request->phone_number;
        $frontUser->save();

        $productInformation = new ProductInformation();
        $productInformation->user_id = $request->user_id;
        $productInformation->category_id = $request->category_id;
        $productInformation->subcategory_id = $request->subcategory_id;
        $productInformation->division_id = $request->division_id;
        $productInformation->district_id = $request->district_id;
        $productInformation->save();

        $jobDetail = new JobDetail();
        $jobDetail->information_id = $productInformation->id;
        $jobDetail->ad_title = $request->ad_title;
        $jobDetail->description = $request->description;
        $jobDetail->job_type = $request->job_type;
        $jobDetail->industry = $request->industry;
        $jobDetail->designation = $request->designation;
        $jobDetail->recieve_option = $request->recieve_option;
        $jobDetail->starting_range = $request->starting_range;
        $jobDetail->ending_range = $request->ending_range;
        $jobDetail->total_vacancies = $request->total_vacancies;
        $jobDetail->expire_date = $request->expire_date;
        $jobDetail->company_name = $request->company_name;
        $jobDetail->minimum_requirement = $request->minimum_requirement;
        $jobDetail->experience = $request->experience;
        $jobDetail->education_sector = $request->education_sector;
        $jobDetail->skill = $request->skill;
        $jobDetail->age_limit = $request->age_limit;
        $jobDetail->gender = $request->gender;

        $companyLogo = $request->file('company_logo');
        if ($companyLogo){
            $rand = rand(1,123456);
            $imageName = $rand.'-'.$companyLogo->getClientOriginalName();
            $directory = 'job-images/';
            $imageUrl = $directory.$imageName;
            Image::make($companyLogo)->save($imageUrl);

            $jobDetail->company_logo = $imageUrl;
            $jobDetail->save();
        }else{
            $jobDetail->save();
        }

        return redirect('/post-ad-page')->with('message','Your Ad is posted successfully.We will contact with you soon.');
    }
}
