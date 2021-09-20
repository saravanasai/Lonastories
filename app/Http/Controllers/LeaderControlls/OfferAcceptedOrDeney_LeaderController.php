<?php

namespace App\Http\Controllers\LeaderControlls;

use App\Http\Controllers\Controller;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\OfferPdf;
use Illuminate\Http\Request;

class OfferAcceptedOrDeney_LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer_acceptance=CustomerSignup::join('cl_enquieries','table_customer.id','=','cl_enquieries.enquiery_of_ucs')
        ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
        ->select('table_customer.*','table_customer.id AS cus_id','cl_enquieries.*','cl_enquieries.id AS enq_id','statuses.*')
        ->where('cl_enquieries.profile_gen_status',1)
        ->where('cl_enquieries.Final_assign_after_more_info_cl_tb','=',session('caller')->id)
        ->where('cl_enquieries.profile_accepted_status',0)->paginate(5);
        return view('callerviews.OfferAcceptanceOrDeney',["offered_cus"=>$offer_acceptance]);
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
        $customer_pdf=OfferPdf::where('pdf_of_enq',$id)->first();
         return view('callerviews.viewPdf',["pdf"=>$customer_pdf->pdf_name]);
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
        //its is used to update the status of acceptance of offer for a enquiery
        $enquiery=ClEnquiery::where('id',$id)->first();
        $enquiery->profile_accepted_status=$request->status;
        if($enquiery->save())
        {
            return 1;
        }
        else
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
