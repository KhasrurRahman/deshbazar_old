
@extends('frontend.master')
@section('title')
    House Category Find
@endsection

@section('body')
    <div class="container" id="category">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  panel panel-default">
                <div class="panel-body">
                    <h3>ভাড়ার জন্য কোন প্রপার্টি প্রস্তাব করুন</h3><hr/>

                    <div class="col-md-5">
                        <h3>একটি শ্রেণী নির্বাচন করুন...</h3>
                        <ul>
                            <li><a href="{{route('location_for_house')}}" >ফ্ল্যাট ও এ্যাপার্টমেন্ট<i class="fa fa-angle-right"></i></a>
                            <li><a href="{{route('location_for_house')}}">বাড়ি<i class="fa fa-angle-right"></i></a>
                            <li><a href="{{route('location_for_house')}}">প্লট ও জমি<i class="fa fa-angle-right"></i></a>
                            <li><a href="{{route('location_for_house')}}">রুম<i class="fa fa-angle-right"></i></a>
                            <li><a href="{{route('location_for_house')}}">গ্যারেজ<i class="fa fa-angle-right"></i></a>
                            <li><a href="{{route('location_for_house')}}">কমার্শিয়াল স্পেস<i class="fa fa-angle-right"></i></a>
                        </ul>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
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