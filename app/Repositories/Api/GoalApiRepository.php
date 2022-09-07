<?php

namespace App\Repositories\Api;

use App\Models\Goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Symfony\Component\HttpFoundation\Request;

class GoalApiRepository
{

    public function all()
    {
      return Goal::select(['id','title','body','subject_name','time','Credit'])->get();
   }
    public function store()
    {
        try {


            $goal= new Goal();
            $goal->title= request()->title;
            $goal->body= request()->body;
            $goal->subject_name= request()->subject_name;
            $goal->time= request()->time;
            $goal->Credit= request()->Credit;
             $goal->save();
            
            
            
           

            if ($goal) {
                $output = [
                    'success' => true,
                    'data' => $goal,
                    'path' => '/goal',
                    'msg' => __("Goal Information Added Success")
                ];
            }else{
                $output = [
                    'success' => false,
                    'data' => [],
                    'path' => '/goal',
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
             $goal= Goal::findOrFail($id);
              $goal->title= request()->title;
            $goal->body= request()->body;
            $goal->subject_name= request()->subject_name;
            $goal->time= request()->time;
            $goal->Credit= request()->Credit;
            $goal->save();
            

            if ($mentor) {
                $output = [
                    'success' => true,
                    'data' => $goal,
                    'path' => '/goal',
                    'msg' => __("goal Information Updated Successfully")
                ];
            }else{
                $output = [
                    'success' => false,
                    'data' => [],
                    'path' => '/goal',
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


          $goal =Goal::findOrFail($id);
          $goal->delete();


            $output = [
                'success' => true,
                'msg' => __("Goal Deleted Successfully")
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
