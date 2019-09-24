@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Manage Product Ad</h4>
                </div>

                <form action="{{route('search_result')}}" method="get">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">search By Mobile number</label>
                            <input type="number" class="form-control" name="mobile" placeholder="Search by phone number">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">search By Category</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category">
                                @php
                                $category = App\ProductCategory::all();
                                @endphp
                                <option disabled selected>Select A category</option>
                                @foreach($category as $ca)
                                <option value="{{$ca->id}}">{{$ca->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <br>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>


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


                        @php
                            $user = App\FrontUser::where('phone_number', $mobile)->get();
                        @endphp


                        @php($i=1)
                        @foreach($user as $userid)
                            @php
                                $info_id = App\ProductInformation::where('user_id',$userid->id)->get();
                            @endphp
                        @foreach($info_id as $info)
                            @php
                                $products = App\ProductDetail::where('information_id',$info->id)->get();
                            @endphp
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
                                        <a href="{{route('publish-product-ad',['id'=>$product->id])}}" class="btn btn-xs btn-warning" title="Publish product" ><span class="glyphicon glyphicon-arrow-down"></span></a>
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
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>




        @if (session('message'))
                <script>
                    function sms() {
                        var mobile = {{Session::get('mobile')}}
                            $.ajax({
                                    type : "post",
                                    url : "http://users.sendsmsbd.com/smsapi",
                                    data : {
                                        "api_key" : "R60003685d831c646089b7.77651031",
                                        "senderid" : "8804445629106",
                                        "type" : "text",
                                        "scheduledDateTime" : "",
                                        "msg" : "your product add is published",
                                        "contacts" : '"'+'880'+mobile+'"'
                                    }

                                }
                            );
                        }
                    window.onload = sms;
                </script>
            @endif
@endsection