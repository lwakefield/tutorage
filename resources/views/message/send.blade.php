<div class="modal fade send-message-to-{{ $to_user }}">
    <div class="modal-dialog">
        <form class="modal-content send-message-form" action="send-message" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="to_id" value="{{ $to_user }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Send message</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" name="content" placeholder="Your message"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
        </form>
    </div>
</div>
