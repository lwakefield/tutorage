@extends('layout.default')

@section('title', 'Tutorage')

@section('topbar-menu')
@endsection

@section('content')

<div class="row student-app">
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Find Tutors</h3>
            </div>
            <div class="panel-body">
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
                        <select class="form-control" name="max_price">
                            <option value="no-limit">Max Price p/h</option>
                            <option value="10">$10</option>
                            <option value="20">$20</option>
                            <option value="30">$30</option>
                            <option value="40">$40</option>
                            <option value="50">$50</option>
                            <option value="60">$60</option>
                            <option value="70">$70</option>
                            <option value="80">$80</option>
                            <option value="90">$90</option>
                            <option value="100">$100</option>

                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <button class="form-control btn btn-primary" type="submit">Find Tutors</button>
                    </div>
                </form>
                @if (isset($tutors))
                    <br>
                    <ul class="list-group">
                        @foreach ($tutors as $tutor)
                            <li class="list-group-item">
                                {{ $tutor->name }} (${{ $tutor->price }} p/h)
                                <span style="position:absolute; right:10px;top:3px;">
                                    <span class="label label-primary">Rating: {{ $tutor->rating }}</span>
                                    <a href="/up-rating?tutor_id={{$tutor->id}}"><button class="btn btn-success"><img style="width:20px;height:auto;" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-up-b-128.png"></button></a>
                                    <a href="/down-rating?tutor_id={{$tutor->id}}"><button class="btn btn-danger"><img style="width:20px;height:auto;"src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-128.png"></button></a>
                                    <button class="btn btn-info" data-toggle="modal" data-target=".send-message-to-{{ $tutor->id }}">Send Message</button>
                                </span>
                            </li>
                            @include('message.send', ['to_user' => $tutor->id])
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        @include('conversations.show')
    </div>
</div>

@endsection
