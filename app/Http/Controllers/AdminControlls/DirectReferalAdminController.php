<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Mail\DirectRefferalLinkResend;
use App\Models\Cutomer\DirectReferal;
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
         $email=$refered_customer->refered_cus_email;
        //  Mail::to($email)->send(new DirectRefferalLinkResend($id));
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
}
