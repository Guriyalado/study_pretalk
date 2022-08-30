<?php

namespace App\Repositories\User;
// use App\Models\AuthCustomer;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;


class MentorRepository
{

    public function all()
    {
        return Mentor::select(['id','name','email','password','phone_no','experience','address','city','type'])->get();
    }


     public function store()
     {
        try {

            // $auth = new AuthCustomer();
            // $auth->name = request()->name;
            // $auth->email = request()->email;
            // $auth->password =Hash::make("12345678") ;
            // $auth->save();

            $mentor= new Mentor();
            $mentor->name= request()->name;
            $mentor->email= request()->email;
            $mentor->password= request()->password;
            // $customer->customer_id=$auth->id;
            $mentor->phone_no= request()->phone_no;
            $mentor->experience= request()->experience;
            $mentor->address= request()->address;
            $mentor->city= request()->city;
            $mentor->type= request()->type;
            
            $mentor->save();

            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' =>  $mentor,
                    'path' => '/mentor',
                    'msg' => __("Mentor Information Added Success")
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
            $mentor= Mentor::findOrFail($id);
             $mentor->name= request()->name;
            $mentor->email= request()->email;
            $mentor->password= request()->password;
            // $customer->customer_id=$auth->id;
            $mentor->phone_no= request()->phone_no;
            $mentor->experience= request()->experience;
            $mentor->address= request()->address;
            $mentor->city= request()->city;
            $mentor->type= request()->type;
            
            $mentor->save();
            // $auth=AuthCustomer::where('id',$customer->customer_id)->first();
            // $auth->name= request()->name;
            // $auth->email= request()->email;
            // $auth->save();



            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' => '',
                    'path' => '/mentor',
                    'msg' => __("Mentor Information Updated Success")
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
             $mentor = Mentor::findOrFail($id);
             // $auth = AuthCustomer::where('id',$customer->customer_id)->delete();
             $mentor->delete();

            $output = [
                'success' => true,
                'msg' => __("Mentor Deleted Success")
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
