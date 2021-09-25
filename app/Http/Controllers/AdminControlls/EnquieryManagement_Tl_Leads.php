<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\ClEnquiery;
use App\Models\Cutomer\PersonalInfoFrom;
use App\Models\TeleCallerEnquiery;
use Illuminate\Http\Request;

class EnquieryManagement_Tl_Leads extends Controller
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
        ->where('tele_caller_enquieries.tele_cal_dl','!=','0')
        ->paginate(6);
        // dd($leads_by_telecaller);
        return view('AdminEnquieryViews.TodayLeadsByTeleCaller',['leads_by_telecaller'=>$leads_by_telecaller]);
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
        ->where('initial_assign_to',null)->first();

    return view('AdminEnquieryViews.MoreinfoofTelecallerLead',["cl_enquiery"=>$cl_enquiery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $pr_form=PersonalInfoFrom::where('pr_form_of_user',$id)->first();
         return view('AdminEnquieryViews.PersonalInfoFormView',compact('pr_form'));
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
         $tele_caller=TeleCallerEnquiery::where('cus_Phone_number',$id)->first();
         $tele_caller->tele_cal_dl=0;
          if($tele_caller->save())
          {
              return redirect()->back();
          }
    }
}
