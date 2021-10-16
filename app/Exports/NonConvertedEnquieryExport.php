<?php

namespace App\Exports;

use App\Models\ClEnquiery;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NonConvertedEnquieryExport implements FromView
{
    protected $Fomrdate;
    protected $ToDate;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $Fomrdate,string $ToDate)
    {
        $this->Fomrdate = $Fomrdate;
        $this->ToDate = $ToDate;
    }
    public function view(): View
    {
        return view('components.all-enquiery-of-customer-not-converted-table', [
            'user_info' =>ClEnquiery::join('table_customer','cl_enquieries.enquiery_of_ucs','=','table_customer.id')
            ->join('statuses','cl_enquieries.overall_status_of_customer','=','statuses.id')
            ->join('products','cl_enquieries.loan_product_id','=','products.id')
            ->join('subproducts','cl_enquieries.loan_product_sub_id','=','subproducts.id')
            ->select('table_customer.*','cl_enquieries.*','cl_enquieries.id as enq_id','cl_enquieries.created_at as crt','cl_enquieries.updated_at as upd','products.*','subproducts.*','statuses.*')
            ->whereBetween(DB::raw("(DATE(cl_enquieries.created_at))"), [$this->Fomrdate, $this->ToDate])
            ->get()]);
    }
}
