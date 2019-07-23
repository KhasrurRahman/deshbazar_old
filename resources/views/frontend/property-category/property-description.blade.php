@extends('frontend.master')
@section('title')
    Post Property Ad
@endsection

@section('body')
    <div class="container" id="elct_post_from">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
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
                            <input type="text" class="form-control" name="ad_title" placeholder="বিজ্ঞাপন শিরোনাম">
                            <span class="text-danger">{{$errors->has('ad_title') ? $errors->first('ad_title'):' '}}</span>
                        </div>
                        <div class="col-md-12 form-group">
                            <hr /><h4>ছবি যোগ করুন</h4><hr />
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

                        <div class="col-md-12">
                            <hr />
                            <h4>বিস্তারিত তথ্য দিন</h4><hr/>
                        </div>
                        <div class="col-md-12 form-group">
                            <label></label>
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
                            <label></label>
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
                                <label></label>
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
                                <label></label>
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
                            <label></label>
                            <input  class="form-control" name="location_point" type="text" placeholder="ঠিকানা (বিকল্প)  ">
                            <span class="text-danger">{{$errors->has('location_point') ? $errors->first('location_point'):' '}}</span>
                        </div>
                        <div class="col-md-12 form-group">
                            <p>বিবরণ ( 0 / 1000 )</p>
                            <textarea name="description" id="editor" class="form-control" placeholder="বিবরণ  " rows="8" cols="10"></textarea>
                            <span class="text-danger">{{$errors->has('description') ? $errors->first('description'):' '}}</span>
                        </div>
                        <div class="col-md-12 form-group" style="margin-top: 20px">
                            <div class="col-md-5" style="padding-left: 0">
                                <label>মূল্য (৳)</label>
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
                        <div class="col-md-12 form-group">
                            <label class="text-success">আপনার উপজেলা </label>
                            <input type="text" name="location" class="form-control" placeholder="উপজেলা ">
                            <span class="text-danger">{{$errors->has('location') ? $errors->first('location'):' '}}</span>
                        </div>

                        <button type="submit" class="btn btn-ad-post btn-lg">আপনার এই বিজ্ঞাপন পোস্ট করুন</button>

                        {{Form::close()}}
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <i class="text-warning">ঘরেবসে.কম এ আপনি পোস্ট করতে হলে ঘরেবসে.কম এর নিয়ম অনুযায়ী পোস্ট করতে হবে।</i>
            </div>
            <div class="col-md-1"></div>
        </div>

    </div>
    <!--end body-->


    <!--rules start-->

    @include('frontend.includes.important-rules')


@endsection