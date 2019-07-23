<div id="main_menu">
    <nav class="navbar navbar-inverse text-center">
        <div class="container">
            <div class="row">
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('/')}}">
                        <img src="{{asset($websiteInformation->logo) }}" alt="Logo"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('all-ad')}}">সর্ব প্রকার বিজ্ঞাপন</a></li>
                        <li><a href="{{route('ghoreyboshe-family')}}">Ghoreyboshe.com এর পরিবার</a></li>
                    </ul>
                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#chat_modal" data-toggle="modal"><i class="fa fa-comments-o"></i></a></li>
                            @if(Session::get('frontUserId'))
                                <li><a  href="{{route('front-user-dashboard')}}" ><i class="fa fa-user"></i>আমার অ্যাকাউন্ট</a></li>
                            @else
                                <li><a  href="#sineup_modal" data-toggle="modal" ><i class="fa fa-user"></i> লগ ইন</a></li>
                            @endif
                        </ul>
                        @if(Session::get('frontUserId'))
                            <a href="{{route('post-ad')}}" class="btn btn-primary navbar-btn">আপনার বিজ্ঞাপন পোস্ট করুন</a>
                        @else
                            <a href="{{route('signup-options')}}" class="btn btn-primary navbar-btn">আপনার বিজ্ঞাপন পোস্ট করুন</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>