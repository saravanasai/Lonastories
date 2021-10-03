<?php

namespace App\Http\Controllers\LeaderControlls;

use App\Http\Controllers\Controller;
use App\Models\AdminBreakDownModel\Hl_profile_additional;
use App\Models\AdminBreakDownModel\Hl_profile_loan_comparison;
use App\Models\AdminBreakDownModel\HomeLoanEligibility;
use App\Models\ClEnquiery;
use App\Models\CreditBreakDown;
use App\Models\CustomerSignup;
use App\Models\FinalBreakDown;
use App\Models\LeadsConverted\ConvertedFeilds;
use App\Models\MultiplierEligibility;
use App\Models\ObligationBreakDown;
use App\Models\OfferPdf;
use Illuminate\Http\Request;

class EnquieryManagementBreakDown extends Controller
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

        $customer_enquiery=ClEnquiery::join('products','cl_enquieries.loan_product_id','=','products.id')
        ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
        ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
        ->select('cl_enquieries.*','cl_enquieries.id as enq_id','products.*','subproducts.*','statuses.*')
        ->where('cl_enquieries.id',$id)
        ->first();
        $cus_id=$customer_enquiery->enquiery_of_ucs;
        $enq_id=$customer_enquiery->enq_id;
        $customer_basic_info=CustomerSignup::where('id',$cus_id)->first();
        $customer_additional_details=0;
        $ln_comparison_table=0;
        $hl_el_table=0;
        $customer_el_breakDown=0;
        if($customer_enquiery->loan_product_id==2 || $customer_enquiery->loan_product_id==4)
        {
            $customer_additional_details=Hl_profile_additional::where('hl_of_cus',$cus_id)->where('hl_to_enquiery',$id)->first();
            $ln_comparison_table=Hl_profile_loan_comparison::where('ln_com_of_cus',$cus_id)->where('ln_com_to_enquiery',$id)->first();
            $hl_el_table=HomeLoanEligibility::where('hl_el_of_cus',$cus_id)->where('hl_el_to_enquiery',$id)->get();
        }
        else{

            $customer_el_breakDown=MultiplierEligibility::where('el_of_cus',$cus_id)->where('el_to_enquiery',$id)->get();
        }

        $customer_ob_breakDown=ObligationBreakDown::where('ob_of_cus',$cus_id)->where('ob_to_enquiery',$id)->get();
        $customer_cr_breakDown=CreditBreakDown::where('cr_of_cus',$cus_id)->where('cr_to_enquiery',$id)->get();
        $customer_fn_breakDown=FinalBreakDown::where('fn_of_cus',$cus_id)->where('fn_to_enquiery',$id)->first();
        $offer_pdf=OfferPdf::where('pdf_of_enq',$id)->where('pdf_of_cus',$cus_id)->first();

        $data=[
            "basic_info"=>$customer_basic_info,
            "enquiery_details"=>$customer_enquiery,
            "additional_details"=>$customer_additional_details,
            "ln_comparison"=>$ln_comparison_table,
            "ob_details"=>$customer_ob_breakDown,
            "cr_details"=>$customer_cr_breakDown,
            "hl_el_table"=>$hl_el_table,
            "el_details"=>$customer_el_breakDown,
            "fn_details"=>$customer_fn_breakDown,
            "pdf"=>$offer_pdf,
            "enq_id"=>$enq_id
        ];
        // dd($data);
        return view('AdminEnquieryViews.VIewForBreakDown',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $con_feilds=ConvertedFeilds::where('con_lead_of_enquiery',$id)->first();
        if($con_feilds!=null)
        {
            return view('AdminEnquieryViews.VIewForConvertedCase',compact('con_feilds'));
        }
        else
        {
            return redirect()->back()->with('error','Currently Unavaiable');
        }
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
