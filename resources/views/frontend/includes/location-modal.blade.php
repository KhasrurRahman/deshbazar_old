<div class="container" id="my_modal">
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="location_modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="col-md-4">
                                <h3>দেশ নির্বাচন করুন</h3>
                                <ul>
                                    @foreach($productCountries as $productCountry)
                                        <li><a href="#{{$productCountry->id}}" data-toggle="pill"><span class=""></span>{{$productCountry->country_name}}<i class="fa fa-angle-right"></i></a>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="tab-content">
                                    @foreach($productCountries as $productCountry)
                                        @php
                                            $i=$productCountry->id
                                        @endphp
                                        <div id="{{$productCountry->id}}" class="tab-pane fade">
                                            <h3>বিভাগ নির্বাচন করুন... </h3>
                                            <ul>

                                                @foreach($divisions as $division)

                                                    @if($division->country_id==$i)
                                                        <li><a href="#x{{$division->id}}" data-toggle="pill"><span class=""></span>{{$division->division_name}}<i class="fa fa-angle-right"></i></a></li>

                                                    @endif

                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tab-content">
                                    @foreach($divisions as $division)
                                        @php
                                            $j=$division->id
                                        @endphp
                                        <div id="x{{$division->id}}" class="tab-pane fade">
                                            <h3>জেলা নির্বাচন করুন... </h3>
                                            <ul>

                                                @foreach($productDistricts as $productDistrict)

                                                    @if($productDistrict->division_id==$j)
                                                        <li><a href="{{route('district-ad',['id'=>$productDistrict->id])}}">{{$productDistrict->district_name}}</a></li>

                                                    @endif

                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
