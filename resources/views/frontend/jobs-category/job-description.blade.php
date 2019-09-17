@extends('frontend.master')
@section('title')
    Post Job
@endsection

@section('body')


    <div class="container" id="elct_post_from">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 panel panel-default" style="box-shadow: 5px 8px 12px;">
            <div class="panel-body">
                <div class="col-md-12">
                    <strong><h4>আপনি কি দেশের ও বাহিরের চাকরি ও নিয়োগ বিজ্ঞপ্তি পোস্ট করতে চান, নিছে সব ফিল্ড টাইপ করুনঃ</h4></strong><hr/>
                    <div class="col-md-12">
                        <h4>নিয়োগ বিজ্ঞপ্তি বিবরনঃ</h4><hr/>
                        {{Form::open(['route'=>'save-job-information','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                            <div class="col-md-12 form-group">
                                <input type="hidden" name="user_id" value="{{$frontUser->id}}"/>
                                <input type="hidden" name="category_id" value="{{$categoryId}}"/>
                                <input type="hidden" name="subcategory_id" value="{{$subcategoryId}}"/>
                                <input type="hidden" name="division_id" value="{{$divisionId}}"/>
                                <input type="hidden" name="district_id" value="{{$districtId}}"/>
                            </div>
                            <div class="col-md-12 form-group" style="margin-top: 20px">
                                <label class="text-success">কাজের শিরোনাম</label>
                                <input type="text" class="form-control" name="ad_title" placeholder="কাজের শিরোনাম">
                                <span class="text-danger">{{$errors->has('ad_title') ? $errors->first('ad_title'):' '}}</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="text-success">নিয়োগ বিজ্ঞপ্তি বিবরনঃ( 0 / 4000 )</label>
                                <textarea name="description" id="editor" class="form-control" placeholder="বিবরণ  " rows="8" cols="10"></textarea>
                                <span class="text-danger">{{$errors->has('description') ? $errors->first('description'):' '}}</span>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="col-md-6" style="padding-left: 0">
                                    <label> </label>
                                    <select name="job_type" class="form-control">
                                        <option value="">কাজের টাইপ যোগ করুনঃ</option>
                                        <option value="সম্পূর্ণ সময়">সম্পূর্ণ সময়</option>
                                        <option value="খন্ডকালীন">খন্ডকালীন</option>
                                        <option value="অস্থায়ী">অস্থায়ী</option>
                                        <option value="চুক্তি">চুক্তি</option>
                                        <option value="ইন্টার্নশীপ">ইন্টার্নশীপ</option>
                                        <option value="স্থায়ী">স্থায়ী</option>
                                        <option value="ঐচ্ছিক">ঐচ্ছিক</option>
                                    </select>
                                    <span class="text-danger">{{$errors->has('job_type') ? $errors->first('job_type'):' '}}</span>
                                </div>
                                <div class="col-md-6" style="padding-right: 0">
                                    <label></label>
                                    <select name="industry" class="form-control">
                                        <option value="">কাজের বিভাগ : </option>
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
                                    <span class="text-danger">{{$errors->has('industry') ? $errors->first('industry'):' '}}</span>
                                </div>
                            </div>
                            <div class="col-md-12 form-group" >
                                <label class="text-success">আপনার নিয়োগ বিজ্ঞপ্তি অবস্থানের নামঃ</label>
                                <input type="text" name="designation" class="form-control" placeholder="আপনার নিয়োগ বিজ্ঞপ্তি অবস্থানের নামঃ">
                                <span class="text-danger">{{$errors->has('designation') ? $errors->first('designation'):' '}}</span>
                            </div>

                            <div class="col-md-12 form-group">
                                <label class="text-success">আপনার আবেদন কি ভাবে রিসিভ করবেন</label>
                                    <select name="recieve_option" class="form-control">
                                        <option value="নিয়োগকারীর ড্যাশবোর্ড">নিয়োগকারীর ড্যাশবোর্ড</option>
                                        <option value="ফোন">ফোন</option>
                                    </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <label class="text-success">প্রতি মাসে বেতনঃ </label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" name="starting_range" class="form-control" placeholder="হইতে">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="ending_range" class="form-control" placeholder="পর্যন্ত">
                                    </div>
                                </div>




                            </div>

                        <div class="col-md-12 form-group">
                                    <label class="text-success">নিয়োগ বিজ্ঞপ্তি পদের সংখ্যা</label>
                                    <input type="number" name="total_vacancies" class="form-control" placeholder="পদের সংখ্যা ">
                        </div>


                            <div class="col-md-12 form-group">
                                <div class="col-md-6" style="padding-left:0">
                                    <label class="text-success">নিয়োগ শেষ সময় তারিখ </label>
                                    <input type="date" name="expire_date" class="form-control">
                                    <span class="text-danger">{{$errors->has('expire_date') ? $errors->first('expire_date'):' '}}</span>
                                </div>
                            </div>




{{--                        --------------------}}



                        <div class="col-md-12 form-group">
                                    <label class="text-success">আবেদনকারীর বয়স:</label>
                                    <input type="number" name="candidate_age" class="form-control" placeholder="১৮ থেকে ৬০ ">
                                    <span class="text-danger">{{$errors->has('expire_date') ? $errors->first('expire_date'):' '}}</span>
                            </div>

                            <div class="col-md-12 form-group">
                                    <label class="text-success">জব লোকেশনঃ</label>
                                    <input type="text" name="job_location" class="form-control" placeholder="জব লোকেশনঃ">
                                    <span class="text-danger">{{$errors->has('expire_date') ? $errors->first('expire_date'):' '}}</span>
                            </div>

                            <div class="col-md-12 form-group">
                                    <label class="text-success">কোম্পানি সুযোগ সুবিধাঃ</label>
                                <select name="company_facility" class="form-control">
                                    <option value="" selected disabled>কোম্পানি সুযোগ সুবিধাঃ</option>
                                    <option value="আছে">আছে</option>
                                    <option value="নাই">নাই</option>
                                </select>
                            </div>

                        <div class="col-md-12 form-group">
                                    <label class="text-success">কোম্পানি যানবাহন সুবিধাঃ</label>
                                <select name="company_transport_facility" class="form-control">
                                    <option value="" selected disabled>কোম্পানি যানবাহন সুবিধাঃ</option>
                                    <option value="আছে">আছে</option>
                                    <option value="নাই">নাই</option>
                                </select>
                            </div>

                        <div class="col-md-12 form-group">
                                    <label class="text-success">কোম্পানি খাবারের ব্যাবস্থাঃ</label>
                                <select name="company_food_facility" class="form-control">
                                    <option value="" selected disabled>কোম্পানি খাবারের ব্যাবস্থাঃ</option>
                                    <option value="আছে">আছে</option>
                                    <option value="নাই">নাই</option>
                                </select>
                            </div>

                        <div class="col-md-12 form-group">
                                    <label class="text-success">কোম্পানি মোবাইল বিলঃ</label>
                                <select name="company_mobile_bill" class="form-control">
                                    <option value="" selected disabled>ককোম্পানি মোবাইল বিলঃ</option>
                                    <option value="আছে">আছে</option>
                                    <option value="নাই">নাই</option>
                                </select>
                            </div>

                        <div class="col-md-12 form-group">
                                    <label class="text-success">কোম্পানি ফেস্টিভ্যাল বোনাসঃ</label>
                                <select name="company_fastival_bonus" class="form-control">
                                    <option value="" selected disabled>কোম্পানি ফেস্টিভ্যাল বোনাসঃ</option>
                                    <option value="আছে">আছে</option>
                                    <option value="নাই">নাই</option>
                                </select>
                            </div>

                        <div class="col-md-12 form-group">
                                    <label class="text-success">কোম্পানি কি প্রকারঃ</label>
                                <select name="company_fee_plan" class="form-control">
                                    <option value="" selected disabled>কোম্পানি কি প্রকারঃ</option>
                                    <option value="ন্যাশনাল">ন্যাশনাল</option>
                                    <option value="ইন্টারন্যাশনাল">ইন্টারন্যাশনাল </option>
                                </select>
                            </div>

                        <div class="col-md-12 form-group">
                                    <label class="text-success">কোম্পানি বেতন ভাড়বেঃ </label>
                                <select name="company_bill_incrase" class="form-control">
                                    <option value="" selected disabled>কোম্পানি বেতন ভাড়বেঃ </option>
                                    <option value="৬ মাস">৬ মাস</option>
                                    <option value="১ বছর">১ বছর</option>
                                    <option value="২ বছর">২ বছর</option>
                                </select>
                            </div>

                        <div class="col-md-12 form-group">
                            <label class="text-success">কোম্পানি ওভার টাইম সুবিধাঃ</label>
                            <select name="company_full_time" class="form-control">
                                <option value="" selected disabled>কোম্পানি ওভার টাইম সুবিধাঃ</option>
                                <option value="আছে">আছে</option>
                                <option value="নাই">নাই</option>
                            </select>
                        </div>


{{-----------------------}}


                        <h3>আপনার  প্রতিষ্ঠান সম্পর্কে</h3><hr/>
                            <div class="col-md-12 form-group">
                                <label class="text-success">কোম্পানির নামঃ</label>
                                <input type="text" name="company_name" class="form-control" placeholder="ম্পানির নামঃ">
                                <span class="text-danger">{{$errors->has('company_name') ? $errors->first('company_name'):' '}}</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="text-success">কোম্পানি কাজের বিবরনঃ</label>
                            <textarea name="company_work_description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-9" style="padding-left: 0">
                                    <label>প্রতিষ্ঠান লোগো আপ করুন </label>
                                    <input class="btn btn-success col-md-9" type="file" accept="image/*" name="company_logo">
                                    <span class="text-danger">{{$errors->has('company_logo') ? $errors->first('company_logo'):' '}}</span>
                                </div>
                                <div class="col-md-5"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <h3>আবেদনকারীর গুরুত্বপূর্ণ ইনফর্মেশন</h3><hr/>
                                <div class="col-md-6" style="padding-left: 0">
                                    <label class="text-success">শিক্ষাগত যোগ্যতা:</label>
                                    <select name="minimum_requirement" class="form-control">
                                        <option value="">শিক্ষাগত যোগ্যতা </option>
                                        <option value="">৫ম পাস</option>
                                        <option value="উচ্চ মাধ্যমিক শিক্ষা">উচ্চ মাধ্যমিক শিক্ষা</option>
                                        <option value="এসএসসি / ও লেভেল">এসএসসি / ও লেভেল</option>
                                        <option value="এইচএসসি / এ লেভেল">এইচএসসি / এ লেভেল</option>
                                        <option value="ডিপ্লোমা">ডিপ্লোমা</option>
                                        <option value="ব্যাচেলরস / সম্মান">ব্যাচেলরস / সম্মান</option>
                                        <option value="মাস্টার্স">মাস্টার্স</option>
                                        <option value="পিএইচডি / ডক্টরেট">পিএইচডি / ডক্টরেট</option>
                                    </select>
                                </div>
                                <div class="col-md-6" style="padding-right: 0">
                                    <label class="text-success">আমার অভিজ্ঞতা</label>
                                    <input type="text" name="experience"  class="form-control" placeholder="আমার অভিজ্ঞতা">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-6" style="padding-left: 0">
                                    <label class="text-success">শিক্ষাগত অভিজ্ঞতা:</label>
                                    <select name="education_sector" class="form-control">
                                        <option value="">শিক্ষাগত অভিজ্ঞতা </option>
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
                                <div class="col-md-6" style="padding-right: 0">
                                    <label></label>
                                    <input type="text" name="skill"  class="form-control" placeholder="কাজের অভিজ্ঞতা ">
                                    <span class="text-danger">{{$errors->has('skill') ? $errors->first('skill'):' '}}</span>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="col-md-6" style="padding-left: 0">
                                    <label></label>
                                    <input type="number" name="age_limit"  class="form-control" placeholder="আবেদনকারীর বয়স   ">
                                </div>
                                <div class="col-md-6" style="padding-right: 0">
                                    <label></label>
                                    <select name="gender" class="form-control">
                                        <option value="পুরুষ / নারী">পুরুষ / নারী  </option>
                                        <option value="পুরুষ">পুরুষ</option>
                                        <option value="নারী">নারী</option>
                                        <option value="অন্যান্য">অন্যান্য</option>
                                    </select>
                                </div>
                            </div>










{{--                        -------------------------}}




                            <div class="col-md-12 form-group">
                                <div class="col-md-6" style="padding-left: 0">
                                    <label class="text-success">আপনার মোবাইল / ফোন নাম্বার </label>
                                    <input type="text" name="phone_number" class="form-control" placeholder="ফোন নাম্বার" value="{{$frontUser->phone_number}}">
                                    <span class="text-danger">{{$errors->has('phone_number') ? $errors->first('phone_number'):' '}}</span>
                                </div>
                            </div>

                                <div class="col-md-12 form-group">
                                    <div class="col-md-6" style="padding-left: 0">
                                        <label class="text-success">কোন পদে আবেদন করছেনঃ</label>
                                        <input type="text" name="company_place_type"  class="form-control" placeholder="কোন পদে আবেদন করছেনঃ">
                                    </div>
                                    <div class="col-md-6" style="padding-right: 0">
                                        <label class="text-success">কোন ট্রেনিং করছেনঃ</label>
                                        <select name="any_training_expairance" class="form-control">
                                            <option value="" selected disabled>কোন ট্রেনিং করছেনঃ</option>
                                            <option value="আছে">আছে</option>
                                            <option value="নাই">নাই</option>
                                        </select>
                                    </div>
                                </div>

                        <div class="col-md-12 form-group">
                                    <div class="col-md-6" style="padding-right: 0">
                                        <label class="text-success">কোন ওয়্যাকশপ করছেনঃ</label>
                                        <select name="any_workshop_experience" class="form-control">
                                            <option value="" selected disabled>কোন ওয়্যাকশপ করছেনঃ</option>
                                            <option value="আছে">আছে</option>
                                            <option value="নাই">নাই</option>
                                        </select>
                                    </div>

                            <div class="col-md-6" style="padding-right: 0">
                                        <label class="text-success">কম্পিউটার ট্রেনিং করছেনঃ</label>
                                        <select name="any_computer_training_experience" class="form-control">
                                            <option value="" selected disabled>কম্পিউটার ট্রেনিং করছেনঃ</option>
                                            <option value="আছে">আছে</option>
                                            <option value="নাই">নাই</option>
                                        </select>
                             </div>
                         </div>


                        <div class="col-md-12 form-group">
                                    <div class="col-md-6" style="padding-right: 0">
                                        <label class="text-success">ভোটার আইডি নাম্বারঃ</label>
                                        <input type="number" name="voter_id_number" class="form-control" placeholder="ফভোটার আইডি নাম্বারঃ" value="{{$frontUser->phone_number}}">
                                    </div>
                         </div>




{{--                        -------------------}}

                        <button type="submit" class="btn btn-success btn-lg">আপনার এই বিজ্ঞাপন পোস্ট করুন</button>
                        {{Form::close()}}
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <i class="text-success">ঘরেবসে.কম এ আপনি পোস্ট করতে হলে ঘরেবসে.কম এর নিয়ম অনুযায়ী পোস্ট করতে হবে।</i>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<!--end body-->


<!--rules start-->

@include('frontend.includes.important-rules')

@endsection