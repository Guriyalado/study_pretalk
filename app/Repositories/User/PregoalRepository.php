<?php

namespace App\Repositories\User;
// use App\Models\AuthCustomer;
use App\Models\Pregoal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;


class PregoalRepository
{

    public function all()
    {
       return Pregoal::select(['id','title','body','subject_name','time','Credit'])->get();
    }


     public function store()
     {
        try {
             $pregoal= new Pregoal();
            $pregoal->title= request()->title;
            $pregoal->body= request()->body;
            $pregoal->subject_name= request()->subject_name;
            $pregoal->time= request()->time;
            $pregoal->Credit= request()->Credit;
            
            
            
            $pregoal->save();
            

          

            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' =>  $pregoal,
                    'path' => '/pregoal',
                    'msg' => __("Pregoal Information Added Success")
                ];
            } else {
                $output = redirect()->back();
            }
        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            $output = [
                'success' => false,
                'msg' => __("messages.something_went_wrong " . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage())
            ];
        }
        return $output;
    }


     public function update($id)
    {
        try {
            $pregoal= Pregoal::findOrFail($id);
              
            $pregoal->title= request()->title;
            $pregoal->body= request()->body;
            $pregoal->subject_name= request()->subject_name;
            $pregoal->time= request()->time;
            $pregoal->Credit= request()->Credit;
            
            
            
            $pregoal->save();
            

            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' => '',
                    'path' => '/pregoal',
                    'msg' => __("Pregoal Information Updated Success")
                ];
            } else {
                $output = redirect()->back();
            }
        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            $output = [
                'success' => false,
                'msg' => __("messages.something_went_wrong") . $e->getMessage()
            ];
        }

        return $output;
    }
    public function delete($id)
    {

        try {
             $pregoal =Pregoal::findOrFail($id);
             
             $pregoal->delete();

            $output = [
                'success' => true,
                'msg' => __("Pregoal Deleted Success")
            ];
        } catch (\Exception $e) {
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

            $output = [
                'success' => false,
                'msg' => __("messages.something_went_wrong")
            ];
        }
        return $output;
    }

}
