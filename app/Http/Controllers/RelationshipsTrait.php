<?php
/**
 * Created by PhpStorm.
 * User: Radwa Ahmed
 * Date: 4/19/2018
 * Time: 02:17 م
 */

namespace App\Http\Controllers;

use ErrorException;
use Illuminate\Database\Eloquent\Relations\Relation;
use ReflectionClass;
use ReflectionMethod;

trait RelationshipsTrait
{
    public function relationships() {

        $model = new static;
       // dd($model);

        $relationships = [];

        foreach((new ReflectionClass($model))->getMethods(ReflectionMethod::IS_PUBLIC) as $method)
        {
           // dd($method);
            if ($method->class != get_class($model) || !empty($method->getParameters()) || $method->getName() == __FUNCTION__){
                continue;
            }
            try {
                $return = $method->invoke($model);
              //  dd($return);
                if ($return instanceof Relation) {
                    $relationships[] = [
                        'relation' => $method->getName(),
                        'type' => (new ReflectionClass($return))->getShortName(),
                        'model' => (new ReflectionClass($return->getRelated()))->getName()
                    ];
                }
            } catch(ErrorException $e) {}
        }
        return $relationships;
    }
}