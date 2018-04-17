<?php
/**
 * Created by PhpStorm.
 * User: Radwa Ahmed
 * Date: 4/17/2018
 * Time: 03:21 م
 */

namespace App\Repositories;


use App\Article;

class ArticlesRepository
{
    /**
     * @var $model
     */
    private $model;
    /**
     * EloquentTask constructor.
     *
     * @param App\Post $model
     */
    public function __construct(Article $model)
    {
        $this->model = $model;
    }
    /**
     * Get all tasks.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }
    /**
     * Get task by id.
     *
     * @param integer $id
     * @return App\Post
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }
    /**
     * Create a new task.
     *
     * @param array $attributes
     * @return App\Post
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes );
    }
    /**
     * Update a task.
     *
     * @param integer $id
     * @param array $attributes
     * @return App\Article
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }
    /**
     * Delete a task.
     *
     * @param integer $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

}