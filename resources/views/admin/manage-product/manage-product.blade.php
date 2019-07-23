@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Manage Product Ad</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl. No</th>
                            <th>Ad Title</th>
                            <th>Product Price</th>
                            <th>Post Time</th>
                            <th>Publication Status</th>
                            <th>Top Ad</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->ad_title}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->created_at->diffForHumans()}}</td>
                                <td>{{$product->publication_status}}</td>
                                <td>{{$product->top_ad == 1 ? 'Yes' : 'No'}}</td>
                                <td>
                                    <a href="{{route('view-product-ad',['id'=>$product->id])}}" class="btn btn-xs btn-info" title="View product details"><span class="glyphicon glyphicon-zoom-in"></span></a>
                                    @if($product->publication_status == 'Published')
                                        <a href="{{route('unpublish-product-ad',['id'=>$product->id])}}" class="btn btn-xs btn-primary" title="Unpublish product"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                    @else
                                        <a href="{{route('publish-product-ad',['id'=>$product->id])}}" class="btn btn-xs btn-warning" title="Publish product"><span class="glyphicon glyphicon-arrow-down"></span></a>
                                    @endif
                                    <a href="{{route('edit-product-ad',['id'=>$product->id])}}" class="btn btn-success btn-xs" title="edit Product Ad">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    @if($product->top_ad == 1)
                                        <a href="{{route('normal-product-ad',['id'=>$product->id])}}" onclick="return confirm('Are you sure to eliminate this Ad from Top Ad!!')" class="btn btn-xs btn-success" title="Do Normal"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                    @else
                                        <a href="{{route('promote-ad',['id'=>$product->id,'infoId'=>$product->information_id])}}" onclick="return confirm('Are you sure to promote this Ad!!')" class="btn btn-xs btn-danger" title="Do Top"><span class="glyphicon glyphicon-arrow-down"></span></a>
                                        {{--<a href="{{route('top-product-ad',['id'=>$product->id])}}" onclick="return confirm('Are you sure to promote this Ad!!')" class="btn btn-xs btn-danger" title="Do Top"><span class="glyphicon glyphicon-arrow-down"></span></a>--}}
                                    @endif
                                    <a href="{{route('delete-product-ad',['id'=>$product->information_id])}}" onclick="return confirm('Are you sure to delete this Ad!!')" class="btn btn-xs btn-danger" title="Delete product Ad"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection