@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit Job Form</h4>
                </div>
                <div class="panel-body">
                    {{Form::open(['route'=>'update-job-ad','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কাজের শিরোনাম</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$job->ad_title}}" name="ad_title" class="form-control"/>
                            <input type="hidden" value="{{$job->id}}" name="job_id" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কাজের টাইপ</label>
                        <div class="col-md-8">
                            <select class="form-control" name="job_type">
                                <option value="{{$job->job_type}}">{{$job->job_type}}</option>
                                <option value="সম্পূর্ণ সময়">সম্পূর্ণ সময়</option>
                                <option value="খন্ডকালীন">খন্ডকালীন</option>
                                <option value="অস্থায়ী">অস্থায়ী</option>
                                <option value="চুক্তি">চুক্তি</option>
                                <option value="ইন্টার্নশীপ">ইন্টার্নশীপ</option>
                                <option value="স্থায়ী">স্থায়ী</option>
                                <option value="ঐচ্ছিক">ঐচ্ছিক</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কাজের বিভাগ</label>
                        <div class="col-md-8">
                            <select class="form-control" name="industry">
                                <option value="{{$job->industry}}">{{$job->industry}}</option>
                                <option value="হিসাবরক্ষণ">হিসাবরক্ষণ</option>
                                <option value="প্রশাসন ও অফিস সমর্থন">প্রশাসন ও অফিস সমর্থন</option>
                                <option value="কৃষি প্রাণী ও সংরক্ষণ">কৃষি প্রাণী ও সংরক্ষণ</option>
                                <option value="স্থাপত্য নকশা">স্থাপত্য নকশা</option>
                                <option value="ব্যাংকিং আর্থিক পরিষেবা">ব্যাংকিং আর্থিক পরিষেবা</option>
                                <option value="যোগাযোগ, বিজ্ঞাপন, শিল্প ও মিডিয়া">যোগাযোগ, বিজ্ঞাপন, শিল্প ও মিডিয়া</option>
                                <option value="কমিউনিটির সেবা">কমিউনিটির সেবা</option>
                                <option value="নির্মাণ">নির্মাণ</option>
                                <option value="গ্রাহক সেবা এবং কল সেন্টার">গ্রাহক সেবা এবং কল সেন্টার</option>
                                <option value="প্রতিরক্ষা এবং সুরক্ষা সেবা">প্রতিরক্ষা এবং সুরক্ষা সেবা</option>
                                <option value="শিক্ষা ও প্রশিক্ষণ">শিক্ষা ও প্রশিক্ষণ</option>
                                <option value="প্রকৌশল">প্রকৌশল</option>
                                <option value="নির্বাহী ও সাধারণ ব্যবস্থাপনা">নির্বাহী ও সাধারণ ব্যবস্থাপনা</option>
                                <option value="স্বাস্থ্য ও চিকিৎসা">স্বাস্থ্য ও চিকিৎসা</option>
                                <option value="আতিথেয়তা এবং পর্যটন">আতিথেয়তা এবং পর্যটন</option>
                                <option value="মানব সম্পদ ও নিয়োগ">মানব সম্পদ ও নিয়োগ</option>
                                <option value="তথ্য ও যোগাযোগ প্রযুক্তি (আইসিটি)">তথ্য ও যোগাযোগ প্রযুক্তি (আইসিটি)</option>
                                <option value="বীমা এবং অবসরকালীন মূল্যায়ন">বীমা এবং অবসরকালীন মূল্যায়ন</option>
                                <option value="আইনগত">আইনগত</option>
                                <option value="উত্পাদন">উত্পাদন</option>
                                <option value="খনির এবং শক্তি">খনির এবং শক্তি</option>
                                <option value="রিয়েল এস্টেট সম্পত্তি">রিয়েল এস্টেট সম্পত্তি</option>
                                <option value="খুচরা">খুচরা</option>
                                <option value="বিক্রয়">বিক্রয়</option>
                                <option value="বিজ্ঞান">বিজ্ঞান</option>
                                <option value="খেলা এবং বিনোদন">খেলা এবং বিনোদন</option>
                                <option value="ব্যবসায় এবং সেবা">ব্যবসায় এবং সেবা</option>
                                <option value="পরিবহন ও সরবরাহ">পরিবহন ও সরবরাহ</option>
                                <option value="গুদাম এক্সিকিউটিভ">গুদাম এক্সিকিউটিভ</option>
                                <option value="শিক্ষক">শিক্ষক</option>
                                <option value="রিসেপশনিস্ট / ফ্রন্ট অফিস">রিসেপশনিস্ট / ফ্রন্ট অফিস</option>
                                <option value="কোষাধ্যক্ষ">কোষাধ্যক্ষ</option>
                                <option value="নির্মাণ / শ্রমিক">নির্মাণ / শ্রমিক</option>
                                <option value="বিষয়বস্তু লেখক">বিষয়বস্তু লেখক</option>
                                <option value="রাঁধুনি">রাঁধুনি</option>
                                <option value="তথ্য অনুপ্রবেশ">তথ্য অনুপ্রবেশ</option>
                                <option value="সংগ্রহগুলি">সংগ্রহগুলি</option>
                                <option value="ডাক্তার / চিকিৎসা">ডাক্তার / চিকিৎসা</option>
                                <option value="চালক">চালক</option>
                                <option value="অপারেটর">অপারেটর</option>
                                <option value="মার্কেটিং">মার্কেটিং</option>
                                <option value="মিস্ত্রি">মিস্ত্রি</option>
                                <option value="নার্স">নার্স</option>
                                <option value="অফিস সহকারী">অফিস সহকারী</option>
                                <option value="সাহায্যকারী">সাহায্যকারী</option>
                                <option value="চিত্রশিল্পী">চিত্রশিল্পী</option>
                                <option value="ফটোগ্রাফার">ফটোগ্রাফার</option>
                                <option value="প্লাম্বার">প্লাম্বার</option>
                                <option value="নিরাপত্তা / গার্ড">নিরাপত্তা / গার্ড</option>
                                <option value="দরজী">দরজী</option>
                                <option value="আইটি সফ্টওয়্যার">আইটি সফ্টওয়্যার</option>
                                <option value="হোম বেস কাজ">হোম বেস কাজ</option>
                                <option value="আইটি হার্ডওয়্যার">আইটি হার্ডওয়্যার</option>
                                <option value="নেটওয়ার্কিং ইঞ্জিনিয়ার">নেটওয়ার্কিং ইঞ্জিনিয়ার</option>
                                <option value="ওয়েব ডিজাইন">ওয়েব ডিজাইন </option>
                                <option value="পিএইচপি ডেভেলপার">পিএইচপি ডেভেলপার</option>
                                <option value="টেলিফোন কলকারী">টেলিফোন কলকারী</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">চাকুরি অবস্তানের নাম</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$job->designation}}" name="designation" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">আবেদন কি ভাবে রিসিভ করবেন</label>
                        <div class="col-md-8">
                            <select class="form-control" name="recieve_option">
                                <option value="{{$job->recieve_option}}">{{$job->recieve_option}}</option>
                                <option value="নিয়োগকারীর ড্যাশবোর্ড">নিয়োগকারীর ড্যাশবোর্ড</option>
                                <option value="ফোন">ফোন</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">মাসিক বেতন</label>
                        <div class="col-md-8">
                            <div class="col-md-4">
                                <input type="number" value="{{$job->starting_range}}" name="starting_range" class="form-control" placeholder="হইতে">
                            </div>
                            <div class="col-md-4">
                                <input type="number" value="{{$job->ending_range}}" name="ending_range" class="form-control" placeholder="পর্যন্ত">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">পদের সংখ্যা</label>
                        <div class="col-md-8">
                            <input type="number" value="{{$job->total_vacancies}}" name="total_vacancies" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">আবেদনের শেষ সময়</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$job->expire_date}}" name="expire_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কোম্পানি</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$job->company_name}}" name="company_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">প্রতিষ্ঠান লোগো</label>
                        <div class="col-md-8">
                            <input type="file" name="company_logo" accept="image/*"/>
                            <br />
                            <img src="{{asset($job->company_logo)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">শিক্ষাগত যোগ্যতা</label>
                        <div class="col-md-8">
                            <select class="form-control" name="minimum_requirement">
                                <option value="{{$job->minimum_requirement}}">{{$job->minimum_requirement}}</option>
                                <option value="প্রাথমিক শিক্ষা">প্রাথমিক শিক্ষা</option>
                                <option value="উচ্চ মাধ্যমিক শিক্ষা">উচ্চ মাধ্যমিক শিক্ষা</option>
                                <option value="এসএসসি / ও লেভেল">এসএসসি / ও লেভেল</option>
                                <option value="এইচএসসি / এ লেভেল">এইচএসসি / এ লেভেল</option>
                                <option value="ডিপ্লোমা">ডিপ্লোমা</option>
                                <option value="ব্যাচেলরস / সম্মান">ব্যাচেলরস / সম্মান</option>
                                <option value="মাস্টার্স">মাস্টার্স</option>
                                <option value="পিএইচডি / ডক্টরেট">পিএইচডি / ডক্টরেট</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">অভিজ্ঞতা</label>
                        <div class="col-md-8">
                            <input type="number" value="{{$job->experience}}" name="experience" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">শিক্ষাগত অভিজ্ঞতা</label>
                        <div class="col-md-8">
                            <select class="form-control" name="education_sector">
                                <option value="{{$job->education_sector}}">{{$job->education_sector}}</option>
                                <option value="হিসাবরক্ষণ">হিসাবরক্ষণ</option>
                                <option value="স্থাপত্য নকশা">স্থাপত্য নকশা</option>
                                <option value="ব্যাংকিং আর্থিক পরিষেবা">ব্যাংকিং আর্থিক পরিষেবা</option>
                                <option value="যোগাযোগ, বিজ্ঞাপন, শিল্প ও মিডিয়া">যোগাযোগ, বিজ্ঞাপন, শিল্প ও মিডিয়া</option>
                                <option value="শিক্ষা ও প্রশিক্ষণ">শিক্ষা ও প্রশিক্ষণ</option>
                                <option value="প্রকৌশল">প্রকৌশল</option>
                                <option value="নির্বাহী ও সাধারণ ব্যবস্থাপনা">নির্বাহী ও সাধারণ ব্যবস্থাপনা</option>
                                <option value="স্বাস্থ্য ও চিকিৎসা">স্বাস্থ্য ও চিকিৎসা</option>
                                <option value="মানব সম্পদ ও নিয়োগ">মানব সম্পদ ও নিয়োগ</option>
                                <option value="তথ্য ও যোগাযোগ প্রযুক্তি (আইসিটি)">তথ্য ও যোগাযোগ প্রযুক্তি (আইসিটি)</option>
                                <option value="বীমা এবং অবসরকালীন মূল্যায়ন">বীমা এবং অবসরকালীন মূল্যায়ন</option>
                                <option value="আইনগত">আইনগত</option>
                                <option value="বিজ্ঞান">বিজ্ঞান</option>
                                <option value="খেলা এবং বিনোদন">খেলা এবং বিনোদন</option>
                                <option value="ব্যবসায় এবং সেবা">ব্যবসায় এবং সেবা</option>
                                <option value="শিক্ষক">শিক্ষক</option>
                                <option value="বিষয়বস্তু লেখক">বিষয়বস্তু লেখক</option>
                                <option value="ডাক্তার / চিকিৎসা">ডাক্তার / চিকিৎসা</option>
                                <option value="অপারেটর">অপারেটর</option>
                                <option value="মার্কেটিং">মার্কেটিং</option>
                                <option value="সাহায্যকারী">সাহায্যকারী</option>
                                <option value="চিত্রশিল্পী">চিত্রশিল্পী</option>
                                <option value="আইটি সফ্টওয়্যার">আইটি সফ্টওয়্যার</option>
                                <option value="আইটি হার্ডওয়্যার">আইটি হার্ডওয়্যার</option>
                                <option value="নেটওয়ার্কিং ইঞ্জিনিয়ার">নেটওয়ার্কিং ইঞ্জিনিয়ার</option>
                                <option value="ওয়েব ডিজাইন">ওয়েব ডিজাইন </option>
                                <option value="পিএইচপি ডেভেলপার">পিএইচপি ডেভেলপার</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কাজের অভিজ্ঞতা</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$job->skill}}" name="skill" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">আবেদনকারীর বয়স</label>
                        <div class="col-md-8">
                            <input type="number" value="{{$job->age_limit}}" name="age_limit" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">জেন্ডার</label>
                        <div class="col-md-8">
                            <select class="form-control" name="gender">
                                <option value="{{$job->gender}}">{{$job->gender}}</option>
                                <option value="পুরুষ / নারী">পুরুষ / নারী  </option>
                                <option value="পুরুষ">পুরুষ</option>
                                <option value="নারী">নারী</option>
                                <option value="অন্যান্য">অন্যান্য</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">বিবরণ</label>
                        <div class="col-md-8">
                            <textarea name="description" id="editor" class="form-control">{{$job->description}}</textarea>
                        </div>
                    </div>


{{--                    ------------}}
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">আবেদনকারীর বয়স:</label>
                        <div class="col-md-8">
                            <input type="number" name="candidate_age" class="form-control" value="{{$job->candidate_age}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">জব লোকেশনঃ</label>
                        <div class="col-md-8">
                            <input type="number" name="job_location" class="form-control" value="{{$job->job_location}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কোম্পানি সুযোগ সুবিধাঃ</label>
                        <div class="col-md-8">
                            <select name="company_facility" class="form-control">
                                <option value="{{$job->company_facility}}">{{$job->company_facility}}</option>
                                <option value="আছে">আছে</option>
                                <option value="নাই">নাই</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">ককোম্পানি যানবাহন সুবিধাঃ</label>
                        <div class="col-md-8">
                            <select name="company_transport_facility" class="form-control">
                                <option value="{{$job->company_transport_facility}}">{{$job->company_transport_facility}}</option>
                                <option value="আছে">আছে</option>
                                <option value="নাই">নাই</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কোম্পানি খাবারের ব্যাবস্থাঃ</label>
                        <div class="col-md-8">
                            <select name="company_food_facility" class="form-control">
                                <option value="{{$job->company_food_facility}}">{{$job->company_food_facility}}</option>
                                <option value="আছে">আছে</option>
                                <option value="নাই">নাই</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কোম্পানি মোবাইল বিলঃ</label>
                        <div class="col-md-8">
                            <select name="company_mobile_bill" class="form-control">
                                <option value="{{$job->company_mobile_bill}}">{{$job->company_mobile_bill}}</option>
                                <option value="আছে">আছে</option>
                                <option value="নাই">নাই</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কোম্পানি ফেস্টিভ্যাল বোনাসঃ</label>
                        <div class="col-md-8">
                            <select name="company_fastival_bonus" class="form-control">
                                <option value="{{$job->company_fastival_bonus}}">{{$job->company_fastival_bonus}}</option>
                                <option value="আছে">আছে</option>
                                <option value="নাই">নাই</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কোম্পানি কি প্রকারঃ</label>
                        <div class="col-md-8">
                            <select name="company_fee_plan" class="form-control">
                                <option value="{{$job->company_fee_plan}}">{{$job->company_fee_plan}}</option>
                                <option value="ন্যাশনাল">ন্যাশনাল</option>
                                <option value="ইন্টারন্যাশনাল">ইন্টারন্যাশনাল </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কোম্পানি বেতন ভাড়বেঃ</label>
                        <div class="col-md-8">
                            <select name="company_bill_incrase" class="form-control">
                                <option value="{{$job->company_bill_incrase}}">{{$job->company_bill_incrase}}</option>
                                <option value="৬ মাস">৬ মাস</option>
                                <option value="১ বছর">১ বছর</option>
                                <option value="২ বছর">২ বছর</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কোম্পানি ওভার টাইম সুবিধাঃ</label>
                        <div class="col-md-8">
                            <select name="company_full_time" class="form-control">
                                <option value="{{$job->company_full_time}}">{{$job->company_full_time}}</option>
                                <option value="আছে">আছে</option>
                                <option value="নাই">নাই</option>
                            </select>
                        </div>
                    </div>


                    
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Job Ad" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection