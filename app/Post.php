<?php

namespace App;

use App\Http\Controllers\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use RelationshipsTrait;
    use SoftDeletes;


    public $fillable = ['title','body','user_id'];
    protected $dates = ['deleted_at'];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * Get all of the post's comments.
     */





}
