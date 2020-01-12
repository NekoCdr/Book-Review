@foreach($comments_tree as $comment_data)
    <tr id="comment_{{ $comment_data->self->id }}">
        <td colspan="2">
            <div class="comment depth_{{ $comment_data->depth }}">
                <div class="comment-header">Comment #{{ $comment_data->self->id }}
                    @if($comment_data->self->parent_comment)
                        replied to <a href="#comment_{{ $comment_data->self->parent_comment }}">comment #{{$comment_data->self->parent_comment}}</a>
                    @endif
                </div>
                <div class="comment-body">{{ $comment_data->self->comment }}</div>
                <div class="comment-footer">
                    @auth
                        @if($comment_data->depth < 2)
                            <a class="reply-link" data-id="{{ $comment_data->self->id }}">{{ __('Reply') }}</a>
                        @endif
                        @if(auth()->user()->user->id == $comment_data->self->user_id)
                            <a class="delete-link" data-id="{{ $comment_data->self->id }}">{{ __('Delete') }}</a>
                        @endif
                    @endauth
                    {{ $comment_data->self->created_at }}
                </div>
            </div>
        </td>
    </tr>
    @includeWhen($comment_data->children, 'helpers.comment', ['comments_tree' => $comment_data->children])
@endforeach
