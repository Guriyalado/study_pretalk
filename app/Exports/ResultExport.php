<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultExport implements FromCollection,WithHeadings
{
    public function collection()
    {
        $result=new Result();
        if(request()->has('nomenclature') && !empty(request()->nomenclature)){
             $result=$result->where('nomenclature','LIKE','%'.request()->nomenclature.'%');
        }
        if(request()->has('agency') && !empty(request()->agency)){
             $result= $result=$result->where('agency',request()->agency);
        }
        if(request()->has('solicitation_no') && !empty(request()->solicitation_no)){
            $result=  $result->where('solicitation_no',request()->solicitation_no);
        }
        if(request()->has('solicitnokey') && !empty(request()->solicitnokey)){
             $result=$result->where('solicitnokey',request()->solicitnokey);
        }
        if(request()->has('country') && !empty(request()->country)){
             $result=$result->where('country',request()->country);
        }
        if(request()->type=='opendate' && !empty(request()->opendate) && !empty(request()->closedate)){
             $result=$result->whereBetween('opendate',[request()->opendate,request()->closedate]);
        }
        if(request()->type=='closedate' && !empty(request()->opendate) && !empty(request()->closedate)){
             $result=$result->whereBetween('closedate',[request()->opendate,request()->closedate]);
        }

        return $result->get();
    }



    public function headings(): array
    {
        return ["Country", "Agency", "Solicitation No","Solicitation Key","Nomenclature","Open Date","Close Date","Url","Status","Title Token"];
    }

}
