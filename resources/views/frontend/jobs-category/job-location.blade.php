@extends('frontend.master')
@section('title')
    Location for jobs in Bangladesh
@endsection

@section('body')
    <div class="container" id="location">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  panel panel-default">
                <div class="panel-body">
                    <h3>বাংলাদেশ-এ এই চাকরিটি কোথায় রয়েছে?</h3><hr/>
                    <div class="col-md-5">
                        <h3>বিভাগ নির্বাচন করুন</h3>
                        <ul>
                            @foreach($productDivisions as $productDivision)
                                <li><a href="#{{$productDivision->id}}" data-toggle="pill"><span class=""></span>{{$productDivision->division_name}}<i class="fa fa-angle-right"></i></a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="tab-content">
                            @foreach($productDivisions as $productDivision)
                                @php
                                    $i=$productDivision->id
                                @endphp
                                <div id="{{$productDivision->id}}" class="tab-pane fade">
                                    <h3>জেলা নির্বাচন করুন... </h3>
                                    <ul>

                                        @foreach($productDistricts as $productDistrict)

                                            @if($productDistrict->division_id==$i)
                                                <li><a href="{{route('job-description',[
                                                'categoryId'=>$categoryId,
                                                'subcategoryId'=>$subcategoryId,
                                                'divisionId'=>$productDistrict->division_id,
                                                'districtId'=>$productDistrict->id
                                                ])}}"><span class=""></span>{{$productDistrict->district_name}}<i class="fa fa-angle-right"></i></a></li>

                                            @endif

                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
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

    @include('frontend.includes.important-rules')
@endsection