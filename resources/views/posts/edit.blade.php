@extends('layouts.app')

@section('title', '| Edit Post')

@section('content')


    <div class="col-lg-12 ">
     <div class="w-50 m-auto mt-4 mb-4">
         <h1 class="mt-4">Edit Post</h1>
        <hr>
            {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
            <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('body', 'Content') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div> 
     </div>
    
</div>

@endsection