<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\PersonalInfoFrom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PerosnalInfoAdminController extends Controller
{


    public function AddInfoIndex($id)
    {
        dd($id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        Session::put('cus_id',$id);
        $user_info=CustomerSignup::where('id',$id)->first();
        $pr_form=PersonalInfoFrom::where('pr_form_of_user',$id)->first();
        return view('AdminUserView.personalInfoIndex',['user_info'=>$user_info,'pr_form'=>$pr_form]);
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
