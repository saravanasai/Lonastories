<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\AdminBreakDownModel\Hl_profile_additional;
use App\Models\AdminBreakDownModel\Hl_profile_loan_comparison;
use App\Models\AdminBreakDownModel\HomeLoanEligibility;
use App\Models\ClEnquiery;
use App\Models\CreditBreakDown;
use App\Models\CustomerSignup;
use App\Models\FinalBreakDown;
use App\Models\MultiplierEligibility;
use App\Models\ObligationBreakDown;
use App\Models\OfferPdf;
use App\Service\BreakDownService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use PDOException;

class AdminBreakDownController extends Controller
{

    protected $cus_id;//for development
    protected $enq_id;//for development

    //uitility function
    public static function makePdf($cus_id,$enqid)

    {
        $customer_additional_details=0;
        $ln_comparison_table=0;
        $customer_hl_el_breakDown=0;
        $customer_ob_breakDown=0;
        $customer_cr_breakDown=0;
        $customer_el_breakDown=0;

         $customer_basic_info=CustomerSignup::where('id',$cus_id)->first();
         $customer_enquiery=ClEnquiery::join('products','cl_enquieries.loan_product_id','=','products.id')
         ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
            ->where('cl_enquieries.id',$enqid)
            ->first();
         if($customer_enquiery->loan_product_id==2 || $customer_enquiery->loan_product_id==4)
         {
            $customer_ob_breakDown=ObligationBreakDown::where('ob_of_cus',$cus_id)->where('ob_to_enquiery',$enqid)->get();
            $customer_cr_breakDown=CreditBreakDown::where('cr_of_cus',$cus_id)->where('cr_to_enquiery',$enqid)->get();
            $customer_el_breakDown=MultiplierEligibility::where('el_of_cus',$cus_id)->where('el_to_enquiery',$enqid)->get();
            $customer_additional_details=Hl_profile_additional::where('hl_of_cus',$cus_id)->where('hl_to_enquiery',$enqid)->first();
            $ln_comparison_table=Hl_profile_loan_comparison::where('ln_com_of_cus',$cus_id)->where('ln_com_to_enquiery',$enqid)->first();
            $customer_hl_el_breakDown=HomeLoanEligibility::where('hl_el_of_cus',$cus_id)->where('hl_el_to_enquiery',$enqid)->get();
         }
          else
          {
            $customer_ob_breakDown=ObligationBreakDown::where('ob_of_cus',$cus_id)->where('ob_to_enquiery',$enqid)->get();
            $customer_cr_breakDown=CreditBreakDown::where('cr_of_cus',$cus_id)->where('cr_to_enquiery',$enqid)->get();
            $customer_el_breakDown=MultiplierEligibility::where('el_of_cus',$cus_id)->where('el_to_enquiery',$enqid)->get();
          }
         $customer_fn_breakDown=FinalBreakDown::where('fn_of_cus',$cus_id)->where('fn_to_enquiery',$enqid)->first();

         $data=[
             "basic_info"=>$customer_basic_info,
             "enquiery_details"=>$customer_enquiery,
             "additional_details"=>$customer_additional_details,
             "ln_comparison"=>$ln_comparison_table,
             "ob_details"=>$customer_ob_breakDown,
             "cr_details"=>$customer_cr_breakDown,
             "el_details"=>$customer_el_breakDown,
             "hl_el_details"=>$customer_hl_el_breakDown,
             "fn_details"=>$customer_fn_breakDown
         ];

                PDF::setOptions(['dpi' => 200, 'isHtml5ParserEnabled'=>true,'defaultFont' => 'sans-serif']);
                $pdf = PDF::loadView('customerviews.customerPdf', $data);



        return $pdf;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //section to view a  leads ready to Break Down
          $new_user=DB::table('table_customer')
          ->join('cl_enquieries', 'table_customer.id', '=', 'cl_enquieries.enquiery_of_ucs')
          ->join('statuses','cl_enquieries.overall_status_of_customer', '=', 'statuses.id')
          ->select('table_customer.*','cl_enquieries.*','statuses.*')
          ->where('cl_enquieries.Final_assign_after_more_info_cl_tb','=','ADMIN')
          ->where('table_customer.enquiery_form_status','=',"0")
          ->where('cl_enquieries.profile_gen_status','=',"0")
          ->select('*','table_customer.id as cus_id','cl_enquieries.*','cl_enquieries.id as enq_id')
          ->paginate(6);
        //   dd($new_user);
          return view('adminviews.LeadsReadyToBreakDown',compact('new_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($enq_id,$cus_id)
    {


            // _______only for develpment purpose______//

                // $print=AdminBreakDownController::makePdf($this->cus_id,$this->enq_id);
                // return $print->download('Loanstories.pdf');

            // _______only for develpment purpose______//




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,BreakDownService $service)
    {

       return  $service->handle_breakDown($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cus_info=CustomerSignup::join('cl_enquieries','table_customer.id','=','cl_enquieries.enquiery_of_ucs')
        ->join('products','cl_enquieries.loan_product_id','=','products.id')
        ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
        ->select('*','table_customer.id AS cus_id','products.*','subproducts.*','cl_enquieries.id AS enq_id')
        ->where('cl_enquieries.id','=',$id)
        ->first();
        // dd($cus_info);
        $refferd_by="Direct";
        $cus_refered_by=CustomerSignup::where('cus_referal_code',$cus_info->refered_by)->first();
        if($cus_refered_by!=null)
        {
            $refferd_by= $cus_refered_by->name;
        }
        return view('adminviews.breakDownViewForAdmin',compact(['cus_info','refferd_by']));
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
     //using the update function to delete the information
    public function update(Request $request, $id)
    {
        $insert_to_table=$request->table;
        //if the request is from obligation breakdown
        if($insert_to_table==1)
        {
            $ob_del=ObligationBreakDown::where('id',$id)->first();
            if($ob_del->delete())
            {
                $get_back_data=ObligationBreakDown::where("ob_to_enquiery",'=',$request->enqid)
            ->where("ob_of_cus","=",$request->cusid)->get();

            return json_encode($get_back_data);

            }
        }

            elseif($insert_to_table==2)
            {


            $cr_del=CreditBreakDown::where('id',$id)->first();

            if($cr_del->delete())
            {

                $get_back_data_cr=CreditBreakDown::where("cr_to_enquiery",'=',$request->enqid)
                ->where("cr_of_cus","=",$request->cusid)->get();
                return json_encode($get_back_data_cr);

            }
        }elseif($insert_to_table==3)
        {
            $el_del=MultiplierEligibility::where('id',$id)->first();

            if($el_del->delete())
            {

                $get_back_data_el=MultiplierEligibility::where("el_to_enquiery",'=',$request->enqid)
                ->where("el_of_cus","=",$request->cusid)->get();
                return json_encode($get_back_data_el);

            }
        }
        elseif($insert_to_table==6)
        {
            $hl_del=HomeLoanEligibility::where('id',$id)->first();

            if($hl_del->delete())
            {

                $get_back_data=HomeLoanEligibility::where("hl_el_to_enquiery",'=',$request->enqid)
                ->where("hl_el_of_cus","=",$request->cusid)->get();
                return json_encode($get_back_data);

            }
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

    public function pdfcreate($cusid,$enqid)
    {

        // dd($enqid."\t".$cusid);
        $pdf=OfferPdf::where('pdf_of_enq',$enqid)
        ->where('pdf_of_cus',$cusid)->first();
        return view('adminviews.pdfDownload',["pdf"=>$pdf->pdf_name]);
    }

}
