@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 Route::gorup(['prefix'=>'/admin']),function(){
    Route::post('register',[AuthDistributorController::class,'register']);
    Route::post('login',[AuthDistributorController::class,'login']);
    Route::post('password/forgot-password', [AuthDistributorController::class, 'sendResetLinkResponse']);
    Route::post('password/reset', [AuthDistributorController::class, 'sendResetResponse']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('profile',[AuthDistributorController::class,'profile']);
    Route::post('profile/update',[AuthDistributorController::class,'update']);
    Route::post('logout',[AuthDistributorController::class,'logout']);
    Route::get('change-password',[AuthDistributorController::class,'change_password']);
    });
    });
    use App\Http\Controllers\Api\AuthDistributorController\AuthDistributorController;
use App\Http\Controllers\Api\AuthExcutive\DistributorController;
