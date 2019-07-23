@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Family Member</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Member Name</th>
                            <th>Member Quote</th>
                            <th>Member Image</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($members as $member)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$member->member_name}}</td>
                                <td>{{$member->quote}}</td>
                                <td><img src="{{asset($member->member_image)}}" alt="" width="150" height="150"/></td>
                                <td>
                                    <a href="{{route('edit-family-member',['id'=>$member->id])}}" class="btn btn-success btn-xs" title="Edit Member">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-family-member',['id'=>$member->id])}}" onclick="return confirm('Are you sure to delete this!!')" class="btn btn-danger btn-xs" title="Delete Member">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection