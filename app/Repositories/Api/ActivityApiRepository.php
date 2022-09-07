<?php

namespace App\Repositories\Api;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Symfony\Component\HttpFoundation\Request;

class ActivityApiRepository
{

    public function all()
    {
        return Activity::select(['id','title','descreption','time'])->get();
   }
    public function store()
    {
        try {


            $activity= new Activity();
            $activity->title= request()->title;
            $activity->descreption= request()->descreption;
            $activity->time= request()->time;
            $activity->save();

            if ($activity) {
                $output = [
                    'success' => true,
                    'data' => $activity,
                    'path' => '/activity',
                    'msg' => __("Activity Information Added Success")
                ];
            }else{
                $output = [
                    'success' => false,
                    'data' => [],
                    'path' => '/activity',
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
            $activity= Activity::findOrFail($id);
            $activity->title= request()->title;
            $activity->descreption= request()->descreption;
            $activity->time= request()->time;
              $activity->save();
            

            if ($activity) {
                $output = [
                    'success' => true,
                    'data' => $activity,
                    'path' => '/activity',
                    'msg' => __("Activity Information Updated Successfully")
                ];
            }else{
                $output = [
                    'success' => false,
                    'data' => [],
                    'path' => '/activity',
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
           $activity = Activity::findOrFail($id);
             
             $activity->delete();


            $output = [
                'success' => true,
                'msg' => __("Activity Deleted Successfully")
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
