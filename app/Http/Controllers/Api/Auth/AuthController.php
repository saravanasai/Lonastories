<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CustomerResource;
use App\Models\CustomerSignup;
use App\Service\CheckUSerExistService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //this function handle the login request adn deliver a token
    public function login(Request $request)
    {
         $this->validate($request,["phonenumber"=>"required|min:10|max:10"]);

         $user= CustomerSignup::where('cus_phonenumber', '=', $request->phonenumber)->first();
         if($user)
         {
            return  new CustomerResource($user);
         }
         else
         {
            $reponse=["message"=>"User Not Found"];
            return response(json_encode($reponse),404);
         }



    }
}
