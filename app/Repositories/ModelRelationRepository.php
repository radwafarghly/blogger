<?php
/**
 * Created by PhpStorm.
 * User: Radwa Ahmed
 * Date: 4/18/2018
 * Time: 02:05 م
 */

namespace App\Repositories;


use App\ModelRelation;
use App\Post;

class ModelRelationRepository
{
    private $model;
    /**
     * EloquentTask constructor.
     *
     * @param App\Post $model
     */
    public function __construct(ModelRelation $model)
    {
        $this->model = $model;
    }

    public function getnotifcationuser($attributes)
    {
         $class= get_class($attributes);
         $modelrelations=$this->model->where('model',$class)->get();
         //$modelrelation= dd($modelrelation);
        $users=[];
       // dd($modelrelations);
        foreach ($modelrelations as $modelrelation){
              //$model=$modelrelation->model;
            $relation=$modelrelation->relation;
            $user=$attributes->$relation;
            if(is_array($user)){
                foreach($user as $u){
                    $users[]=$u;
                }
            }
            else{
                $users[]=$user;
            }
        }
        return $users;
    }
}