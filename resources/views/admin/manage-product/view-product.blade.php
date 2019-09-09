@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default" style="box-shadow: 5px 8px 12px;">
                <div class="panel-heading">
                    <h4 class="text-success text-center">View Product Ad</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Ad Title</th>
                            <td>{{$product->ad_title}}</td>
                        </tr>
                        <tr>
                            <th>Poster</th>
                            <td>
                                {{$product->name}}<br />
                                E-mail: {{$product->email}}<br />
                                Phone: {{$product->phone_number}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ad Class</th>
                            <td>
                                Category: {{$product->category_name}}<br />
                                Sub-Category: {{$product->subcategory_name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ad Location</th>
                            <td>
                                Country: {{$product->country_name}}<br />
                                Division: {{$product->division_name}}<br />
                                District: {{$product->district_name}}<br />
                                Thana/Upazila: {{$product->location}}
                            </td>
                        </tr>
                        <tr>
                            <th>Product Summary</th>
                            <td>
                                @if(isset($product->product_condition))
                                    কন্ডিশন: {{$product->product_condition}}<br />
                                @endif

                                @if(isset($product->product_brand))
                                    ব্র্যান্ড: {{$product->product_brand}}<br />
                                @endif

                                @if(isset($product->product_model))
                                    মডেলডঃ: {{$product->product_model}}<br />
                                @endif

                                @if(isset($product->product_reality))
                                    জেনুইন: {{$product->product_reality}}<br>
                                @endif

                                @if(isset($product->product_model_year_cc))
                                    মডেল সাল ও সিসি: {{$product->product_model_year_cc}}<br>
                                @endif

                                @if(isset($product->nibondhon_year))
                                    নিবন্ধন সাল: {{$product->nibondhon_year}}<br>
                                @endif

                                @if(isset($product->fuel))
                                    কি তেলে চলে: {{$product->fuel}}<br>
                                @endif

                                @if(isset($product->km_ride))
                                    আপনার যানবাহন কত কিলোমিটার চলচ্ছেঃ {{$product->km_ride}}<br>
                                @endif

                                @if(isset($product->servising))
                                    আপনার গাড়ি এই যাবত কতবার সার্ভিস হয়েছে: {{$product->servising}}<br>
                                @endif

                                @if(isset($product->village_ord))
                                    আপনার গ্রাম ও ওয়ার্ডঃ: {{$product->village_ord}}<br>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Product Description</th>
                            <td>{!! $product->product_description !!}</td>
                        </tr>
                        <tr>
                            <th>Product Price</th>
                            <td>
                                TK. {{$product->product_price}}<br />
                                {{$product->product_price_check}}
                            </td>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <td>
                                <img src="{{asset($product->product_image1)}}" alt="Product Image" style="width: 250px;height: 250px;" />
                                <img src="{{asset($product->product_image2)}}" alt="Product Image" style="width: 250px;height: 250px;" />
                                <img src="{{asset($product->product_image3)}}" alt="Product Image" style="width: 250px;height: 250px;" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection