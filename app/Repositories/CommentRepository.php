<?php
/**
 * Created by PhpStorm.
 * User: Radwa Ahmed
 * Date: 4/17/2018
 * Time: 09:44 م
 */

namespace App\Repositories;


use App\Comment;

class CommentRepository
{
    private $model;
    /**
     * EloquentTask constructor.
     *
     * @param App\Post $model
     */
    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}