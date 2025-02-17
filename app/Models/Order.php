<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

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
        'transaction_reference',
        'address',
        'shipping_area_id',
        'user_id',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'payment_status' => PaymentStatus::class,
        'payment_type' => PaymentType::class,
    ];

    public const DEFAULT_PAYMENT_TYPE = PaymentType::Cash;
    public const DEFAULT_PAYMENT_STATUS = PaymentStatus::Test;
    public const DEFAULT_STATUS = OrderStatus::Test;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shippingArea(){
        return $this->belongsTo(ShippingArea::class);
    }
}