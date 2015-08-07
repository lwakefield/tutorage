<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class CrudRepository
{

    public function __construct($model_name)
    {
        $this->model_name = $model_name;
    }

    public function index()
    {
        return $this->getFreshModel()->paginate();
    }

    public function create()
    {
        $model = $this->getFreshModel();
        $model->save();
        return $model;
    }
    
    public function retrieve($id)
    {
        return $this->getFreshModel()->findOrFail($id);
    }

    public function updateOrCreate($attributes)
    {
        try {
            $query = $this->getFreshModel();
            foreach ($attributes as $key => $val) {
                $query = $query->where($key, '=', $val);
            }
            $model = $query->firstOrFail();
            $model->save();
            return $model;
        } catch (ModelNotFoundException $e) {
            return $this->create();
        }
    }
    
    public function update($id)
    {
        $model = $this->getFreshModel()->findOrFail($id);
        $model->save();
        return $model;
    }
    
    public function delete($id)
    {
        return $this->getFreshModel()->findOrFail($id)->delete();
    }

    protected function getFreshModel()
    {
        return new $this->model_name;
    }
}
