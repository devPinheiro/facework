<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = User::where('id','!=',Auth::id())->get(['chat_id','name']);
        return $chats;
    }
    /**
     * Show single chat
     *
     * @param string $other_party
     * @return \Illuminate\Http\Response
     */
    public function single($other_party)
    {
        $recipient = User::where('chat_id',$other_party)->first();
        return $recipient;
    }

    /**
     * Fetch all messages
     *
     * @param $string $other_party
     * @return Message
     */
    public function fetchMessages($other_party)
    {
        $chat_id = Auth::user()->chat_id;
        $msg = Message::with('sender')->where('user_id',$other_party)->where('receiver_id',$chat_id)->get();
        $myMsg = Message::with('sender')->where('user_id',$chat_id)->where('receiver_id',$other_party)->get();

        return new \App\Http\Resources\MessagesResource($msg->merge($myMsg)->sortBy('id'));
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @param  $string $other_party
     * @return Response
     */
    public function sendMessage(Request $request,$other_party)
    {
        $user = Auth::user();

        $message = Message::create([
            'user_id' => $user->chat_id,
            'message' => $request->input('message'),
            'receiver_id' => $other_party
        ]);

        broadcast(new \App\Events\MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!', 'data' => new \App\Http\Resources\MessageResource($message)];
    }
}
