<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\caller;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\TeleCallerEnquiery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prophecy\Call\Call;

class
AdminLeadsByCaller_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $more_infomation=session('more_info');
        // //geting leaders list to give assign to leader option
        // $leader_info=caller::where('power','Leader')->get();
        // // dd($more_infomation);
        // return view('adminviews.moredetailview',["more_info"=>$more_infomation,"leader_info"=>$leader_info]);
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

        $assign=$request->asignid;
        // dd($request->all());
        //section to assign the customer to admin its self
        $caller_enquiery=ClEnquiery::where('id',$request->enq_id)->first();
        $tl_enquiery=TeleCallerEnquiery::where('cus_id',$request->userid)->first();

        // dd($tl_enquiery);
        if($tl_enquiery!=null)
        {
            $tl_enquiery->Final_assign_after_more_info_telecaller_table=$assign;
            $tl_enquiery->save();
        }

        $caller_enquiery->Final_assign_after_more_info_cl_tb=$assign;
        $caller_enquiery->ready_to_break_down=1;
        if($caller_enquiery->save())
        {
            return 1;
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

        // dd($id);
    //    //its returns the more detrails of enquiery
       $more_infomation=DB::table('cl_enquieries')
       ->join('products', 'cl_enquieries.loan_product_id', '=', 'products.id')
       ->join('subproducts','cl_enquieries.loan_product_sub_id', '=','subproducts.id')
       ->join('table_customer','cl_enquieries.enquiery_of_ucs', '=','table_customer.id')
       ->select('cl_enquieries.*','products.*','subproducts.*','table_customer.*','table_customer.id as cus_id','cl_enquieries.id AS enq_id')
       ->where('cl_enquieries.id','=',$id)
       ->first();
       //geting leaders list to give assign to leader option
       $leader_info=caller::where('power','Leader')->where('status','ACTIVE')->paginate(5);
        // dd($more_infomation);
        return view('adminviews.moredetailview',["more_info"=>$more_infomation,"leader_info"=>$leader_info]);
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

         //section to assign the the leader from admin side
         $caller_enquiery=ClEnquiery::where('enquiery_of_ucs',$id)->where('id',$request->enq_id)->first();
         $tl_enquiery=TeleCallerEnquiery::where('cus_id',$id)->first();
         if($tl_enquiery!=null)
         {
            $tl_enquiery->Final_assign_after_more_info_telecaller_table=$request->singleleaderid;
            $tl_enquiery->save();
         }
         $caller_enquiery->Final_assign_after_more_info_cl_tb=$request->singleleaderid;
         $caller_enquiery->ready_to_break_down=1;
         if($caller_enquiery->save())
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
        //
    }
}
