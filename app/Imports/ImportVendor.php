<?php

namespace App\Imports;

use App\Helpers\helper;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportVendor implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        try {
            foreach ($rows as $row) {
                helper::vendor_register($row['name'], $row['email'], $row['mobile'], Hash::make($row['password']), '', $row['slug'], '', '', $row['city_id'], $row['area_id'], '');
            }
        } catch (\Throwable $th) {
            dd($th);
            return $th;
        }
    }
}
