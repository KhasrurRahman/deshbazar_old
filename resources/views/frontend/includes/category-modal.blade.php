<div class="container" id="my_modal">
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="category_modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="col-md-10 col-md-offset-1 ">
                            <div class="">

                                <div class="col-md-6">
                                    <h3>একটি শ্রেণী নির্বাচন করুন...</h3>
                                    <ul>
                                        @foreach($productCategories as $productCategory)
                                            @php
                                                $id=$productCategory->id
                                            @endphp
                                            @if($id != 12 && $id != 13 && $id != 14)
                                                <li><a href="#a{{$productCategory->id}}" data-toggle="pill"><span class=""></span>{{$productCategory->category_name}}<i class="fa fa-angle-right"></i></a></li>
                                            @else
                                                <li><a href="{{route('category-product',['id'=>$productCategory->id])}}"><span class=""></span>{{$productCategory->category_name}}<i class="fa fa-angle-right"></i></a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="tab-content">
                                        @foreach($productCategories as $productCategory)
                                            @php
                                                $i=$productCategory->id
                                            @endphp
                                            <div id="a{{$productCategory->id}}" class="tab-pane fade">
                                                <h3>উপশ্রেণী নির্বাচন করুন... </h3>
                                                <ul>

                                                    @foreach($productSubcategories as $productSubcategory)

                                                        @if($productSubcategory->category_id==$i)
                                                            <li><a href="{{route('subcategory-product',['id'=>$productSubcategory->id])}}">{{$productSubcategory->subcategory_name}}</a></li>

                                                        @endif

                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach

                                    </div>
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