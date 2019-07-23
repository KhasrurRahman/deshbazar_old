@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
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
                                Condition: {{$product->product_condition}}<br />
                                Brand: {{$product->product_brand}}<br />
                                Model: {{$product->product_model}}<br />
                                Reality: {{$product->product_reality}}
                            </td>
                        </tr>
                        <tr>
                            <th>Product Description</th>
                            <td>{{$product->product_description}}</td>
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