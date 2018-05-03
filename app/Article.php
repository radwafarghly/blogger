<?php

namespace App;
use App\Http\Controllers\RelationshipsTrait;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use RelationshipsTrait;

    public $fillable = ['title','body','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * Get all of the article's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
