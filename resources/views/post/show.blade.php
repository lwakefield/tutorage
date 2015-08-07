@extends('layout.default')

@section('title', $post->title)

@section('content')

@include('partials.errors')
<div class="jumbotron">
    <div class="row">
		<div class="col-xs-1">
			@include('vote.create', ['action' => "/p/$post->id/vote", 'score' => $post->score])
		</div>
        <h1 class="col-xs-10 text-center">
            <a href="/p/{{ $post->id }}">{{ $post->title }}</a>
        </h1>
		<div class="col-xs-1">
            @if (Auth::check())
                <button class="btn btn-default pull-right" data-toggle="collapse" data-target=".p{{ $post->id }}">Reply</button>
            @else
                <a class="btn btn-default pull-right" href="/login">Reply</a>
            @endif
        </div>
	</div>
	<p>{{ $post->content }}</p>
	
	@include('comment.create', ['post_id' => $post->id])
</div>

<ul class="list-group">
	@foreach ($post->comments as $comment)
		@include('comment.show', ['comment' => $comment])
	@endforeach
</ul>

@endsection
