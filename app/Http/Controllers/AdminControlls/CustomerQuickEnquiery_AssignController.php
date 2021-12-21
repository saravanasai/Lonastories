<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\caller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEnqieryForm;
use Illuminate\Http\Request;

class CustomerQuickEnquiery_AssignController extends Controller
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
        // tabel value 1 means assign to admin
        $to_table=$request->table;
        if($to_table==1)
        {
            $quick_enq_form=CustomerEnqieryForm::where('id',$request->q_enq_id)->first();
            $customer_master=CustomerSignup::where('id',$quick_enq_form->eqy_of_cus_enq_tb)->first();
            $customer_master->enquiery_form_status=0;
            $quick_enq_form->initial_assign_to='ADMIN';
            if($quick_enq_form->save() && $customer_master->save())
            {
                return redirect()->back()->with('success','Assign To Admin');
            }
        }
        else
        {
            $quick_enq_form=CustomerEnqieryForm::where('id',$request->q_enq_id)->first();
            $customer_master=CustomerSignup::where('id',$quick_enq_form->eqy_of_cus_enq_tb)->first();
            $customer_master->enquiery_form_status=0;
            $quick_enq_form->initial_assign_to=$request->leader_id;
            if($quick_enq_form->save() && $customer_master->save())
            {
                return redirect()->back()->with('success','Assign To Leader');
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

        $leader_info=caller::where('power','Leader')->where('status','ACTIVE')->paginate(5);
        $enquiery=CustomerEnqieryForm::where('customer_enqiery_forms.id',$id)
        ->join('products','customer_enqiery_forms.Product_intrested','products.id')
        ->join('table_customer','customer_enqiery_forms.eqy_of_cus_enq_tb','table_customer.id')
        ->select('customer_enqiery_forms.id as q_enq_id','customer_enqiery_forms.*','table_customer.*','products.*')
        ->first();
        // dd($enquiery);
        return view('adminQuickEnquiery.ViewQuickEnquieryFormAdmin',['enquiery'=>$enquiery,"leader_info"=>$leader_info]);
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
