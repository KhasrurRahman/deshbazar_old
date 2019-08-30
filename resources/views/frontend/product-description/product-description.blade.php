@extends('frontend.master')
@section('title')
    Post product Ad
@endsection

@section('body')
    <div class="container" id="elct_post_from">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 panel panel-default" style="box-shadow: 5px 8px 12px;">
                <div class="panel-body" >
                    <div class="row" >


                        <div class="col-md-12" style="border-right: 2px solid">
                            <h3>আপনি কিছু বিক্রি করতে চান? নিছের ফরম পুরন করুন, আপনার পণ্য বিজ্ঞাপন দিয়ে বিক্রি করুন খুব  সহজেঃ </h3><hr><hr/>
                            {{Form::open(['route'=>'save-product-information','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}

                            <div class="col-md-12 form-group">
                                <input type="hidden" name="user_id" value="{{$frontUser->id}}"/>
                                <input type="hidden" name="category_id" value="{{$categoryId}}"/>
                                <input type="hidden" name="subcategory_id" value="{{$subcategoryId}}"/>
                                <input type="hidden" name="country_id" value="{{$countryId}}"/>
                                <input type="hidden" name="division_id" value="{{$divisionId}}"/>
                                <input type="hidden" name="district_id" value="{{$districtId}}"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <h4>আপনার বিজ্ঞাপন এর নামঃ</h4>
                                <input type="text" class="form-control" name="ad_title" placeholder="আপনার বিজ্ঞাপন এর নাম">
                                <span class="text-danger">{{$errors->has('ad_title') ? $errors->first('ad_title'):' '}}</span>
                            </div>

                            <div class="row">
                                <hr /><h4>আপনার বিজ্ঞাপন এর ছবি আপলোড করুন:</h4><hr />
                                <div class="col-md-8 form-group">
                                    <div class="col-md-12 form-group">
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

                                <div class="col-md-4">
                                    <div class="col-md-12" style="border: 1px solid">
                                        <p style="text-align: center">মোবাইল বা ক্যামেরা থেকে ছবি তুলে পোস্ট করুন, বেশি রেসপন্স পাবেন</p>
                                        <IMG src="{{asset('/') }}front/images/DASD.jpg" style="    height: 173px;
    width: 255px;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr />
                                <h4>আপনার বিজ্ঞাপন এর শুরু থেকে শেষ পযন্ত বিবরণ দিনঃ</h4><hr><hr/>
                                <h4>কন্ডিশন:</h4>
                                    <label><input type="radio" name="product_condition" value="ব্যবহৃত" />ব্যবহৃত</label>
                                    <label><input type="radio" name="product_condition" value="নতুন" />নতুন</label>
                                    <span class="text-danger">{{$errors->has('product_condition') ? $errors->first('product_condition'):' '}}</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <span>ব্র্যান্ডঃ</span>
                                <input type="text" class="form-control" name="product_brand" placeholder="ব্র্যান্ড">
                                <span class="text-danger">{{$errors->has('product_brand') ? $errors->first('product_brand'):' '}}</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <span>মডেলডঃ</span>
                                <input type="text" class="form-control" name="product_model" placeholder="মডেল ">
                                <span class="text-danger">{{$errors->has('product_model') ? $errors->first('product_model'):' '}}</span>
                            </div>
                            <div class="col-md-12 form-group">
                                <span>বিবরণ ( 0 / 1000 )</span>
                                <textarea name="product_description" id="editor" class="form-control" placeholder="বিবরণ  " rows="8" cols="10"></textarea>
                                <span class="text-danger">{{$errors->has('product_description') ? $errors->first('product_description'):' '}}</span>
                            </div>

                            <div class="col-md-12 form-group">
                                <p>জেনুইন  </p>
                                <label><input type="radio" name="product_reality" value="আসল" />আসল</label>
                                <label><input type="radio" name="product_reality" value="রেপ্লিকা/ক্লোন" />রেপ্লিকা/ক্লোন</label>
                                <span class="text-danger">{{$errors->has('product_reality') ? $errors->first('product_reality'):' '}}</span>
                            </div>
                            <div class="col-md-12 form-group" style="margin-top: 20px">
                                <div class="col-md-5" style="padding-left: 0">
                                    <label>মূল্য (৳)</label>
                                    <input type="number" name="product_price" class="form-control" placeholder="মূল্য (৳)" >
                                    <span class="text-danger">{{$errors->has('product_price') ? $errors->first('product_price'):' '}}</span>
                                    <input type="checkbox" name="product_price_check" value="আলোচনা সাপেক্ষে" style="margin-top: 15px"> আলোচনা সাপেক্ষে
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

                            <button type="submit" class="btn btn-success btn-lg">আপনার এই বিজ্ঞাপন পোস্ট করুন</button>

                            {{Form::close()}}
                        </div>




                        <div class="col-md-4" style="margin-top: 30px">
                            <div class="col-md-12" style="border: 1px solid">
                                <p style="text-align: center">আপনার যে ফিল্ড লাগবে সেই ফিল্ড ব্যাবহার করুন । </p>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top: 30px">
                            <div class="col-md-12" style="border: 1px solid">
                                <p style="text-align: center">আপনি ভালো ভাবে বিজ্ঞাপন এর তথ্য দিলে ভালো বিক্রয় হবে । </p>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top: 30px">
                            <div class="col-md-12" style="border: 1px solid">
                                <p style="text-align: center">আপনি আপনার পণ্য ভালো ভাবে বিবরণ টাইপ করুন।  </p>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top: 30px">
                            <div class="col-md-12" style="border: 1px solid">
                                <p style="text-align: center">আপনার উপজেলা ,গ্রাম ও ওয়ার্ড টাইপ করুন    </p>
                            </div>
                        </div>
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