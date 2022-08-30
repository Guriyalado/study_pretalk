<?php

namespace App\Imports;

use App\Models\Distributor;
use App\Models\SalesExcutive;
use App\Models\Beat;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class BeatImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            $dis=Distributor::where('name',$row['distributor'])->first();
            $sale=SalesExcutive::where('name',$row['sales_executive'])->first();

            Beat::create([
                'beat_name'=>$row['beat_name'],
                'sales_executive_id'=>$sale->sales_executive_id,
                'distributor_id'=>$dis->distributor_id,
                'city'=>$row['city'],
                'area'=>$row['area'],
            ]);
        }
    }
}
