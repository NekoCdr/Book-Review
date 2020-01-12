<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class EntryPoint
 * @package App
 */
class EntryPoint extends Authenticatable
{
    /**
     * @var int
     */
    const NATIVE_REG = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'password', 'login_name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->user->isAdmin();
    }
}
