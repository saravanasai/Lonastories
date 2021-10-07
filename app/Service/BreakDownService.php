<?php

namespace App\Service;

use App\Http\Controllers\AdminControlls\AdminBreakDownController;
use App\Models\AdminBreakDownModel\Hl_profile_additional;
use App\Models\AdminBreakDownModel\Hl_profile_loan_comparison;
use App\Models\AdminBreakDownModel\HomeLoanEligibility;
use App\Models\ClEnquiery;
use App\Models\CreditBreakDown;
use App\Models\FinalBreakDown;
use App\Models\MultiplierEligibility;
use App\Models\ObligationBreakDown;
use App\Models\OfferPdf;
use Illuminate\Support\Facades\Storage;
use PDOException;

class BreakDownService {



    public function handle_breakDown($request)
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
            $el_break_down->el_mutiplier_eligibility_nth=$request->el_mul_eligibility_nth;
            $el_break_down->el_mutiplier_eligibility_sao=$request->el_mul_eligibility_sao;
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






}

?>
