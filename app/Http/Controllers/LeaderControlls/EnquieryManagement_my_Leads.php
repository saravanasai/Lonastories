<?php

namespace App\Http\Controllers\LeaderControlls;

use App\Http\Controllers\Controller;
use App\Models\ClEnquiery;
use App\Models\TeleCallerEnquiery;
use Illuminate\Http\Request;

class EnquieryManagement_my_Leads extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads_by_telecaller=TeleCallerEnquiery::join('telecaller','tele_caller_enquieries.telecaller_id','=','telecaller.id')
        ->select('tele_caller_enquieries.*','tele_caller_enquieries.id as tc_enq_id','telecaller.*')
        ->where('tele_caller_enquieries.telecaller_id',session('caller')->id)
        ->get();
        // dd($leads_by_telecaller);
        return view('callerQuickEnquiery.TodayLeadsByMe',['leads_by_telecaller'=>$leads_by_telecaller]);
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
        $cl_enquiery=ClEnquiery::join('tele_caller_enquieries','cl_enquieries.enquiery_cus_ph','=','tele_caller_enquieries.cus_Phone_number')
        ->join('products','cl_enquieries.loan_product_id','products.id')
        ->join('subproducts','cl_enquieries.loan_product_sub_id','subproducts.id')
        ->where('enquiery_cus_ph',$id)
        ->where('tele_caller_enquieries.telecaller_id',session('caller')->id)
        ->where('initial_assign_to',null)->first();

        return view('callerQuickEnquiery.MoreinfoofmyLead',["cl_enquiery"=>$cl_enquiery]);
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
