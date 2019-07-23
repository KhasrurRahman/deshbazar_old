@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">View Property Ad</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Ad Title</th>
                            <td>{{$property->ad_title}}</td>
                        </tr>
                        <tr>
                            <th>Poster</th>
                            <td>
                                {{$property->name}}<br />
                                E-mail: {{$property->email}}<br />
                                Phone: {{$property->phone_number}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ad Class</th>
                            <td>
                                Category: {{$property->category_name}}<br />
                                Sub-Category: {{$property->subcategory_name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ad Location</th>
                            <td>
                                Country: {{$property->country_name}}<br />
                                Division: {{$property->division_name}}<br />
                                District: {{$property->district_name}}<br />
                                Thana/Upazila: {{$property->location}}
                            </td>
                        </tr>
                        <tr>
                            <th>Property Summary</th>
                            <td>
                                @if($property->bed)
                                Bed: {{$property->bed}}<br />
                                @endif
                                @if($property->bath)
                                Bath: {{$property->bath}}<br />
                                @endif
                                @if($property->home_area)
                                Home Area: {{$property->home_area}} {{$property->home_area_unit}}<br />
                                @endif
                                @if($property->land_area)
                                Land Area: {{$property->land_area}} {{$property->land_area_unit}}<br />
                                @endif
                                @if($property->location_point)
                                Place: {{$property->location_point}}<br />
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Property Description</th>
                            <td>{{$property->description}}</td>
                        </tr>
                        <tr>
                            <th>Property Price</th>
                            <td>
                                TK. {{$property->property_price}}<br />
                                {{$property->property_price_check}}
                            </td>
                        </tr>
                        <tr>
                            <th>Property Image</th>
                            <td>
                                <img src="{{asset($property->product_image1)}}" alt="Product Image" style="width: 250px;height: 250px;" />
                                <img src="{{asset($property->product_image2)}}" alt="Product Image" style="width: 250px;height: 250px;" />
                                <img src="{{asset($property->product_image3)}}" alt="Product Image" style="width: 250px;height: 250px;" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection