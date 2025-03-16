<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class OrderFilter extends ModelFilter
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
            return $this->whereHas('user', function ($q) use ($value) {
                $q->where('first_name', 'LIKE', "%$value%");
            });
        }
    }

    public function lastName($value)
    {
        if (!empty($value)) {
            return $this->whereHas('user', function ($q) use ($value) {
                $q->where('last_name', 'LIKE', "%$value%");
            });
        }
    }

    public function email($value)
    {
        if (!empty($value)) {
            return $this->whereHas('user', function ($q) use ($value) {
                $q->where('email', 'LIKE', "%$value%");
            });
        }
    }

    public function phone($value)
    {
        if (!empty($value)) {
            return $this->whereHas('user', function ($q) use ($value) {
                $q->where('phone', 'LIKE', "%$value%");
            });
        }
    }

    public function number($value)
    {
        if (!empty($value)) {
            return $this->where('number', 'LIKE', "%$value%");
        }
    }

    public function paymentType($value)
    {
        if ($value !== null) {
            return $this->where('payment_type', '=', $value);
        }
    }

    public function paymentStatus($value)
    {
        if ($value !== null) {
            return $this->where('payment_status', '=', $value);
        }
    }

    public function shippingArea($value)
    {
        if (!empty($value)) {
            return $this->where('shipping_area_id', $value);
        }
    }
}
