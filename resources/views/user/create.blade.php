@extends('layout.default')

@section('title', 'Tutorage')

@section('topbar-menu')
@endsection

@section('content')
<div class="row">
    <div class="col-xs-6 col-xs-offset-3">
        <h2 class="text-center">Signup</h2>
        <form method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="user_type">Signup as a:</label>
                <select class="form-control" name="user_type">
                    <option value="student">Student</option>
                    <option value="tutor">Tutor</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="your@email.com">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="verify_password" placeholder="Verify Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Signup</button>
            </div>
        </form>
    </div>
</div>
@endsection
