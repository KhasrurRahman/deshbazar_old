<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('head')

    <link rel="icon" href="{{asset('/')}}front/favicon.png">

    <title>@yield('title')</title>

    <link href="{{asset('/') }}front/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/') }}front/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/') }}front/css/flexslider.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/') }}front/css/style.css" rel="stylesheet" type="text/css"/>
    <script src="{{asset('/') }}front/js/jquery.min.js" type="text/javascript"></script>
    <script src="{{asset('/')}}front/ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}front/ckeditor/samples/js/sample.js"></script>
    
    <link rel="stylesheet" href="{{asset('/')}}front/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

</head>

<body>

<!--           /*main_menu start*/-->
@include('frontend.includes.header')
<!--   /*main_menu end*/-->

<!-- body start-->
@yield('body')
<!-- body end-->

<!--footer start-->
@include('frontend.includes.footer')
<!--footer end-->

<!--        login modal start here-->
<div class="modal fade" id="sineup_modal">
    <div class="modal-dialog">
        <div class="text-right">
            <i class="fa fa-close" data-dismiss="modal"></i>
        </div>
        <div class="col-md-12 col-sm-12  col-xs-12 modal-content">

            <div class="col-md-6 col-sm-6 col-xs-6 left_containte">
                <h4>লগইন/ নিবন্ধন পদ্ধতি</h4>
                <p class="text-justify">আমাদের ঘরেবসে.কম এ লগইন/নিবন্ধন করে ক্রেতা-বিক্রেতা উভয়ই একই ভাবে অনেক বড় সুবিধা ভোগ করতে পারবেন এবং এটি সম্পূর্ বিনামূল্যে।</p>
                <p class="text-justify">আমাদের ঘরেবসে.কম এ লগইন/ নিবন্ধন করতে সময় লাগবে মাত্র <strong>এক মিনিট </strong> ।</p>
                <ol class="mb" type="1">
                    <li>ঘরেবসে.কম এ আপনি প্রতিদিন বিনামুল্যে হাজার হাজার বিজ্ঞাপন পোস্ট করতে পারেন।</li>
                    <li>ঘরেবসে.কম এ আপনি একজন স্বেচ্ছাসেবক হিসেবে কাজ করে অর্ উপার্ন করতে পারেন।</li>
                    <li>মনে রাখবেন আমাদের ঘরেবসে.কম এ লগইন/নিবন্ধন পদ্ধতি সম্পূর্ বিনামূল্যে।</li>
                    <li>আপনি বিনামূল্যে আমাদের বিজ্ঞাপনের শুরু থেকে টিপস এবং ট্রিকস পেতে পারেন।</li>
                </ol>

            </div>

            <div class="col-md-6 col-sm-6 col-xs-6 right_form">
                {{Form::open(['route'=>'front-user-login','method'=>'POST','class'=>'form'])}}
                    <div class="col-lg-12 form-group">
                        <a href="{{url('/redirect')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook-official"></i>ফেসবুকের সঙ্গে চলুক</a>
                    </div>
                    <div class="text-center"><h5>অথবা</h5></div>
                    <div class="col-lg-12 form-group">
                        <input type="email" name="email" class="form-control" placeholder="ইমেইল" required >
                    </div>
                    <div class="col-lg-12 form-group">
                        <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড" required>
                    </div>
                    <div class="col-lg-12 form-group">
                        <button type="submit" name="btn" class="btn btn-success btn-block"> লগ ইন</button>
                    </div>

                    <div class="text-center"><a>পাসওয়ার্ড ভুলে গেছেন?</a></div>
                {{Form::close()}}
                <hr/>
                <div class="text-center">
                    <h4>এখনো কোনো অ্যাকাউন্ট নেই আপনার?</h4>
                    <a href="{{route('signup-options')}}"  class="btn btn-default" >সাইন আপ</a>
                </div>

            </div>
        </div>
    </div>
</div>

