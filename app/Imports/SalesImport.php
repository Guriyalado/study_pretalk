<?php

namespace App\Imports;

use App\Models\Distributor;
use App\Models\AuthExcutive;
use App\Models\SalesExcutive;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class SalesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        {
            foreach($collection as $row){
                $dis=Distributor::where('name',$row['distributor'])->first();
                $auth= AuthExcutive::create([
                'name'=>$row['name'],
                'mobile_no'=>$row['mobile_no'],
                'password' => Hash::make('12345678'),
                ]);
    
                SalesExcutive::create([
                    'name'=>$row['name'],
                    'sales_executive_id'=>$auth->id,
                    'distributor_id'=>$dis->distributor_id,
                    'email'=>$row['email'],
                    'mobile_no'=>$row['mobile_no'],
                    'gender'=>$row['gender'],
                    'martial_status'=>$row['marital_status'],
                    'blood_group'=>$row['blood_group'],
                    'alternate_mobile'=>$row['alternate_mobile'],
                    'id_proof'=>$row['id_proof'],
                    'p_address'=>$row['parmanent_address'],
                    'c_address'=>$row['current_address'],
                    'city'=>$row['city'],
                    'state'=>$row['state'],
                    'acc_no'=>$row['acc_no'],
                    'bank_name'=>$row['bank_name'],
                    'ifsc_code'=>$row['ifsc_code'],
                    'branch'=>$row['branch'],
                    'pan_no'=>$row['pan_no'],
                    'addhar_no'=>$row['addhar_no'],
                    
    
                ]);
            }
                
        }
    }
}
