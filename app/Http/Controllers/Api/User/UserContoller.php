<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CustomerResource;
use App\Models\CustomerSignup;
use App\Service\CheckUSerExistService;
use Illuminate\Http\Request;

class UserContoller extends Controller
{


    public function  userInfo(Request $request)
    {

        return  new CustomerResource($request->user());

    }
}
