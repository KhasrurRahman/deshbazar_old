@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit District Form</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    {{Form::open(['route'=>'update-district','method'=>'POST','class'=>'form-horizontal'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Country Name</label>
                        <div class="col-md-8">
                            <select class="form-control" name="country_id">
                                <option value="">--- Select Country Name ---</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Division Name</label>
                        <div class="col-md-8">
                            <select class="form-control" name="division_id">
                                <option  value="">--- Select Division Name ---</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->division_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">District Name</label>
                        <div class="col-md-8">
                            <input type="text" name="district_name" value="{{$district->district_name}}" class="form-control"/>
                            <input type="hidden" name="district_id" value="{{$district->id}}" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Publication Status</label>
                        <div class="col-md-8 radio">
                            <label><input type="radio" name="publication_status" value="1" {{$district->publication_status == 1 ? 'checked':'' }} />Published</label>
                            <label><input type="radio" name="publication_status" value="0" {{$district->publication_status == 0 ? 'checked':'' }} />Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update District" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection