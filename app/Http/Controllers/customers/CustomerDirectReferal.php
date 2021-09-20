<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\DirectReferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerDirectReferal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customerviews.customerDirectRefferal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //need to validate on intergation with frontend
        $get_user_referal_id=CustomerSignup::where('id','=',$request->refer_by_cus_id)->first();
        $url="http://localhost:8000/user/signup/".$get_user_referal_id->cus_referal_code."/referal/2x";

        $direct_referal= new DirectReferal();
        $direct_referal->direct_ref_of_user=$request->refer_by_cus_id;
        $direct_referal->refered_cus_name=$request->refer_to_cus_name;
        $direct_referal->refered_cus_phonenumber=$request->refer_to_cus_phonenumber;
        $direct_referal->refered_cus_email=$request->refer_to_cus_email;
        $direct_referal->refered_cus_relationship=$request->refer_to_relationship;
        $direct_referal->refered_url=$url;

        if($direct_referal->save())
        {
            Log::channel('telecallerlink')->info($url);
            return redirect('/home');
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
        //
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
