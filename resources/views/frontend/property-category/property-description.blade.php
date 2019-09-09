@extends('frontend.master')
@section('title')
    Post Property Ad
@endsection

@section('body')
    <div class="container" id="elct_post_from">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 panel panel-default" style="box-shadow: 5px 8px 12px;">
                <div class="panel-body">
                    <div class="col-md-12" >
                        <h3>ভাড়া / বিক্রির জন্য কোন প্রপার্টি প্রস্তাব করুন</h3><hr/>
                        {{Form::open(['route'=>'save-property-information','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}

                        <div class="col-md-12 form-group">
                            <input type="hidden" name="user_id" value="{{Session::get('frontUserId')}}"/>
                            <input type="hidden" name="category_id" value="{{$categoryId}}"/>
                            <input type="hidden" name="subcategory_id" value="{{$subcategoryId}}"/>
                            <input type="hidden" name="country_id" value="{{$countryId}}"/>
                            <input type="hidden" name="division_id" value="{{$divisionId}}"/>
                            <input type="hidden" name="district_id" value="{{$districtId}}"/>
                        </div>

                        <div class="col-md-12 form-group">
                            <label class="text-success">আপনার বিজ্ঞাপন এর নামঃ </label>
                            <input type="text" class="form-control" name="ad_title" placeholder="আপনার বিজ্ঞাপন এর নামঃ">
                            <span class="text-danger">{{$errors->has('ad_title') ? $errors->first('ad_title'):' '}}</span>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-md-12 form-group">
                                    <hr /><label class="text-success">আপনার বিজ্ঞাপন এর ছবি আপলোড করুন</label><hr />
                                    <span class="col-md-3">১ম ছবি</span>
                                    <input class="btn btn-success col-md-9" type="file" accept="image/*" name="product_image1">
                                    <span class="text-danger">{{$errors->has('product_image1') ? $errors->first('product_image1'):' '}}</span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <span class="col-md-3">২য় ছবি</span>
                                    <input class="btn btn-success col-md-9" type="file" accept="image/*" name="product_image2">
                                    <span class="text-danger">{{$errors->has('product_image2') ? $errors->first('product_image2'):' '}}</span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <span class="col-md-3">৩য় ছবি</span>
                                    <input class="btn btn-success col-md-9" type="file" accept="image/*" name="product_image3">
                                    <span class="text-danger">{{$errors->has('product_image3') ? $errors->first('product_image3'):' '}}</span>
                                </div>
                            </div>

                            <div class="col-md-4" style="margin-top: 30px">
                                <div class="col-md-12" style="border: 1px solid">
                                    <p style="text-align: center">মোবাইল বা ক্যামেরা থেকে ছবি তুলে পোস্ট করুন, বেশি রেসপন্স পাবেন</p>
                                    <IMG src="{{asset('/') }}front/images/DASD.jpg" style="    height: 173px;
    width: 255px;">
                                </div>
                            </div>

                        </div>



                        <div class="col-md-12">
                            <hr />
                            <label class="text-success">আপনার বিজ্ঞাপন এর শুরু থেকে শেষ পযন্ত বিবরণ দিনঃ</label><hr/>
                        </div>

                        <div class="row">
                            <div class="col-md-8">

                                <div class="col-md-12">
                                    <label class="text-success">কন্ডিশন:</label><br>
                                    <label><input type="radio" name="product_condition" value="ব্যবহৃত" />ব্যবহৃত</label>
                                    <label><input type="radio" name="product_condition" value="নতুন" />নতুন</label>
                                    <span class="text-danger">{{$errors->has('product_condition') ? $errors->first('product_condition'):' '}}</span>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="text-success">বেড রুম:</label>
                                    <select class="form-control" name="bed">
                                        <option value="">বেড  </option>
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
                                <div class="col-md-12 form-group">
                                    <label class="text-success">বাথরুম:</label>
                                    <select class="form-control" name="bath">
                                        <option value="">বাথ  </option>
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

                                <div class="col-md-12 form-group" >
                                    <div class="col-md-9" style="padding: 0">
                                        <label class="text-success">ফ্লাট আয়তনঃ</label>
                                        <input  class="form-control" name="home_area" type="number" placeholder="ফ্ল্যাট / বাড়ির আয়তন (বিকল্প)">
                                    </div>
                                    <div class="col-md-3" style="padding-right: 0">
                                        <label></label>
                                        <select class="form-control" name="home_area_unit">
                                            <option value="বর্গফুট">বর্গফুট</option>
                                            <option value="ইউনিট">ইউনিট</option>
                                            <option value="কাঠা">কাঠা </option>
                                            <option value="শতক">শতক</option>
                                            <option value="ডেসিমাল">ডেসিমাল</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group" >
                                    <div class="col-md-9" style="padding: 0">
                                        <label class="text-success">জমির আয়তন:</label>
                                        <input  class="form-control" name="land_area" type="number" placeholder="জমির আয়তন  (বিকল্প) ">
                                    </div>
                                    <div class="col-md-3" style="padding-right: 0">
                                        <label></label>
                                        <select class="form-control" name="land_area_unit">
                                            <option value="ইউনিট">ইউনিট</option>
                                            <option value="কাঠা" selected="selected">কাঠা </option>
                                            <option value="বিঘা">বিঘা</option>
                                            <option value="একর">একর</option>
                                            <option value="শতক">শতক</option>
                                            <option value="ডেসিমাল">ডেসিমাল</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="text-success">আপনার ঠিকানা :</label>
                                    <input  class="form-control" name="location_point" type="text" placeholder="ঠিকানা (বিকল্প)  ">
                                    <span class="text-danger">{{$errors->has('location_point') ? $errors->first('location_point'):' '}}</span>
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="col-md-12" style="border: 1px solid;margin-top: 30px">
                                    <label style="text-align: center">আপনার যে ফিল্ড লাগবে সেই ফিল্ড ব্যাবহার করুন । </label>
                                </div>

                                <div class="col-md-12" style="margin-top: 30px;border: 1px solid">
                                    <label style="text-align: center">আপনি ভালো ভাবে বিজ্ঞাপন এর তথ্য দিলে ভালো বিক্রয় হবে । </label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-md-12 form-group">
                                    <label class="text-success">বিবরণ ( 0 / 4000 )</label>
                                    <textarea name="description" id="editor" class="form-control" placeholder="বিবরণ  " rows="8" cols="10"></textarea>
                                    <span class="text-danger">{{$errors->has('description') ? $errors->first('description'):' '}}</span>
                                </div>
                            </div>

                            <div class="col-md-4" style="margin-top: 30px">
                                <div class="col-md-12" style="border: 1px solid">
                                    <label style="text-align: center">আপনি আপনার পণ্য ভালো ভাবে বিবরণ টাইপ করুন।  </label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-md-12 form-group">
                                    <label class="text-success">আপনার জমি  </label>
                                    <label><input type="radio" name="palce_type" value="কৃষি" />কৃষি</label>
                                    <label><input type="radio" name="palce_type" value="ররবাণিজ্যিক" />রবাণিজ্যিক</label>
                                    <label><input type="radio" name="palce_type" value="আবাসিক" />আবাসিক</label>
                                    <label><input type="radio" name="palce_type" value="রাস্তার পার্শে" />রাস্তার পার্শে</label>
                                    <span class="text-danger">{{$errors->has('product_reality') ? $errors->first('product_reality'):' '}}</span>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: 30px">
                                <div class="col-md-12" style="border: 1px solid">
                                    <label style="text-align: center">আপনার কি প্রোজেক্ট আপনি  চেক বক্স ক্লিক করুন</label>
                                </div>
                            </div>


                        </div>


                        <div class="col-md-12 form-group" style="margin-top: 20px">
                            <div class="col-md-5" style="padding-left: 0">
                                <label class="text-success">আপনার পণ্যর মূল্য (৳)</label>
                                <input type="number" name="property_price" class="form-control" placeholder="মূল্য (৳)" >
                                <span class="text-danger">{{$errors->has('property_price') ? $errors->first('property_price'):' '}}</span>
                                <input type="checkbox" name="property_price_check" value="আলোচনা সাপেক্ষে" style="margin-top: 15px"> আলোচনা সাপেক্ষে
                            </div>
                            <div class="col-md-7"></div>
                        </div>
                        <div class="col-md-12 form-group">
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="text-success">আপনার মোবাইল </label>
                            <input type="text" name="phone_number" class="form-control" placeholder="ফোন নাম্বার" value="{{$frontUser->phone_number}}">
                            <span class="text-danger">{{$errors->has('phone_number') ? $errors->first('phone_number'):' '}}</span>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-md-12 form-group">
                                    <label class="text-success">আপনার উপজেলা </label>
                                    <input type="text" name="location" class="form-control" placeholder="উপজেলা ">
                                    <span class="text-danger">{{$errors->has('location') ? $errors->first('location'):' '}}</span>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="text-success">আপনার গ্রাম ও ওয়ার্ডঃ</label>
                                    <input type="text" name="village_word" class="form-control" placeholder="আপনার গ্রাম ও ওয়ার্ড ">
                                    <span class="text-danger">{{$errors->has('location') ? $errors->first('village_word'):' '}}</span>
                                </div>
                            </div>

                            <div class="col-md-4" style="margin-top: 30px">
                                <div class="col-md-12" style="border: 1px solid">
                                    <label style="text-align: center">আপনার উপজেলা ,গ্রাম ও ওয়ার্ড টাইপ করুন</label>
                                </div>
                            </div>
                        </div>




                        <button type="submit" class="btn btn-success btn-lg">আপনার এই বিজ্ঞাপন পোস্ট করুন</button>

                        {{Form::close()}}
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <i class="text-success">ঘরেবসে.কম এ আপনি পোস্ট করতে হলে ঘরেবসে.কম এর নিয়ম অনুযায়ী পোস্ট করতে হবে।</i>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!--end body-->


    <!--rules start-->

    @include('frontend.includes.important-rules')


@endsection