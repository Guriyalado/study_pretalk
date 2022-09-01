<?php

namespace App\Repositories\User;
// use App\Models\AuthCustomer;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;


class SubjectRepository
{

    public function all()
    {
        return Subject::select(['id','subject_name','Credit','passing_marks'])->get();
    }


     public function store()
     {
        try {

            // $auth = new AuthCustomer();
            // $auth->name = request()->name;
            // $auth->email = request()->email;
            // $auth->password =Hash::make("12345678") ;
            // $auth->save();

            $subject= new Subject();
            $subject->subject_name= request()->subject_name;
            $subject->Credit= request()->Credit;
            $subject->passing_marks= request()->passing_marks;
            // $customer->customer_id=$auth->id;
            
            
            $mentor->save();

            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' =>  $subject,
                    'path' => '/subject',
                    'msg' => __("Subject Information Added Success")
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
            $subject= Mentor::findOrFail($id);
             $subject= new Subject();
            $subject->subject_name= request()->subject_name;
            $subject->Credit= request()->Credit;
            $subject->passing_marks= request()->passing_marks;
             
            
            $mentor->save();
            



            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' => '',
                    'path' => '/subject',
                    'msg' => __("Subject Information Updated Success")
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
             $subject = Subject::findOrFail($id);
             // $auth = AuthCustomer::where('id',$customer->customer_id)->delete();
             $subject->delete();

            $output = [
                'success' => true,
                'msg' => __("Subject Deleted Success")
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
