<div class="modal fade change-name">
    <div class="modal-dialog">
        <form class="modal-content" action="change-name" method="get">
            {!! csrf_field() !!}
            <input type="hidden">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Your Name</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" name="new_name" placeholder="New name"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm Change</button>
            </div>
        </form>
    </div>
</div>
