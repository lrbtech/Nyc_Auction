<?php

namespace App\Imports;   
use App\vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;    
class vehiclesImport implements ToModel, WithHeadingRow
{ 
    public function model(array $row)
    {
        return new vehicle([
            'car_id'  => $row['car_id'],
            'brand_id'   => $row['brand_id'],
            'vehicle_model'   => $row['vehicle_model'],
            'vehicle_status'    => $row['vehicle_status'],
            'colour'  => $row['colour'],
            'vehicle_type'   => $row['vehicle_type'],
        ]);
    }
}

