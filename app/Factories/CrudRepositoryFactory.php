<?php
namespace App\Factories;

use App\Repositories\CrudRepository;

class CrudRepositoryFactory
{

    public static function make($name)
    {
        $model_name = 'App\\'.$name;
        return new CrudRepository($model_name);
    }
}
