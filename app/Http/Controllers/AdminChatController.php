<?php

namespace App\Http\Controllers;

use App\ProductUserchat;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    public function all_chat(){
        $font_user_chat = ProductUserchat::all()->count();
        if ($font_user_chat == 0){
            echo "there is no chat ";
        }else{
            $fast_chat_user = ProductUserchat::all()->first()->id;

            return redirect()->route('all_chat_conversation',$fast_chat_user);
        }

    }

    public function all_chat_conversation($id){
        $font_user_chat = ProductUserchat::all();
        $user1_id = ProductUserchat::find($id)->user1_id;

        return view('admin.chat.chat',compact('font_user_chat','id','user1_id'));

    }
}
