@foreach($comments_tree as $comment_data)
    <tr id="comment_{{ $comment_data->id }}">
        <td colspan="2">
            <div class="comment">
                <div class="comment-header">
                    <a href="{{ route('book.info', $comment_data->book->id) }}#comment_{{ $comment_data->id }}">Comment #{{ $comment_data->id }}</a>
                    @if($comment_data->parent_comment)
                        replied to <a href="{{ route('book.info', $comment_data->book->id) }}#comment_{{ $comment_data->parent_comment }}">comment #{{$comment_data->parent_comment}}</a>
                    @endif
                </div>
                <div class="comment-body">{{ $comment_data->comment }}</div>
                <div class="comment-footer">
                    @if(auth()->user()->user->id == $comment_data->user_id)
                        <a class="delete-link" data-id="{{ $comment_data->id }}">{{ __('Delete') }}</a>
                    @endif
                    {{ $comment_data->created_at }}
                </div>
            </div>
        </td>
    </tr>
@endforeach
