<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Comment
 * @package App
 */
class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'book_id', 'comment', 'parent_comment',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * @param int $book_id
     * @param int $parent_comment
     * @param int $depth
     * @return array
     */
    public static function getCommentsTree(int $book_id, int $parent_comment = 0, int $depth = 0): array
    {
        $commentaries = Comment::all()->where('book_id', $book_id)->where('parent_comment', $parent_comment)->sortBy('id');

        $comment_tree = [];

        foreach ($commentaries as $comment)
        {
            $comment_tree[] = (object)[
                'self' => $comment,
                'depth' => $depth,
                'children' => ($depth < 2) ? self::getCommentsTree($book_id, $comment->id, $depth + 1) : []
            ];
        }

        return $comment_tree;
    }
}
