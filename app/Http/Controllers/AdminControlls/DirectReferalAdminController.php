<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Mail\DirectRefferalLinkResend;
use App\Models\CustomerSignup;
use App\Models\Cutomer\DirectReferal;
use App\Models\Products;
use App\Models\Status\Status;
use App\Service\DirectReferalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DirectReferalAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directRefferal_user=DirectReferal::join('table_customer','direct_referals.direct_ref_of_user','=','table_customer.id')
        ->select('table_customer.*','direct_referals.*')->where('s_del_dir_ref',0)->paginate(6);

        return view('adminviews.DirectreferalAdminView',["dir_ref_user"=>$directRefferal_user]);
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
         // this methode trigges the resend the url to user
         $refered_customer=DirectReferal::where('id',$id)->first();
         $phoneNumber=$refered_customer->refered_cus_phonenumber;
        //  Mail::to($email)->send(new DirectRefferalLinkResend($id));
        //section for resend link via sms gateway
         return 1;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $direct_ref_info=DirectReferal::where('id',$id)->first();
         return view('adminviews.CreateUserFromAdminSide',["direct_ref_info"=>$direct_ref_info]);
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

        $directRefferal_user =DirectReferal::where('id',$id)->first();
        $directRefferal_user->s_del_dir_ref=1;
        if($directRefferal_user->save())
        {
            return 1;
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

    }


    public function createAccountFormAdmin(Request $request,DirectReferalService $service)
    {

        $this->validate($request,[
            "username"=>"required",
            "phonenumber"=>"required|max:10",
            "email"=>"required|email",
            "dob"=>"required",
        ]);

        if($service->points_to_refered_cus($request->ref_by_cus,$request))
        {
            if($service->update_to_direct_ref($request->phonenumber))
            {
                $cus_info=$service->register_customer($request);
                return redirect()->route('EnquierycreateAccountFormAdmin',$cus_info->id);

            }
        }



    }
    public function EnquierycreateAccountFormAdmin($id)
    {
        $customer_info=CustomerSignup::where('id',$id)->first();
        $products=Products::all();
        $status_codes=Status::where('id','<',9)->where('id','>',4)->get();
        return view('adminviews.FillMoreInfoAdminAccountCreate',["products"=>$products,"customer_info"=>$customer_info,"status_code"=>$status_codes]);
    }
}
