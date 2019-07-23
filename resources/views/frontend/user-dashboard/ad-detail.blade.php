@extends('frontend.master')
@section('title')
    View Ad
@endsection

@section('body')
    <div class="row table-responsive">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">View Ad</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Ad Title</th>
                            <td>{{$ad->ad_title}}</td>
                        </tr>
                        <tr>
                            <th>Ad Class</th>
                            <td>
                                Category: {{$ad->category_name}}<br />
                                Sub-Category: {{$ad->subcategory_name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ad Location</th>
                            <td>
                                @if(isset($ad->country_name))
                                Country: {{$ad->country_name}}<br />
                                @endif
                                Division: {{$ad->division_name}}<br />
                                District: {{$ad->district_name}}<br />
                                @if(isset($ad->location))
                                Thana/Upazila: {{$ad->location}}
                                @endif
                            </td>
                        </tr>
                        @if(isset($ad->product_condition))
                        <tr>
                            <th>Ad Summary</th>
                            <td>
                                Condition: {{$ad->product_condition}}<br />
                                Brand: {{$ad->product_brand}}<br />
                                Model: {{$ad->product_model}}<br />
                                Reality: {{$ad->product_reality}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ad Description</th>
                            <td>{{$ad->product_description}}</td>
                        </tr>
                        <tr>
                            <th>Product Price</th>
                            <td>
                                TK. {{$ad->product_price}}<br />
                                {{$ad->product_price_check}}
                            </td>
                        </tr>
                        @elseif(isset($ad->job_type))
                            <tr>
                                <th>কোম্পানি</th>
                                <td>{{$ad->company_name}}</td>
                            </tr>
                            <tr>
                                <th>কাজের টাইপ</th>
                                <td>{{$ad->job_type}}</td>
                            </tr>
                            <tr>
                                <th>কাজের বিভাগ</th>
                                <td>{{$ad->industry}}</td>
                            </tr>
                            <tr>
                                <th>চাকুরি অবস্তানের নাম</th>
                                <td>{{$ad->designation}}</td>
                            </tr>
                            <tr>
                                <th>শিক্ষাগত যোগ্যতা </th>
                                <td>{{$ad->minimum_requirement}}</td>
                            </tr>
                            <tr>
                                <th>কাজের অভিজ্ঞতা</th>
                                <td>{{$ad->skill}}</td>
                            </tr>
                            <tr>
                                <th>মাসিক বেতন</th>
                                @if($ad->starting_range)
                                    <td>Tk. {{$ad->starting_range}} - {{$ad->ending_range}}</td>
                                @else
                                    <td>Negotiable</td>
                                @endif
                            </tr>
                            <tr>
                                <th>পদের সংখ্যা</th>
                                <td>{{$ad->total_vacancies }}</td>
                            </tr>
                            <tr>
                                <th>আবেদনকারীর বয়স</th>
                                <td>{{$ad->age_limit}}</td>
                            </tr>
                            <tr>
                                <th>জেন্ডার</th>
                                <td>{{$ad->gender}}</td>
                            </tr>
                            <tr>
                                <th>অভিজ্ঞতা</th>
                                <td>{{$ad->experience}}</td>
                            </tr>
                            <tr>
                                <th>শিক্ষাগত অভিজ্ঞতা </th>
                                <td>{{$ad->education_sector}}</td>
                            </tr>

                            <tr>
                                <th>আবেদন করার শেষ তারিখ</th>
                                <td>{{$ad->expire_date}}</td>
                            </tr>
                            <tr>
                                <th>কাজের বিবরণ</th>
                                <td>{{$ad->description}}</td>
                            </tr>
                        @else
                            <tr>
                                <th>Ad Summary</th>
                                <td>
                                    @if($ad->bed)
                                        Bed: {{$ad->bed}}<br />
                                    @endif
                                    @if($ad->bath)
                                        Bath: {{$ad->bath}}<br />
                                    @endif
                                    @if($ad->home_area)
                                        Home Area: {{$ad->home_area}} {{$ad->home_area_unit}}<br />
                                    @endif
                                    @if($ad->land_area)
                                        Land Area: {{$ad->land_area}} {{$ad->land_area_unit}}<br />
                                    @endif
                                    @if($ad->location_point)
                                        Place: {{$ad->location_point}}<br />
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Ad Description</th>
                                <td>{{$ad->description}}</td>
                            </tr>
                            <tr>
                                <th>Property Price</th>
                                <td>
                                    TK. {{$ad->property_price}}<br />
                                    {{$ad->property_price_check}}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            @if( isset($ad->product_image1))
                            <th>Ad Image</th>
                            <td>
                                <img src="{{asset($ad->product_image1)}}" alt="Ad Image" style="width: 150px;height: 150px;" />
                                <img src="{{asset($ad->product_image2)}}" alt="Ad Image" style="width: 150px;height: 150px;" />
                                <img src="{{asset($ad->product_image3)}}" alt="Ad Image" style="width: 150px;height: 150px;" />
                            </td>
                            @elseif(isset($ad->company_logo))
                            <th>Company Logo</th>
                            <td>
                                <img src="{{asset($ad->company_logo)}}" alt="Company Logo" style="width:150px;height: 150px;"/>
                            </td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection