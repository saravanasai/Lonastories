<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\files\UserMandatoryDocuments;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class EnquieryOfCustomerView extends Controller
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
    public function show($id)
    {
        $user_enquiery=ClEnquiery::join('table_customer','cl_enquieries.enquiery_of_ucs','=','table_customer.id')
         ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
         ->join('products','cl_enquieries.loan_product_id','=','products.id')
         ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
         ->join('offer_pdfs','cl_enquieries.id','=','offer_pdfs.pdf_of_enq')
         ->select('table_customer.*','cl_enquieries.*','cl_enquieries.id as enq_id','products.*','subproducts.*','statuses.*','offer_pdfs.*')
         ->where('cl_enquieries.enquiery_of_ucs',$id)->paginate(6);
            // dd($user_enquiery);
         return view('adminviews.cusManagementEnquieryview',["user_enquiery"=>$user_enquiery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //this function helps to download user mandatory documents
        $user_man_documents=UserMandatoryDocuments::where('doc_of_user',$id)->first();
        if($user_man_documents!=null)
        {
            return view('adminviews.CusManagementManDocDownload',["user_man_documents"=>$user_man_documents]);
        }
        else
        {

           return back()->with('error','NOT DOCUMENTS AVALIABLE');
        }


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
