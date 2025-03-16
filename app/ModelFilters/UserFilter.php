<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function firstName($value)
    {
        if (!empty($value)) {
            return $this->where('first_name', 'LIKE', "%$value%");
        }
    }

    public function lastName($value)
    {
        if (!empty($value)) {
            return $this->where('last_name', 'LIKE', "%$value%");
        }
    }

    public function email($value)
    {
        if (!empty($value)) {
            return $this->where('email', 'LIKE', "%$value%");
        }
    }

    public function phone($value)
    {
        if (!empty($value)) {
            return $this->where('phone', 'LIKE', "%$value%");
        }
    }
}
