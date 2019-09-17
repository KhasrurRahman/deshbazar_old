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
                        <img src="{{asset($websiteInformation->logo) }}" alt="Logo" style="height: 158px;width: 215px;margin-bottom: -38px;"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar" @if(Session::get('frontUserId'))
                        style="font-size: 17px;"
                        @endif>
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('all-ad')}}">{{ __('text.alladd') }}</a></li>
                        <li><a href="{{route('ghoreyboshe-family')}}">Ghoreyboshe.com এর পরিবার</a></li>
                    </ul>
                    @php
                        use App\chat;
                        $userid = Session::get('frontUserId');
                    @endphp


{{--                    <a href="{{route('language')}}">change laguage</a>--}}
                        <ul class="nav navbar-nav">
                            @if(Session::get('frontUserId'))
                                @if(chat::where('to',$userid)->where('status',0)->get()->count() !== 0)
                                    <li><a href="{{route('chat')}}" style="padding: 0px;margin: 0px"><img src="{{asset('/') }}front/images/notefi.png" style="height: 35px;margin-top: 23px"></a></li>

                                    @else
                                    <li><a href="{{route('chat')}}" data-toggle="modal"><i class="fa fa-comments-o"></i></a></li>
                                @endif
                            @else
                                <li><a href="{{route('signup-options')}}" data-toggle="modal"><i class="fa fa-comments-o"></i></a></li>
                            @endif
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