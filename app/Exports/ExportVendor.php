<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportVendor implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::where('type', 2)->get();
    }
    public function map($users): array
    {
        return [
            $users->id,
            $users->store_id,
            $users->name,
            $users->slug,
            $users->email,
            $users->mobile,
            "123456",
            $users->area_id,
            $users->city_id,
            $users->vendor_id,
        ];
    }
    public function headings(): array
    {
        return [
            'id',
            'store_id',
            'name',
            'slug',
            'email',
            'mobile',
            'password',
            'city_id',
            'area_id',
            'vendor_id',
        ];
    }
}
