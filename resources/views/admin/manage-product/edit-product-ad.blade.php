@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="box-shadow: 5px 8px 12px;">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit Product Form</h4>
                </div>
                <div class="panel-body">
                    {{Form::open(['route'=>'update-product-ad','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">বিজ্ঞাপন শিরোনাম</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$product->ad_title}}" name="ad_title" class="form-control"/>
                            <input type="hidden" value="{{$product->id}}" name="product_id" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">১ম ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image1" accept="image/*"/>
                            <br />
                            <img src="{{asset($product->product_image1)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">২য় ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image2" accept="image/*"/>
                            <br />
                            <img src="{{asset($product->product_image2)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">৩য় ছবি</label>
                        <div class="col-md-8">
                            <input type="file" name="product_image3" accept="image/*"/>
                            <br />
                            <img src="{{asset($product->product_image3)}}" alt="" width="100" height="100"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">কন্ডিশন</label>
                        <div class="col-md-8 radio">
                            <label><input type="radio" name="product_condition" value="ব্যবহৃত" {{$product->product_condition == "ব্যবহৃত" ? 'checked':''}}/>ব্যবহৃত</label>
                            <label><input type="radio" name="product_condition" value="নতুন" {{$product->product_condition == "নতুন" ? 'checked':''}}/>নতুন</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">ব্র্যান্ড</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$product->product_brand}}" name="product_brand" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">মডেল</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$product->product_model}}" name="product_model" class="form-control"/>
                        </div>
                    </div>





                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">মডেল সাল ও সিসিঃ</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="product_model_year_cc"value="{{$product->product_model_year_cc}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">নিবন্ধন সালঃ</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="product_publish_year" value="{{$product->nibondhon_year}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">নআপনার যানবাহন কত কিলোমিটার চলচ্ছেঃ</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="product_km_ride" value="{{$product->km_ride}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">আপনার গাড়ি এই যাবত কতবার সার্ভিস হয়েছেঃ</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="product_servising_time" value="{{$product->servising}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">আপনার উপজেলা</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="location" value="{{$product->location}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">আপনার গ্রাম ও ওয়ার্ডঃ</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="product_village_word" value="{{$product->village_ord}}">
                        </div>
                    </div>






                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">জেনুইন</label>
                        <div class="col-md-8 radio">
                            <label><input type="radio" name="product_reality" value="আসল" {{$product->product_reality == "আসল" ? 'checked':''}}/>আসল</label>
                            <label><input type="radio" name="product_reality" value="রেপ্লিকা/ক্লোন" {{$product->product_reality == "রেপ্লিকা/ক্লোন" ? 'checked':''}}/>রেপ্লিকা/ক্লোন</label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="text-success control-label col-md-4">কি তেলে চলেঃ </label><br>
                        <div class="col-md-8">
                            <label><input type="radio" name="product_oil" value="পেট্রল"{{$product  ->fuel == "পেট্রল" ? 'checked':''}} />পেট্রল</label>
                            <label><input type="radio" name="product_oil" value="ডিজেল" {{$product  ->fuel == "ডিজেল" ? 'checked':''}}/>ডিজেল</label>
                            <label><input type="radio" name="product_oil" value="অকটেন" {{$product  ->fuel == "অকটেন" ? 'checked':''}}/>অকটেন </label>
                        </div>
                    </div>





                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">মূল্য (৳)</label>
                        <div class="col-md-8">
                            <input type="number" value="{{$product->product_price}}" name="product_price" class="form-control"/>
                            <input type="checkbox" name="product_price_check" value="আলোচনা সাপেক্ষে" {{$product->product_price_check == "আলোচনা সাপেক্ষে" ? 'checked':''}} style="margin-top: 15px"> আলোচনা সাপেক্ষে
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 text-success">বিবরণ</label>
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