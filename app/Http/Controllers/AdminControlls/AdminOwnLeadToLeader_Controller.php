<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\caller;
use App\Models\CustomerSignup;
use App\Models\OwnLeadsToCaller;
use Illuminate\Http\Request;

class AdminOwnLeadToLeader_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("ok");
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
        $ownLeadsbyCaller=new OwnLeadsToCaller();
        $cus_master=CustomerSignup::where('id',$request->userid)->first();
        $cus_master->cus_tb_assigned_to=$request->leaderid;
        $ownLeadsbyCaller->cus_m_tb_cus_id=$request->userid;
        $ownLeadsbyCaller->assigned_to_leader=$request->leaderid;

         if($ownLeadsbyCaller->save()&&$cus_master->save())
         {
               return 1;
         }
         else
         {
             return 0;
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
        //this method $id is customer id to find customer and to assign a leader for that enquiery
        $caller_info=caller::where('power','=','Leader')->paginate(5);
        // dd($caller_info);
        return view('adminviews.ownLeadToLeader',["caller_info"=>$caller_info,"cus_id"=>$id]);
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
         $user_info =CustomerSignup::where('id',$id)->first();
         $user_info->cus_tb_assigned_to='ADMIN';
         if($user_info->save())
         {
             return 1;
         }
         else
         {
             return 0;
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
        //
    }
}
