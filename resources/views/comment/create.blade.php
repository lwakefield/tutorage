@if(isset($comment_id))
	<div class="row">
		<form class="col-xs-offset-2 col-xs-8 collapse c{{ $comment_id }}" action="/c/{{ $comment_id }}/reply" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="comment_id" value="{{ $comment_id }}">
			<div class="form-group">
				<textarea class="form-control" type="text" name="content" placeholder="Content"></textarea>
			</div>
			<div class="form-group">
				<input class="form-control btn-primary" type="submit" value="Reply">
			</div>
		</form>
	</div>
@elseif(isset($post_id))
	<div class="row">
		<form class="col-xs-offset-2 col-xs-8 collapse p{{ $post_id }}" action="/p/{{ $post_id }}/reply" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="post_id" value="{{ $post_id }}">
			<div class="form-group">
				<textarea class="form-control" type="text" name="content" placeholder="Content"></textarea>
			</div>
			<div class="form-group">
				<input class="form-control btn-primary" type="submit" value="Reply">
			</div>
		</form>
	</div>
@endif