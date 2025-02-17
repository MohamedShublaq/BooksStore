<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class FlashSaleFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($value)
    {
        if (!empty($value)) {
            return $this->where(function ($query) use ($value) {
                $query->where('name->en', 'LIKE', "%$value%")
                  ->orWhere('name->ar', 'LIKE', "%$value%");
            });
        }
    }

    public function description($value)
    {
        if (!empty($value)) {
            return $this->where(function ($query) use ($value) {
                $query->where('description->en', 'LIKE', "%$value%")
                  ->orWhere('description->ar', 'LIKE', "%$value%");
            });
        }
    }

    public function isActive($value)
    {
        if ($value !== null) {
            return $this->where('is_active', '=', $value);
        }
    }
}
