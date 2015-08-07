@extends('layout.default')

@section('content')

<div class="row">
    @include('partials.errors')
	<form class="col-md-offset-4 col-md-4 panel panel-default" action="/register" method="post">
		<h1 class="text-center">Register</h1>
		{!! csrf_field() !!}
		<div class="form-group">
			<input class="form-control" type="text" name="name" value="{{ Input::old('name') }}"placeholder="Name">
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="email" value="{{ Input::old('email') }}" placeholder="Email Address">
		</div>
		<div class="form-group">
			<input class="form-control" type="password" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<input class="form-control btn-primary" type="submit" value="Register">
		</div>
	</form>
</div>

@endsection
