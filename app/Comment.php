<?php

namespace App;
use App\Http\Controllers\RelationshipsTrait;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
use RelationshipsTrait;
    protected $fillable = ['content', 'commentable_id', 'commentable_type','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
