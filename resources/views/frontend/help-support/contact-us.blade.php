@extends('frontend.master')
@section('title')
    আমাদের সাথে যোগাযোগ
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 well mt">
                <h2>আমাদের সাথে যোগাযোগ</h2>
                <div class="col-md-12 bg-success">
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        {{Form::open(['route'=>'user-sms','method'=>'POST','class'=>'form'])}}
                        <div class="col-lg-12 mt form-group">
                            <input type="text" name="name" class="form-control" placeholder="নাম" required >
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
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        {!! $contact->contact_detail !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection