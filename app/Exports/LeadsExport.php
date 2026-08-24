<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Lead::select(
            'lead_no',
            'name',
            'phone',
            'email',
            'company'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Lead No',
            'Name',
            'Phone',
            'Email',
            'Company'
        ];
    }
}
