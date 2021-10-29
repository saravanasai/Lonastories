<?php

namespace App\Service;

use App\Models\CustomerSignup;
use App\Models\TeleCallerEnquiery;

class VerifyTeleLeadsByAdminService {


    public function verify_by_admin($id)
    {
        $tele_caller_enquiery=TeleCallerEnquiery::where('cus_Phone_number',$id)->first();
        $new_caller=new CustomerSignup();
        $new_caller->name=$tele_caller_enquiery->cus_first_name;
        $new_caller->cus_phonenumber=$tele_caller_enquiery->cus_Phone_number;
        $new_caller->email=$tele_caller_enquiery->cus_email;
    }


}




?>
