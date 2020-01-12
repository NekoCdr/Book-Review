$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let $comment_reply = $('<div class="comment-reply"><textarea name="comment"></textarea><button>Submit</button></div>');
let parent_id = 0;

function form_draw(target)
{
    $('.comment-reply').remove();
    $(target).append($comment_reply);
}

function send_post(url, data)
{
    $.post(url, data, function(answer)
    {
        if(answer)
        {
            if(!answer.error)
            {
                if(answer.redirect)
                    window.location.href = answer.redirect;
                else
                    window.location.reload();
            }
            else
                alert(answer.message);
        }
    }, "json");
}

$(function ()
{
    $('.reply-link').click(function ()
    {
        let comment_id = $(this).attr('data-id');
        parent_id = comment_id;

        form_draw('#comment_'+comment_id+' .comment');
    });

    $('.leave-comment-title').click(function ()
    {
        parent_id = 0;
        form_draw('.leave-comment');
    });

    $(document).on('click', '.comment-reply button', function ()
    {
        let text = $('.comment-reply textarea').val();
        send_post(route_comment_create, {
            'book_id':      book_id,
            'comment_text': text,
            'parent_id':    parent_id
        })
    });

    $('.delete-link').click(function ()
    {
        let comment_id = $(this).attr('data-id');
        send_post(route_comment_delete, {'comment_id': comment_id})
    });
});
