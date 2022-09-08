<?php

namespace App\Repositories\Api;

use App\Models\Presetgoal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Symfony\Component\HttpFoundation\Request;

class PresetgoalApiRepository
{

    public function all()
    {
       return Presetgoal::select(['id','title','body','subject_name','time','Credit'])->get();
   }
    public function store()
    {
        try {


           $presetgoal= new Presetgoal();
            $presetgoal->title= request()->title;
            $presetgoal->body= request()->body;
            $presetgoal->subject_name= request()->subject_name;
            $presetgoal->time= request()->time;
            $presetgoal->Credit= request()->Credit;
            
            
            
            $presetgoal->save();
            
            
            

            if ($presetgoal) {
                $output = [
                    'success' => true,
                    'data' => $presetgoal,
                    'path' => '/presetgoal',
                    'msg' => __("Presetgoal Information Added Success")
                ];
            }else{
                $output = [
                    'success' => false,
                    'data' => [],
                    'path' => '/presetgoal',
                    'msg' => __("Something Went Wrong")
                ];
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
             $input = request()->all();
              $presetgoal= Presetgoal::findOrFail($id);
              
            $presetgoal->title= request()->title;
            $presetgoal->body= request()->body;
            $presetgoal->subject_name= request()->subject_name;
            $presetgoal->time= request()->time;
            $presetgoal->Credit= request()->Credit;
            
            
            
            $presetgoal->save();
            
            

            if ($presetgoal) {
                $output = [
                    'success' => true,
                    'data' => $presetgoal,
                    'path' => '/presetgoal',
                    'msg' => __("Presetgoal Information Updated Successfully")
                ];
            }else{
                $output = [
                    'success' => false,
                    'data' => [],
                    'path' => '/presetgoal',
                    'msg' => __("Something Went Wrong")
                ];
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
          $presetgoal =Presetgoal::findOrFail($id);
            
             $presetgoal->delete();


            $output = [
                'success' => true,
                'msg' => __("Presetgoal Deleted Successfully")
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