<!--        login modal end here-->
<!-- Developed By Md. Jamal Uddin ( http://jamaluddin.info ) -->
<!--        chat modal start here-->
<div class="modal fade" id="chat_modal">
    <div class="modal-dialog">
        <div class="text-right">
            <i class="fa fa-close" data-dismiss="modal"></i>
        </div>
        <div class="col-md-12 col-sm-12  col-xs-12 modal-content">

            <div class="col-md-6 col-sm-6 col-xs-6 left_containte">
                <h4>নিজের চ্যাট</h4>
                <p>আপনি আপনার চ্যাট দেখদত চাইলে লগইন করুন। আপনার কতগুলো চ্যাট আছে তা দেখুন।</p>
                <ul class="mb">
                    <li>আপনার বিজ্ঞাপন এর কতগুলো মেসেজ আছে তা দেখুন।</li>
                    <li>আপনার বিজ্ঞাপনগুলো আপনার পেজবুকে শেয়ার করুন।</li>
                    <li>আপনি আপনার বিজ্ঞাপন শেয়ার করুন।</li>
                    <li>ঘরেবসে.কম এর সাথে থাকুন।</li>
                </ul>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6 right_form">
                {{Form::open(['route'=>'front-user-login','method'=>'POST','class'=>'form'])}}
                <div class="col-lg-12 form-group">
                    <a href="{{url('/redirect')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook-official"></i>ফেসবুকের সঙ্গে চলুক</a>
                </div>
                <div class="text-center"><h5>অথবা</h5></div>
                <div class="col-lg-12 form-group">
                    <input type="email" name="email" class="form-control" placeholder="ইমেইল" required >
                </div>
                <div class="col-lg-12 form-group">
                    <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড" required>
                </div>
                <div class="col-lg-12 form-group">
                    <button type="submit" name="btn" class="btn btn-success btn-block"> লগ ইন</button>
                </div>

                <div class="text-center"><a>পাসওয়ার্ড ভুলে গেছেন?</a></div>
                {{Form::close()}}
                <hr/>
                <div class="text-center">
                    <h4>এখনো কোনো অ্যাকাউন্ট নেই আপনার?</h4>
                    <a href="{{route('signup-options')}}"  class="btn btn-default" >সাইন আপ</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!--       chat modal end here-->

<!--       complain modal start here-->
<div class="modal fade" id="complain_modal">
    <div class="modal-dialog">
        <div class="text-right">
            <i class="fa fa-close" data-dismiss="modal"></i>
        </div>
        <div class="col-md-12 col-sm-12  col-xs-12 modal-content">
                {{Form::open(['route'=>'user-complain','method'=>'POST','class'=>'form'])}}
                <div class="text-center"><h5>আপনার মূল্যবান বিজ্ঞাপন কি সমস্যা আমাদের নিচের অপশন বেচে নিন।</h5></div>
                <div class="col-lg-12 form-group">
                    <select name="prob_type" class="form-control">
                        <option>আপনার বিজ্ঞাপন পোস্ট হয় নি।</option>
                        <option>আপনি কি প্রতারণা শিকার।</option>
                        <option>আপনি লেনদেন করতে পারছেন না।</option>
                        <option>আপনি বিল দিয়েছেন কাজ হয়নি।</option>
                        <option>আপনি ভুল ক্যাটাগরি পোস্ট করেছেন।</option>
                    </select>
                </div>
                <div class="col-lg-12 form-group">
                    <input type="email" name="email" class="form-control" placeholder="ইমেইল" required >
                </div>
                <div class="col-lg-12 form-group">
                    <textarea name="sms" placeholder="এসএমএস" rows="10" class="form-control" required></textarea>
                </div>
                <div class="col-lg-12 form-group">
                    <button type="submit" name="btn" class="btn btn-success btn-block">সাবমিট</button>
                </div>
                {{Form::close()}}
        </div>
    </div>
</div>
<!--       complain modal end here-->

<!--  location_modal   modal start here-->
@include('frontend.includes.location-modal')
<!--  location_modal   modal end here-->


<!-- category_modal    modal start here-->
@include('frontend.includes.category-modal')
<!--  category_modal   modal end here-->

<script>
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>

<script src="{{asset('/') }}front/js/imagezoom.js" type="text/javascript"></script>
<script src="{{asset('/') }}front/js/ajax.js" type="text/javascript"></script>
<script src="{{asset('/') }}front/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/') }}front/js/jquery.flexslider.js" type="text/javascript"></script>
<script>
    initSample();
</script>
<script>
    $(document).ready(function () {
        $('#alert-close').click(function () {
           $('#alert').hide();
        });
    });
</script>


</body>
</html>
