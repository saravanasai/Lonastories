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
    public function store(Request $request)
    {

       $insert_to_table=$request->table;
        //if the request is from obligation breakdown
        if($insert_to_table==1)
        {
            $ob_break_down=new ObligationBreakDown();
            $ob_break_down->ob_to_enquiery=$request->enqid;
            $ob_break_down->ob_of_cus=$request->cusid;
            $ob_break_down->ob_Loan_type=$request->loanType;
            $ob_break_down->ob_Bank_name=$request->bankName;
            $ob_break_down->ob_Loan_amount=$request->loanAmount;
            $ob_break_down->ob_roi=$request->rateOfInterest;
            $ob_break_down->ob_tennure=$request->tennure;
            $ob_break_down->ob_emi=$request->emi;
            $ob_break_down->ob_comp_emi=$request->ob_comp_emi;
            $ob_break_down->ob_pos=$request->pos;
            $ob_break_down->ob_bt=$request->bt;
            $ob_break_down->save();


            //after storeing it geting again the data to view it
            $get_back_data=ObligationBreakDown::where("ob_to_enquiery",'=',$request->enqid)
            ->where("ob_of_cus","=",$request->cusid)->get();
            return json_encode($get_back_data);

        }
         //end of the request is from obligation breakdown
        //  insert into cr_table
         elseif($insert_to_table==2)
         {
            $cr_break_down=new CreditBreakDown();
            $cr_break_down->cr_to_enquiery=$request->enqid;
            $cr_break_down->cr_of_cus=$request->cusid;
            $cr_break_down->cr_Bank_name=$request->crBankName;
            $cr_break_down->cr_card_limit=$request->cr_limit;
            $cr_break_down->cr_card_outstanding=$request->cr_card_outstanding;
            $cr_break_down->cr_emi=$request->cr_emi;
            $cr_break_down->cr_bt=$request->cr_bt;
            $cr_break_down->save();
            //after storeing it geting again the data to view it
            $get_back_data=CreditBreakDown::where("cr_to_enquiery",'=',$request->enqid)
            ->where("cr_of_cus","=",$request->cusid)->get();

            return json_encode($get_back_data);
         }
         //  end of insert into cr_table
         //  insert into el_table
         elseif($insert_to_table==3)
         {
            $el_break_down=new MultiplierEligibility();
            $el_break_down->el_to_enquiery=$request->enqid;
            $el_break_down->el_of_cus =$request->cusid;
            $el_break_down->el_Bank_name=$request->el_bank_name;
            $el_break_down->el_employee_category=$request->el_emp_cat;
            $el_break_down->el_multiplier=$request->el_multiplier;
            $el_break_down->el_foir=$request->el_foir;
            $el_break_down->el_mutiplier_eligibility=$request->el_mul_eligibility;
            $el_break_down->el_roi=$request->el_roi;
            $el_break_down->el_emi_per_lak=$request->el_emi_per_lak;
            $el_break_down->el_foir_eligibility=$request->el_emi_foir_eligibility;
            $el_break_down->save();
            //after storeing it geting again the data to view it
            $get_back_data=MultiplierEligibility::where("el_to_enquiery",'=',$request->enqid)
            ->where("el_of_cus","=",$request->cusid)->get();
            return json_encode($get_back_data);
         }
         //  end of insert into el_table
         //insert into additional details for HL PROFILE
         else if($insert_to_table==4)
         {
             $hl_aditional_info=new Hl_profile_additional();
             $hl_aditional_info->hl_to_enquiery=$request->enqid;
             $hl_aditional_info->hl_of_cus=$request->cusid;
             $hl_aditional_info->hl_age=$request->hl_age;
             $hl_aditional_info->hl_property_type=$request->hl_property_type;
             $hl_aditional_info->hl_builder_name=$request->hl_builder_name;
             $hl_aditional_info->hl_property_value=$request->hl_property_value;
             $hl_aditional_info->hl_property_area=$request->hl_property_area;
             $hl_aditional_info->hl_property_city=$request->hl_property_city;
             $hl_aditional_info->hl_gross_salary=$request->hl_gross_salary;
             $hl_aditional_info->hl_net_salary=$request->hl_net_salary;
             $hl_aditional_info->hl_co_joint=$request->hl_co_joint;
             $hl_aditional_info->save();

             return 1;
         }
         //insert into hl_loan_comparison
         elseif($insert_to_table==5)
         {
            $ln_comparison_table=new Hl_profile_loan_comparison();
            $ln_comparison_table->ln_com_to_enquiery=$request->enqid;
            $ln_comparison_table->ln_com_of_cus=$request->cusid;
            $ln_comparison_table->ex_ln_loan_amount=$request->ex_ln_loan_amount;
            $ln_comparison_table->ex_ln_tennure=$request->ex_ln_tennure;
            $ln_comparison_table->ex_ln_roi=$request->ex_ln_roi;
            $ln_comparison_table->ex_ln_emi=$request->ex_ln_emi;
            $ln_comparison_table->ex_ln_pos=$request->ex_ln_pos;
            $ln_comparison_table->ex_ln_no_of_emi_paid=$request->ex_ln_no_of_emi_paid;
            $ln_comparison_table->ex_ln_balance_emi=$request->ex_ln_balance_emi;
            $ln_comparison_table->ex_ln_exsting_out_flow=$request->ex_ln_exsting_out_flow;
            $ln_comparison_table->ln_com_new_loan_amount=$request->ln_com_new_loan_amount;
            $ln_comparison_table->ln_com_new_roi=$request->ln_com_new_roi;
            $ln_comparison_table->ln_com_new_tennure=$request->ln_com_new_tennure;
            $ln_comparison_table->ln_com_new_emi=$request->ln_com_new_emi;
            $ln_comparison_table->ln_com_new_proposed_outflow=$request->ln_com_new_proposed_outflow;
            $ln_comparison_table->ln_com_new_gross_sav=$request->ln_com_new_gross_sav;
            $ln_comparison_table->ln_com_motd=$request->ln_com_motd;
            $ln_comparison_table->ln_com_pro_fee=$request->ln_com_pro_fee;
            $ln_comparison_table->ln_com_ot_charges=$request->ln_com_ot_charges;
            $ln_comparison_table->ln_com_total_cost=$request->ln_com_total_cost;
            $ln_comparison_table->ln_com_net_sav=$request->ln_com_net_sav;
            $ln_comparison_table->save();
            return 1;
         }
         elseif ($insert_to_table==6)
         {
             $hl_el_info=new HomeLoanEligibility();
             $hl_el_info->hl_el_to_enquiery=$request->enqid;
             $hl_el_info->hl_el_of_cus=$request->cusid;
             $hl_el_info->hl_bank_name=$request->hl_bank_name;
             $hl_el_info->hl_ltv=$request->hl_ltv;
             $hl_el_info->hl_ltv_eligibility=$request->hl_ltv_eligibility;
             $hl_el_info->hl_foir=$request->hl_foir;
             $hl_el_info->hl_roi=$request->hl_roi;
             $hl_el_info->hl_tenure=$request->hl_tenure;
             $hl_el_info->hl_emi_per_lak=$request->hl_emi_per_lak;
             $hl_el_info->hl_emi_foir_eligibility=$request->hl_emi_foir_eligibility;
             $hl_el_info->save();
             $get_back_data=HomeLoanEligibility::where("hl_el_to_enquiery",'=',$request->enqid)
            ->where("hl_el_of_cus","=",$request->cusid)->get();
            return json_encode($get_back_data);

         }
         //insert into finalbreakDown table
         else{

            try{

            $this->cus_id=$request->cusid;
            $this->enq_id=$request->enqid;//storing this to process pdf
            $final_break_down=new FinalBreakDown();
            $final_break_down->fn_to_enquiery=$request->enqid;
            $final_break_down->fn_of_cus =$request->cusid;
            $final_break_down->final_loan_amount=$request->final_loan_amount;
            $final_break_down->final_rate_of_interest=$request->final_rate_of_interest;
            $final_break_down->final_tennure=$request->final_tennure;
            $final_break_down->final_emi=$request->final_emi;
            $final_break_down->final_proposed_total_emi=$request->final_proposed_total_emi;
            $final_break_down->final_current_foir=$request->final_current_foir;
            $final_break_down->final_proposed_foir=$request->final_proposed_foir;
            $final_break_down->Final_page_remarks=$request->Final_page_remarks;
            $final_break_down->final_mon_1_salary=$request->final_sal_mon1;
            $final_break_down->final_mon_2_salary=$request->final_sal_mon2;
            $final_break_down->final_mon_3_salary=$request->final_sal_mon3;
            $final_break_down->final_salary_considered=$request->final_salary_considered;
            $final_break_down->final_obligation_considered=$request->final_obligation_considered;
            $final_break_down->final_ob_pos_sum_of_bt_yes=$request->final_ob_pos_sum_of_bt_yes;
            $final_break_down->final_ob_pos_sum_of_bt_no=$request->final_ob_pos_sum_of_bt_no;
            $final_break_down->final_ob_emi_sum_of_bt_yes=$request->final_ob_emi_sum_of_bt_yes;
            $final_break_down->final_ob_emi_sum_of_bt_no=$request->final_ob_emi_sum_of_bt_no;
            $final_break_down->final_cr_emi_sum_of_bt_yes=$request->final_cr_emi_sum_of_bt_yes;
            $final_break_down->final_cr_emi_sum_of_bt_no=$request->final_cr_emi_sum_of_bt_no;

             if( $final_break_down->save())
             {
                 //changing the profile genration value to 1 after profile genrated
                    $cl_enquiery=ClEnquiery::where('id',$this->enq_id)
                    ->where('enquiery_of_ucs',$this->cus_id)->first();
                    $cl_enquiery->profile_gen_status=1;
                    $cl_enquiery->overall_status_of_customer=9;
                     $cl_enquiery->save();
                //end changing the profile genration value to 1 after profile genrated

                // pdf generation and saving  to the database and moving to local storage
                $print=AdminBreakDownController::makePdf($this->cus_id,$this->enq_id);

                $file_name="LN".$this->enq_id."FOR".$this->cus_id;
                Storage::put('public/pdf/'.$file_name.'.pdf', $print->output());

                $offer_pdf=new OfferPdf();
                $offer_pdf->pdf_of_enq=$this->enq_id;
                $offer_pdf->pdf_of_cus=$this->cus_id;
                $offer_pdf->pdf_name=$file_name;
                $offer_pdf->save();

                return json_encode(["enq_id"=>$this->enq_id,"cus_id"=>$this->cus_id]);

             }


            }
            catch(PDOException $e)
            {
                dd($e);
            }

         }
         //End insert into finalbreakDown table
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
