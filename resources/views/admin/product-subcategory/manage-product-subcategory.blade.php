@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Product Subcategory</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Category Name</th>
                            <th>Subcategory Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($productSubcategories as $productSubcategory)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$productSubcategory->category_name}}</td>
                                <td>{{$productSubcategory->subcategory_name}}</td>
                                <td>{{$productSubcategory->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    @if($productSubcategory->publication_status == 1)
                                        <a href="{{route('unpublish-product-subcategory',['id'=>$productSubcategory->id])}}" class="btn btn-info btn-xs" title="Unpublish Subcategory">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{route('publish-product-subcategory',['id'=>$productSubcategory->id])}}" class="btn btn-warning btn-xs" title="Publish Subcategory">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif
                                    <a href="{{route('edit-product-subcategory',['id'=>$productSubcategory->id])}}" class="btn btn-success btn-xs" title="edit Subcategory">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-product-subcategory',['id'=>$productSubcategory->id])}}" onclick="return confirm('Are you sure to delete this!!')" class="btn btn-danger btn-xs" title="Delete Subcategory">
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