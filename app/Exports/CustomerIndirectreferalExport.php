<?php

namespace App\Exports;

use App\Models\CustomerSignup;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerIndirectreferalExport implements FromView
{

    protected $ref_id;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $ref_id)
    {
        $this->ref_id = $ref_id;
    }
    public function view(): View
    {
        return view('components.customer-indirect-reftable', [
            'refered_cus_list' =>CustomerSignup::where('refered_by',$this->ref_id)->get()
        ]);
    }
}
