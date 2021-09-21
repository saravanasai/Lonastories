<?php

namespace App\Http\Controllers\LeaderControlls;

use App\Http\Controllers\Controller;
use App\Models\Cutomer\CustomerEnqieryForm;
use Illuminate\Http\Request;

class EnquieryManagementDirectLeads_InitialAssign extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_Quick_enquiery=CustomerEnqieryForm::join('telecaller','customer_enqiery_forms.initial_assign_to','=','telecaller.id')
        ->join('statuses','customer_enqiery_forms.cs_enq_status_enq_tb','=','statuses.id')
        ->join('table_customer','customer_enqiery_forms.eqy_of_cus_enq_tb','=','table_customer.id')
        ->select('customer_enqiery_forms.*','customer_enqiery_forms.id as q_enq_id','telecaller.*','statuses.*','table_customer.*')
        ->where('customer_enqiery_forms.initial_assign_to','!=','ADMIN')
        ->where('customer_enqiery_forms.cs_enq_status_enq_tb','!=','0')->paginate(6);
        // dd($new_Quick_enquiery);
        return view('AdminEnquieryViews.InitialAssignToLeader',["new_Quick_enquiery"=>$new_Quick_enquiery]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $enquiery=CustomerEnqieryForm::where('customer_enqiery_forms.id',$id)
        ->join('products','customer_enqiery_forms.product_type','products.id')
        ->join('table_customer','customer_enqiery_forms.eqy_of_cus_enq_tb','table_customer.id')
        ->join('subproducts','customer_enqiery_forms.sub_product_type_eq_tb','subproducts.id')
        ->select('customer_enqiery_forms.id as q_enq_id','customer_enqiery_forms.*','table_customer.*','products.*','subproducts.*')
        ->first();
        // dd($enquiery);
        // dd($customer_info);
        return view('AdminEnquieryViews.MoreinfoofDirectLeads',["cl_enquiery"=>$enquiery]);
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
