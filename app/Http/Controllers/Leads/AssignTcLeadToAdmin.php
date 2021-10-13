<?php

namespace App\Http\Controllers\Leads;

use App\Http\Controllers\Controller;
use App\Models\caller;
use App\Models\CustomerSignup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignTcLeadToAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customer_info=DB::table('cl_enquieries')
        ->join('table_customer', 'cl_enquieries.enquiery_of_ucs', '=', 'table_customer.id')
        ->join('statuses', 'statuses.id', '=', 'cl_enquieries.overall_status_of_customer')
        ->select('table_customer.*','table_customer.id AS cus_id','cl_enquieries.*','statuses.*','cl_enquieries.id AS enq_id')
        ->where('cl_enquieries.ready_to_break_down','=','0')
        ->where('cl_enquieries.overall_status_of_customer','!=','7')
        ->where('cl_enquieries.Final_assign_after_more_info_cl_tb','=','0')
        ->where('cl_enquieries.enquiery_of_ucs','!=','0')
        ->get();
        // dd($customer_info);
        return view('adminviews.LeadByTelCalAssignedToAdmin',compact('customer_info'));
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
        // dd($id);
        $more_info=DB::table('cl_enquieries')
        ->join('products', 'cl_enquieries.loan_product_id', '=', 'products.id')
        ->join('subproducts','cl_enquieries.loan_product_sub_id', '=','subproducts.id')
        ->join('table_customer','cl_enquieries.enquiery_of_ucs', '=','table_customer.id')
        ->select('cl_enquieries.*','products.*','subproducts.*','table_customer.*','cl_enquieries.id AS enq_id','table_customer.id AS cus_id')
        ->where('cl_enquieries.Final_assign_after_more_info_cl_tb','=','0')
        ->where('cl_enquieries.id','=',$id)
        ->first();
        //geting leaders list to give assign to leader option
        $leader_info=caller::where('power','Leader')->where('status','ACTIVE')->paginate(5);
        // dd($more_infomation);
        return view('adminviews.moredetailview',["more_info"=>$more_info,"leader_info"=>$leader_info]);
        // return redirect()->route('detailview.index')->with('more_info',$more_info);
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
