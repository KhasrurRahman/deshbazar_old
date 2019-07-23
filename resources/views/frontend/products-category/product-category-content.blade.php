@extends('frontend.master')
@section('title')
    Products category
@endsection

@section('body')

    <div class="container" id="category">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  panel panel-default">
                <div class="panel-body">
                    <h3>আপনি কিছু বিক্রি করতে চান ?</h3><hr/>

                    <div class="col-md-5">
                        <h3>নিচের একটি আইটেম ক্লিক করুন।</h3>
                        <ul>
                            @foreach($productCategories as $productCategory)
                                <li><a href="#{{$productCategory->id}}" data-toggle="pill"><span class=""></span>{{$productCategory->category_name}}<i class="fa fa-angle-right"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="tab-content">
                            @foreach($productCategories as $productCategory)
                                @php
                                    $i=$productCategory->id
                                @endphp
                            <div id="{{$productCategory->id}}" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন... </h3>
                                <ul>

                                    @foreach($productSubcategories as $productSubcategory)

                                        @if($productSubcategory->category_id==$i)
                                        <li><a href="{{route('products-location',['categoryId'=>$productSubcategory->category_id,'subcategoryId'=>$productSubcategory->id])}}">{{$productSubcategory->subcategory_name}}<i class="fa fa-angle-right"></i></a></li>

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
@endsection