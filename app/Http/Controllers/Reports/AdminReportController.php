<?php

namespace App\Http\Controllers\Reports;
use App\Exports\AllCustomer;
use App\Exports\ConvertedEnquieryExport;
use App\Exports\CustomerdirectreferalExport;
use App\Exports\CustomerIndirectreferalExport;
use App\Exports\NonConvertedEnquieryExport;
use App\Http\Controllers\Controller;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\Cutomer\DirectReferal;
use App\Models\LeadsConverted\ConvertedFeilds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AdminReportController extends Controller
{
    public function AllCustomerView()
    {
        $all_customer=CustomerSignup::paginate(10);
        return view('AdminReports.Allcustomerreport',["customer"=>$all_customer]);
    }

    public function AllCustomerView_export(Request $request)
    {
        return Excel::download(new AllCustomer, 'customer.xlsx');
    }

    public function ReferalOfCustomer()
    {

        return view('AdminReports.ReferalofCustomer');
    }
           //this actually works as redirection for reports  by its referaltype as table
    public function ReferalOfCustomer_search(Request $request)
    {
           //checking the type of referal
           $referaltype=$request->type_of_ref;

            if($referaltype==3)
            {

                return route('allEnquieryofCustomer.view',[$request->from_date,$request->to_date,$request->Report_type]);

            }
           //1.means Indirect referal looks on master customer table
           //2.means direct referal looks on direct referal page
           $customer_info=CustomerSignup::where('cus_phonenumber',$request->cus_ph_no)->first();
           if($customer_info==null)
           {
            return json_encode(["data"=>"NOT A VALID CUSTOMER"]);
           }
           $cus_referal_id=$customer_info->cus_referal_code;
           $cus_id=$customer_info->id;
           if($referaltype==1)
           {
                 $refered_cus_info=CustomerSignup::where('refered_by',$cus_referal_id)->first();
                    // dd($refered_cus_info!=null);
                 if($refered_cus_info!=null)
                 {
                   return route('IndirectReferalOfCustomer.index',$cus_referal_id);
                 }
                 else
                 {
                    return 0;
                 }

           }
           else
           {
                $refered_cus_info=DirectReferal::where('direct_ref_of_user',$cus_id)->first();

                  if($refered_cus_info!=null)
                  {
                    return route('directReferalOfCustomer.index',$cus_id);
                 }
                 else
                 {
                    return 2;
                 }

           }


    }

    public function IndirectReferalOfCustomer($cus_referal_id)
    {

         $refered_cus_list=CustomerSignup::where('refered_by',$cus_referal_id)->paginate(10);

           return view('AdminReports.CustomerIndirectReferal',["refered_cus_list"=>$refered_cus_list,"cus_referal_id"=>$cus_referal_id]);

    }
    public function directReferalOfCustomer($id)
    {

         $refered_cus_list=DirectReferal::where('direct_ref_of_user',$id)->paginate(10);

           return view('AdminReports.CustomerdirectReferal',["refered_cus_list"=>$refered_cus_list,"ref_user_id"=>$id]);

    }

    public function IndirectReferalOfCustomer_export(Request $request)
    {
        return Excel::download(new CustomerIndirectreferalExport($request->cus_referal_id), ''.$request->cus_referal_id.'.xlsx');
    }
    public function directReferalOfCustomer_export(Request $request)
    {
        return Excel::download(new CustomerdirectreferalExport($request->ref_user_id), 'DirectReferal'.$request->ref_user_id.'.xlsx');
    }

    public function allEnquieryofCustomer()
    {
        return view('AdminReports.AllEnquieryOfCustomer');
    }
    public function allEnquieryofCustomer_view($from_date,$to_date,$Report_type)
    {
            if($Report_type==1)
            {
                $user_enquiery=ClEnquiery::join('table_customer','cl_enquieries.enquiery_of_ucs','=','table_customer.id')
                ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
                ->join('products','cl_enquieries.loan_product_id','=','products.id')
                ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
                ->join('banks','cl_enquieries.sa_ac_bank_id','=','banks.id')
                ->join('converted_feilds','cl_enquieries.id','=','converted_feilds.con_lead_of_enquiery')
                ->select('table_customer.*','cl_enquieries.*','cl_enquieries.id as enq_id','products.*','subproducts.*','banks.*','statuses.*','converted_feilds.*')
                ->whereBetween(DB::raw("(DATE(converted_feilds.created_at))"), [$from_date, $to_date])
                ->get();
                return view('AdminReports.AllEnquieryOfCustomer_view',["user_info"=>$user_enquiery,"from_date"=>$from_date,"to_date"=>$to_date]);
            }
            else
            {
                $user_enquiery=ClEnquiery::join('table_customer','cl_enquieries.enquiery_of_ucs','=','table_customer.id')
                ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
                ->join('products','cl_enquieries.loan_product_id','=','products.id')
                ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
                ->join('banks','cl_enquieries.sa_ac_bank_id','=','banks.id')
                ->select('table_customer.*','cl_enquieries.*','cl_enquieries.id as enq_id','cl_enquieries.created_at as crt','cl_enquieries.updated_at as upd','products.*','subproducts.*','banks.*','statuses.*')
                ->whereBetween(DB::raw("(DATE(cl_enquieries.created_at))"), [$from_date, $to_date])
                ->get();
                // dd($user_enquiery);
                return view('AdminReports.AllEnquieryOfCustomer_non_con_view',["user_info"=>$user_enquiery,"from_date"=>$from_date,"to_date"=>$to_date]);
            }

    }

    public function ConvertedEnquieryReports_export(Request $request)
    {
        return Excel::download(new ConvertedEnquieryExport($request->from_date,$request->to_date), 'Converted_case'.date('Y-m-d').'.xlsx');
    }
    public function NonConvertedEnquieryReports_export(Request $request)
    {
        return Excel::download(new NonConvertedEnquieryExport($request->from_date,$request->to_date), 'Non_Converted_Case'.date('Y-m-d').'.xlsx');
    }
}
