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
    <div class="row">
        <div class="col-xs-6">
            <form class="new-subject-form form-inline" action="new-subject" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input class="form-control" type="text" name="code" placeholder="MATH1002">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Linear Algebra">
                </div>
                <div class="form-group">
                    <button class="form-control btn btn-primary" type="submit">New Subject</button>
                </div>
            </form>
            <br>
            <form class="add-subject-form form-inline" action="add-subject" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <select class="form-control" name="subject_id">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->full_name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="form-control btn btn-primary" type="submit">Add Subject</button>
                </div>
            </form>
            <br>
            <div>
                <h2>My Subjects</h2>
                <ul>
                    @foreach ($my_subjects as $subject)
                        <li>{{ $subject->full_name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@include('user.create', ['user_type' => 'tutor'])
@include('user.create', ['user_type' => 'student'])
@include('user.login')

@endsection
