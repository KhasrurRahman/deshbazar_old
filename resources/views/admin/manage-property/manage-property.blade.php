@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-success text-center">Manage Property Ad</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl. No</th>
                            <th>Ad Title</th>
                            <th>Property Price</th>
                            <th>Post Time</th>
                            <th>Publication Status</th>
                            <th>Top Ad</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($ads as $ad)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$ad->ad_title}}</td>
                                <td>{{$ad->property_price}}</td>
                                <td>{{$ad->created_at->diffForHumans()}}</td>
                                <td>{{$ad->publication_status}}</td>
                                <td>{{$ad->top_ad == 1 ? 'Yes' : 'No'}}</td>
                                <td>
                                    <a href="{{route('view-property-ad',['id'=>$ad->id])}}" class="btn btn-xs btn-info" title="View property details"><span class="glyphicon glyphicon-zoom-in"></span></a>
                                    @if($ad->publication_status == 'Published')
                                        <a href="{{route('unpublish-property-ad',['id'=>$ad->id])}}" class="btn btn-xs btn-primary" title="Unpublish property"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                    @else
                                        <a href="{{route('publish-property-ad',['id'=>$ad->id])}}" class="btn btn-xs btn-warning" title="Publish property"><span class="glyphicon glyphicon-arrow-down"></span></a>
                                    @endif
                                    @if($ad->top_ad == 1)
                                        <a href="{{route('normal-property-ad',['id'=>$ad->id])}}" onclick="return confirm('Are you sure to eliminate this Ad from Top Ad!!')" class="btn btn-xs btn-success" title="Do Normal"><span class="glyphicon glyphicon-arrow-up"></span></a>
                                    @else
                                        <a href="{{route('promote-ad',['id'=>$ad->id,'infoId'=>$ad->information_id])}}" onclick="return confirm('Are you sure to promote this Ad!!')" class="btn btn-xs btn-danger" title="Do Top"><span class="glyphicon glyphicon-arrow-down"></span></a>
                                        {{--<a href="{{route('top-product-ad',['id'=>$product->id])}}" onclick="return confirm('Are you sure to promote this Ad!!')" class="btn btn-xs btn-danger" title="Do Top"><span class="glyphicon glyphicon-arrow-down"></span></a>--}}
                                    @endif
                                    <a href="{{route('edit-property-ad',['id'=>$ad->id])}}" class="btn btn-success btn-xs" title="edit Property Ad">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-property-ad',['id'=>$ad->information_id])}}" onclick="return confirm('Are you sure to delete this Ad!!')" class="btn btn-xs btn-danger" title="Delete property Ad"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>



    @if (session('mobile'))
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
                            "msg" : "your property add is published",
                            "contacts" : '"'+'880'+mobile+'"'
                        }

                    }
                );
            }
            window.onload = sms;
        </script>
    @endif


@endsection