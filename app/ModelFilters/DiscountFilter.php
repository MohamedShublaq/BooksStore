<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class DiscountFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function code($value)
    {
        return $this->where('code', 'LIKE', "%{$value}%");
    }

    public function quantity($value)
    {
        return $this->where('quantity', '=', $value);
    }

    public function isActive($value)
    {
        if ($value !== null) {
            return $this->where('is_active', '=', $value);
        }
    }
}
