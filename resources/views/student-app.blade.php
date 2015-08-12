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
                    <li class="list-group-item"
                        data-toggle="modal"
                        data-target=".send-message-to-{{ $tutor->id }}">{{ $tutor->name }}</li>
                    @include('message.send', ['to_user' => $tutor->id])
                @endforeach
            </ul>
        @endif
    </div>
    <div class="col-xs-6">
        <h2>Messages</h2>
        <div class="row">
            <div class="col-xs-4">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($conversations as $id => $val)
                        <li><a href="#conversation-{{ $id }}" data-toggle="tab">{{ $val->with_user->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-8">
                <div class="tab-content">
                    @foreach ($conversations as $id => $conversation)
                        <div class="tab-pane {{ $id == 0 ? 'active' : ''}}"
                            id="conversation-{{ $id }}">
                            <ul class="list-group">
                                @foreach ($conversation->messages as $message)
                                    <li class="list-group-item">
                                        <strong>{{ $message->from_id }}:</strong>{{ $message->content }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
