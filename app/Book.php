<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    /**
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentaries()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
