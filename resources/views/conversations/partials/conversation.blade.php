<ul class="list-group">
    @foreach ($conversation->messages as $message)
        <li class="list-group-item">
            @if ($message->from_id == $conversation->with_user->id)
                <strong>{{ $conversation->with_user->name }}: </strong>{{ $message->content }}
            @else
                <strong>Me: </strong>{{ $message->content }}
            @endif
        </li>
    @endforeach
</ul>

