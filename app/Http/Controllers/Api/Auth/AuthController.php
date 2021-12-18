<?php

namespace App\Http\Controllers\Api\Auth;


use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Service\ApiService\UserRegisterationService;
use App\Service\CheckUSerExistService;

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


    //function handle the register function
    public function register(Request $request,CheckUSerExistService $service,UserRegisterationService $regiserService)
    {

        $this->validate($request, [
            "PromoCode" => "required",
            "phonenumber" => "required|min:10|max:10",
            "email" => "email",
            "name" => "required",
            "date" => "required"
        ]);

        if ($service->check_if_user_exist($request)) {

            if ($regiserService->RegisterUser($request)) {

                $user_info = CustomerSignup::latest()->first();
                //section to  check if customer is refered by another customer
                if ($user_info->refered_by == '0' || true) {
                    //NOTE : 2x For direct Referal is also handled inside this block
                    $regiserService->BonusForReferedUser($user_info,$request);
                }
                //end section to  check if customer is refered by another customer

                //section to  check if customer is Availabe in our telecaller table
                if ($user_info->refered_by != '0' && $user_info->refered_by > 0) {
                    //NOTE : this Block is to auto matching the customer enquiery done by telecaller
                    $regiserService->MatchTelecallerEnquiery($user_info);
                }
                //end section to  check if customer is Availabe in our telecaller table

                //section to insert into a wallet of customer
                if ($regiserService->UserWalletGeneration($user_info)) {

                    $token = $user_info->createToken($request->phonenumber)->plainTextToken;
                    $response = ["status" => "success", "customer_id" => $user_info->id, "token" => $token];
                    return  response(json_encode($response, 200));

                }
                //end section to insert into a wallet of customer
            }
        } else {
            $response=["message"=>"User Already Exist"];

            return response(json_encode($response),403);
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
