@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Country</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Country Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($countries as $country)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$country->country_name}}</td>
                                <td>{{$country->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    @if($country->publication_status == 1)
                                        <a href="{{route('unpublish-country',['id'=>$country->id])}}" class="btn btn-info btn-xs" title="Unpublish Country">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{route('publish-country',['id'=>$country->id])}}" class="btn btn-warning btn-xs" title="Publish Country">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif
                                    <a href="{{route('edit-country',['id'=>$country->id])}}" class="btn btn-success btn-xs" title="edit Country">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-country',['id'=>$country->id])}}" onclick="return confirm('Are you sure to delete this!!')" class="btn btn-danger btn-xs" title="Delete Country">
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