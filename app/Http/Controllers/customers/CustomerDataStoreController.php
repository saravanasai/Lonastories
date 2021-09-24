<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\PersonalInfoFrom;
use Illuminate\Http\Request;

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

          if($personal_info->save() && $customer_master->save())
          {
              return redirect()->route('user.wallet');
          }
    }
}
