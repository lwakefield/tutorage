@extends('layout.default')

@section('content')

	<form class="col-md-offset-4 col-md-4 panel panel-default" method="post">
		<h1 class="text-center">My Profile</h1>
        @foreach ($errors->all() as $e)
            <div class="alert alert-danger" role="alert">{{ $e }}</div>
        @endforeach
		{!! csrf_field() !!}
		<div class="form-group">
			<input class="form-control" type="number" name="rate" placeholder="$rate / hour" value="{{Auth::user()->rate}}">
		</div>
		<div class="form-group">
            <textarea class="form-control" name="blurb" placeholder="Tell us something about yourself!">{{ Auth::user()->blurb }}</textarea>
		</div>
		<div class="form-group">
			<input class="form-control btn-primary" type="submit" value="Update My Profile">
		</div>
	</form>

@endsection

