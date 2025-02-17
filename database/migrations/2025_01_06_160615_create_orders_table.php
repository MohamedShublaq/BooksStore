<?php

use App\Models\Order;
use App\Models\ShippingArea;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->float('shipping_fee');
            $table->float('tax_amount');
            $table->float('books_total');
            $table->float('total');
            $table->unsignedTinyInteger('status')->default(Order::DEFAULT_STATUS);
            $table->unsignedTinyInteger('payment_status')->default(Order::DEFAULT_PAYMENT_STATUS);
            $table->unsignedTinyInteger('payment_type')->default(Order::DEFAULT_PAYMENT_TYPE);
            $table->string('transaction_reference');
            $table->string('address');
            $table->foreignIdFor(ShippingArea::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};