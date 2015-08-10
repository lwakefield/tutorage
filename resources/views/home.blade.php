@extends('layout.default')

@section('title', 'Tutorage')

@section('topbar-menu')
@endsection

@section('content')

@if (Auth::guest())
<div class="jumbotron text-center">
    <h1>Welcome to Tutorage</h1>
    <div class="row">
        <button class="col-xs-4 col-xs-offset-1 btn btn-primary" data-toggle="modal" data-target=".tutor-signup-form">Sign up as a Tutor</button>
        <p class="col-xs-2">or</p>
        <button class="col-xs-4 btn btn-primary" data-toggle="modal" data-target=".student-signup-form">Sign up as a Student</button>
    </div>
    <br>
    <p>If you already have an account, you can</p>
    <div class="row">
        <button class="col-xs-4 col-xs-offset-4 btn btn-primary" data-toggle="modal" data-target=".login-form">Login</button>
    </div>
</div>
@elseif (Auth::check())
    <h1>Tutorage</h1>
@endif

@include('user.create', ['user_type' => 'tutor'])
@include('user.create', ['user_type' => 'student'])
@include('user.login')

@endsection
