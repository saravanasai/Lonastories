<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //this function handle the login request adn deliver a token
    public function login(Request $request)
    {
        $this->validate($request, ["phonenumber" => "required|min:10|max:10"]);
        $user = CustomerSignup::where('cus_phonenumber', '=', $request->phonenumber)->first();
        if ($user) {
            $token = $user->createToken($request->phonenumber)->plainTextToken;
            $response = ["status" => "success", "customer_id" => $user->id, "token" => $token];
            return  response(json_encode($response, 200));
        } else {
            $reponse = ["message" => "User Not Found"];
            return response(json_encode($reponse), 404);
        }
    }


    public function logout(Request $request)
    {
        $user = CustomerSignup::find($request->customer_id);
        $user->tokens()->delete();
        $reponse = ["message" => "User Logged Out"];
        return response(json_encode($reponse), 200);
    }
}
