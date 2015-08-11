@extends('layout.default')

@section('title', 'Tutorage')

@section('topbar-menu')
@endsection

@section('content')

<div class="row">
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
            <ul>
                @foreach ($tutors as $tutor)
                    <li>{{ $tutor->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

@endsection
