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
    <link href="{{asset('/') }}front/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/') }}front/css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <script src="{{asset('/') }}front/js/jquery.min.js" type="text/javascript"></script>
    <script src="{{asset('/')}}front/ckeditor/ckeditor.js"></script>
    <script src="{{asset('/')}}front/ckeditor/samples/js/sample.js"></script>

    <link rel="stylesheet" href="{{asset('/')}}front/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">


<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>



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
                    <li>ঘরেবসে.কম এ আপনি প্রতিদিন বিনামুল্যে শত শত বিজ্ঞাপন পোস্ট করতে পারেন।</li>
                    <li>ঘরেবসে.কম এ আপনি একজন স্বেচ্ছাসেবক হিসেবে কাজ করে টাকা উপার্জন করতে পারেন।</li>
                    <li>বিভিন্ন ধরনের ঝামেলা ছাড়া অর্থ আদান-প্রদান করুন,কেনা ও বেচার সময় ঘরেবসে.কম এর সাথে যোগাযোগ করুন? প্রতারণা শিকার থেকে ঝামেলা থাকুন। </li>
                </ol>

            </div>

            <div class="col-md-6 col-sm-6 col-xs-6 right_form">
                {{Form::open(['route'=>'front-user-login','method'=>'POST','class'=>'form'])}}
                    <div class="col-lg-12 form-group">
                        <a href="{{url('/redirect')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook-official"></i>ফেসবুকের সঙ্গে চলুক</a>
                    </div>
                <div class="col-lg-12 form-group">
                        <a href="{{url('/redirect')}}" class="btn btn-primary btn-block" style="background: #d94f45"><i class="fa fa-envelope-open"></i>   ইমেইল এর সাথে চলুক</a>
                    </div>
                    <div class="col-lg-12 form-group">
                        <input type="email" name="email" class="form-control" placeholder="ইমেইল" required >
                    </div>
                    <div class="col-lg-12 form-group">
                        <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড" required>
                    </div>
                    <div class="col-lg-12 form-group">
                        <button type="submit" name="btn" class="btn btn-success btn-block"> লগ ইন</button>
                    </div>

                    <div class="text-center"><p>আপনি আপনার পাস্বরদ মনে করতে পারছেন না? রিকভারি করতে চান? </p><a>এখানে ক্লিক করুন।</a></div>
                {{Form::close()}}
                <hr/>
                <div class="text-center">
                    <h5>আপনার ঘরেবসে.কম এ অ্যাকাউন্ট আছে কি? না? নিছের সাইনআপ বাটোন এ ক্লিক করুন।</h5>
                    <a href="{{route('signup-options')}}"  class="btn btn-default" style="background: #5cb85c">সাইন আপ</a>
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
                <h4>নিজের চ্যাট দেখুন </h4>
                <p>আপনি আপনার ম্যাসেজ দেখতে চাইলে লগইন করুন। আপনার কতগুলো চ্যাট আছে তা দেখতে শুরু করুন । </p>
                <ul class="mb">
                    <li>আপনার বিজ্ঞাপন এর কতগুলো ম্যাসেজ আছে তা দেখুন।</li>
                    <li>আপনার বিজ্ঞাপনগুলো আপনার পেজবুক আইডিতে শেয়ার করুন।</li>
                    <li>ঘরেবসে.কম এর সাথে থাকুন।</li>
                    <li>আপনি কিভাবে ম্যাসেজ এর মাধ্যমে,আপনার ক্রেতার সাথে তথ্য আদান প্রদান করতে পারেন। </li>
                    <li>আপনি যেখানে থাকেন না কেনো, চ্যাট এর মাধ্যমে ক্রেতার চাহিদা জানতে পারেন । </li>
                </ul>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6 right_form">
                {{Form::open(['route'=>'front-user-login','method'=>'POST','class'=>'form'])}}
                <div class="col-lg-12 form-group">
                    <a href="{{url('/redirect')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook-official"></i>ফেসবুক এর সাথে চলুন</a>
                </div>
                <div class="col-lg-12 form-group">
                    <a href="{{url('/redirect')}}" class="btn btn-primary btn-block" style="background: #d94f45"><i class="fa fa-envelope-open"></i>   ইমেইল এর সাথে চলুক</a>
                </div>
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
                    <h5>আপনার ঘরেবসে.কম এ অ্যাকাউন্ট আছে কি? না? নিছের সাইনআপ বাটোন এ ক্লিক করুন ।</h5>
                    <a href="{{route('signup-options')}}"  class="btn btn-default" style="background: #5cb85c;color: white">সাইন আপ করুন </a>
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





<div id="sfcutkwhqq1talqwt9y3ustqmy94r827mn6"></div>
<script type="text/javascript" src="https://counter7.wheredoyoucomefrom.ovh/private/counter.js?c=utkwhqq1talqwt9y3ustqmy94r827mn6&down=async" async></script>
<noscript><a href="https://www.freecounterstat.com" title="website hit counter"><img src="https://counter7.wheredoyoucomefrom.ovh/private/freecounterstat.php?c=utkwhqq1talqwt9y3ustqmy94r827mn6" border="0" title="website hit counter" alt="website hit counter"></a></noscript>




<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5cd99120d07d7e0c639356df/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->


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
<script src="{{asset('/') }}front/js/owl.carousel.js" type="text/javascript"></script>
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

<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:3,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
    });
</script>


</body>
</html>
