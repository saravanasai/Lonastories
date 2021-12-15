<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CustomerResource;
use App\Models\CustomerSignup;
use App\Service\CheckUSerExistService;
use Illuminate\Http\Request;

class UserContoller extends Controller
{


    public function  userInfo($id, CheckUSerExistService $service)
    {
        if ($service->check_if_user_exist_api($id)) {
            $user = CustomerSignup::find($id);
            return  new CustomerResource($user);
        } else {
            $reponse = ["message" => "User Not Found"];
            return response(json_encode($reponse), 404);
        }
    }
}
