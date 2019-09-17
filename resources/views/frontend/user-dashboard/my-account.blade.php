@extends('frontend.master')
@section('title')
    আমার অ্যাকাউন্ট
@endsection

@section('body')

    @include('frontend.includes.notification')
    <!--        dashboard start here-->
    <div class="container" id="dashboard">
        <div class="row">
            <div class="col-md-12 panel panel-default">
                <div class="panel-body" style="padding: 0px">
                    <div class="col-md-3">
                        <ul>
                            <li class=""><a data-toggle="pill" href="#home">নিজের অ্যাকাউন্ট সমন্ধে </a></li>
                            <li><a data-toggle="pill" href="#menu1">সদস্য অথবা সদস্য পরিচায়ক</a></li>
                            <li><a data-toggle="pill" href="#topadd">আপনার বিজ্ঞাপন আকর্ষণীয় করুন</a></li>
                            <li><a href="#exampleModal" data-toggle="modal">আপনি সহজে বিক্রি করুন</a></li>
                            <li><a data-toggle="pill" href="#menu2">চিহ্ন এবং উরন্ত বৈশিষ্ট </a></li>
                            <li><a data-toggle="pill" href="#menu3">পাসওয়ার্ড,নাম ঠিকানা পরিবর্তন করুন</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9" style="border-left:3px solid ">
                        <div class="tab-content">

