<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Console\Command;
use Carbon\Carbon;

class UpdateDiscountStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discounts:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate discounts when expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $discounts = Discount::where('expiry_date', '<=', $now)
            ->where('is_active', 1)
            ->get();

        foreach ($discounts as $discount) {
            // Deactivate the discount
            $discount->update(['is_active' => 0]);

            // Detach the discount from all books
            Book::where('discountable_type', Discount::class)
                ->where('discountable_id', $discount->id)
                ->update(['discountable_type' => null, 'discountable_id' => null]);

            // Detach the discount from all categories
            Category::where('discount_id', $discount->id)
                ->update(['discount_id' => null]);
        }
    }
}
