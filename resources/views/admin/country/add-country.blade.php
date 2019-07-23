@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Add Country Form</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    {{Form::open(['route'=>'save-country','method'=>'POST','class'=>'form-horizontal'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Country Name</label>
                        <div class="col-md-8">
                            <input type="text" name="country_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Publication Status</label>
                        <div class="col-md-8 radio">
                            <label><input type="radio" checked name="publication_status" value="1" />Published</label>
                            <label><input type="radio" name="publication_status" value="0" />Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Country" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection