@extends('layout.default')

@section('title', $sub->name)

@section('topbar-menu')
	<li><a href="/r/{{ $sub->id }}/new-post">New Post</a></li>
@endsection

@section('content')

<div class="jumbotron">
	<h1 class="text-center"><a href="/r/{{ $sub->id }}">{{ $sub->name }}</a></h1>
	<p class="text-center">{{ $sub->description }}</p>
</div>

@foreach (array_chunk($posts, 3, true) as $chunk)
	<div class="row">
		@foreach ($chunk as $index => $post)
			<div class="col-xs-12 col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3>{{ $index }}. <a href="/p/{{ $post->id }}">{{ $post->title }}</a></h3>
						<p>{{ $post->content }}</p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endforeach

<div class="text-center">
	{!! $pagination_render !!}
</div>
@endsection