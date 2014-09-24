@extends('layouts.default')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Post a Status</h1>

			@include('layouts.partials.errors')
			
			{{ Form::open() }}

				<div class="form-group">
					{{ Form::label('body', 'Status:') }}
					{{ Form::textarea('body', null, ['class' => 'form-control']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
				</div>

			{{ Form::close() }}

			<h2>Statuses</h2>

			@foreach($statuses as $status)
				<article class="media">
					<div class="pull-left">
						<img class="media-obj" src="{{ $status->user->present()->gravatar }}" alt="{{ $status->user->username }}">
					</div>
					<div class="media-body">
						<h4 class="media-heading">{{ $status->user->username }}</h4>
						<p>{{ $status->created_at->diffForHumans() }}</p>
					</div>
					{{ $status->body }}
				</article>
			@endforeach
		</div>
	</div>

@stop