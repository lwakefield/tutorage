@extends('layout.default')

@section('title', 'Tutorage')

@section('topbar-menu')
@endsection

@section('content')

<div class="row student-app">
    <div class="col-xs-6">
        <form class="find-tutors-form form-inline" action="find-tutors" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <select class="form-control" name="subject_id">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->full_name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary" type="submit">Find Tutors</button>
            </div>
        </form>
        @if (isset($tutors))
            <br>
            <ul class="list-group">
                @foreach ($tutors as $tutor)
                    <li class="list-group-item" c-on="click: sendMessage">{{ $tutor->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="col-xs-6">
        <h2>Messages</h2>
    </div>
</div>

@endsection
