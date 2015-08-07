@extends('layout.default')

@section('title', 'New Post')

@section('topbar-menu')
	<li><a href="/r/{{ $subreddit_id }}/new-post">New Post</a></li>
@endsection

@section('content')
<div class="row">
    @include('partials.errors')
	<form class="col-md-offset-4 col-md-4 panel panel-default" action="/r/{{ $subreddit_id }}/new-post" method="post">
		<h1 class="text-center">New Post</h1>
		{!! csrf_field() !!}
		<input type="hidden" name="subreddit_id" value="{{ $subreddit_id }}">
		<div class="form-group">
			<input class="form-control" type="text" name="title" placeholder="Title">
		</div>
		<div class="form-group">
			<textarea class="form-control" name="content" placeholder="Content"></textarea>
		</div>
		<div class="form-group">
			<input class="form-control btn-primary" type="submit" value="Create">
		</div>
	</form>
</div>
@endsection