{{--                            home--}}
                            <div id="home" class="tab-pane fade in active">
                                <h3><strong>{{Session::get('frontUserName')}} </strong></h3><hr/>
                                @if($products)
                                    <div class="row table-responsive">
                                        <div class="col-md-12">
                                            <strong>আপনার বিজ্ঞাপন লিস্টঃ </strong>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="text-success text-center">আপনার বিজ্ঞাপন আপনি এডিট,ডিলিট,আপডেট, আপনার বিজ্ঞাপন প্রচার সহ ,আপনি আপডেট করতে পারবেন। </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <tr class="bg-primary">
                                                            <th>Sl. No</th>
                                                            <th>Ad Title</th>
                                                            <th>Post Time</th>
                                                            <th>Publication Status</th>
                                                            <th>UP Ad</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        @php($i=1)
                                                        @foreach($products as $product)
                                                            <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$product->ad_title}}</td>
                                                                <td>{{Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</td>
                                                                <td>{{$product->publication_status}}</td>
                                                                <td>{{$product->top_ad == 1 ? 'Yes' : 'No'}}</td>
                                                                <td>
                                                                    <a href="{{route('view-ad-detail',['id'=>$product->information_id])}}" class="btn btn-xs btn-info" title="View Ad details"><span class="glyphicon glyphicon-zoom-in"></span></a>
                                                                    @if($product->top_ad == 1)
                                                                        <a href="#" class="btn btn-xs btn-success" title="Already top"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                                                    @else
                                                                        <a href="{{route('promote-ad',['id'=>$product->id,'infoId'=>$product->information_id])}}" class="btn btn-xs btn-danger" title="Promote your ad"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                                                    @endif
                                                                    <a href="{{route('edit-ad-detail',['id'=>$product->information_id])}}" class="btn btn-xs btn-success" title="Edit Ad"><span class="glyphicon glyphicon-edit"></span></a>
                                                                    <a href="{{route('delete-ad',['id'=>$product->information_id])}}" onclick="return confirm('Are you sure to delete this Ad!!')" class="btn btn-xs btn-danger" title="Delete Ad">
                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12 text-center" id="add">
                                        <div>
                                            <h4>আপনার এখন বিজ্ঞাপন নেই।আপনি কী বিজ্ঞাপন পোস্ট করতে চান, তাহলে নিচের বাটনে ক্লিক করুন।</h4>
                                            <i class="fa fa-hand-o-down"></i>
                                        </div>
                                        <a href="{{route('post-ad')}}" class="btn btn-ad-post btn-lg">GhoreyBoshe.com এ আপনার বিজ্ঞাপন পোস্ট করুন</a>
                                    </div>
                                @endif
                            </div>
{{--promot your add--}}

                            <div id="topadd" class="tab-pane fade">
                                <h3><strong>{{Session::get('frontUserName')}} </strong></h3><hr/>
                                @if($products)
                                    <div class="row table-responsive">
                                        <div class="col-md-12">
                                            <strong>আপনার বিজ্ঞাপন লিস্টঃ </strong>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="text-success text-center">আপনার বিজ্ঞাপন আকর্ষণীয় করুন</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <tr class="bg-primary">
                                                            <th>Sl. No</th>
                                                            <th>Ad Title</th>
                                                            <th>Post Time</th>
                                                            <th>Publication Status</th>
                                                            <th>UP Ad</th>
                                                            <th>promote Add</th>
                                                        </tr>
                                                        @php($i=1)
                                                        @foreach($products as $product)
                                                            <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$product->ad_title}}</td>
                                                                <td>{{Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</td>
                                                                <td>{{$product->publication_status}}</td>
                                                                <td>{{$product->top_ad == 1 ? 'Yes' : 'No'}}</td>
                                                                <td>

                                                                    @if($product->top_ad == 1)
                                                                        <a href="#" class="btn btn-xs btn-success" title="Already top"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                                                    @else
                                                                        <a href="{{route('promote-ad',['id'=>$product->id,'infoId'=>$product->information_id])}}" class="btn btn-xs btn-danger" title="Promote your ad">Promote your ad</a>
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12 text-center" id="add">
                                        <div>
                                            <h4>আপনার এখন বিজ্ঞাপন নেই।আপনি কী বিজ্ঞাপন পোস্ট করতে চান, তাহলে নিচের বাটনে ক্লিক করুন।</h4>
                                            <i class="fa fa-hand-o-down"></i>
                                        </div>
                                        <a href="{{route('post-ad')}}" class="btn btn-ad-post btn-lg">GhoreyBoshe.com এ আপনার বিজ্ঞাপন পোস্ট করুন</a>
                                    </div>
                                @endif
                            </div>



                            <div id="menu1" class="tab-pane fade">
                                <h3><strong>আমি ঘরেবসে.কম</strong> এর একজন <strong>সদস্য। অথবা সদস্য পরিচায়ক।</strong></h3><hr/>
                                <p class="text-justify ">আপনি আমাদের পরিষেবার ব্যবহার সম্পর্কিত সমস্ত প্রযোজ্য স্থানীয়, রাষ্ট্রীয়, জাতীয় এবং আন্তর্জাতিক আইন বিধিমালা মেনে চলতে সম্মত হন। আপনি সম্মত হন যে আপনি আমাদের বিজ্ঞাপন পোস্ট/ স্প্যাম নীতি পড়েছেন এবং বুঝতে পেরেছেন। আপনি আরও সম্মত হন যে, আপনি এমন বিজ্ঞাপন দিবেন না যা নিন্দনীয়, অবমাননাকর মন্তব্য বা সামগ্রী থাকবে।এই বিজ্ঞাপনগুলোর শর্তাদি এবং আমাদের স্প্যাম/জ্ঞিাপন পোস্টিং নীতি লঙ্ঘন করে এমন বিজ্ঞাপনগুলো মুছে ফেলা হবে এবং আপনার অ্যাকাউন্ট সতর্কীকরণ ছাড়াই বন্ধ হয়ে যাবে।</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>চিহ্ন এবং উরন্ত বৈশিষ্ট </h3><hr/>
                                <div class="text-center">
                                    <p class="text-justify"><strong> ফেভারিট : </strong>আপনি ঘরেবসে.কম এর সদস্য। এখনো আপনি আপনার বিজ্ঞা্পনকে ফেভারিট লক্ষ্য করে চিহ্নিত করেননি। </p>
                                    <p class="text-justify">আপনার বিজ্ঞাপনকে ফেভারিট করতে চাইলে অবশ্যই উপরের তারকা চিহ্ন ক্লিক করুন</p>
                                    <P class="mt">আপনার বিজ্ঞাপন ফেভারিট রাখতে চাইলে ব্রাউজ করুন।</P>
                                </div>
                            </div>


                            <div id="menu3" class="tab-pane fade">
                                <h3>পাসওয়ার্ড , নাম ঠিকানা পরিবর্তন করুনঃ</h3><hr/>
                                <div class="col-md-12">
                                    <div class="row" style="box-shadow: 5px 8px 12px;">
                                        <div class="col-md-6" style="border-right:2px solid ">
                                        {{Form::open(['route'=>'update-front-user','method'=>'POST','class'=>'form'])}}
                                        <div class="col-md-12 ">
                                            <h3 class="">তথ্য পরিবর্তন করুন</h3><hr><br/>
                                            <div class="form-group col-md-12 text-success"> <label>ইমেইল এর সাথে থাকুন : {{$user->email}}</label> </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12">
                                                <label>আপনার নাম :</label>
                                                <input type="text" name="name" class="form-control" value="{{$user->name}}" />
                                                <input type="hidden" value="{{$user->id}}" name="front_user_id" class="form-control"/>
                                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):' '}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12">
                                                <label>আপনার ফোন :</label>
                                                <input type="text" name="phone_number" class="form-control" value="{{$user->phone_number}}" placeholder="ফোন নাম্বার" />
                                                <span class="text-danger">{{$errors->has('phone_number') ? $errors->first('phone_number'):' '}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12">
                                                <label>আপনার অবস্থান :</label>
                                                <select name="district_name" class="form-control">
                                                    @if(isset($user->district_name))
                                                        <option value="{{$user->district_name}}">{{$user->district_name}}</option>
                                                    @else
                                                        <option value="">জেলা নির্বাচন করুন</option>
                                                    @endif
                                                    {{--<optgroup label="জেলা">--}}
                                                    @foreach($districts as $district)
                                                        <option value="{{$district->district_name}}">{{$district->district_name}}</option>
                                                    @endforeach
                                                    {{--</optgroup>--}}
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label>ইউনিয়ন অথাবা ওয়াড এর নামঃ</label>
                                                <input type="text" name="thana_upazila" class="form-control" value="{{$user->thana_upazila}}" placeholder="থানা" />
                                                <span class="text-danger">{{$errors->has('thana_upazila') ? $errors->first('thana_upazila'):' '}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-warning btn-block btn-lg">এখনি সেভ করুন</button>
                                            </div>
                                        </div>
                                        {{Form::close()}}
                                        </div>


                                        <div class="col-md-6">
                                            {{Form::open(['route'=>'update-front-user-password','method'=>'POST','class'=>'form'])}}
                                            <div class="col-md-12" style="margin-bottom: 50px">
                                                <h3>পাসওয়ার্ড পরিবর্তন করুন</h3> <hr><br/>
                                                <p>আপনি পাসওয়ার্ড পরিবর্তন চান? এখনি আগের পাসওয়ার্ড ও নতুন পাসওয়ার্ড দিয়ে পরিবর্তন করুনঃ</p>
                                            </div>
                                            @if(isset($user->password))
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-12">
                                                        <label>আগের পাসওয়ার্ড</label>
                                                        <input type="password" name="password" class="form-control" placeholder="বর্তমান পাসওয়ার্ড" >
                                                        <span class="text-danger">{{$errors->has('password') ? $errors->first('password'):' '}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label>নতুন পাসওয়ার্ড</label>
                                                    <input type="password" name="new_password" class="form-control" placeholder="নতুন পাসওয়ার্ড" >
                                                    <span class="text-danger">{{$errors->has('new_password') ? $errors->first('new_password'):' '}}</span>
                                                    <input type="hidden" value="{{$user->id}}" name="front_user_id" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label>আর একবার নতুন পাসওয়ার্ড টাইপ করুন</label>
                                                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="নতুন পাসওয়ার্ড নিশ্চিত করুন" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-warning btn-block btn-lg">এখনি পাসওয়ার্ড সেঞ্জ করছি</button>
                                                </div>

                                            </div>
                                            {{Form::close()}}
                                        </div>


                                    </div>








                                    <div class="col-md-12">
                                        <hr/>
                                    </div>
                                    <div class="col-md-12">
                                        <h5>আপনার বিজ্ঞাপন পোস্ট এর সিরিয়াল  কোডঃ</h5>
                                        <button class="btn btn-lg btn-toolbar btn-success">45743</button>
                                        <h5>আপনার আর ও কিছু জানা আছে কি ? আপনি বুজতে পারছেন না আমাদের সাথে যোগাযোগ করুনঃ </h5>
                                        <a href="#"><h3><i class="fa fa-phone"></i> ০১৭১৭-৬৮৬৯৮৮</h3></a><hr/>
                                    </div>
                                    <h5>আপনি এখন আপনার অ্যাকাউন্ট লগ আউট করতে চান? নিছের লগ আউট বাটন এ ক্লিক করুনঃ </h5>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-danger btn-lg btn-block" onclick="document.getElementById('logoutForm').submit();">লগ আউট বাটন এ ক্লিক করুন</a>
                                        <form action="{{route('front-user-logout')}}" method="post" id="logoutForm">
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--        dashboard end here-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Ghoreyboshe.com বাড়ি - ও ব্যবসা-প্রতিষ্ঠান অনুসন্ধান ব্যবহৃত গাড়ি থেকে মোবাইল, আসবাবপত্র, ল্যাপটপ, পোশাক এবং আরও কিছু কিছু বিক্রি করুন। বিনামূল্যে এবং একটি অ্যাকাউন্ট তৈরি ছাড়া বিজ্ঞাপন জমা দিন। আপনি কিছু কিনতে চান - এখানে আপনি আকর্ষণীয় আইটেম পাবেন, দোকান তুলনায় সস্তা। বিক্রয়ের জন্য সবচেয়ে সহজ উপায় কেনা এবং বিক্রয় শুরু করুন।
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection