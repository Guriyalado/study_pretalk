<?php

namespace App\Repositories\User;
use App\Models\AuthCustomer;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;


class CustomerRepository
{

    public function all()
    {
        return Customer::select(['id','name','email','phone','city','state','address'])->get();
    }


     public function store()
     {
        try {

            $auth = new AuthCustomer();
            $auth->name = request()->name;
            $auth->email = request()->email;
            $auth->password =Hash::make("12345678") ;
            $auth->save();

            $customer= new Customer();
            $customer->name= request()->name;
            $customer->email= request()->email;
            $customer->customer_id=$auth->id;
            $customer->phone= request()->phone;
            $customer->state= request()->state;
            $customer->city= request()->city;
            $customer->address= request()->address;
            $customer->save();

            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' =>  $customer,
                    'path' => '/customer',
                    'msg' => __("Customer Information Added Success")
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
            $customer= Customer::findOrFail($id);
            $customer->name= request()->name;
            $customer->email= request()->email;
            $customer->phone= request()->phone;
            $customer->state= request()->state;
            $customer->city= request()->city;
            $customer->address= request()->address;
            $customer->save();
            $auth=AuthCustomer::where('id',$customer->customer_id)->first();
            $auth->name= request()->name;
            $auth->email= request()->email;
            $auth->save();



            if (request()->ajax()) {
                $output = [
                    'success' => true,
                    'data' => '',
                    'path' => '/customer',
                    'msg' => __("Customer Information Updated Success")
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
             $customer = Customer::findOrFail($id);
             $auth = AuthCustomer::where('id',$customer->customer_id)->delete();
             $customer->delete();

            $output = [
                'success' => true,
                'msg' => __("Customer Deleted Success")
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
