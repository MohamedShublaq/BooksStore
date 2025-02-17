<?php

namespace App\Imports;

use App\Http\Requests\Dashboard\FlashSaleRequest;
use App\Models\FlashSale;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

class FlashSaleImport implements ToCollection, WithHeadingRow
{
    private $errors = [];

    public function collection(Collection $rows)
    {
        $validatedRows = [];
        $timestamp = Carbon::now();

        foreach ($rows as $index => $row) {
            $name = [
                'en' => $row['name_en'],
                'ar' => $row['name_ar'],
            ];
            $description = [
                'en' => $row['description_en'],
                'ar' => $row['description_ar'],
            ];
            $date = Carbon::parse($row['date'], 'Africa/Cairo')->toDateTimeString();
            $time = $row['time'];
            $is_active = $row['is_active'];
            $percentage = $row['percentage'];
            $validator = Validator::make(
                [
                    'name' => $name,
                    'description' => $description,
                    'date' => $date,
                    'time' => $time,
                    'percentage' => $percentage,
                    'is_active' => $is_active,
                ],
                (new FlashSaleRequest())->rules()
            );

            if ($validator->fails()) {
                $this->errors[] = [
                    'row' => $index + 1,
                    'errors' => $validator->errors()->all(),
                ];
            } else {
                $validatedRows[] = [
                    'name' => json_encode($name),
                    'description' => json_encode($description),
                    'date' => $date,
                    'time' => $time,
                    'percentage' => $percentage,
                    'is_active' => $is_active,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            }
        }

        if (!empty($this->errors)) {
            return;
        }

        FlashSale::insert($validatedRows);
    }

    /**
     * Get the validation errors.
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
