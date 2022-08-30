<?php

namespace App\Http\Controllers\Api\AuthCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthCustomer;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


class AuthCustomerController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()], 400);
        }

        $user = AuthCustomer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $data = Customer::create(['name' => $request->name, 'email' => $request->email, 'customer_id' => $user->id]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['status' => 200, 'message' => "Successfully Registered", 'output' => ['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer']], 200);
    }

    public function login(Request $request)
    {
        $user = AuthCustomer::where('email', $request['email'])->firstOrFail();
        if ($user) {
            if (Hash::check(request()->password, $user->password)) {

                $token = $user->createToken('auth_token')->plainTextToken;
                return response()
                    ->json(['message' => 'Hi ' . $user->name . ', welcome to home', 'output' => ['user' => $user, 'access_token' => $token, 'token_type' => 'Bearer'], 'status' => 200], 200);
            } else {
                return response()
                    ->json(['status' => 400, 'message' => 'User ID and Password Required'], 400);
            }
        }
    }

    public function profile(Request $request)
    {
        $user = auth()->user();
        $msg=$user->id;
        $data=Customer::where('customer_id',$msg)->get();
        return response()
            ->json(['message' => 'Successfully Fetched', 'output' => ['user' => $data], 'status' => 200], 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()], 400);
        }

        $user = AuthCustomer::where('id', auth()->user()->id)->update(['name' => request()->name, 'email' => request()->phone]);
            $customer= Customer::where('customer_id',auth()->user()->id)->first();;
            $customer->name = request()->name;
            $customer->email = request()->email;
            $customer->phone= request()->phone;
            $customer->city= request()->city;
            $customer->state= request()->state;
            $customer->address= request()->address;
            $customer->save();

        return response()
            ->json(['message' => 'Successfully Updated', 'output' => ['user' => $user,'update'=>$customer], 'status' => 200], 200);
    }

    // method for user logout and delete token
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()
            ->json(['message' => 'You have successfully logged out and the token was successfully deleted', 'status' => 200], 200);
    }


    // protected function sendResetLinkResponse(Request $request)

    // {
    //     $input = $request->only('email');
    //     $validator = Validator::make($input, [
    //         'email' => "required|email"
    //     ]);
    //     if ($validator->fails()) {
    //         return response(['errors' => $validator->errors()->all()], 422);
    //     }
    //     $response =  Password::sendResetLink($input);
    //     dd($response);
    //     if ($response == Password::RESET_LINK_SENT) {
    //         $message = "Mail send successfully";
    //     } else {
    //         $message = "Email could not be sent to this email address";
    //     }
    //     //$message = $response == Password::RESET_LINK_SENT ? 'Mail send successfully' : GLOBAL_SOMETHING_WANTS_TO_WRONG;
    //     $response = ['data' => '', 'message' => $message];
    //     return response($response, 200);
    // }


    // protected function sendResetResponse(Request $request)
    // {
    //     //password.reset
    //     $input = $request->only('email', 'token', 'password', 'password_confirmation');
    //     $validator = Validator::make($input, [
    //         'token' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed|min:8',
    //     ]);
    //     if ($validator->fails()) {
    //         return response(['errors' => $validator->errors()->all()], 422);
    //     }
    //     $response = Password::reset($input, function ($user, $password) {
    //         $user->forceFill([
    //             'password' => Hash::make($password)
    //         ])->save();
    //         //$user->setRememberToken(Str::random(60));
    //         event(new PasswordReset($user));
    //     });
    //     if ($response == Password::PASSWORD_RESET) {
    //         $message = "Password reset successfully";
    //     } else {
    //         $message = "Email could not be sent to this email address";
    //     }
    //     $response = ['data' => '', 'message' => $message];
    //     return response()->json($response);
    // }

    public function change_password(Request $request)
    {
        $input = $request->all();
        $userid = Auth::user()->id;
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            try {
                if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                    $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                    $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    AuthCustomer::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                    $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => array());
            }
        }
        return Response()->json($arr);
    }
}
