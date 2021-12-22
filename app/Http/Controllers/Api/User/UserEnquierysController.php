<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\customers\CustomerSignUpController;
use App\Http\Requests\Customer\QuickEnquieryRequest;
use App\Models\CustomerSignup;
use App\Service\CustomerEnquieyService\CustomerEnquieyService;
use Illuminate\Http\Request;

class UserEnquierysController extends Controller
{

    public function quickEnquiery(QuickEnquieryRequest $request,CustomerEnquieyService $service)
    {
       if(CustomerSignup::where('id',$request->customer_id)->where('enquiery_form_status',0)->first())
       {
            if($service->handleCustomerService($request))
            {
                $response=["data"=>"Enquiery Form Submitted"];

                return response(json_encode($response),201);
            }
       }
       else
       {

        $response=["message"=>"Last Enquiery Not Considered Try After Some Time"];
        return response(json_encode($response),206);
       }

    }
}
