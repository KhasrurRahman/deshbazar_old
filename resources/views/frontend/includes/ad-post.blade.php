<div class="container">
    <div class="row">
        <div class="col-md-4" style="border: 1px solid">
            <div class="owl-carousel">
                <div> <img src="{{asset('/') }}front/images/download.png" style="width: 100px;height: 150px"> </div>
                <div> <img src="{{asset('/') }}front/images/download.png" style="width: 100px;height: 150px"> </div>
                <div> <img src="{{asset('/') }}front/images/download.png" style="width: 100px;height: 150px"> </div>
                <div> <img src="{{asset('/') }}front/images/download.png" style="width: 100px;height: 150px"> </div>
                <div> <img src="{{asset('/') }}front/images/download.png" style="width: 100px;height: 150px"> </div>
                <div> <img src="{{asset('/') }}front/images/download.png" style="width: 100px;height: 150px"> </div>
                <div> <img src="{{asset('/') }}front/images/buttom_logo.png" style="width: 100px;height: 150px"> </div>
            </div>
        </div>
        <div class="col-md-4 text-center" id="adds" style="padding-top:0px ">
            <div>
                <h3 style="font-size: 20px">আপনার পন্যের প্রচার ও বিক্রয় এর জন্য <br />
                    GhoreyBoshe.com এ বিজ্ঞাপন পোস্ট করুন
                </h3>
                    {{--<h4>Ghoreyboshe.com--এ আপনার বিজ্ঞাপন পোস্ট করুন।</h4>--}}
                <i class="fa fa-hand-o-down"></i>

                
            </div>
            @if(Session::get('frontUserId'))
                <a href="{{route('post-ad')}}" class="btn btn-ad-post btn-lg">GhoreyBoshe.com এ আপনার বিজ্ঞাপন দিন </a>
            @else
                <a href="{{route('signup-options')}}" class="btn btn-ad-post btn-lg">GhoreyBoshe.com এ আপনার বিজ্ঞাপন দিন</a>
            @endif
        </div>
        <div class="col-md-4" style="border: 1px solid;
    height: 162px">
            <p style="text-align: center;
    font-size: 19px;
    padding: 22px;">
                খুব সহজে কিছু বিক্রি বা
                কিনতে আপনার পন্যের প্রচার ও
                বিক্রয় এর জন্য
                GhoreyBoshe.com এ বিজ্ঞাপন
                পোস্ট করুন            </p>
        </div>
    </div>
</div>