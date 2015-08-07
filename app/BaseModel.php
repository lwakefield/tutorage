<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\ValidationException;

use Input;
use Validator;

abstract class BaseModel extends Model
{

    use Traits\Models\Booter;

    public static function boot()
    {
        parent::boot();

        static::saving(function (BaseModel $model) {
            $model->validate();
            $model->populate();
        });
    }

    protected function populate()
    {
        foreach (Input::all() as $key => $val) {
            if (in_array($key, $this->fillable)) {
                $this->setAttribute($key, $val);
            }
        }
    }

    protected function validate()
    {
        if (isset($this->rules)) {
            $validator = Validator::make($this->getProposedAttributes(), $this->rules);
            if ($validator->fails()) {
                throw new ValidationException('Error validating model', $validator->errors());
            }
        }
    }

    protected function getProposedAttributes()
    {
        return array_merge($this->getAttributes(), Input::all());
    }
}
