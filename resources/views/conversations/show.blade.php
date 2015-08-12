<h2>Messages</h2>
<div class="row">
    <div class="col-xs-4">
        <ul class="nav nav-pills nav-stacked">
            @foreach ($conversations as $id => $val)
                <li class="{{ $id == 0 ? 'active' : ''}}">
                    <a href="#conversation-{{ $id }} " data-toggle="tab">{{ $val->with_user->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-xs-8">
        <div class="tab-content">
            @foreach ($conversations as $id => $conversation)
                <div class="tab-pane {{ $id == 0 ? 'active' : ''}}"
                    id="conversation-{{ $id }}">
                    @include('conversations.partials.conversation', ['conversation' => $conversation])
                </div>
            @endforeach
        </div>
    </div>
</div>

