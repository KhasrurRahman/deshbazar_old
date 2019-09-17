@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">View Job Ad</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Ad Title</th>
                            <td>{{$job->ad_title}}</td>
                        </tr>
                        <tr>
                            <th>Poster</th>
                            <td>
                                {{$job->name}}<br />
                                E-mail: {{$job->email}}<br />
                                Phone: {{$job->phone_number}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ad Class</th>
                            <td>
                                Category: {{$job->category_name}}<br />
                                Sub-Category: {{$job->subcategory_name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Ad Location</th>
                            <td>
                                Division: {{$job->division_name}}<br />
                                District: {{$job->district_name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Job Summary</th>
                            <td>
                                Job Type: {{$job->job_type}}<br />
                                Job Industry: {{$job->industry}}<br />
                                Application Recieve Option: {{$job->recieve_option}}<br />
                                Job Vacancies: {{$job->total_vacancies}}<br />
                                @if($job->designation)
                                Designation: {{$job->designation}}<br />
                                @endif
                                @if($job->starting_range)
                                Salary: {{$job->starting_range}} To {{$job->ending_range}}<br />
                                @endif
                                @if($job->expire_date)
                                Apply Deadline: {{$job->expire_date}}<br />
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>আবেদনকারীর বয়স:</th>
                            <td>{{$job->candidate_age}}</td>
                        </tr>
                        <tr>
                            <th>জব লোকেশনঃ</th>
                            <td>{{$job->job_location}}</td>
                        </tr>
                        <tr>
                            <th>কোম্পানি সুযোগ সুবিধাঃ</th>
                            <td>{{$job->company_facility}}</td>
                        </tr>
                        <tr>
                            <th>ককোম্পানি যানবাহন সুবিধাঃ</th>
                            <td>{{$job->company_transport_facility}}</td>
                        </tr>
                        <tr>
                            <th>কোম্পানি খাবারের ব্যাবস্থাঃ</th>
                            <td>{{$job->company_food_facility}}</td>
                        </tr>
                        <tr>
                            <th>কোম্পানি মোবাইল বিলঃ</th>
                            <td>{{$job->company_mobile_bill}}</td>
                        </tr>
                        <tr>
                            <th>কোম্পানি ফেস্টিভ্যাল বোনাসঃ</th>
                            <td>{{$job->company_fastival_bonus}}</td>
                        </tr>
                        <tr>
                            <th>কোম্পানি কি প্রকারঃ</th>
                            <td>{{$job->company_fee_plan}}</td>
                        </tr>
                        <tr>
                            <th>কোম্পানি বেতন ভাড়বেঃ</th>
                            <td>{{$job->company_bill_incrase}}</td>
                        </tr>
                        <tr>
                            <th>কোম্পানি ওভার টাইম সুবিধাঃ</th>
                            <td>{{$job->company_full_time}}</td>
                        </tr>
                        <tr>
                            <th>কোম্পানি ওভার টাইম সুবিধাঃ</th>
                            <td>{{$job->company_full_time}}</td>
                        </tr>
                        <tr>
                            <th>Job Description</th>
                            <td>{!! $job->description !!}</td>
                        </tr>
                        <tr>
                            <th>Company Name</th>
                            <td>
                                {{$job->company_name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Company Logo</th>
                            <td>
                                <img src="{{asset($job->company_logo)}}" alt="Company Logo" style="width: 250px;height: 250px;" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection