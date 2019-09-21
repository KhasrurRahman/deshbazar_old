<?php

namespace App\Http\Controllers;

use App\FrontUser;
use App\JobDetail;
use App\ProductInformation;
use Illuminate\Http\Request;
use DB;
use Image;
use Session;

class ManageJobController extends Controller
{
    public function index(){
        $ads = JobDetail::orderBy('created_at','DESC')->get();
        return view('admin.manage-job.manage-job',['ads'=>$ads]);
    }
    public function viewJobAd($id){
        $job = DB::table('job_details')
            ->where('job_details.id','=',$id)
            ->join('product_informations','job_details.information_id','=','product_informations.id')
            ->join('front_users','product_informations.user_id','=','front_users.id')
            ->join('product_categories','product_informations.category_id','=','product_categories.id')
            ->join('product_subcategories','product_informations.subcategory_id','=','product_subcategories.id')
            ->join('product_divisions','product_informations.division_id','=','product_divisions.id')
            ->join('product_districts','product_informations.district_id','=','product_districts.id')
            ->select('job_details.*','front_users.name','front_users.email','front_users.phone_number','product_categories.category_name','product_subcategories.subcategory_name','product_divisions.division_name','product_districts.district_name')
            ->first();
        return view('admin.manage-job.view-job',['job'=>$job]);
    }
    public function publishJobAd($id){
        $job = JobDetail::find($id);
        $job ->publication_status = 'Published';
        $job ->save();

        $informationId = $job->information_id;
        $adInformation = ProductInformation::find($informationId);
        $adInformation ->publication_status = 'Published';
        $adInformation ->save();

        $user_mobile = FrontUser::find($adInformation->user_id)->phone_number;

        Session::flash('mobile',$user_mobile);

        return redirect('/manage-job-ad')->with('message','Job Ad Published successfully');
    }
    public function unpublishJobAd($id){
        $job = JobDetail::find($id);
        $job ->publication_status = 'Pending';
        $job ->save();

        $informationId = $job->information_id;
        $adInformation = ProductInformation::find($informationId);
        $adInformation ->publication_status = 'Pending';
        $adInformation ->save();

        return redirect('/manage-job-ad')->with('message','Job Ad Unpublished successfully');
    }
    public function topJobAd($id){
        $jobs = JobDetail::find($id);
        $jobs ->top_ad = 1;
        $jobs ->save();

        return redirect('/manage-job-ad')->with('message','Job Ad is now top');
    }
    public function normalJobAd($id){
        $jobs = JobDetail::find($id);
        $jobs ->top_ad = 0;
        $jobs ->save();

        return redirect('/manage-job-ad')->with('message','Job Ad is now normal');
    }
    public function editJobAd($id){
        $job = DB::table('job_details')
            ->where('job_details.id','=',$id)
            ->select('job_details.*')
            ->first();
        return view('admin.manage-job.edit-job',['job'=>$job]);
    }
    public function updateJobAd(Request $request){
        $companyLogo = $request->file('company_logo');
        $jobDetail = JobDetail::find($request->job_id);
        if ($companyLogo){
            if ($jobDetail->company_logo){
                unlink($jobDetail->company_logo);
            }
            $rand = rand(1,123456);
            $imageName = $rand.'-'.$companyLogo->getClientOriginalName();
            $directory = 'job-images/';
            $imageUrl = $directory.$imageName;
            Image::make($companyLogo)->save($imageUrl);

            $jobDetail->company_logo = $imageUrl;
        }

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


        $jobDetail->candidate_age = $request->candidate_age;
        $jobDetail->job_location = $request->job_location;
        $jobDetail->company_facility = $request->company_facility;
        $jobDetail->company_facility = $request->company_facility;
        $jobDetail->company_transport_facility = $request->company_transport_facility;
        $jobDetail->company_food_facility = $request->company_food_facility;
        $jobDetail->company_mobile_bill = $request->company_mobile_bill;
        $jobDetail->company_fastival_bonus = $request->company_fastival_bonus;
        $jobDetail->company_fee_plan = $request->company_fee_plan;
        $jobDetail->company_bill_incrase = $request->company_bill_incrase;
        $jobDetail->company_full_time = $request->company_full_time;
        $jobDetail->company_place_type = $request->company_place_type;
        $jobDetail->any_training_expairance = $request->any_training_expairance;
        $jobDetail->any_workshop_experience = $request->any_workshop_experience;
        $jobDetail->any_computer_training_experience = $request->any_computer_training_experience;
        $jobDetail->voter_id_number = $request->voter_id_number;
        $jobDetail->company_work_description = $request->company_work_description;


        $jobDetail->save();

        $userid = Session::get('frontUserId');
        if ($userid){
            return redirect('front-user-dashboard')->with('message','Job info Updated.');
        }else{
            return redirect('/manage-job-ad')->with('message','Job info Updated');
        }
    }
    public function deleteAd($id){
        $adInformation = ProductInformation::where('id',$id)->first();
        $ad = JobDetail::where('information_id',$id)->first();
        $adInformation->delete();
        $ad->delete();
        return redirect('/manage-job-ad')->with('message','Ad deleted successfully.');
    }
}
