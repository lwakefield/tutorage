<div class="modal fade change-price">
    <div class="modal-dialog">
        <form class="modal-content" action="change-price" method="get">
            {!! csrf_field() !!}
            <input type="hidden">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Your Price Per Hour</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <span>$ <input name="new_price" type="number" min="0.00" step="0.50" placeholder="0.00"/> </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirm Change</button>
            </div>
        </form>
    </div>
</div>
