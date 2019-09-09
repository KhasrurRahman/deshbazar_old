@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="box-shadow: 5px 8px 12px;">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit Property Form</h4>
                </div>
                <div class="panel-body">
                    {{Form::open(['route'=>'update-property-ad','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">বিজ্ঞাপন শিরোনাম</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$property->ad_title}}" name="ad_title" class="form-control"/>
                            <input type="hidden" value="{{$property->id}}" name="property_id" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">১ম ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image1" accept="image/*"/>
                            <br />
                            <img src="{{asset($property->product_image1)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">২য় ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image2" accept="image/*"/>
                            <br />
                            <img src="{{asset($property->product_image2)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">৩য় ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image3" accept="image/*"/>
                            <br />
                            <img src="{{asset($property->product_image3)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">বেড</label>
                        <div class="col-md-8">
                            <select class="form-control" name="bed">
                                <option value="{{$property->bed}}">{{$property->bed}}</option>
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
                                <option value="{{$property->bath}}">{{$property->bath}}</option>
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
                                <input  class="form-control" name="home_area" value="{{$property->home_area}}" type="number" >
                            </div>
                            <div class="col-md-5" style="padding-right: 0">
                                <select class="form-control" name="home_area_unit">
                                    <option value="{{$property->home_area_unit}}">{{$property->home_area_unit}}</option>
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
                                <input  class="form-control" name="land_area" value="{{$property->land_area}}" type="number" >
                            </div>
                            <div class="col-md-5" style="padding-right: 0">
                                <select class="form-control" name="land_area_unit">
                                    <option value="{{$property->land_area_unit}}">{{$property->land_area_unit}}</option>
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
                            <label><input type="radio" name="palce_type" value="কৃষি" value="পেট্রল" {{$property->palce_type == "কৃষি" ? 'checked':''}}/>কৃষি</label>

                            <label><input type="radio" name="palce_type" value="ররবাণিজ্যিক" {{$property->palce_type == "রবাণিজ্যিক" ? 'checked':''}} />রবাণিজ্যিক</label>

                            <label><input type="radio" name="palce_type" value="আবাসিক" {{$property->palce_type == "আবাসিক" ? 'checked':''}}/>আবাসিক</label>

                            <label><input type="radio" name="palce_type" value="রাস্তার পার্শে" {{$property->palce_type == "রাস্তার পার্শে" ? 'checked':''}}/>রাস্তার পার্শে</label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">ঠিকানা</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$property->location_point}}" name="location_point" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">আপনার গ্রাম ও ওয়ার্ডঃ</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$property->village_word}}" name="location_point" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">মূল্য (৳)</label>
                        <div class="col-md-8">
                            <input type="number" value="{{$property->property_price}}" name="property_price" class="form-control"/>
                            <input type="checkbox" name="property_price_check" value="আলোচনা সাপেক্ষে" {{$property->property_price_check == "আলোচনা সাপেক্ষে" ? 'checked':''}} style="margin-top: 15px"> আলোচনা সাপেক্ষে
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">বিবরণ</label>
                        <div class="col-md-8">
                            <textarea name="description" id="editor" class="form-control">{{$property->description}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Property Ad" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection