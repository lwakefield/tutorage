@extends('layout.default')

@section('title', 'New Subreddit')

@section('topbar-menu')
	<li><a href="/new-subreddit">New Subreddit</a></li>
@endsection

@section('content')
<div class="row">
    @include('partials.errors')
	<form class="col-md-offset-4 col-md-4 panel panel-default" action="/new-subreddit" method="post">
		<h1 class="text-center">New Subreddit</h1>
		{!! csrf_field() !!}
		<div class="form-group">
			<input class="form-control" type="text" name="name" placeholder="Name">
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="description" placeholder="Description">
		</div>
		<div class="form-group">
			<input class="form-control btn-primary" type="submit" value="Create">
		</div>
	</form>
</div>
@endsection
