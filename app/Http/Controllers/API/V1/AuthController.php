<?php

namespace App\Http\Controllers\API\V1;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    public function register(Request $request)
    {
        // find user
        $findUser = User::where('phone', $request->phone)->first();

        if ($findUser) {
            return response()->json([
                'success' => false,
                'message' => 'User already exist with this phone number.'
            ]);
        }

        // create user

        $user = new User();
        $user->name =  $request->name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        if (env('APP_ENV') == 'production') {

            // send sms verify code
            $response = Http::get('https://verify.smspoh.com/api/v1/request', [
                'access-token' => env('SMSPOH_ACCESS_TOKEN'),
                'number' => $user->phone,
                'brand_name' => 'BFF Sports',
                'template' => '{brand_name} အတွက် သင်၏အတည်ပြုရန်ကုဒ်နံပါတ်မှာ {code} ဖြစ်ပါတယ်'
            ]);


            if (!$response->json()['status']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Something went wrong from SMSPoh'
                ]);
            }


            return response()->json([
                'success' => true,
                'message' => 'Verify code has been send.',
                'data' => [
                    'user' => $user,
                    'sms' => [
                        "status" => true,
                        "request_id" => $response->json()['request_id'],
                        "number" => $user->phone
                    ]
                ]
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Verify code has been send.',
                'data' => [
                    'user' => $user,
                    'sms' => [
                        "status" => true,
                        "request_id" => 'testing',
                        "number" => $user->phone
                    ]
                ]
            ]);
        }
    }

    public function verify(Request $request)
    {
        if (env('APP_ENV') == 'production') {
            // verify sms code
            $response = Http::get('https://verify.smspoh.com/api/v1/verify', [
                'access-token' => env('SMSPOH_ACCESS_TOKEN'),
                'request_id' => intval($request->request_id),
                'code' => intval($request->code),
            ]);


            if ($response->json()['status'] === true) {
                $phone = $request->phone;
                $user = User::where('phone', $phone)->first();
                $user->phone_confirmed_at = Carbon::now();
                $user->update();

                return response()->json([
                    'success' => true,
                    'message' => 'Account has been verified.',
                    'data' => [
                        'user' => $user,
                    ]
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $response->json()['message']
                ]);
            }
        } else {
            $phone = $request->phone;
            $user = User::where('phone', $phone)->first();
            $user->phone_confirmed_at = Carbon::now();
            $user->update();

            $token = $user->createToken('User Token')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'Account has been verified.',
                'data' => [
                    'user' => $user,
                    'token' => $token
                ]
            ]);
        }
    }
}
