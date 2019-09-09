@extends('frontend.master')
@section('title')
    প্রপার্টি ভাড়া
@endsection

@section('body')
    <div class="container" id="category">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  panel panel-default" style="box-shadow: 5px 8px 12px;">
                <div class="panel-body">
                    <h4>আপনি কি জমি,বাড়ী,ফ্লাট বিক্রি ও ভাড়ার জন্য বিজ্ঞাপন দিতে চান? এখনি আপনার বিজ্ঞাপন পোস্ট করুন</h4><hr/>

                    <div class="col-md-5">
                        <h3>নিচের আইটেম ক্লিক করুন</h3>
                        <ul>
                            <li><a href="#{{$propertyCategory->id}}" data-toggle="pill"><span class=""></span>{{$propertyCategory->category_name}}<i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="tab-content">
                            <div id="{{$propertyCategory->id}}" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন... </h3>
                                <ul>
                                    @foreach($propertySubcategories as $propertySubcategory)
                                        <li><a href="{{route('property-location',['categoryId'=>$propertySubcategory->category_id,'subcategoryId'=>$propertySubcategory->id])}}">{{$propertySubcategory->subcategory_name}}<i class="fa fa-angle-right"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="alert alert-warning">
                            <h4 class="text-center"> <strong>সঠিক!</strong> শ্রেণীতে পোস্ট করা নিশ্চিত করুন</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection