<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Mail\DirectReferalLink;
use App\Models\CustomerSignup;
use App\Models\Cutomer\DirectReferal;
use App\Service\DirectReferalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
    public function store(Request $request,DirectReferalService $service)
    {

        if($service->checkReferalExits($request->refer_to_cus_phonenumber))
        {
            if($service->AddDirectReferal($request))
            {
                return redirect()->back()->with('directReferalSubmited', 'IT WORKS!');
            }
        }
        else
        {
            return redirect()->back()->with('customerExist','IT WORKS!');
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
