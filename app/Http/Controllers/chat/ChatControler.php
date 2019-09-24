<?php

namespace App\Http\Controllers\chat;

use App\chat;
use App\ProductDetail;
use App\ProductInformation;
use App\ProductUserchat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class ChatControler extends Controller
{
    public function index(){
        $userid = Session::get('frontUserId');



        if ($pro_chat_id = ProductUserchat::where('user1_id',$userid)->orWhere('user2_id',$userid)->count() == 0){
            return redirect()->back()->with('message','you have no chat right now');
        }else{
                $pro_chat_id = ProductUserchat::where('user1_id',$userid)->orWhere('user2_id',$userid)->first()->id;
                    return redirect()->route('chat_conversetion', $pro_chat_id);
        }


    }




    public function chat_conversetion($id){
        $userid = Session::get('frontUserId');
        $conv = chat::where('product_id',$id)->orderBy('id', 'asc')->get();
        $product_chat_id = chat::where('product_id',$id)->first()->product_id;

        $unread_message = chat::where('to',$userid)->where('status',0)->where('product_id',$id)->update(['status'=>'1']);

       return view('frontend.chat.chat',compact('conv','userid','product_chat_id','id'));
    }



    public function chat_save(Request $request, $product_id){

        $userid = Session::get('frontUserId');



        $to_id = ProductUserchat::where('id',$product_id)->get()->first();

        if ($to_id->user1_id == $userid){
            $to = $to_id->user2_id;
        }else{
            $to = $to_id->user1_id;
        }

        $mesage= $request->input('message');
        $chat = new chat();
        $chat->product_id = $product_id;
        $chat->from = $userid;
        $chat->to = $to;
        $chat->chat = $mesage;
        $chat->status = 0;

        $chat->save();

        return redirect()->back();

    }



    public function chat_user_create(Request $request,$product_id){
        $mesage = $mesage= $request->input('message');
        $userid = Session::get('frontUserId');
        $info_id = ProductDetail::find($product_id)->information_id;
        $user2_id = ProductInformation::find($info_id)->user_id;

        $product_user_chat = new ProductUserchat();
        $product_user_chat ->user1_id=$userid;
        $product_user_chat-> user2_id = $user2_id;
        $product_user_chat-> product_id = $product_id;
        $product_user_chat-> save();

        $chat = new chat();
        $chat->product_id = $product_user_chat->id;
        $chat->from = $userid;
        $chat->to = $user2_id;
        $chat->chat = $mesage;
        $chat->status = 0;
        $chat->save();


        return redirect()->back()->with('message','Message sent successfully');

    }


}
