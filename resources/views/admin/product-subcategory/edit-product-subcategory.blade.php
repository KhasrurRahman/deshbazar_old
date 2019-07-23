@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Edit Product Subcategory Form</h4>
                </div>
                <div class="panel-body">
                    {{Form::open(['route'=>'update-product-subcategory','method'=>'POST','class'=>'form-horizontal'])}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Category Name</label>
                        <div class="col-md-8">
                            <select class="form-control" name="category_id">
                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Subcategory Name</label>
                        <div class="col-md-8">
                            <input type="text" value="{{$subcategory->subcategory_name}}" name="subcategory_name" class="form-control"/>
                            <input type="hidden" value="{{$subcategory->id}}" name="subcategory_id" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Publication Status</label>
                        <div class="col-md-8 radio">
                            <label><input type="radio" name="publication_status" value="1" {{$subcategory->publication_status == 1 ? 'checked':''}}/>Published</label>
                            <label><input type="radio" name="publication_status" value="0" {{$subcategory->publication_status == 0 ? 'checked':''}}/>Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Product Subcategory" />
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection