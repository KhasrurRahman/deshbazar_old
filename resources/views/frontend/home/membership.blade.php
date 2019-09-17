@extends('frontend.master')
@section('title')
    মেম্বারশিপ
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 well mt">
                <p class="text-center"><img src="{{asset('/')}}/front/images/membership.jpg" alt="membership"></p>
{!! $footer !!}
            </div>
        </div>
    </div>
@endsection