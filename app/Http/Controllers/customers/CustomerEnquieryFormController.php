<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEnqieryForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class  CustomerEnquieryFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_info=CustomerSignup::where('id',session('customer')->id)->first();
        return view('customerviews.customerEnquieryForm',compact("user_info"));
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
               "enq_time"=>"required",
               "enq_pre_mode"=>"required",
               "enq_emp_type"=>"required",
               "enq_pro_type"=>"required",
               "enq_sub_pro_type"=>"required",
               "enq_cibil_score"=>"required",
           ]);

           $quick_enquiery_form=new CustomerEnqieryForm();
           $quick_enquiery_form->eqy_of_cus_enq_tb=$request->cus_id;
           $quick_enquiery_form->time_to_call=$request->enq_time;
           $quick_enquiery_form->mode_of_contact=$request->enq_pre_mode;
           $quick_enquiery_form->emp_type=$request->enq_emp_type;
           $quick_enquiery_form->product_type=$request->enq_pro_type;
           $quick_enquiery_form->sub_product_type_eq_tb=$request->enq_sub_pro_type;
           $quick_enquiery_form->cibil_score=$request->enq_cibil_score;
           $quick_enquiery_form->save();
           //updating the master customer table cus_enquiery_form status to 1
           $customer_master=CustomerSignup::where('id',session('customer')->id)->first();
           $customer_master->enquiery_form_status=1;
           $customer_master->save();
           //end updating the master customer table cus_enquiery_form status to 1

           return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get_user_referal_id=CustomerSignup::where('id',$id)->first();
        $url="http://localhost:8000/user/signup/".$get_user_referal_id->cus_referal_code."/referal";
        Log::channel('telecallerlink')->info($url);
        return view('customerviews.csutomerEnquieryForm',compact('url'));
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
