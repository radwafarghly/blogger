<?php

namespace App;


use App\Http\Controllers\RelationshipsTrait;

use Illuminate\Database\Eloquent\Model;

class ModelRelation extends Model
{
    use RelationshipsTrait;
    protected $fillable=
        [
            'model',
            'relation',
            'relationdisplayname'

        ];
    protected $table = 'model_relations';

}
