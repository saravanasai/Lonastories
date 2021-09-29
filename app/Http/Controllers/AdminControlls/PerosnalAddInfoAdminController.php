<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\PersonalInfoFrom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PerosnalAddInfoAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //    dd($request->all());
            //   $this->validate($request,[
            //       "Original_Name"=>"required",
            //       "Education_Qualification"=>"required",
            //       "Marital_Status"=>"required",
            //       "Spouse_name"=>"required",
            //       "Spouse_DOB"=>"required",
            //       "Father_Name"=>"required",
            //       "Mother_Name"=>"required",
            //       "Current_Address"=>"required",
            //       "Residence_Mobile_No"=>"required|min:10",
            //       "Current_Address_Landmark"=>"required",
            //       "Resi_type"=>"required",
            //       "No_of_years_cur_resi"=>"numeric|max:3",
            //       "No_of_years_cur_city"=>"numeric|max:3",
            //       "Pr_Address"=>"required",
            //       "Pr_Address_mobile_no"=>"numeric|min:10",
            //       "Pr_Address_Landmark"=>"required",
            //       "Of_Address"=>"required",
            //       "Of_Address_Landmark"=>"required",
            //       "Of_Address_contact_no"=>"required",
            //       "Per_mail"=>"required",
            //       "Of_mail"=>"required",
            //       "Salary_account_bank_name"=>"required",
            //       "Salary_account_bank_ac_no"=>"required",
            //       "DOJ_of_current_company"=>"required",
            //       "Total_work_expirence"=>"numeric",
            //       "Reference_1_name"=>"required",
            //       "Reference_1_contact_no"=>"numeric|min:10",
            //       "Reference_1_complete_address"=>"required",
            //       "Relation_1_type"=>"required",
            //       "Reference_2_name"=>"required",
            //       "Reference_2_contact_no"=>"numeric|min:10",
            //       "Reference_2_complete_address"=>"required",
            //       "Relation_2_type"=>"required"
            //     ]);

                $pr_info= new PersonalInfoFrom();
                $pr_info->pr_form_of_user=$request->cus_id;
                $pr_info->Original_Name=$request->Original_Name;
                $pr_info->Education_Qualification=$request->Education_Qualification;
                $pr_info->Marital_Status=$request->Marital_Status;
                $pr_info->Spouse_name=$request->Spouse_name;
                $pr_info->Spouse_DOB=$request->Spouse_DOB;
                $pr_info->Father_Name=$request->Father_Name;
                $pr_info->Mother_Name=$request->Mother_Name;
                $pr_info->Current_Address=$request->Current_Address;
                $pr_info->Residence_Mobile_No=$request->Residence_Mobile_No;
                $pr_info->Current_Address_Landmark=$request->Current_Address_Landmark;
                $pr_info->Resi_type=$request->resi_type;
                $pr_info->No_of_years_cur_resi=$request->No_of_years_cur_resi;
                $pr_info->No_of_years_cur_city=$request->No_of_years_cur_city;
                $pr_info->Pr_Address=$request->Pr_Address;
                $pr_info->Pr_Address_mobile_no=$request->Pr_Address_mobile_no;
                $pr_info->Pr_Address_Landmark=$request->Pr_Address_Landmark;
                $pr_info->Of_Address=$request->Of_Address;
                $pr_info->Of_Address_Landmark=$request->Of_Address_Landmark;
                $pr_info->Of_Address_contact_no=$request->Of_Address_contact_no;
                $pr_info->Per_mai=$request->Per_mail;
                $pr_info->Of_mail=$request->Of_mail;
                $pr_info->Salary_account_bank_name=$request->Salary_account_bank_name;
                $pr_info->Salary_account_bank_ac_no=$request->Salary_account_bank_ac_no;
                $pr_info->DOJ_of_current_company=$request->DOJ_of_current_company;
                $pr_info->Total_work_expirence=$request->Total_work_expirence;
                $pr_info->Reference_1_name=$request->Reference_1_name;
                $pr_info->Reference_1_contact_no=$request->Reference_1_contact_no;
                $pr_info->Reference_1_complete_address=$request->Reference_1_complete_address;
                $pr_info->Relation_1_type=$request->Relation_1_type;
                $pr_info->Reference_2_name=$request->Reference_2_name;
                $pr_info->Reference_2_contact_no=$request->Reference_2_contact_no;
                $pr_info->Reference_2_complete_address=$request->Reference_2_complete_address;
                $pr_info->Relation_2_type=$request->Relation_2_type;

                $customer_master=CustomerSignup::where('id',$request->cus_id)->first();
                $customer_master->pr_form_status=1;

                if($pr_info->save() && $customer_master->save())
                {
                    Session::flash('success', 'This is a message!');
                    return redirect()->route('PersonalInfoAdmin.show',$request->cus_id);
                }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('AdminUserView.personalInfoAdd',["cus_id"=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //   $this->validate($request,[
        //       "Original_Name"=>"required",
        //       "Education_Qualification"=>"required",
        //       "Marital_Status"=>"required",
        //       "Spouse_name"=>"required",
        //       "Spouse_DOB"=>"required",
        //       "Father_Name"=>"required",
        //       "Mother_Name"=>"required",
        //       "Current_Address"=>"required",
        //       "Residence_Mobile_No"=>"required|min:10",
        //       "Current_Address_Landmark"=>"required",
        //       "Resi_type"=>"required",
        //       "No_of_years_cur_resi"=>"numeric|max:3",
        //       "No_of_years_cur_city"=>"numeric|max:3",
        //       "Pr_Address"=>"required",
        //       "Pr_Address_mobile_no"=>"numeric|min:10",
        //       "Pr_Address_Landmark"=>"required",
        //       "Of_Address"=>"required",
        //       "Of_Address_Landmark"=>"required",
        //       "Of_Address_contact_no"=>"required",
        //       "Per_mail"=>"required",
        //       "Of_mail"=>"required",
        //       "Salary_account_bank_name"=>"required",
        //       "Salary_account_bank_ac_no"=>"required",
        //       "DOJ_of_current_company"=>"required",
        //       "Total_work_expirence"=>"numeric",
        //       "Reference_1_name"=>"required",
        //       "Reference_1_contact_no"=>"numeric|min:10",
        //       "Reference_1_complete_address"=>"required",
        //       "Relation_1_type"=>"required",
        //       "Reference_2_name"=>"required",
        //       "Reference_2_contact_no"=>"numeric|min:10",
        //       "Reference_2_complete_address"=>"required",
        //       "Relation_2_type"=>"required"
        //     ]);

        $pr_info= PersonalInfoFrom::where('pr_form_of_user',$id)->first();
        $pr_info->Original_Name=$request->Original_Name;
        $pr_info->Education_Qualification=$request->Education_Qualification;
        $pr_info->Marital_Status=$request->Marital_Status;
        $pr_info->Spouse_name=$request->Spouse_name;
        $pr_info->Spouse_DOB=$request->Spouse_DOB;
        $pr_info->Father_Name=$request->Father_Name;
        $pr_info->Mother_Name=$request->Mother_Name;
        $pr_info->Current_Address=$request->Current_Address;
        $pr_info->Residence_Mobile_No=$request->Residence_Mobile_No;
        $pr_info->Current_Address_Landmark=$request->Current_Address_Landmark;
        $pr_info->Resi_type=$request->resi_type;
        $pr_info->No_of_years_cur_resi=$request->No_of_years_cur_resi;
        $pr_info->No_of_years_cur_city=$request->No_of_years_cur_city;
        $pr_info->Pr_Address=$request->Pr_Address;
        $pr_info->Pr_Address_mobile_no=$request->Pr_Address_mobile_no;
        $pr_info->Pr_Address_Landmark=$request->Pr_Address_Landmark;
        $pr_info->Of_Address=$request->Of_Address;
        $pr_info->Of_Address_Landmark=$request->Of_Address_Landmark;
        $pr_info->Of_Address_contact_no=$request->Of_Address_contact_no;
        $pr_info->Per_mai=$request->Per_mail;
        $pr_info->Of_mail=$request->Of_mail;
        $pr_info->Salary_account_bank_name=$request->Salary_account_bank_name;
        $pr_info->Salary_account_bank_ac_no=$request->Salary_account_bank_ac_no;
        $pr_info->DOJ_of_current_company=$request->DOJ_of_current_company;
        $pr_info->Total_work_expirence=$request->Total_work_expirence;
        $pr_info->Reference_1_name=$request->Reference_1_name;
        $pr_info->Reference_1_contact_no=$request->Reference_1_contact_no;
        $pr_info->Reference_1_complete_address=$request->Reference_1_complete_address;
        $pr_info->Relation_1_type=$request->Relation_1_type;
        $pr_info->Reference_2_name=$request->Reference_2_name;
        $pr_info->Reference_2_contact_no=$request->Reference_2_contact_no;
        $pr_info->Reference_2_complete_address=$request->Reference_2_complete_address;
        $pr_info->Relation_2_type=$request->Relation_2_type;

        if($pr_info->save())
        {
            Session::flash('updated', 'This is a message!');
            return redirect()->route('PersonalInfoAdmin.show',$id);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
