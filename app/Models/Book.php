<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Translatable\HasTranslations;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Book extends Model
{
    use HasFactory, Sluggable, HasTranslations, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'quantity',
        'num_of_viewers',
        'rate',
        'publish_year',
        'price',
        'is_available',
        'category_id',
        'publisher_id',
        'discountable_type',
        'discountable_id',
    ];

    public $translatable = ['description'];


    protected $casts = ['description' => 'array'];

    /**
     * Get the sluggable configuration array for the model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Listen to the model's "updating" event.
     */
    protected static function booted()
    {
        static::updating(function ($book) {
            if ($book->isDirty('name')) {
                // Generate the initial slug
                $slug = Str::slug($book->name);

                // Check if the slug already exists in the database
                $existingBook = self::where('slug', $slug)->first();

                // If a book with the same slug exists, append a unique suffix
                if ($existingBook && $existingBook->id != $book->id) {
                    // Ensure the slug is unique by appending a number
                    $slug = self::makeUniqueSlug($slug);
                }

                // Set the slug
                $book->slug = $slug;
            }
        });
    }

    /**
     * Generate a unique slug by appending a number.
     *
     * @param string $slug
     * @return string
     */
    private static function makeUniqueSlug($slug)
    {
        $count = 1;
        $newSlug = $slug;

        // Loop until we find a unique slug
        while (self::where('slug', $newSlug)->exists()) {
            $newSlug = $slug . '-' . $count;
            $count++;
        }

        return $newSlug;
    }

    public function getFlag()
    {
        if ($this->quantity == 0) {
            return ['message' => 'Sold out'];
        }

        if (!$this->is_available) {
            return ['message' => 'Unavailable'];
        }

        if ($this->discountable instanceof Discount) {
            return [
                'message' => "{$this->discountable->percentage}% Discount code: {$this->discountable->code}"
            ];
        }

        if ($this->discountable instanceof FlashSale) {
            return ['message' => "{$this->discountable->percentage}% Flash Sale"];
        }

        if ($this->category->discount) {
            return [
                'message' => "{$this->category->discount->percentage}% Discount code: {$this->category->discount->code}"
            ];
        }

        return null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function discountable()
    {
        return $this->morphTo();
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_books');
    }

    public function favorites()
    {
        return $this->hasMany(AddToFavorite::class);
    }

    public function carts()
    {
        return $this->hasMany(AddToCart::class);
    }
}
