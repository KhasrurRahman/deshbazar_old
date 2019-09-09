@extends('frontend.master')
@section('title')
    Chat
@endsection

@section('body')

<style>
    .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:black; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #d82d79 none repeat scroll 0 0;
        border-radius: 3px;
        color: white;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
        overflow-y:scroll;
    }

    .sent_msg p {
        background: #337ab7 none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
        height: 516px;
        overflow-y: auto;
    }

    .background{
        border-left: 5px solid;
        background: #b2ffb2;
    }
</style>

    <div class="container">
        <h3 class=" text-center">ম্যাসেজ / চ্যাট করুন</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Add</h4>
                        </div>
                    </div>

                    @php
                        use App\ProductInformation;use App\ProductUserchat;use App\chat;
                        $productid = ProductUserchat::where('user1_id',$userid)->orWhere('user2_id',$userid)->get();

                    @endphp



                    <div class="inbox_chat">

                        @foreach($productid as $pp)
                            @php
                            $product_info = ProductInformation::find($pp->product_id);
                            $product = DB::table('product_details')
                            ->where('product_details.id','=',$product_info->id)
                            ->join('product_images','product_details.id','=','product_images.product_id')
                            ->join('product_informations','product_details.information_id','=','product_informations.id')
                            ->join('front_users','product_informations.user_id','=','front_users.id')
                            ->join('product_districts','product_informations.district_id','=','product_districts.id')
                            ->select('product_details.*','product_informations.subcategory_id','product_informations.district_id','product_images.product_image1','product_images.product_image2','product_images.product_image3','front_users.name','front_users.phone_number','product_districts.district_name')
                            ->first();
                            @endphp

                        <div class="chat_list active_chat {{ $pp->id == $id ? 'background' : '' }}">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="{{asset($product->product_image1) }}" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <a href="{{route('chat_conversetion',$pp->id)}}">
                                        <h5>{{$product->ad_title}} tk

                                            @if(chat::where('product_id',$pp->id)->where('to',$userid)->where('status',0)->get()->count() !== 0)
                                            <span class="chat_date"><img src="{{asset('/') }}front/images/iconfinder_JD-18_2246839.png" style="height: 35px"></span>

                                                @else
                                                <span></span>
                                            @endif

                                        </h5>
                                        <p>{{$product->product_price}} tk</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach
                    </div>
                </div>






                <div class="mesgs" >
                    <div class="msg_history" id="daViewerContainer" onload="scrollToBottom()" >

                        @foreach($conv as $cc)


                            @if($cc->from !== $userid)
                        <div class="incoming_msg message">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>{{$cc->chat}}</p>
                                    <span class="time_date">{{$cc->created_at->diffForHumans()}}</span></div>
                            </div>
                        </div>
                            @endif


                        @if($cc->from == $userid)
                        <div class="outgoing_msg message">
                            <div class="sent_msg">
                                <p>{{$cc->chat}}</p>
                                <span class="time_date">{{$cc->created_at->diffForHumans()}}</span> </div>
                        </div>
                         @endif


                        @endforeach


                    </div>


                    <form action="{{route('chat_save',[$product_chat_id])}}" method="get">
                        {!! csrf_field() !!}
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" name="message"/>
                            <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>
            </div>








<script>
    var element = document.getElementById("daViewerContainer");
    element.scrollTop = element.scrollHeight ;
</script>













@endsection