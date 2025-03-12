<?php

use App\Models\Order;
use App\Models\ShippingArea;
use App\Models\User;
use App\Models\UserAddress;
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
            $table->string('number')->unique()->nullable();//nullable because visa case
            $table->float('shipping_fee');
            $table->float('tax_amount');
            $table->float('books_total');
            $table->float('total');
            $table->unsignedTinyInteger('status')->default(Order::DEFAULT_STATUS)->nullable();//nullable for test
            $table->unsignedTinyInteger('payment_status');
            $table->unsignedTinyInteger('payment_type');
            $table->foreignIdFor(UserAddress::class)->nullable()->constrained()->nullOnDelete();
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
