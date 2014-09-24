@extends('layouts.default')

@section('content')
	<div class="jumbotron">
        <h1>Larabook</h1>
        <p>Welcome to the best place to talk about laravel. Sign up already!</p>
        @if( ! $currentUser)
	        <p>
	        	{{ link_to_route('register_path', 'Sign Up', null, ['class' => "btn btn-lg btn-primary"]) }}
	        </p>
        @endif
    </div>
@stop