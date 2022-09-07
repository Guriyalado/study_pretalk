<?php

namespace App\Repositories\User;
// use App\Models\AuthCustomer;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;


class ActivityRepository
{

    public function all()
    {
        return Activity::select(['id','title','descreption','time'])->get();
    }


     public function store()
     {
        try {

            // $auth = new AuthCustomer();
            // $auth->name = request()->name;
            // $auth->email = request()->email;
            // $auth->password =Hash::make("12345678") ;
            // $auth->save();

            $activity= new Activity();
            $activity->title= request()->title;
            $activity->descreption= request()->descreption;
            $activity->time= request()->time;
            // $customer->customer_id=$auth->id;
            
            
            $activity->save();

            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' =>  $activity,
                    'path' => '/activity',
                    'msg' => __("Activity Information Added Success")
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
            $activity= Activity::findOrFail($id);
             $activity->title= request()->title;
            $activity->descreption= request()->descreption;
            $activity->time= request()->time;
              $activity->save();
            
           
            
           
            



            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' => '',
                    'path' => '/activity',
                    'msg' => __("Activity Information Updated Success")
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
             $activity = Activity::findOrFail($id);
             
             $activity->delete();

            $output = [
                'success' => true,
                'msg' => __("Activity Deleted Success")
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
