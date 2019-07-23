@extends('frontend.master')
@section('title')
    Ghoreyboshe.com এর পরিবার
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 well mt">
                @foreach($members as $member)
                <div class="col-md-5 table-bordered">
                    <p class="text-center"><img src="{{asset($member->member_image)}}" alt="image"></p>
                    <h4 class="text-center">{{$member->member_name}}</h4>
                    <p>Dear visitor,</p>
                    <p class="text-justify">{{$member->quote}}</p>
                </div>
                <div class="col-md-1"></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection