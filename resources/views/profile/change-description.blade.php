<div class="modal fade change-description">
    <div class="modal-dialog">
        <form class="modal-content" action="change-description" method="get">
            {!! csrf_field() !!}
            <input type="hidden">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Your Profile Description</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" name="new_description" placeholder="New description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm Change</button>
            </div>
        </form>
    </div>
</div>
