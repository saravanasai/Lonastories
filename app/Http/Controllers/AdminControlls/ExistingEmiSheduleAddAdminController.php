<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEmiShedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ExistingEmiSheduleAddAdminController extends Controller
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


         $this->validate($request,[
             "Bank_Name"=>"required",
             "type_of_loan"=>"required",
             "loan_amount"=>"required|numeric",
             "roi"=>"required|numeric",
             "Tenure"=>"required|numeric",
             "existing_emi"=>"numeric"
            ]);

            if($request->file('Emi_Shedule'))
            {
                $file=$request->file('Emi_Shedule');
                $file_name="SH".$request->cus_id."OF".rand(1000,60000).".pdf";

                $existing_loan_info=new CustomerEmiShedule();
                $existing_loan_info->emi_shedule_of_user=$request->cus_id;
                $existing_loan_info->emi_sh_name_of_bank=$request->Bank_Name;
                $existing_loan_info->emi_sh_type_of_loan=$request->type_of_loan;
                $existing_loan_info->emi_sh_loan_amount=$request->loan_amount;
                $existing_loan_info->emi_sh_roi=$request->roi;
                $existing_loan_info->emi_sh_tenure =$request->Tenure;
                $existing_loan_info->emi_sh_emi=$request->existing_emi;
                $existing_loan_info->emi_sh_file=$file_name;
                $existing_loan_info->emi_shedule_status=1;

                 //updating the status in customer master table

                 $customer_master=CustomerSignup::where('id',$request->cus_id)->first();
                 $customer_master->customer_one_view_status=1;


                if($existing_loan_info->save() && $customer_master->save())
                {
                  Storage::put('ExsitingShedules/'.$file_name, file_get_contents($file));
                  Session::flash('success','added successfully');
                  return redirect()->route('ExistingLoans.show',$request->cus_id);
                }
                else
                {
                    return redirect()->back();
                }

            }else{
                $existing_loan_info=new CustomerEmiShedule();
                $existing_loan_info->emi_shedule_of_user=$request->cus_id;
                $existing_loan_info->emi_sh_name_of_bank=$request->Bank_Name;
                $existing_loan_info->emi_sh_type_of_loan=$request->type_of_loan;
                $existing_loan_info->emi_sh_loan_amount=$request->loan_amount;
                $existing_loan_info->emi_sh_roi=$request->roi;
                $existing_loan_info->emi_sh_tenure =$request->Tenure;
                $existing_loan_info->emi_sh_emi=$request->existing_emi;
                $existing_loan_info->emi_shedule_status=0;


                 //updating the status in customer master table

                 $customer_master=CustomerSignup::where('id',$request->cus_id)->first();
                 $customer_master->customer_one_view_status=1;


                if($existing_loan_info->save() && $customer_master->save())
                {
                  Session::flash('success','added successfully with out file');
                  return redirect()->route('ExistingLoans.show',$request->cus_id);
                }
                else
                {
                    return redirect()->back();
                }
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
        return view('AdminUserView.existing_loan_create_admin',["cus_id"=>$id]);
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
        //
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
