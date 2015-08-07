@extends('layout.default')

@section('content')

<div class="row">
    @include('partials.errors')
	<form class="col-md-offset-4 col-md-4 panel panel-default" action="/login" method="post">
		<h1 class="text-center">Login</h1>
		{!! csrf_field() !!}
		<div class="form-group">
			<input class="form-control" type="text" name="email" placeholder="Email Address">
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<input class="form-control btn-primary" type="submit" value="Login">
		</div>
	</form>
</div>

@endsection
