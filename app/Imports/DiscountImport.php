<?php

namespace App\Imports;

use App\Http\Requests\Dashboard\DiscountRequest;
use App\Models\Discount;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

class DiscountImport implements ToCollection, WithHeadingRow
{
    private $errors = [];

    public function collection(Collection $rows)
    {
        $validatedRows = [];
        $timestamp = Carbon::now();

        foreach ($rows as $index => $row) {

            $code = $row['code'];
            $quantity = $row['quantity'];
            $percentage = $row['percentage'];
            $expiry_date = Carbon::parse($row['expiry_date'], 'Africa/Cairo')->toDateTimeString();

            $validator = Validator::make(
                [
                    'code' => $code,
                    'quantity' => $quantity,
                    'percentage' => $percentage,
                    'expiry_date' => $expiry_date,
                ],
                (new DiscountRequest())->rules()
            );

            if ($validator->fails()) {
                $this->errors[] = [
                    'row' => $index + 1,
                    'errors' => $validator->errors()->all(),
                ];
            } else {
                $validatedRows[] = [
                    'code' => $code,
                    'quantity' => $quantity,
                    'percentage' => $percentage,
                    'expiry_date' => $expiry_date,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            }
        }

        if (!empty($this->errors)) {
            return;
        }

        Discount::insert($validatedRows);
    }

    /**
     * Get the validation errors.
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
