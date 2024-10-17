<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\MessageSent;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function index(){
        $sender_id = Auth::id();

        $open_chats = ChatMessage::where('sender_id', $sender_id)
            ->with('receiver') 
            ->select('receiver_id')
            ->distinct()
            ->get();
 
        $chats = $open_chats->pluck('receiver')->unique();
        
        return view('chats')->with(compact(['chats']));
        
    }

    public function getMessages($user_name_x){
        $friend = User::where('user_name_x',$user_name_x)->first();
        return ChatMessage::query()
        ->where(function ($query) use ($friend) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $friend->id);
        })
        ->orWhere(function ($query) use ($friend) {
            $query->where('sender_id', $friend->id)
                ->where('receiver_id', auth()->id());
        })
        ->with(['sender', 'receiver'])
        ->orderBy('id', 'asc')
        ->get();
    }

    public function sendMessage($user_name_x){
        $friend = User::where('user_name_x',$user_name_x)->first();
        $message = ChatMessage::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $friend->id,
            'text' => request()->input('message')
        ]);
     
        broadcast(new MessageSent($message));
     
        return $message;
    }
}
