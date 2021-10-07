<?php

namespace App\Service;

use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEmiShedule;
use Illuminate\Support\Facades\Storage;

class EmiSheduleReUploadService{


    public function existingEmiSheduleRestoreStore($request)
    {

        if($request->file('shedule_file'))
        {
            $file=$request->file('shedule_file');
            $file_name="SH".session('customer')->id."OF".rand(1000,60000).".pdf";

            $existing_loan_info=CustomerEmiShedule::where('id',$request->shedule_id)->first();
            $existing_loan_info->emi_sh_file=$file_name;
            $existing_loan_info->emi_shedule_status=1;

            if($existing_loan_info->save())
            {
            Storage::put('ExsitingShedules/'.$file_name, file_get_contents($file));
            return redirect()->route('user.OneView');
            }
            else
            {
                return redirect()->back();
            }

        }
    }

}




?>
