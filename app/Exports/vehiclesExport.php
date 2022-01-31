<?php

namespace App\Exports;

use App\vehicle;
use Maatwebsite\Excel\Concerns\FromCollection;

class vehiclesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return vehicle::all();
    }
}
