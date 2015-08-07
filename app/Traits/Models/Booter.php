<?php

namespace App\Traits\Models;

trait Booter {

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);

        if (app()->environment('testing')) {
	        static::boot();
	    }
    }
	
}