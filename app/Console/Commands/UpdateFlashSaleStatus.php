<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\FlashSale;
use Illuminate\Console\Command;
use Carbon\Carbon;

class UpdateFlashSaleStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flashSales:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate flashSales when expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $flashSales = FlashSale::whereRaw("DATE_ADD(date, INTERVAL time HOUR) <= ?", [$now])
            ->where('is_active', 1)
            ->get();

        // Deactivate the flash sale and remove it from all attached books
        foreach ($flashSales as $flashSale) {
            // Deactivate the flash sale
            $flashSale->update(['is_active' => 0]);

            // Detach the flash sale from all books
            Book::where('discountable_type', FlashSale::class)
                ->where('discountable_id', $flashSale->id)
                ->update(['discountable_type' => null, 'discountable_id' => null]);
        }
    }
}
