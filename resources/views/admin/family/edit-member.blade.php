@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit Member Form</h4>
                </div>
                <div class="panel-body">
                    {{Form::open(['route'=>'update-family-member','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Member Name</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$member->member_name}}" name="member_name" class="form-control"/>
                            <input type="hidden" value="{{$member->id}}" name="member_id" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Quote</label>
                        <div class="col-md-8">
                            <textarea name="quote" class="form-control">{{$member->quote}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Member Image</label>
                        <div class="col-md-8">
                            <input type="file" name="member_image" accept="image/*"/>
                            <br />
                            <img src="{{asset($member->member_image)}}" alt="" width="150" height="150"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Member" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection