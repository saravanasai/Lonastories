<?php

namespace App\Service\CustomerEnquieyService;

use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEnqieryForm;

class CustomerEnquieyService
 {


     public function handleCustomerService($request)
     {
        $quick_enquiery_form=new CustomerEnqieryForm();
        $quick_enquiery_form->eqy_of_cus_enq_tb=$request->customer_id;
        $quick_enquiery_form->Product_intrested=$request->Product_intrested;
        $quick_enquiery_form->Loan_Amount=$request->Loan_Amount;
        $quick_enquiery_form->Preferred_Bank_Name=$request->Preferred_Bank_Name;
        $quick_enquiery_form->City_Name=$request->City_Name;
        $quick_enquiery_form->how_soon=$request->how_soon;
        $quick_enquiery_form->enq_date=$request->enq_date;
        $quick_enquiery_form->enq_time=$request->enq_time;
        $quick_enquiery_form->mode_to_connect=$request->mode_to_connect;
        //updating the master customer table cus_enquiery_form status to 1
        $customer_master=CustomerSignup::where('id',$request->customer_id)->first();
        $customer_master->enquiery_form_status=1;
        return ($customer_master->save() &&  $quick_enquiery_form->save())?true:false;
        //end updating the master customer table cus_enquiery_form status to 1
     }


 }
