@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Update Logo and Name</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    {{Form::open(['route'=>'update-site-information','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Website Name</label>
                        <div class="col-md-8">
                            <input type="text" name="site_name" value="{{$websiteInformation -> site_name}}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Website Introduction</label>
                        <div class="col-md-8">
                            <textarea name="description" id="editor" class="form-control"> {!! $websiteInformation -> description !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Website Logo</label>
                        <div class="col-md-8">
                            <input type="file" name="logo" accept="image/*"/>
                            <img src="{{asset($websiteInformation -> logo)}}" alt="Logo"  width="50" height="50" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Site Information" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection