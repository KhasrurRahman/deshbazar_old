@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit Product Form</h4>
                </div>
                <div class="panel-body">
                    {{Form::open(['route'=>'update-product-ad','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">বিজ্ঞাপন শিরোনাম</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$product->ad_title}}" name="ad_title" class="form-control"/>
                            <input type="hidden" value="{{$product->id}}" name="product_id" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">১ম ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image1" accept="image/*"/>
                            <br />
                            <img src="{{asset($product->product_image1)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">২য় ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image2" accept="image/*"/>
                            <br />
                            <img src="{{asset($product->product_image2)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">৩য় ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image3" accept="image/*"/>
                            <br />
                            <img src="{{asset($product->product_image3)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">কন্ডিশন</label>
                        <div class="col-md-8 radio">
                            <label><input type="radio" name="product_condition" value="ব্যবহৃত" {{$product->product_condition == "ব্যবহৃত" ? 'checked':''}}/>ব্যবহৃত</label>
                            <label><input type="radio" name="product_condition" value="নতুন" {{$product->product_condition == "নতুন" ? 'checked':''}}/>নতুন</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">ব্র্যান্ড</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$product->product_brand}}" name="product_brand" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">মডেল</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$product->product_model}}" name="product_model" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">জেনুইন</label>
                        <div class="col-md-8 radio">
                            <label><input type="radio" name="product_reality" value="আসল" {{$product->product_reality == "আসল" ? 'checked':''}}/>আসল</label>
                            <label><input type="radio" name="product_reality" value="রেপ্লিকা/ক্লোন" {{$product->product_reality == "রেপ্লিকা/ক্লোন" ? 'checked':''}}/>রেপ্লিকা/ক্লোন</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">মূল্য (৳)</label>
                        <div class="col-md-8">
                            <input type="number" value="{{$product->product_price}}" name="product_price" class="form-control"/>
                            <input type="checkbox" name="product_price_check" value="আলোচনা সাপেক্ষে" {{$product->product_price_check == "আলোচনা সাপেক্ষে" ? 'checked':''}} style="margin-top: 15px"> আলোচনা সাপেক্ষে
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">বিবরণ</label>
                        <div class="col-md-8">
                            <textarea name="product_description" id="editor" class="form-control">{{$product->product_description}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Product Ad" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection