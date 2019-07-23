@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Add Top Ad Package</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    {{Form::open(['route'=>'save-package','method'=>'POST','class'=>'form-horizontal'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Package Name</label>
                        <div class="col-md-8">
                            <input type="text" name="package_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Package Description</label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Package Duration</label>
                        <div class="col-md-8">
                            <input type="number" name="package_duration" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Package Price</label>
                        <div class="col-md-8">
                            <input type="number" name="package_price" class="form-control"/>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label class="control-label col-md-4">Package Image</label>--}}
                        {{--<div class="col-md-8">--}}
                            {{--<input type="file" name="category_image" accept="image/*"/>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Package" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection