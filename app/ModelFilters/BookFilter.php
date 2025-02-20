<?php

namespace App\ModelFilters;

use App\Models\Discount;
use App\Models\FlashSale;
use EloquentFilter\ModelFilter;

class BookFilter extends ModelFilter
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
            return $this->where('name', 'LIKE', "%$value%");
        }
    }

    public function price($value)
    {
        if (!empty($value)) {
            return $this->where('price', '=', $value);
        }
    }

    public function isAvailable($value)
    {
        if ($value !== null) {
            return $this->where('is_available', '=', $value);
        }
    }

    public function language($value)
    {
        if (!empty($value)) {
            return $this->where('language_id', '=', $value);
        }
    }

    public function category($value)
    {
        if (!empty($value)) {
            return $this->where('category_id', '=', $value);
        }
    }

    public function publisher($value)
    {
        if (!empty($value)) {
            return $this->where('publisher_id', '=', $value);
        }
    }

    public function author($value)
    {
        if (!empty($value)) {
            return $this->whereHas('authors', function ($q) use ($value) {
                $q->where('author_id', '=', $value);
            });
        }
    }

    public function discountable($value)
    {
        if (!empty($value)) {
            if($value == 'discount'){
                return $this->where('discountable_type',Discount::class);
            }
            if($value == 'flash_sale'){
                return $this->where('discountable_type',FlashSale::class);
            }
            if($value == 'none'){
                return $this->whereNull('discountable_type');
            }
        }
    }
}
