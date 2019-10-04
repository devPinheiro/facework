@extends('layouts.app')

@section('content')

<h1>Chat Application</h1>
<message :message="messages"></message>
<sent-message v-on:messagesent="addMessage" :user="{{ Auth::user()}}"></sent-message>
    
@endsection