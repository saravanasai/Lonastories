<?php

namespace App\Http\Controllers\LeaderControlls;

use App\Http\Controllers\Controller;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\files\UserMandatoryDocuments;
use App\Models\Status\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class offerAcceptedFileUploadLeader_LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status_codes=Status::all();
        $offer_accepted=CustomerSignup::join('cl_enquieries','table_customer.id','=','cl_enquieries.enquiery_of_ucs')
        ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
        ->select('table_customer.*','table_customer.id AS cus_id','cl_enquieries.*','cl_enquieries.id AS enq_id','statuses.*')
        ->where('cl_enquieries.profile_gen_status',1)
        ->where('cl_enquieries.documents_collected_status',0)
        ->where('cl_enquieries.profile_accepted_status',1)->paginate(6);
        // dd($offer_accepted);
            return view('callerviews.offerAccepted',["accepted_cus"=>$offer_accepted,"status_code"=>$status_codes]);
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
        $to_table=$request->cus_mand_file;
        //section if the request is from mandatoery file upload
        if($to_table==1)
        {
                $this->validate($request,[
                    "pancard"=>"required|mimes:pdf,jpeg",
                    "adharCard"=>"required|mimes:pdf,jpeg"
                ]);

                $pan_card=$request->file('pancard');
                $adhar_card=$request->file('adharCard');
                $pan_card_file_name='LN'.$request->cus_id.'PAN.'.$pan_card->getClientOriginalExtension();
                $adhar_card_file_name='LN'.$request->cus_id.'ADHAR.'.$adhar_card->getClientOriginalExtension();


                Storage::put('userDocuments/'.$pan_card_file_name,file_get_contents($pan_card));
                Storage::put('userDocuments/'.$adhar_card_file_name,file_get_contents($adhar_card));
                $user_documents=new UserMandatoryDocuments();
                $customer_master=CustomerSignup::where('id',$request->cus_id)->first();
                $customer_master->mandatory_doc=1;
                $user_documents->doc_of_user=$request->cus_id;
                $user_documents->Pan_card=$pan_card_file_name;
                $user_documents->Adhar_card=$adhar_card_file_name;
                $user_documents->mandatory_doc_status=1;
                $user_documents->save();
                $customer_master->save();
                return back()->with('success',"FILE UPLOADED SUCESSFULLY");

        }
        else
        {

            $this->validate($request,[
                "OtherDoc"=>"required|mimes:pdf"
            ]);
            // dd($request->all());
            $other_doc=$request->file('OtherDoc');
            $other_doc_file_name='LN'.$request->enq_id.'OTHER.'.$other_doc->getClientOriginalExtension();
            Storage::put('enquieryDoc/'.$other_doc_file_name,file_get_contents($other_doc));
            $user_other_document=ClEnquiery::where('id',$request->enq_id)->first();
            $user_other_document->enq_doc_name=$other_doc_file_name;
            $user_other_document->documents_collected_status=1;
            $user_other_document->overall_status_of_customer=10;
            $user_other_document->save();
            return back()->with('success',"OTHER DOCUMENTS UPLOADED");
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
        $doc_for_enquiery=DB::table('table_customer')
        ->join('cl_enquieries', 'table_customer.id', '=', 'cl_enquieries.enquiery_of_ucs')
        ->join('products', 'cl_enquieries.loan_product_id', '=', 'products.id')
        ->join('subproducts', 'cl_enquieries.loan_product_sub_id', '=', 'subproducts.id')
        ->join('statuses','cl_enquieries.overall_status_of_customer', '=', 'statuses.id')
        ->select('*','table_customer.*','cl_enquieries.*','cl_enquieries.id AS enq_id','statuses.*','table_customer.id as cus_id')
        ->where('cl_enquieries.id','=',$id)
        ->first();
            // dd($doc_for_enquiery);
         return view('callerviews.OtherDocumentUpload',["user_info"=>$doc_for_enquiery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_man_docs=UserMandatoryDocuments::where('doc_of_user',$id)->first();
        // dd($user_man_docs);
        if($user_man_docs!=null)
        {
            return view('callerviews.MandateryFilesUpload',["cus_id"=>$id,"man_doc_status"=>$user_man_docs->mandatory_doc_status]);
        }

        return view('callerviews.MandateryFilesUpload',["cus_id"=>$id,"man_doc_status"=>0]);
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
