<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Wallet;
use App\Service\AdminUserProfileService;
use Illuminate\Http\Request;

class AdminUserProfileController extends Controller
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
    public function show($id,AdminUserProfileService $service)
    {
        $customer_info = CustomerSignup::where('id',$id)->first();
        $isRefByUser=$service->IsReferedByUser($customer_info);
         if($isRefByUser!=null)
         {
              //ref_on 1 means refered by user
            return view('adminviews.UserProfileAdminView',["customer_info"=>$customer_info,"isRefByUser"=>$isRefByUser,"ref_on"=>1]);
         }
         else
         {
             if($customer_info->refered_by!=0)
             {
                $isRefByUser=$service->IsReferedByTelcaller($customer_info);
             }
             //ref_on 2 means refered by Caller
             return view('adminviews.UserProfileAdminView',["customer_info"=>$customer_info,"isRefByUser"=>$isRefByUser,"ref_on"=>2]);
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

        $this->validate($request,[
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
            "dob"=>"required",
        ]);
        $customer_info = CustomerSignup::find($id);
        $customer_info->name=$request->name;
        $customer_info->cus_phonenumber=$request->phone;
        $customer_info->email=$request->email;
        $customer_info->dob=$request->dob;
        if($customer_info->save())
        {
            return redirect()->back()->with('infoUpdated','INFORMATIO FULLY UPDATED');
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

        $user = CustomerSignup::find($id);
        $wallet=Wallet::where('wallet_of_user',$id)->first();
        try{

            $wallet->delete();
            if($user->delete())
            {
                return redirect()->route('customer.master')->with('DeletedSuccesFully','Deleted');
            }
        }catch(\Exception $e)
        {
            return redirect()->back()->with('CannotDelete','UNABLE TO DELETE');
        }


    }
}
