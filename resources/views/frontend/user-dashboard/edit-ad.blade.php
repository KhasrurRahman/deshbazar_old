@extends('frontend.master')
@section('title')
    Edit Ad
@endsection

@section('body')
    <div class="row table-responsive">
        <div class="col-md-offset-2 col-md-8" >
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <h4 class="text-success text-center">বিজ্ঞাপন সম্পাদনা করুন</h4>
                </div>
                <div class="panel-body"  style="box-shadow: 5px 8px 12px;">

{{--                    only product--}}

                    @if(isset($ad->product_condition))
                        {{Form::open(['route'=>'update-product-ad','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">বিজ্ঞাপন শিরোনাম</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->ad_title}}" name="ad_title" class="form-control"/>
                                <input type="hidden" value="{{$ad->id}}" name="product_id" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">১ম ছবি</label>
                            <div class="col-md-8">
                                <input type="file" name="product_image1" accept="image/*"/>
                                <br />
                                <img src="{{asset($ad->product_image1)}}" alt="" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">২য় ছবি</label>
                            <div class="col-md-8">
                                <input type="file" name="product_image2" accept="image/*"/>
                                <br />
                                <img src="{{asset($ad->product_image2)}}" alt="" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">৩য় ছবি</label>
                            <div class="col-md-8">
                                <input type="file" name="product_image3" accept="image/*"/>
                                <br />
                                <img src="{{asset($ad->product_image3)}}" alt="" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">কন্ডিশন</label>
                            <div class="col-md-8 radio">
                                <label><input type="radio" name="product_condition" value="ব্যবহৃত" {{$ad->product_condition == "ব্যবহৃত" ? 'checked':''}}/>ব্যবহৃত</label>
                                <label><input type="radio" name="product_condition" value="নতুন" {{$ad->product_condition == "নতুন" ? 'checked':''}}/>নতুন</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">ব্র্যান্ড</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->product_brand}}" name="product_brand" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">মডেল</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->product_model}}" name="product_model" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">মডেল সাল ও সিসিঃ</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="product_model_year_cc"value="{{$ad->product_model_year_cc}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">নিবন্ধন সালঃ</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="product_publish_year" value="{{$ad->nibondhon_year}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">নআপনার যানবাহন কত কিলোমিটার চলচ্ছেঃ</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="product_km_ride" value="{{$ad->km_ride}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">আপনার গাড়ি এই যাবত কতবার সার্ভিস হয়েছেঃ</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="product_servising_time" value="{{$ad->servising}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">আপনার উপজেলা</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="location" value="{{$ad->location}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">আপনার গ্রাম ও ওয়ার্ডঃ</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="product_village_word" value="{{$ad->village_ord}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">জেনুইন</label>
                            <div class="col-md-8 radio">
                                <label><input type="radio" name="product_reality" value="আসল" {{$ad->product_reality == "আসল" ? 'checked':''}}/>আসল</label>
                                <label><input type="radio" name="product_reality" value="রেপ্লিকা/ক্লোন" {{$ad->product_reality == "রেপ্লিকা/ক্লোন" ? 'checked':''}}/>রেপ্লিকা/ক্লোন</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-success control-label col-md-4">কি তেলে চলেঃ </label><br>
                            <div class="col-md-8">
                                <label><input type="radio" name="product_oil" value="পেট্রল"{{$ad->fuel == "পেট্রল" ? 'checked':''}} />পেট্রল</label>
                                <label><input type="radio" name="product_oil" value="ডিজেল" {{$ad->fuel == "ডিজেল" ? 'checked':''}}/>ডিজেল</label>
                                <label><input type="radio" name="product_oil" value="অকটেন" {{$ad->fuel == "অকটেন" ? 'checked':''}}/>অকটেন </label>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">মূল্য (৳)</label>
                            <div class="col-md-8">
                                <input type="number" value="{{$ad->product_price}}" name="product_price" class="form-control"/>
                                <input type="checkbox" name="product_price_check" value="আলোচনা সাপেক্ষে" {{$ad->product_price_check == "আলোচনা সাপেক্ষে" ? 'checked':''}} style="margin-top: 15px"> আলোচনা সাপেক্ষে
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">বিবরণ</label>
                            <div class="col-md-8">
                                <textarea name="product_description" id="editor" class="form-control">{{$ad->product_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Product Ad" />
                            </div>
                        </div>
                        {{Form::close()}}













{{--                        //for job--}}




                    @elseif(isset($ad->job_type))
                        {{Form::open(['route'=>'update-job-ad','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="form-group">
                            <label class="control-label col-md-4">কাজের শিরোনাম</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->ad_title}}" name="ad_title" class="form-control"/>
                                <input type="hidden" value="{{$ad->id}}" name="job_id" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">কাজের টাইপ</label>
                            <div class="col-md-8">
                                <select class="form-control" name="job_type">
                                    <option value="{{$ad->job_type}}">{{$ad->job_type}}</option>
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
                            <label class="control-label col-md-4">কাজের বিভাগ</label>
                            <div class="col-md-8">
                                <select class="form-control" name="industry">
                                    <option value="{{$ad->industry}}">{{$ad->industry}}</option>
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
                            <label class="control-label col-md-4">চাকুরি অবস্তানের নাম</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->designation}}" name="designation" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">আবেদন কি ভাবে রিসিভ করবেন</label>
                            <div class="col-md-8">
                                <select class="form-control" name="recieve_option">
                                    <option value="{{$ad->recieve_option}}">{{$ad->recieve_option}}</option>
                                    <option value="নিয়োগকারীর ড্যাশবোর্ড">নিয়োগকারীর ড্যাশবোর্ড</option>
                                    <option value="ফোন">ফোন</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">মাসিক বেতন</label>
                            <div class="col-md-8">
                                <div class="col-md-4">
                                    <input type="number" value="{{$ad->starting_range}}" name="starting_range" class="form-control" placeholder="হইতে">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" value="{{$ad->ending_range}}" name="ending_range" class="form-control" placeholder="পর্যন্ত">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">পদের সংখ্যা</label>
                            <div class="col-md-8">
                                <input type="number" value="{{$ad->total_vacancies}}" name="total_vacancies" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">আবেদনের শেষ সময়</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->expire_date}}" name="expire_date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">কোম্পানি</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->company_name}}" name="company_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">প্রতিষ্ঠান লোগো</label>
                            <div class="col-md-8">
                                <input type="file" name="company_logo" accept="image/*"/>
                                <br />
                                <img src="{{asset($ad->company_logo)}}" alt="" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">শিক্ষাগত যোগ্যতা</label>
                            <div class="col-md-8">
                                <select class="form-control" name="minimum_requirement">
                                    <option value="{{$ad->minimum_requirement}}">{{$ad->minimum_requirement}}</option>
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
                            <label class="control-label col-md-4">অভিজ্ঞতা</label>
                            <div class="col-md-8">
                                <input type="number" value="{{$ad->experience}}" name="experience" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">শিক্ষাগত অভিজ্ঞতা</label>
                            <div class="col-md-8">
                                <select class="form-control" name="education_sector">
                                    <option value="{{$ad->education_sector}}">{{$ad->education_sector}}</option>
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
                            <label class="control-label col-md-4">কাজের অভিজ্ঞতা</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->skill}}" name="skill" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">আবেদনকারীর বয়স</label>
                            <div class="col-md-8">
                                <input type="number" value="{{$ad->age_limit}}" name="age_limit" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">জেন্ডার</label>
                            <div class="col-md-8">
                                <select class="form-control" name="gender">
                                    <option value="{{$ad->gender}}">{{$ad->gender}}</option>
                                    <option value="পুরুষ / নারী">পুরুষ / নারী  </option>
                                    <option value="পুরুষ">পুরুষ</option>
                                    <option value="নারী">নারী</option>
                                    <option value="অন্যান্য">অন্যান্য</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">বিবরণ</label>
                            <div class="col-md-8">
                                <textarea name="description" id="editor" class="form-control">{{$ad->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Job Ad" />
                            </div>
                        </div>
                        {{Form::close()}}



{{--                        //for property--}}


                    @else
                        {{Form::open(['route'=>'update-property-ad','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">বিজ্ঞাপন শিরোনাম</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->ad_title}}" name="ad_title" class="form-control"/>
                                <input type="hidden" value="{{$ad->id}}" name="property_id" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">১ম ছবি</label>
                            <div class="col-md-8">
                                <input type="file" name="product_image1" accept="image/*"/>
                                <br />
                                <img src="{{asset($ad->product_image1)}}" alt="" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">২য় ছবি</label>
                            <div class="col-md-8">
                                <input type="file" name="product_image2" accept="image/*"/>
                                <br />
                                <img src="{{asset($ad->product_image2)}}" alt="" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">৩য় ছবি</label>
                            <div class="col-md-8">
                                <input type="file" name="product_image3" accept="image/*"/>
                                <br />
                                <img src="{{asset($ad->product_image3)}}" alt="" width="100" height="100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">বেড</label>
                            <div class="col-md-8">
                                <select class="form-control" name="bed">
                                    <option value="{{$ad->bed}}">{{$ad->bed}}</option>
                                    <option value="1">১</option>
                                    <option value="2">২</option>
                                    <option value="3">৩</option>
                                    <option value="4">৪</option>
                                    <option value="5">৫</option>
                                    <option value="6">৬</option>
                                    <option value="7">৭</option>
                                    <option value="8">৮</option>
                                    <option value="9">৯</option>
                                    <option value="10">১০</option>
                                    <option value="10+">১০+</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">বাথ</label>
                            <div class="col-md-8">
                                <select class="form-control" name="bath">
                                    <option value="{{$ad->bath}}">{{$ad->bath}}</option>
                                    <option value="1">১</option>
                                    <option value="2">২</option>
                                    <option value="3">৩</option>
                                    <option value="4">৪</option>
                                    <option value="5">৫</option>
                                    <option value="6">৬</option>
                                    <option value="7">৭</option>
                                    <option value="8">৮</option>
                                    <option value="9">৯</option>
                                    <option value="10">১০</option>
                                    <option value="10+">১০+</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-4 text-success">ফ্ল্যাট / বাড়ির আয়তন</label>
                            <div class="col-md-8">
                                <div class="col-md-7" style="padding: 0">
                                    <input  class="form-control" name="home_area" value="{{$ad->home_area}}" type="number" >
                                </div>
                                <div class="col-md-5" style="padding-right: 0">
                                    <select class="form-control" name="home_area_unit">
                                        <option value="{{$ad->home_area_unit}}">{{$ad->home_area_unit}}</option>
                                        <option value="বর্গফুট">বর্গফুট</option>
                                        <option value="ইউনিট">ইউনিট</option>
                                        <option value="কাঠা">কাঠা </option>
                                        <option value="শতক">শতক</option>
                                        <option value="ডেসিমাল">ডেসিমাল</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" >
                            <label class="control-label col-md-4 text-success">জমির আয়তন </label>
                            <div class="col-md-8">
                                <div class="col-md-7" style="padding: 0">
                                    <input  class="form-control" name="land_area" value="{{$ad->land_area}}" type="number" >
                                </div>
                                <div class="col-md-5" style="padding-right: 0">
                                    <select class="form-control" name="land_area_unit">
                                        <option value="{{$ad->land_area_unit}}">{{$ad->land_area_unit}}</option>
                                        <option value="ইউনিট">ইউনিট</option>
                                        <option value="কাঠা">কাঠা </option>
                                        <option value="বিঘা">বিঘা</option>
                                        <option value="একর">একর</option>
                                        <option value="শতক">শতক</option>
                                        <option value="ডেসিমাল">ডেসিমাল</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                            <div class="form-group">
                                <label class="control-label col-md-4 text-success">আপনার জমি  </label>

                                <div class="col-md-8">
                                    <label><input type="radio" name="palce_type" value="কৃষি" value="পেট্রল" {{$ad->palce_type == "কৃষি" ? 'checked':''}}/>কৃষি</label>

                                    <label><input type="radio" name="palce_type" value="ররবাণিজ্যিক" {{$ad->palce_type == "রবাণিজ্যিক" ? 'checked':''}} />রবাণিজ্যিক</label>

                                    <label><input type="radio" name="palce_type" value="আবাসিক" {{$ad->palce_type == "আবাসিক" ? 'checked':''}}/>আবাসিক</label>

                                    <label><input type="radio" name="palce_type" value="রাস্তার পার্শে" {{$ad->palce_type == "রাস্তার পার্শে" ? 'checked':''}}/>রাস্তার পার্শে</label>
                                </div>

                            </div>


                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">ঠিকানা</label>
                            <div class="col-md-8">
                                <input type="text" value="{{$ad->location_point}}" name="location_point" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">আপনার গ্রাম ও ওয়ার্ডঃ</label>
                            <div class="col-md-8">
                                <input type="text" name="village_word" class="form-control" value="{{$ad->village_word}}">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">মূল্য (৳)</label>
                            <div class="col-md-8">
                                <input type="number" value="{{$ad->property_price}}" name="property_price" class="form-control"/>
                                <input type="checkbox" name="property_price_check" value="আলোচনা সাপেক্ষে" {{$ad->property_price_check == "আলোচনা সাপেক্ষে" ? 'checked':''}} style="margin-top: 15px"> আলোচনা সাপেক্ষে
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 text-success">বিবরণ</label>
                            <div class="col-md-8">
                                <textarea name="description" id="editor" class="form-control">{{$ad->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Property Ad" />
                            </div>
                        </div>
                        {{Form::close()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection