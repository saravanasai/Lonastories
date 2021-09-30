<?php

namespace App\Http\Controllers;

use App\Mail\TelecallerLinkmail;
use App\Models\Bank;
use Nexmo\Laravel\Facade\Nexmo;
use App\Models\caller;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEnqieryForm;
use App\Models\Products;
use App\Models\TeleCallerEnquiery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class CallerController extends Controller
{


   public function callerlogin()
   {
      return view('auth.callerlogin');
   }

     public function checklogin(Request $request)
     {

           $this->validate($request,[
               "phonenumber"=>"required|min:10|max:10",
               "password"=>"required"
           ]);

          $caller_info=caller::where('phonenumber',$request->phonenumber)->first();
             if($caller_info)
             {
                   if(Hash::check($request->password, $caller_info->password))
                   {
                        if($caller_info->status=="ACTIVE")
                        {
                            Session::put("caller",$caller_info);

                            return redirect()->route('caller.dashboard');
                        }
                        else
                        {
                            return  back()->with("status","YOU HAVE BEEN BLOCKED");
                        }

                   }
                   else
                   {
                    return  back()->with("status","PASSWORD DOES NOT MATCHED");
                   }
             }
             else
             {
                 return  back()->with("status","NO A VALID USER");
             }

     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('caller.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $caller_info=caller::where('dl_status','!=','1')->paginate(5);

       return view('caller.view',["caller_info"=>$caller_info]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $ph_check=caller::where('phonenumber',$request->phonenumber)->first();

         if($ph_check)
         {
             return 0;
         }
         else
         {
            $caller=new caller();
            $caller->firstname=$request->firstname;
            $caller->lastname=$request->lastname;
            $caller->phonenumber=$request->phonenumber;
            $caller->adharnumber=$request->adharnumber;
            $caller->password= Hash::make($request->password);
            $caller->status="ACTIVE";
            $caller->power=$request->power;

           if($caller->save())
           {
               return 1 ;
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
       $caller_info=caller::where('id',$id)->first();
       if($caller_info->status=="ACTIVE")
       {
           $caller_info->status="DISABLED";
           $caller_info->save();
           return 1;
       }else
       {
           $caller_info->status="ACTIVE";
           $caller_info->save();
           return 1;
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caller_info=caller::where('id',$id)->first();
         return view('adminviews.callerEditView',compact('caller_info'));
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

    //   dd($request->caller_adhar_number);
        $this->validate($request,[
            "caller_first_name"=>"required",
            "caller_last_name"=>"required",
            "caller_phone_number"=>"numeric|min:10",
            "caller_adhar_number"=>"required|numeric|min:12",
            "caller_power"=>"required"
        ]);

       $caller_info=caller::where('id',$id)->first();
       $caller_info->firstname=$request->caller_first_name;
       $caller_info->lastname=$request->caller_last_name;
       $caller_info->phonenumber=$request->caller_phone_number;
       $caller_info->adharnumber=$request->caller_adhar_number;
       $caller_info->power=$request->caller_power;
       if($request->change_password!="")
       {
        $caller_info->password=Hash::make($request->change_password);
       }

       if($caller_info->save())
       {

           return redirect()->route('caller.create')->with('success','Updated Successfully');
       }
       else
       {
           return redirect()->back();
           dd("not ok");
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
        $caller_info=caller::where('id',$id)->first();
        $caller_info->dl_status=1;
        $caller_info->status='DISABLED';
        if($caller_info->save())
        {
            return 1;
        }
        else
        {
            return 0;
        }

    }

     public function callerprofile($id)
     {
         $caller_info=caller::where('id',$id)->first();

         return view('caller.callerprofile',["my_info"=>$caller_info]);
     }

    public function callerdashboard()
    {

        $new_enq_assigned_count=CustomerEnqieryForm::where('initial_assign_to',session('caller')->id)
        ->where('cs_enq_status_enq_tb','1')->count();
        $new_assiged_leads=DB::table('table_customer')
        ->join('cl_enquieries', 'table_customer.id', '=', 'cl_enquieries.enquiery_of_ucs')
        ->where('cl_enquieries.Final_assign_after_more_info_cl_tb','=',session('caller')->id)
        ->where('cl_enquieries.enq_close_status','=',"1")
        ->count();
        $converted_Leads=CustomerSignup::join('cl_enquieries','table_customer.id','=','cl_enquieries.enquiery_of_ucs')
        ->where('cl_enquieries.Final_assign_after_more_info_cl_tb','=',session('caller')->id)
        ->where('cl_enquieries.enq_close_status','=',"1")
        ->where('cl_enquieries.profile_accepted_status',1)->count();
        $leads_by_me=TeleCallerEnquiery::join('telecaller','tele_caller_enquieries.telecaller_id','=','telecaller.id')
        ->where('tele_caller_enquieries.tele_cal_dl',1)
        ->where('tele_caller_enquieries.telecaller_id',session('caller')->id)
        ->count();
        return view('callerdashboard',['new_enq_count'=>$new_enq_assigned_count,"assigned_count"=>$new_assiged_leads,"con_leads"=>$converted_Leads,"my_leads"=>$leads_by_me]);
    }



    public function entry()
    {

        $products=Products::all();
        return view('caller.newcustomer',["products"=>$products]);
    }

     public function StoreNewCustomer(Request $request)
     {




         $caller=caller::where('id',session('caller')->id)->first();
         $checking_for_exist=TeleCallerEnquiery::where('cus_Phone_number',$request->phonenumber)->first();
        if($checking_for_exist==null)
         {

            $enquiery= $caller->telecallerenquiery()->create([
                "cus_first_name"=>$request->firstname,
                "cus_last_name"=>$request->lastname,
                "cus_Phone_number"=>$request->phonenumber,
                "cus_email"=>$request->email,
             ]);

             $mail_to=$request->email;
             $more_details=new ClEnquiery();
             $more_details->enquiery_cus_ph=$request->phonenumber;
             $more_details->enquiery_of_ucs=0;
             $more_details->companyname=$request->companyname;
             $more_details->take_home_salary=$request->takehomesalary;
             $more_details->total_obligation=$request-> totalobligation;
             $more_details->no_of_credit_card=$request->no_of_credit_card;
             $more_details->no_of_credit_card_outstanding=$request-> no_of_credit_card_outstanding;
             $more_details->credit_card_obligation =$request->credit_card_obigation;
             $more_details->sa_ac_bank_id=$request->sa_bank_account;
             $more_details->loan_product_id=$request-> type_of_loan;
             $more_details->loan_product_sub_id=$request->loan_sub_product;
             $more_details->final_obligation=$request->final_obligation;
             $more_details->existing_foir=$request->existing_foir;
             $more_details->loan_amount_required=$request-> loan_amount_required;
             $more_details->current_loation=$request-> current_location;
             $more_details->additional_details=$request->additional_detail;


                   if($caller->telecallerenquiery()->save($enquiery) && $more_details->save())
                   {

                     $url=env('APP_URL')."/user/signup/".session('caller')->id."/referal";
                     Log::channel('telecallerlink')->info($url);
                     Mail::to($mail_to)->send(new TelecallerLinkmail($url));
                     return 1;
                   }
                   else
                   {
                     return 0;
                   }

         }
         else
         {
             //error code for if phone number already eixits
             return 2;
         }




     }

     //function to handle the request form a telecaller entry form for subproducts by products id
        protected function handleSubProductRequest(Request $request)
        {

            $products=Products::where('id',$request->productid)->first();
            $subproducts=$products->sub_products()->get();
             return json_encode($subproducts);

        }
     //end of function to handle the request form a telecaller entry form for subproducts by products id


}
