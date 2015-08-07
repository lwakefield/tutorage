<li class="list-group-item">
	<div class="row panel-body">
		<div class="col-xs-1">
			@include('vote.create', ['action' => "/c/$comment->id/vote", 'score' => $comment->score])
		</div>
		<div class="col-xs-9">
			<p>{{ $comment->content }}</p>
		</div>
		<div class="col-xs-2">
            @if (Auth::check())
                <button class="btn btn-default btn-xs pull-right" data-toggle="collapse" data-target=".c{{ $comment->id }}">Reply</button>
            @else
                <a class="btn btn-default btn-xs pull-right" href="/login">Reply</a>
            @endif
		</div>
	</div>
	@include('comment.create', ['comment_id' => $comment->id, 'score' => $comment->score])
	@if (count($comment->comments))
		<ul class="list-group">
			@foreach ($comment->comments as $comment)
				@include('comment.show', ['comment' => $comment])
			@endforeach
		</ul>
	@endif
</li>

