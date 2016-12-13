<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];


    /**
     * ManyToOne Relation with User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    /**
     * ManyToOne Relation with Post
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
