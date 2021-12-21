<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\QuickEnquieryRequest;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEnqieryForm;
use App\Models\Products;
use App\Service\CustomerEnquieyService\CustomerEnquieyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class  CustomerEnquieryFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::all();
        $user_info=CustomerSignup::where('id',session('customer')->id)->first();
        return view('customerviews.customerEnquieryForm',["user_info"=>$user_info,"products"=>$products]);
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
    public function store(QuickEnquieryRequest $request , CustomerEnquieyService $service)
    {
            if($service->handleCustomerService($request))
            {
                return redirect()->route('home')->with('enquierySubmited','Form submited');
            }
            else
            {
                return response("Internal Server Error",501);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get_user_referal_id=CustomerSignup::where('id',$id)->first();
        $url="http://localhost:8000/user/signup/".$get_user_referal_id->cus_referal_code."/referal";
        Log::channel('telecallerlink')->info($url);
        return view('customerviews.csutomerEnquieryForm',compact('url'));
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
