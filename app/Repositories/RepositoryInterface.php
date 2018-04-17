<?php

namespace App\Repositories;

/**
 * Created by PhpStorm.
 * User: Radwa Ahmed
 * Date: 4/17/2018
 * Time: 12:50 م
 */
interface RepositoryInterface
{

    function getAll();
    function getById($id);
    function create(array $attributes);
    function update($id, array $attributes);
    function delete($id);


}