@extends('admin.master')

@section('body')
    <div class="row table-responsive">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Manage Banner Ad</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{Session::get('message')}}</h3>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Banner Url</th>
                            <th>Banner Image</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @foreach($bannerAds as $bannerAd)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$bannerAd->banner_url}}</td>
                                <td><img src="{{asset($bannerAd->banner_image)}}" alt="" width="200" height="80"/></td>
                                <td>
                                    <a href="{{route('edit-banner-ad',['id'=>$bannerAd->id])}}" class="btn btn-success btn-xs" title="Edit Banner">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{route('delete-banner-ad',['id'=>$bannerAd->id])}}" onclick="return confirm('Are you sure to delete this!!')" class="btn btn-danger btn-xs" title="Delete Banner">
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