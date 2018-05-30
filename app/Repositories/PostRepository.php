<?php
/**
 * Created by PhpStorm.
 * User: Radwa Ahmed
 * Date: 4/17/2018
 * Time: 01:00 م
 */
namespace App\Repositories;

use App\Notifications\PostAdd;
use App\Post;
use App\User;
use Notification;

class  PostRepository {

    /**
     * @var $model
     */
    private $model;
    private $modelRelationRepository;
    /**
     * EloquentTask constructor.
     *
     * @param App\Post $model
     */
    public function __construct(Post $model, ModelRelationRepository $modelRelationRepository)
    {
        $this->model = $model;
        $this->modelRelationRepository=$modelRelationRepository;
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

    public function getAlltrach()
    {
        return $this->model->onlyTrashed()->get();
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
       // return $this->model->create($attributes );
        $post = $this->model->create($attributes);
        if ($post) {
            $users = User::all();
            // $users=$this->modelRelationRepository->getnotifcationuser($post);
             //dd ($users);
            Notification::send($users,new PostAdd($post));
        }
//        $users=$this->modelRelationRepository->getnotifcationuser($post);
        //dd($class);

        return $post ;

    }
    /**
     * Update a task.
     *
     * @param integer $id
     * @param array $attributes
     * @return App\Post
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
       // return $this->model->find($id)->delete();
        $post = $this->model->find($id);
        $post->comments()->delete();
        return $post->delete();
    }


    public function restore($id)
    {
        // return $this->model->find($id)->delete();
        $post = $this->model->withTrashed()->find($id);
        //$post->comments()->delete();
        return $post->restore();
    }
    public function forceDelete($id)
    {
        // return $this->model->find($id)->delete();
        $post = $this->model->withTrashed()->find($id);
        $post->comments()->delete();
        return $post->forceDelete();
    }
}