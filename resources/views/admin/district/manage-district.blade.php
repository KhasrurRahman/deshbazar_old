@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage District</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Country Name</th>
                            <th>Division Name</th>
                            <th>District Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($districts as $district)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$district->country_name}}</td>
                                <td>{{$district->division_name}}</td>
                                <td>{{$district->district_name}}</td>
                                <td>{{$district->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    @if($district->publication_status == 1)
                                        <a href="{{route('unpublish-district',['id'=>$district->id])}}" class="btn btn-info btn-xs" title="Unpublish District">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{route('publish-district',['id'=>$district->id])}}" class="btn btn-warning btn-xs" title="Publish District">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif
                                    <a href="{{route('edit-district',['id'=>$district->id])}}" class="btn btn-success btn-xs" title="edit District">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-district',['id'=>$district->id])}}" onclick="return confirm('Are you sure to delete this!!')" class="btn btn-danger btn-xs" title="Delete District">
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