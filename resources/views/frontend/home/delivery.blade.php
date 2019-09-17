@extends('frontend.master')
@section('title')
    ডেলিভারি
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 well mt">
                <p class="text-center"><img src="{{asset('/')}}/front/images/delivery.jpg" alt="delivery"></p>
                {!! $footer !!}
            </div>
        </div>
    </div>
@endsection