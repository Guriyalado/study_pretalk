<?php

namespace App\Imports;

use App\Models\AuthDistributor;
use App\Models\Distributor;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class DistributorImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            $auth= AuthDistributor::create([
            'name'=>$row['name'],
            'phone'=>$row['phone'],
            'password' => Hash::make('12345678'),
            ]);

            Distributor::create([
                'name'=>$row['name'],
                'distributor_id'=>$auth->id,
                'email'=>$row['email'],
                'phone'=>$row['phone'],
                'gst'=>$row['gst'],
                'address'=>$row['address'],
                'city'=>$row['city'],
                'state'=>$row['state'],
                'sku_prefix'=>$row['sku_prefix'],

            ]);
        }
            
    }
}

