<?php

namespace App\Http\Controllers\LeaderControlls;

use App\Http\Controllers\Controller;
use App\Models\caller;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\files\UserMandatoryDocuments;
use App\Models\LeadsConverted\ConvertedFeilds;
use App\Models\OfferPdf;
use App\Models\Status\Status;
use Illuminate\Http\Request;

class feildForConCaseLeader_LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fill_converted_feilds=CustomerSignup::join('cl_enquieries','table_customer.id','=','cl_enquieries.enquiery_of_ucs')
        ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
        ->select('table_customer.*','table_customer.id AS cus_id','cl_enquieries.*','cl_enquieries.id AS enq_id','statuses.*')
        ->where('cl_enquieries.profile_gen_status',1)
        ->where('cl_enquieries.documents_collected_status',1)
        ->where('cl_enquieries.overall_status_of_customer','<',18)
        ->where('cl_enquieries.profile_accepted_status',1)->paginate(6);
        return view('callerviews.ConvertedCases',["fill_converted_feilds"=>$fill_converted_feilds]);
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

        $to_table=$request->table;

          if($to_table==1)
          {
            $con_lead_re_login=ConvertedFeilds::where('con_lead_of_enquiery',$request->enqid)
            ->where('con_lead_of_cus',$request->cusid)->first();
            $cl_enquiery_table=ClEnquiery::where('id',$request->enqid)
            ->where('enquiery_of_ucs',$request->cusid)->first();
            $cl_enquiery_table->overall_status_of_customer=$request->update_status;
            $con_lead_re_login->con_lead_bank_name=$request->lead_bank_name;
            $con_lead_re_login->con_lead_vendor_name=$request->lead_vendor_name;
            $con_lead_re_login->con_lead_loan_amount_applied=$request->lead_loan_amount_applied;
            $con_lead_re_login->con_lead_login_ref_no=$request->lead_login_ref_no;
            $con_lead_re_login->con_lead_status=$request->update_status;

            if($cl_enquiery_table->save() && $con_lead_re_login->save())
            {
                return 1;
            }
            else
            {
                return 0;
            }
          }
          elseif($to_table==2)
          {
                $con_lead_re_login=ConvertedFeilds::where('con_lead_of_enquiery',$request->enqid)
                ->where('con_lead_of_cus',$request->cusid)->first();
                $cl_enquiery_table=ClEnquiery::where('id',$request->enqid)
                ->where('enquiery_of_ucs',$request->cusid)->first();
                $con_lead_re_login->con_lead_login_ref_no=$request->login_ref_no;
                $con_lead_re_login->con_lead_loan_amount_aproved=$request->loan_amount_aproved;
                $con_lead_re_login->con_lead_roi=$request->roi;
                $con_lead_re_login->con_lead_tennure=$request->emi;
                $con_lead_re_login->con_lead_emi=$request->tennure;
                $con_lead_re_login->con_lead_insurance_status=$request->insurance_status;
                $con_lead_re_login->con_lead_pf_gst=$request-> pf_gst;
                $con_lead_re_login->con_lead_stamp_duty=$request->stamp_duty;
                $con_lead_re_login->con_lead_gap_inter_emi=$request->gap_inter_emi;
                $con_lead_re_login->con_lead_insurance_premium=$request->insurance_premium;
                $con_lead_re_login->con_lead_other_charges=$request->other_charges;
                $con_lead_re_login->con_lead_status=$request->update_status;
                //
                $cl_enquiery_table->overall_status_of_customer=$request->update_status;
                if($cl_enquiery_table->save() && $con_lead_re_login->save())
                {
                    return 1;
                }
                else
                {
                    return 0;
                }

          }
          elseif($to_table==3)
          {
                $con_lead_re_login=ConvertedFeilds::where('con_lead_of_enquiery',$request->enqid)
                ->where('con_lead_of_cus',$request->cusid)->first();
                $cl_enquiery_table=ClEnquiery::where('id',$request->enqid)
                ->where('enquiery_of_ucs',$request->cusid)->first();
                $con_lead_re_login->con_lead_status=$request->update_status;
                //
                $cl_enquiery_table->overall_status_of_customer=$request->update_status;
                if($cl_enquiery_table->save() && $con_lead_re_login->save())
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
          }
          else
          {
                $con_lead=new ConvertedFeilds();
                $con_lead->con_lead_of_enquiery=$request->enqid;
                $con_lead->con_lead_of_cus=$request->cusid;
                $con_lead->con_lead_bussiness_name=$request->lead_bussiness_name;
                $con_lead->con_lead_lg_name=$request->lead_lg_name;
                $con_lead->con_lead_lc_name=$request->lead_lc_name;
                $con_lead->con_lead_source_team =$request->lead_source_team ;
                $con_lead->con_lead_channel=$request->lead_channel ;
                $con_lead->con_lead_bank_name=$request->lead_bank_name;
                $con_lead->con_lead_vendor_name=$request->lead_vendor_name;
                $con_lead->con_lead_loan_amount_applied=$request->lead_loan_amount_applied;
                $con_lead->con_lead_product_name=$request->lead_product_name;
                $con_lead->con_lead_sub_product_name=$request->lead_sub_product_name;
                $con_lead->con_lead_status=$request->lead_status;
                $con_lead->con_lead_remarks=$request->lead_remarks;
                $con_lead->con_lead_login_ref_no=$request->lead_login_ref_no;

                    //updating the overall customer status in Cl_enquiery table
                    $cl_enquiery=ClEnquiery::where('id',$request->enqid)
                    ->where('enquiery_of_ucs',$request->cusid)->first();
                    $cl_enquiery->overall_status_of_customer=$request->lead_status;
                    $cl_enquiery->con_lead_before_info=1;


                    if($con_lead->save()&&$cl_enquiery->save())
                    {
                        return 1;
                    }
                    else
                    {
                      return 0;
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
            //getting the enquiery id info
            $enquiery_details=CustomerSignup::join('cl_enquieries','table_customer.id','=','cl_enquieries.enquiery_of_ucs')
            ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
            ->join('products','cl_enquieries.loan_product_id','=','products.id')
            ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
            ->select('table_customer.*','table_customer.id AS cus_id','cl_enquieries.*','cl_enquieries.id AS enq_id','statuses.*','products.*','subproducts.*')
            ->where('cl_enquieries.id',$id)->first();
            // dd($enquiery_details);
            $enq_of_cus_id=$enquiery_details->cus_id;
            $cus_ref_id=$enquiery_details->refered_by;

             //getting the lead Generated Name
             $reffered_by="DIRECT";
             if($cus_ref_id!=0)
             {
                $lead_by_details=caller::where('id',$cus_ref_id)->first();
                if($lead_by_details!=null)
                {
                    $reffered_by=$lead_by_details->firstname."\t".$lead_by_details->lastname;
                }
                else
                {
                    $lead_by_cus=CustomerSignup::where('cus_referal_code',$cus_ref_id)->first();
                    $reffered_by=$lead_by_cus->name;
                }
             }

             //getting status for updating
             $status=Status::where('id','>',10)->where('id','<',12)->get();

            //getting offer pdf details for
            $offer_pdf=OfferPdf::where('pdf_of_enq',$id)
            ->where('pdf_of_cus',$enq_of_cus_id)->first();

            //getting manatoery document
            $mandatory_doc=UserMandatoryDocuments::where('doc_of_user',$enq_of_cus_id)->first();

            //enquiery doc name
            $enq_doc_name=$enquiery_details->enq_doc_name;
            $offer_pdf_name=$offer_pdf->pdf_name;
            $mandatory_doc_pan_name=$mandatory_doc->Pan_card;
            $mandatory_doc_adhar_name=$mandatory_doc->Adhar_card;

            return view('callerviews.convertedLeadsShow',["customer_info"=>$enquiery_details,"doc_name"=>$enq_doc_name,"pancard"=>$mandatory_doc_pan_name,"adharcard"=>$mandatory_doc_adhar_name,"enq"=>$enq_doc_name,"offerpdf"=>$offer_pdf_name,"status_code"=>$status,"reffered_by"=>$reffered_by]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            //getting the enquiery id info
            $enquiery_details=CustomerSignup::join('cl_enquieries','table_customer.id','=','cl_enquieries.enquiery_of_ucs')
            ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
            ->join('products','cl_enquieries.loan_product_id','=','products.id')
            ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
            ->select('table_customer.*','table_customer.id AS cus_id','cl_enquieries.*','cl_enquieries.id AS enq_id','statuses.*','products.*','subproducts.*')
            ->where('cl_enquieries.id',$id)->first();
            // dd($enquiery_details);
            $enq_of_cus_id=$enquiery_details->cus_id;
            $cus_ref_id=$enquiery_details->refered_by;

             //getting the lead Generated Name
             $reffered_by="DIRECT";
             if($cus_ref_id!=0)
             {
                $lead_by_details=caller::where('id',$cus_ref_id)->first();
                if($lead_by_details!=null)
                {
                    $reffered_by=$lead_by_details->firstname."\t".$lead_by_details->lastname;
                }
                else
                {
                    $lead_by_cus=CustomerSignup::where('cus_referal_code',$cus_ref_id)->first();
                    $reffered_by=$lead_by_cus->name;
                }
             }

             //getting status for updating
             $status=Status::where('id','>',12)->get();

             //getting the converted feilds
             $converted_feilds_info=ConvertedFeilds::join('statuses','converted_feilds.con_lead_status','=','statuses.id')
             ->where('con_lead_of_enquiery',$id)
             ->where('con_lead_of_cus',$enq_of_cus_id)->first();
            //  dd($converted_feilds_info);
            //getting offer pdf details for
            $offer_pdf=OfferPdf::where('pdf_of_enq',$id)
            ->where('pdf_of_cus',$enq_of_cus_id)->first();

            //getting manatoery document
            $mandatory_doc=UserMandatoryDocuments::where('doc_of_user',$enq_of_cus_id)->first();

            //enquiery doc name
            $enq_doc_name=$enquiery_details->enq_doc_name;
            $offer_pdf_name=$offer_pdf->pdf_name;
            $mandatory_doc_pan_name=$mandatory_doc->Pan_card;
            $mandatory_doc_adhar_name=$mandatory_doc->Adhar_card;
            return view('callerviews.convertedLeadsEdit',["customer_info"=>$enquiery_details,"doc_name"=>$enq_doc_name,"pancard"=>$mandatory_doc_pan_name,"adharcard"=>$mandatory_doc_adhar_name,"enq"=>$enq_doc_name,"offerpdf"=>$offer_pdf_name,"status_code"=>$status,"reffered_by"=>$reffered_by,"converted_feilds_info"=> $converted_feilds_info]);
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
