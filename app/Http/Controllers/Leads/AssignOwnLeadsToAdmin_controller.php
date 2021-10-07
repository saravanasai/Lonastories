<?php

namespace App\Http\Controllers\Leads;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEnqieryForm;
use App\Models\Products;
use App\Models\Status\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignOwnLeadsToAdmin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $status_codes=Status::where('id','<',8)->where('id','>',1)->get();

        $new_own_leads=DB::table('customer_enqiery_forms')
        ->join('table_customer', 'customer_enqiery_forms.eqy_of_cus_enq_tb', '=', 'table_customer.id')
        ->join('statuses', 'statuses.id', '=', 'customer_enqiery_forms.cs_enq_status_enq_tb')
        ->select('table_customer.*','table_customer.id AS cus_id','customer_enqiery_forms.*','customer_enqiery_forms.id as enq_id','statuses.*')
        ->where('customer_enqiery_forms.cs_enq_status_enq_tb','<=','6')
        ->where('customer_enqiery_forms.cs_enq_status_enq_tb','!=','7')
        ->where('customer_enqiery_forms.initial_assign_to','=','ADMIN')
        ->get();

        // dd($new_own_leads);
       return view('adminviews.ownLeadToadmin',["new_own_leads"=>$new_own_leads,"status_code"=>$status_codes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_quick_enquiery=CustomerEnqieryForm::where('eqy_of_cus_enq_tb','=',$request->cusid)
        ->where('cs_enq_status_enq_tb','!=','0')
        ->first();
        $cl_table=new ClEnquiery();
        $cl_table->enquiery_cus_ph=$request->phonenumber;
        $cl_table->enquiery_of_ucs=$request->cusid;
        $cl_table->initial_assign_to=$customer_quick_enquiery->initial_assign_to;
        $cl_table->companyname=$request->companyname;
        $cl_table->take_home_salary=$request->takehomesalary;
        $cl_table->total_obligation=$request->totalobligation;
        $cl_table->no_of_credit_card=$request->no_of_credit_card;
        $cl_table->no_of_credit_card_outstanding=$request->no_of_credit_card_outstanding;
        $cl_table->credit_card_obligation=$request->credit_card_obigation;
        $cl_table->sa_ac_bank_id=$request->sa_bank_account;
        $cl_table->loan_product_id=$request->type_of_loan;
        $cl_table->loan_product_sub_id=$request->loan_sub_product;
        $cl_table->final_obligation =$request->final_obligation;
        $cl_table->existing_foir =$request->existing_foir;
        $cl_table->loan_amount_required =$request->loan_amount_required;
        $cl_table->current_loation=$request->current_location;
        $cl_table->additional_details =$request->additional_detail;
        $cl_table->overall_status_of_customer=$request->cus_over_all_status;

           if($customer_quick_enquiery!=null)
           {
            $customer_master=CustomerSignup::where('id','=',$request->cusid)->first();
            $customer_master->enquiery_form_status=0;
            $customer_quick_enquiery->cs_enq_status_enq_tb=0;
            $customer_quick_enquiery->save();
            $customer_master->save();
           }

        if($cl_table->save())
        {
            return 1;
        }
        else
        {
            return 0;
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
        $customer_info=CustomerSignup::where('id',$id)->first();
        $customer_enquiery=CustomerEnqieryForm::where('eqy_of_cus_enq_tb',$id)->first();
        $products=Products::all();
        $status_codes=Status::where('id','<',9)->where('id','>',4)->get();
        // dd($customer_enquiery);
        // dd($customer_info);
        return view('adminviews.fillmoreInfoAdmin',["products"=>$products,"customer_info"=>$customer_info,"status_code"=>$status_codes,"enq_id"=>$customer_enquiery->id,"customer_enquiery"=>$customer_enquiery]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enquiery=CustomerEnqieryForm::where('customer_enqiery_forms.id',$id)
        ->join('products','customer_enqiery_forms.product_type','products.id')
        ->join('table_customer','customer_enqiery_forms.eqy_of_cus_enq_tb','table_customer.id')
        ->join('subproducts','customer_enqiery_forms.sub_product_type_eq_tb','subproducts.id')
        ->first();
        // dd($enquiery);
        return view('adminQuickEnquiery.ViewQuickEnquieryFormAdminAfterIntailAssign',compact('enquiery'));
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

        if($request->status_Code==7)
        {
            $customer_info=CustomerEnqieryForm::where('id',$id)->first();
            $customer_info->cs_enq_status_enq_tb=$request->status_Code;
            $customer_id=$customer_info->eqy_of_cus_enq_tb;
            //   dd($customer_info);
            $customer_master=CustomerSignup::where('id','=',$customer_id)->first();
            $customer_master->enquiery_form_status=0;
            $customer_master->save();
        }
        else
        {
            $customer_info=CustomerEnqieryForm::where('id',$id)->first();
            $customer_info->cs_enq_status_enq_tb=$request->status_Code;
            $customer_id=$customer_info->eqy_of_cus_enq_tb;
        }

        if($customer_info->save())
        {
            return 1;
        }else
        {
            return 0;
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
