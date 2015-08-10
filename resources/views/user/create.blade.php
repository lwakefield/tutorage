<div class="modal fade {{$user_type}}-signup-form">
    <div class="modal-dialog">
        <form class="modal-content" action="signup" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="user_type" value="{{$user_type}}" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Signup as a {{$user_type}}</h4>
            </div>
            <div class="modal-body">
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
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Signup</button>
            </div>
        </form>
    </div>
</div>
