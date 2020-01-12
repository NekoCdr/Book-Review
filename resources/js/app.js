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

    $('.btn-edit').click(function ()
    {
        $('.edited-data').prop('disabled', false);
        $('.btn-edit').hide();
        $('.btn-save').show();
        $('.btn-cancel').show();
    });

    $('.btn-cancel').click(function ()
    {
        window.location.reload()
    });

    $('.profile-save').click(function ()
    {
        let data = {
            'last_name':  $('#last_name').val(),
            'first_name': $('#first_name').val(),
            'email':      $('#email').val(),
            'birthday':   $('#birthday').val()
        };

        send_post(route_profile_update, data)
    });

    $('.book-delete').click(function ()
    {
        send_post(route_book_delete, {'book_id': book_id});
    });

    $('.author-delete').click(function ()
    {
        send_post(route_author_delete, {'author_id': author_id});
    });

    $('.author-save').click(function ()
    {
        let data = {
            'author_id':  author_id,
            'last_name':  $('#last_name').val(),
            'first_name': $('#first_name').val(),
            'birthday':   $('#birthday').val()
        };

        send_post(route_author_update, data)
    });

    $('.book-edit').click(function ()
    {
        $('#description-text').hide();
        $('#description-area').show();
        $('.edited-data').prop('disabled', false);
        $('.book-edit').hide();
        $('.book-save').show();
        $('.book-cancel').show();
    });

    $('.book-save').click(function ()
    {
        let data = {
            'book_id':     book_id,
            'author_id':   $('#author_id option:selected').val(),
            'title':       $('#title').val(),
            'description': $('#description-area').val(),
        };

        send_post(route_book_update, data)
    });

    $('.author-create').click(function ()
    {
        let data = {
            'last_name':  $('#last_name').val(),
            'first_name': $('#first_name').val(),
            'birthday':   $('#birthday').val()
        };

        send_post(route_author_create, data)
    });

    $('.book-create').click(function ()
    {
        let data = {
            'author_id':   $('#author_id option:selected').val(),
            'title':       $('#title').val(),
            'description': $('#description-area').val(),
        };

        send_post(route_book_create, data)
    });

    $('.user-update').click(function ()
    {
        let data = {
            'user_id':    user_id,
            'last_name':  $('#last_name').val(),
            'first_name': $('#first_name').val(),
            'email':      $('#email').val(),
            'birthday':   $('#birthday').val()
        };

        send_post(route_profile_update, data)
    });
});
