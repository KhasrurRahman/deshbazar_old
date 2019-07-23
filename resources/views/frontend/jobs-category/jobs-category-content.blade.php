@extends('frontend.master')
@section('title')
    Jobs category
@endsection

@section('body')
    <div class="container" id="category">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  panel panel-default">
                <div class="panel-body">
                    <h3>চাকরির নিয়োগ বিজ্ঞপ্তি পোস্ট করুন</h3><hr/>
                    <div class="col-md-5">
                        <h3>নিচের আইটেম ক্লিক করুন</h3>
                        <ul>
                            <li><a href="#{{$jobCategory->id}}" data-toggle="pill"><span class=""></span>{{$jobCategory->category_name}}<i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="tab-content">
                            <div id="{{$jobCategory->id}}" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন... </h3>
                                <ul>
                                    @foreach($jobSubcategories as $jobSubcategory)
                                        <li><a href="{{route('job-location',['categoryId'=>$jobSubcategory->category_id,'subcategoryId'=>$jobSubcategory->id])}}">{{$jobSubcategory->subcategory_name}}<i class="fa fa-angle-right"></i></a></li>
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
