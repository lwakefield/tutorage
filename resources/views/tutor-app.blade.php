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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    My Profile
                    <span class="label label-primary pull-right">My Rating: {{ Auth::user()->score }}</span>
                </h3>
            </div>
            <div class="panel-body">
                <form action="/profile" method="post">
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger" role="alert">{{ $e }}</div>
                    @endforeach
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>$ Rate / Hour</label>
                        <input class="form-control" type="number" name="rate" placeholder="$rate / hour" value="{{Auth::user()->rate}}">
                    </div>
                    <div class="form-group">
                        <label>Blurb</label>
                        <textarea class="form-control" name="blurb" placeholder="Tell us something about yourself!">{{ Auth::user()->blurb }}</textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control btn-primary" type="submit" value="Update My Profile">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        @include('conversations.show')
    </div>
</div>

@endsection
