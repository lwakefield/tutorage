<div class="modal fade tutor-signup-form">
    <div class="modal-dialog">
        <form class="modal-content" action="signup" method="post">
            <input type="hidden" name="user_type" value="tutor" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Signup as a Tutor</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="full_name" placeholder="Full Name">
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
