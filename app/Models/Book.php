<?php

namespace App\Models;

use App\Observers\BookObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[ObservedBy([BookObserver::class])]
class Book extends Model
{
    use HasFactory, Sluggable, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'total_stock',
        'quantity',
        'pages',
        'num_of_viewers',
        'rate',
        'publish_year',
        'price',
        'is_available',
        'language_id',
        'category_id',
        'publisher_id',
        'author_id',
        'discountable_type',
        'discountable_id',
    ];


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
                'message' => "Discount {$this->discountable->percentage}%"
            ];
        }

        if ($this->discountable instanceof FlashSale && \Carbon\Carbon::now() >= $this->discountable->date) {
            return ['message' => "Flash Sale {$this->discountable->percentage}%"];
        }

        if ($this->category->discount) {
            return [
                'message' => "Discount {$this->category->discount->percentage}%"
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

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function discountable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
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
