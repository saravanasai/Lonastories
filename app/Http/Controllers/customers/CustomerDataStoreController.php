<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEmiShedule;
use App\Models\Cutomer\PersonalInfoFrom;
use App\Models\Wallet;
use App\Service\EmiSheduleReUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CustomerDataStoreController extends Controller
{
    public function personalInfoFillStore(Request $request)
    {

         $personal_info= new PersonalInfoFrom();
         $personal_info->pr_form_of_user=session('customer')->id;
         $personal_info->Original_Name=$request->Original_Name;
         $personal_info->Education_Qualification=$request->Education_Qualification;
         $personal_info->Marital_Status=$request->Marital_Status;
         $personal_info->Spouse_name=$request->Spouse_name;
         $personal_info->Spouse_DOB=$request->Spouse_DOB;
         $personal_info->Father_Name=$request->Father_Name;
         $personal_info->Mother_Name=$request->Mother_Name;
         $personal_info->Current_Address=$request->Current_Address;
         $personal_info->Residence_Mobile_No=$request->Residence_Mobile_No;
         $personal_info->Current_Address_Landmark=$request->Current_Address_Landmark;
         $personal_info->Resi_type=$request->Resi_type;
         $personal_info->No_of_years_cur_resi=$request->No_of_years_cur_resi;
         $personal_info->No_of_years_cur_city=$request->No_of_years_cur_city;
         $personal_info->Pr_Address=$request->Pr_Address;
         $personal_info->Pr_Address_mobile_no=$request->Pr_Address_mobile_no;
         $personal_info->Pr_Address_Landmark=$request->Pr_Address_Landmark;
         $personal_info->Of_Address=$request->Of_Address;
         $personal_info->Of_Address_Landmark=$request->Of_Address_Landmark;
         $personal_info->Of_Address_contact_no=$request->Of_Address_contact_no;
         $personal_info->Per_mai=$request->Per_mail;
         $personal_info->Of_mail=$request->Of_mail;
         $personal_info->Salary_account_bank_name=$request->Salary_account_bank_name;
         $personal_info->Salary_account_bank_ac_no=$request->Salary_account_bank_ac_no;
         $personal_info->DOJ_of_current_company=$request->DOJ_of_current_company;
         $personal_info->Total_work_expirence=$request->Total_work_expirence;
         $personal_info->Reference_1_name=$request->Reference_1_name;
         $personal_info->Reference_1_contact_no=$request->Reference_1_contact_no;
         $personal_info->Reference_1_complete_address=$request->Reference_1_complete_address;
         $personal_info->Relation_1_type=$request->Relation_1_type;
         $personal_info->Reference_2_name=$request->Reference_2_name;
         $personal_info->Reference_2_contact_no=$request->Reference_2_contact_no;
         $personal_info->Reference_2_complete_address=$request->Reference_2_complete_address;
         $personal_info->Relation_2_type=$request->Relation_2_type;

        //updating the status on customer_Master Table
         $customer_master=CustomerSignup::where('id',session('customer')->id)->first();
         $customer_master->pr_form_status=1;

          if($personal_info->save()  )
          {
               if($customer_master->save())
               {

                return redirect()->route('user.profile');
               }

          }
    }

    //function that handle the customer file storing operation
    public function existingEmiSheduleStore(Request $request)
    {
        //need to enable this validation on intergration
        //    $this->validate($request,[
        //         "bank_name"=>"required",
        //         "type_of_loan"=>"required",
        //         "loan_amount"=>"required|numeric",
        //         "roi"=>"required|numeric",
        //         "tenure"=>"required|numeric",
        //         "emi"=>"required|numeric",
        //         "shedule_file"=>"mimes:pdf"
        //     ]);

        if($request->file('shedule_file'))
        {
            $file=$request->file('shedule_file');
            $file_name="SH".session('customer')->id."OF".rand(1000,60000).".pdf";

            $existing_loan_info=new CustomerEmiShedule();
            $existing_loan_info->emi_shedule_of_user=session('customer')->id;
            $existing_loan_info->emi_sh_name_of_bank=$request->bank_name;
            $existing_loan_info->emi_sh_type_of_loan=$request->type_of_loan;
            $existing_loan_info->emi_sh_loan_amount=$request->loan_amount;
            $existing_loan_info->emi_sh_roi=$request->roi;
            $existing_loan_info->emi_sh_tenure =$request->tenure;
            $existing_loan_info->emi_sh_emi=$request->emi;
            $existing_loan_info->emi_sh_file=$file_name;
            $existing_loan_info->emi_shedule_status=1;

            //updating the status in customer master table

            $customer_master=CustomerSignup::where('id',session('customer')->id)->first();
            $customer_master->customer_one_view_status=1;


            if($existing_loan_info->save() && $customer_master->save())
            {
            Storage::put('ExsitingShedules/'.$file_name, file_get_contents($file));
            return redirect()->route('user.OneView');
            }
            else
            {
                return redirect()->back();
            }

        }
        else
        {
            $existing_loan_info=new CustomerEmiShedule();
            $existing_loan_info->emi_shedule_of_user=session('customer')->id;
            $existing_loan_info->emi_sh_name_of_bank=$request->bank_name;
            $existing_loan_info->emi_sh_type_of_loan=$request->type_of_loan;
            $existing_loan_info->emi_sh_loan_amount=$request->loan_amount;
            $existing_loan_info->emi_sh_roi=$request->roi;
            $existing_loan_info->emi_sh_tenure =$request->tenure;
            $existing_loan_info->emi_sh_emi=$request->emi;
            $existing_loan_info->emi_shedule_status=0;
            //updating the status in customer master table

            $customer_master=CustomerSignup::where('id',session('customer')->id)->first();
            $customer_master->customer_one_view_status=1;


            if($existing_loan_info->save() && $customer_master->save())
            {
            return redirect()->route('user.OneView');
            }
            else
            {
                return redirect()->back();
            }
        }

    }

    //function to upload user profile image
    public function UploadUserImage(Request $request)
    {
         $this->validate($request,[
             "profile_img"=>"required|mimes:jpg,jpeg|max:500000"
        ]);
        if($request->file('profile_img'))
        {
            $file=$request->file('profile_img');
            $file_name="PR_IMG".session('customer')->id.".".$file->getClientOriginalExtension();

            $customer_master=CustomerSignup::where('id',session('customer')->id)->first();
            $customer_master->user_profile_img=$file_name;
            $customer_master->user_profile_img_status=1;
            if($customer_master->save())
            {
                Storage::put('userprofile/'.$file_name,file_get_contents($file));
                Session::flash('profileimage','Profile Image Uploaded');
                return redirect()->route('user.profile');

            }
        }
    }

    //function handle the redem request from user
    public function RedeemRequest(Request $request)
    {
         //this section actualy resets the value after giving cash to user
         $user_wallet=Wallet::where('wallet_of_user',$request->cus_id)->first();
         $user_wallet->redeem_request=1;
         $user_wallet->enable_redeem=0;
         if($user_wallet->save())
         {
            Session::flash('redeemRequest','Requested for Redeem');
            return back();
         }


    }

    public function existingEmiSheduleRestoreStore(Request $request,EmiSheduleReUploadService $service)
    {

        $this->validate($request,[
            "shedule_file"=>"required|mimes:pdf",
        ]);

        return  $service->existingEmiSheduleRestoreStore($request);
    }

}
