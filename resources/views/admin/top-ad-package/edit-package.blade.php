@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit Top Ad Package</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    {{Form::open(['route'=>'update-package','method'=>'POST','class'=>'form-horizontal'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Package Name</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$topAdPackage->package_name}}" name="package_name" class="form-control"/>
                            <input type="hidden" value="{{$topAdPackage->id}}" name="package_id" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Package Description</label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control">{!! $topAdPackage->description !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Package Duration</label>
                        <div class="col-md-8">
                            <input type="number" value="{{$topAdPackage->package_duration}}" name="package_duration" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Package Price</label>
                        <div class="col-md-8">
                            <input type="number" value="{{$topAdPackage->package_price}}" name="package_price" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Package" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection