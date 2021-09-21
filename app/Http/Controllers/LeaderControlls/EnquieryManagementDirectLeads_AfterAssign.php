<?php

namespace App\Http\Controllers\LeaderControlls;

use App\Http\Controllers\Controller;
use App\Models\ClEnquiery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnquieryManagementDirectLeads_AfterAssign extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_user=DB::table('table_customer')
        ->join('cl_enquieries', 'table_customer.id', '=', 'cl_enquieries.enquiery_of_ucs')
        ->join('statuses','cl_enquieries.overall_status_of_customer', '=', 'statuses.id')
        ->join('telecaller','cl_enquieries.Final_assign_after_more_info_cl_tb', '=', 'telecaller.id')
        ->select('table_customer.*','cl_enquieries.*','statuses.*')
        ->where('cl_enquieries.Final_assign_after_more_info_cl_tb','!=','ADMIN')
        ->where('table_customer.enquiery_form_status','=',"0")
        ->select('*','table_customer.id as cus_id','cl_enquieries.*','cl_enquieries.id as enq_id')
        ->paginate(6);
        // dd($new_user);
        return view('AdminEnquieryViews.AssignedOwnLeadsToLeader',['new_user'=>$new_user]);
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
        $more_infomation=DB::table('cl_enquieries')
        ->join('products', 'cl_enquieries.loan_product_id', '=', 'products.id')
        ->join('subproducts','cl_enquieries.loan_product_sub_id', '=','subproducts.id')
        ->join('table_customer','cl_enquieries.enquiery_of_ucs', '=','table_customer.id')
        ->select('cl_enquieries.*','products.*','subproducts.*','table_customer.*','table_customer.id as cus_id','cl_enquieries.id AS enq_id')
        ->where('cl_enquieries.id','=',$id)
        ->first();

        return view('AdminEnquieryViews.Enquierymoredetailview',["more_info"=>$more_infomation]);
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
