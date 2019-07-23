@extends('frontend.master')
@section('title')
    Select Top Package and Payment Method
@endsection

@section('body')

    <div id="products_dtailes" style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12 well">
                    <h3>আপনার বিজ্ঞাপনটিকে বিশেষভাবে আকর্ষণীয় করুন</h3>
                    <p>একটি অপশন নির্বাচন করুন </p>
                    {{Form::open(['route'=>'payment-process','method'=>'POST','class'=>'form-horizontal'])}}
                    <div class="col-md-10">
                        <input type="hidden" name="ad_id" value="{{$topAd->id}}" />
                        <input type="hidden" name="ad_info_id" value="{{$topAd->information_id}}" />
                    </div>
                    @foreach($topAdPackages as $topAdPackage)
                    <div class="col-md-5 table-bordered" style="margin-bottom: 10px;">
                        <div class="col-md-2" style="padding-top: 30px;">
                            <input type="radio" name="top_package_id" value="{{$topAdPackage->id}}" />
                        </div>
                        <div class="col-md-10">
                            <h4>{{$topAdPackage->package_name}}({{$topAdPackage->package_duration}} days)</h4>
                            <p>{{$topAdPackage->description}}</p>
                            <p>Tk. {{$topAdPackage->package_price}}</p>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    @endforeach
                    <div class="col-md-10">
                        <input type="submit" class="btn btn-success" value="Proceed" />
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection