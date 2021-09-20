<?php

namespace App\Exports;

use App\Models\Cutomer\DirectReferal as CutomerDirectReferal;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerdirectreferalExport implements FromView
{
    protected $ref_of_cus_id;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $ref_id)
    {
        $this->ref_of_cus_id = $ref_id;
    }
    public function view(): View
    {
        return view('components.customerdirect-reftable', [
            'refered_cus_list' =>CutomerDirectReferal::where('direct_ref_of_user',$this->ref_of_cus_id)->get()]);
    }
}
