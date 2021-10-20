<?php
 namespace App\Service;

use App\Models\caller;
use App\Models\CustomerSignup;

class AdminUserProfileService {


    public function IsReferedByUser($customer_info)
    {

        $refered_by_cus_info=CustomerSignup::where('cus_referal_code',$customer_info->refered_by)->first();
        return $refered_by_cus_info;

    }


    public function IsReferedByTelcaller($customer_info)
    {
        $ref_by_telecaller_info=caller::where('id',$customer_info->refered_by)->first();
        return $ref_by_telecaller_info;
    }

}


?>
