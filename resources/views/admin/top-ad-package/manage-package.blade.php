@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Package</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Package Name</th>
                            <th>Package Description</th>
                            <th>Package Duration</th>
                            <th>Package Price</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($topAdPackages as $topAdPackage)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$topAdPackage->package_name}}</td>
                                <td>{{$topAdPackage->description}}</td>
                                <td>{{$topAdPackage->package_duration}} days</td>
                                <td> Tk. {{$topAdPackage->package_price}}</td>
                                <td>
                                    <a href="{{route('edit-package',['id'=>$topAdPackage->id])}}" class="btn btn-success btn-xs" title="edit Package">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-package',['id'=>$topAdPackage->id])}}" onclick="return confirm('Are you sure to delete this!!')" class="btn btn-danger btn-xs" title="Delete Package">
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