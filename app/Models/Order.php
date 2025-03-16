<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Order extends Model
{
    use HasFactory, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'number',
        'shipping_fee',
        'tax_amount',
        'books_total',
        'total',
        'status',
        'payment_status',
        'payment_type',
        'user_address_id',
        'shipping_area_id',
        'user_id'
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'payment_status' => PaymentStatus::class,
        'payment_type' => PaymentType::class,
    ];

    public const DEFAULT_STATUS = OrderStatus::Test;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function address(){
        return $this->belongsTo(UserAddress::class , 'user_address_id');
    }

    public function shippingArea(){
        return $this->belongsTo(ShippingArea::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class , 'book_orders')->withPivot('original_price','price_after_discount','applied_discount','quantity');
    }
}
