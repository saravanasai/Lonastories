<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEnqieryForm;
use App\Models\TeleCallerEnquiery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("auth.adminlogin");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.adminregister');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
              "username"=>"required",
              "password"=>"required|min:3"
          ]);

         $admin = new admin();
         $admin->USERNAME=$request->username;
         $admin->ADMIN_PASSWORD=Hash::make($request->password);

          if( $admin->save())
          {
            return redirect()->route('create');
          }


    }

  public function adminlogin(Request $request)
  {

    $this->validate($request,[
        "username"=>"required",
        "password"=>"required|min:3"
    ]);


    $db_repsonse=admin::where('USERNAME','=',$request->username)->first();

     if(Hash::check($request->password,$db_repsonse->ADMIN_PASSWORD))
     {
           Session::put("admin",$db_repsonse);
          return redirect()->route('admindashboard');
     }else
     {
          return back()-with("login_status","Error on Login attemt");
     }




  }

  public function showadminpanel()
  {

    //   $new_enquiry=CustomerSignup::where('enquiery_form_status','=','1')->get();
      $new_enquiry=CustomerEnqieryForm::where('cs_enq_status_enq_tb','=','1')
      ->where('initial_assign_to',null)->get();
      $tele_enquiry=TeleCallerEnquiery::where('cus_id','=','0')
      ->where('tele_cal_dl',1)->get();
      $all_customer=CustomerSignup::all();
      $new_referal_user=CustomerEnqieryForm::join('table_customer','customer_enqiery_forms.eqy_of_cus_enq_tb','=','table_customer.id')
            ->select('table_customer.*','customer_enqiery_forms.*','table_customer.id as cus_id','customer_enqiery_forms.id as qu_enq_id')
            ->where('initial_assign_to','=',null)
            ->where('table_customer.refered_by','like','LN%')
            ->get();
      $new_enq_count=count($new_enquiry);
      $new_tel_count=count($tele_enquiry);
      $all_cus=count($all_customer);
      $all_ref_cus=count($new_referal_user);
      return view('admindashboard',["new_enq"=>$new_enq_count,"new_tel_enq"=>$new_tel_count,"all_cus"=>$all_cus,"all_ref"=>$all_ref_cus]);
  }

  public function logout(Request $request)
  {
          if(session()->has('admin'))
          {
            session()->pull('admin');
            return redirect()->route('login.index');
          }
          if(session()->has('caller'))
          {
            session()->pull('caller');
            return redirect()->route('caller.login');
          }

  }


 public function NewLeadsbycaller()
 {
         $new_user=DB::table('table_customer')
        ->join('telecaller','telecaller.id','=','table_customer.refered_by')
        ->join('cl_enquieries','table_customer.id','=','cl_enquieries.enquiery_of_ucs')
        ->where('cl_enquieries.initial_assign_to','=',null)
        ->select('*','table_customer.id as cus_id','cl_enquieries.id as enq_id')
        ->paginate(6);
        // dd($new_user);
        return view('adminviews.newcustomerbytelecaller',compact('new_user'));
 }

 public function NewLeadsbyown()
 {

    $new_user=CustomerEnqieryForm::join('table_customer','customer_enqiery_forms.eqy_of_cus_enq_tb','=','table_customer.id')
            ->select('table_customer.*','customer_enqiery_forms.*','table_customer.id as cus_id','customer_enqiery_forms.id as qu_enq_id')
            ->where('initial_assign_to','=',null)->paginate(6);
       return view('adminviews.newcustomer',compact('new_user'));
 }

        public function NewLeadsbyCustomerReferal()
        {
            $new_user=CustomerEnqieryForm::join('table_customer','customer_enqiery_forms.eqy_of_cus_enq_tb','=','table_customer.id')
            ->select('table_customer.*','customer_enqiery_forms.*','table_customer.id as cus_id','customer_enqiery_forms.id as qu_enq_id')
            ->where('initial_assign_to','=',null)
            ->where('table_customer.refered_by','like','LN%')
            ->paginate(6);
            // dd($new_user);
            return view('adminviews.NewLeadsbyCustomerReferal',compact('new_user'));
        }


}
