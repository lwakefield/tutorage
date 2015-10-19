@extends('layout.default')

@section('title', 'Tutorage')

@section('topbar-menu')
@endsection

@section('content')

<div class="jumbotron text-center">
    <h1>Welcome to Tutorage</h1>
    <div class="row">
        <a class="col-xs-4 col-xs-offset-4 btn btn-primary" href="signup">Signup</a>
    </div>
    <br>
    <p>or</p>
    <div class="row">
        <a class="col-xs-4 col-xs-offset-4 btn btn-primary" href="login">Log in</a>
    </div>
</div>

@endsection
