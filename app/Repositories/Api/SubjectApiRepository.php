<?php

namespace App\Repositories\Api;

use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Symfony\Component\HttpFoundation\Request;

class SubjectApiRepository
{

    public function all()
    {
       return Subject::select(['id','subject_name','Credit','passing_marks'])->get();
   }
    public function store()
    {
        try {


            $subject= new Subject();
            $subject->subject_name= request()->subject_name;
            $subject->Credit= request()->Credit;
            $subject->passing_marks= request()->passing_marks;
            $subject->save();
            
            
            
            

            if ($subject) {
                $output = [
                    'success' => true,
                    'data' => $subject,
                    'path' => '/subject',
                    'msg' => __("Subject Information Added Success")
                ];
            }else{
                $output = [
                    'success' => false,
                    'data' => [],
                    'path' => '/subject',
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
             $subject=Subject::findOrFail($id);
             $subject->subject_name= request()->subject_name;
            $subject->Credit= request()->Credit;
            $subject->passing_marks= request()->passing_marks;
             
            
            $subject->save();
            

            if ($subject) {
                $output = [
                    'success' => true,
                    'data' => $subject,
                    'path' => '/subject',
                    'msg' => __("Subject Information Updated Successfully")
                ];
            }else{
                $output = [
                    'success' => false,
                    'data' => [],
                    'path' => '/subject',
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
           $subject = Subject::findOrFail($id);
            
             $subject->delete();


            $output = [
                'success' => true,
                'msg' => __("Subject Deleted Successfully")
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
