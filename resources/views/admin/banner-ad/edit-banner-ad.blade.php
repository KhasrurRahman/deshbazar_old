@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit Banner Ad Form</h4>
                </div>
                <div class="panel-body">
                    {{Form::open(['route'=>'update-banner-ad','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Banner Url</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$bannerAd->banner_url}}" name="banner_url" class="form-control"/>
                            <input type="hidden" value="{{$bannerAd->id}}" name="banner_id" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Banner Image</label>
                        <div class="col-md-8">
                            <input type="file" name="banner_image" accept="image/*"/>
                            <br />
                            <img src="{{asset($bannerAd->banner_image)}}" alt="" width="200" height="80"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Banner Ad" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection