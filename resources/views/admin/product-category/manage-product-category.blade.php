@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Product Category</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Category Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{!! $category->description !!}</td>
                                <td><img src="{{asset($category->category_image)}}" alt="" width="40" height="40"/></td>
                                <td>{{$category->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    @if($category->publication_status == 1)
                                        <a href="{{route('unpublish-product-category',['id'=>$category->id])}}" class="btn btn-info btn-xs" title="Unpublish Category">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{route('publish-product-category',['id'=>$category->id])}}" class="btn btn-warning btn-xs" title="Publish Category">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif
                                    <a href="{{route('edit-product-category',['id'=>$category->id])}}" class="btn btn-success btn-xs" title="edit Category">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-product-category',['id'=>$category->id])}}" onclick="return confirm('Are you sure to delete this!!')" class="btn btn-danger btn-xs" title="Delete Category">
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