@extends('layout.default')

@section('title', 'Tutorage')

@section('topbar-menu')
@endsection

@section('content')

<div class="row">
    <div class="col-xs-6">
        <h2>Add a Subject</h2>
        <form class="new-subject-form form-inline" action="new-subject" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <input class="form-control" type="text" name="code" placeholder="MATH1002">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Linear Algebra">
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary" type="submit">Create New Subject</button>
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
            <ul class="list-group">
                @foreach ($my_subjects as $subject)
                    <li class="list-group-item">{{ $subject->full_name }}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h2>My Profile</h2>
            <ul class="list-group">                
                <li class="list-group-item" data-toggle="modal" data-target=".change-name">Name: <b>{{ Auth::user()->name }}</b><a style="float:right">edit</a></li>
                <li class="list-group-item">Email Address: <b>{{ Auth::user()->email }}</b></li>
                <li class="list-group-item" data-toggle="modal" data-target=".change-price">Price: <b>${{ Auth::user()->price }} p/h</b><a style="float:right">edit</a></li>
                <li class="list-group-item">Current Rating: <b>{{ Auth::user()->rating }}</b></li>
                <li class="list-group-item" data-toggle="modal" data-target=".change-description">Description: <b>{{ Auth::user()->description }}</b><a style="float:right">edit</a></li>
            </ul>
            @include('profile.change-name')
            @include('profile.change-price')
            @include('profile.change-description', ['description' => Auth::user()->description])
        </div>
    </div>
    <div class="col-xs-6">
        @include('conversations.show')
    </div>
</div>

@endsection
