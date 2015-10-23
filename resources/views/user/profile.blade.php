<div class="modal fade send-message-to-{{ $user->id }}">
    <div class="modal-dialog">
        <form class="modal-content send-message-form" action="send-message" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="to_id" value="{{ $user->id }}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Profile: {{ $user->name }}
                    <span class="pull-right">
                        Rating: <span class="badge">{{ $user->score }}</span>
                    </span>
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>$ Rate / hour: </strong>
                    {{ !empty($user->rate) ? $user->rate : 'N/A' }}
                </div>
                <div class="form-group">
                    <strong>Blurb: </strong>
                    {{ !empty($user->blurb) ? $user->blurb : 'N/A' }}
                </div>
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
