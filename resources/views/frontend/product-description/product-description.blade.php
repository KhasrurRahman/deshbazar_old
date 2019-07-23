@extends('frontend.master')
@section('title')
    Post product Ad
@endsection

@section('body')
    <div class="container" id="elct_post_from">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <h3>কোনো পণ্য বা সেবা বিক্রি করুন</h3><hr/>
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
                            <p>কন্ডিশন<p>
                            <label><input type="radio" name="product_condition" value="ব্যবহৃত" />ব্যবহৃত</label>
                            <label><input type="radio" name="product_condition" value="নতুন" />নতুন</label>
                                <span class="text-danger">{{$errors->has('product_condition') ? $errors->first('product_condition'):' '}}</span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="product_brand" placeholder="ব্র্যান্ড">
                            <span class="text-danger">{{$errors->has('product_brand') ? $errors->first('product_brand'):' '}}</span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="product_model" placeholder="মডেল ">
                            <span class="text-danger">{{$errors->has('product_model') ? $errors->first('product_model'):' '}}</span>
                        </div>
                        <div class="col-md-12 form-group">
                            <p>বিবরণ ( 0 / 1000 )</p>
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