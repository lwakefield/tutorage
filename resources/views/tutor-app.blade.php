@extends('layout.default')

@section('title', 'Tutorage')

@section('topbar-menu')
@endsection

@section('content')

<div class="row">
    <div class="col-xs-6">
        <form class="new-subject-form form-inline" action="new-subject" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <input class="form-control" type="text" name="code" placeholder="Unit Code">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Unit Name">
            </div>
            <div class="form-group">
                <button class="form-control btn btn-primary" type="submit">Add New Subject</button>
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
                <button class="form-control btn btn-primary" type="submit">Add to My Subjects</button>
            </div>
        </form>
        <br>
        <div>
            <h2>My Subjects</h2>
            <ul class="list-group">
                @foreach ($my_subjects as $subject)
                    <li class="list-group-item">{{ $subject->full_name }}<a  href="/delete-subject?subject_id={{$subject->id}}"><button class="btn-primary" style="float: right; border-radius:4px;">Delete</button></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-xs-6">
        @include('conversations.show-tutor')
    </div>
</div>

@endsection
