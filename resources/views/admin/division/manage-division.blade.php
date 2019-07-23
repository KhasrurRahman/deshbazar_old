@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Division</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Country Name</th>
                            <th>Division Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($divisions as $division)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$division->country_name}}</td>
                                <td>{{$division->division_name}}</td>
                                <td>{{$division->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    @if($division->publication_status == 1)
                                        <a href="{{route('unpublish-division',['id'=>$division->id])}}" class="btn btn-info btn-xs" title="Unpublish Division">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{route('publish-division',['id'=>$division->id])}}" class="btn btn-warning btn-xs" title="Publish Division">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif
                                    <a href="{{route('edit-division',['id'=>$division->id])}}" class="btn btn-success btn-xs" title="edit Division">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-division',['id'=>$division->id])}}" onclick="return confirm('Are you sure to delete this!!')" class="btn btn-danger btn-xs" title="Delete Division">
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