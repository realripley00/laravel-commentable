<?php

namespace RealRipley\Commentable\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
    protected $table = 'comments';
    public $timestamps = true;
    
    protected $fillable = [
        'user_id',
        'commentable_type',
        'commmentable_id',
        'content',
        'comment_id'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->hasMany('RealRipley\Models\Comment', 'comment_id', 'id')->orderBy('created_at', 'desc');
    }

    public function parentComment()
    {
        return $this->belongsTo('RealRipley\Models\Comment', 'comment_id', 'id')->orderBy('created_at', 'desc');
    }
}