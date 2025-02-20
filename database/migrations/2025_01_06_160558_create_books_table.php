<?php

use App\Models\Category;
use App\Models\Language;
use App\Models\Publisher;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('description');
            $table->unsignedSmallInteger('quantity');
            $table->unsignedBigInteger('pages');
            $table->unsignedBigInteger('num_of_viewers')->default(0);
            $table->float('rate');
            $table->year('publish_year');
            $table->float('price');
            $table->boolean('is_available')->default(1);
            $table->foreignIdFor(Language::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Category::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Publisher::class)->nullable()->constrained()->nullOnDelete();
            $table->nullableMorphs('discountable');//discount or flash sale
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
