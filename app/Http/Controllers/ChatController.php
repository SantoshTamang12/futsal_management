<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use \Chat;

class ChatController extends Controller
{
    function list(Request $request){
        $user = auth()->user();
//        return $user;
        $conversations = Chat::conversations()->setPaginationParams(['sorting' => 'desc'])
            ->setParticipant($user)
            ->get();
//        return $conversations;

        $messages = [];
        $conversation = Chat::conversations()->getById($request->conversation_id);
        if($conversation)
        $messages =  Chat::conversation($conversation)->setParticipant($user)->getMessages();
//        return $messages;
        return view('chat.list', compact('conversations','conversation','messages'));
    }


    function make($receipent){

        $receipent = User::findOrFail($receipent);
        $user = auth()->user();

        if($receipent->id == $user->id){
            return "You cannot make conversation with yourself";
        }
        $conversation = Chat::conversations()->between($user, $receipent);
        if($conversation)  return redirect()->route('chat.list',['conversation_id' => $conversation->id]);
        $participants = [$user, $receipent];
        $conversation = Chat::createConversation($participants)->makeDirect();

        $conversations = Chat::conversations()->setPaginationParams(['sorting' => 'desc'])
            ->setParticipant($user)
            ->get();

        return redirect()->route('chat.list');
    }

    function send($id, Request $request){
        $user = auth()->user();
        $conversation = Chat::conversations()->getById($id);
        $message = Chat::message($request->message)
            ->from($user)
            ->to($conversation)
            ->send();
        return redirect()->route('chat.list',['conversation_id'=>$id]);
    }
}
