<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
session_start();
class GoogleController extends Controller
{
    public function getGoogleSignInUrl()
    {
        // try {
        //     $url = Socialite::driver('google')->stateless()
        //         ->redirect()->getTargetUrl();
        //     return response()->json([
        //         'url' => $url,
        //     ])->setStatusCode(Response::HTTP_OK);
        // } catch (\Exception $exception) {
        //     return $exception;
        // }
        try {
            $url = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
            return $url;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function loginCallback(Request $request){
        $user = Socialite::driver('google')->user();

        $user = User::where('id_google', $user->id)->first();
        if(!empty($user)){
            Auth::login($user);
            return redirect()->intended('/');
        }
        else{
            try {
                $state = $request->input('state');
    
                parse_str($state, $result);
                $googleUser = Socialite::driver('google')->stateless()->user();
    
                $user = User::where('email', $googleUser->email)->first();
                if ($user) {
                    throw new \Exception(__('google sign in email existed'));
                }
                $user = User::create(
                    [
                        'id_user' => "USER".Carbon::now()->format('ymdhis').rand(1,1000),
                        'id_role' => 2,
                        'username' => $googleUser->email,
                        'password'=>bcrypt('123'),
                        'user_token'=> Str::random(32),
                        'email' => $googleUser->email,
                        'fullname' => $googleUser->name,
                        'phone' => '0123123123',
                        'address' => 'HCM',
                        'id_google'=> $googleUser->id,
                    ]
                );
                return response()->json([
                    'status' => __('google sign in successful'),
                    'data' => $user,
                ], Response::HTTP_CREATED);
    
            } catch (\Exception $exception) {
                return response()->json([
                    'status' => __('google sign in failed'),
                    'error' => $exception,
                    'message' => $exception->getMessage()
                ], Response::HTTP_BAD_REQUEST);
            }
        }
        Auth::login($user);
        return redirect(route('/'));
    }

    // public function loginCallback(Request $request)
    // {
    //     try {
    //         $state = $request->input('state');

    //         parse_str($state, $result);
    //         $googleUser = Socialite::driver('google')->stateless()->user();

    //         $user = User::where('email', $googleUser->email)->first();
    //         if ($user) {
    //             throw new \Exception(__('google sign in email existed'));
    //         }
    //         $user = User::create(
    //             [
    //                 'id_user' => "USER".Carbon::now()->format('ymdhis').rand(1,1000),
    //                 'id_role' => 2,
    //                 'username' => $googleUser->email,
    //                 'password'=>bcrypt('123'),
    //                 'user_token'=> Str::random(32),
    //                 'email' => $googleUser->email,
    //                 'fullname' => $googleUser->name,
    //                 'phone' => '0123123123',
    //                 'address' => 'HCM',
    //                 'id_google'=> $googleUser->id,
    //             ]
    //         );
    //         return response()->json([
    //             'status' => __('google sign in successful'),
    //             'data' => $user,
    //         ], Response::HTTP_CREATED);

    //     } catch (\Exception $exception) {
    //         return response()->json([
    //             'status' => __('google sign in failed'),
    //             'error' => $exception,
    //             'message' => $exception->getMessage()
    //         ], Response::HTTP_BAD_REQUEST);
    //     }
    // }
}


