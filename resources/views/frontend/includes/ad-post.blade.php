<div class="container">
    <div class="row">
        <div class="col-md-12 text-center" id="adds">
            <div>
                <h3>আপনার পন্যের প্রচার ও বিক্রয় এর জন্য <br />
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
    </div>
</div>