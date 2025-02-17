<?php

namespace App\Imports;

use App\Http\Requests\Dashboard\PublisherRequest;
use App\Models\Publisher;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

class PublisherImport implements ToCollection, WithHeadingRow
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

            $validator = Validator::make(
                ['name' => $name],
                (new PublisherRequest())->rules()
            );

            if ($validator->fails()) {
                $this->errors[] = [
                    'row' => $index + 1,
                    'errors' => $validator->errors()->all(),
                ];
            } else {
                $validatedRows[] = [
                    'name' => json_encode($name),
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            }
        }

        if (!empty($this->errors)) {
            return;
        }

        Publisher::insert($validatedRows);
    }

    /**
     * Get the validation errors.
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
