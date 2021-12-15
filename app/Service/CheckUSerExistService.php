<?php

namespace App\Service;

use App\Models\CustomerSignup;

class CheckUSerExistService
{

    public function check_if_user_exist($request)
    {
        $customer_exist = CustomerSignup::where('cus_phonenumber', '=', $request->phonenumber)->first();


        if ($customer_exist == null) {
            return true;
        } else {
            return false;
        }
    }

    public function check_if_user_exist_api($id)
    {
        $customer_exist = CustomerSignup::find($id);
        if ($customer_exist) {
            return true;
        } else {
            return false;
        }
    }
}
