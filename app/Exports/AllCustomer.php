<?php

namespace App\Exports;

use App\Models\CustomerSignup;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AllCustomer implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('components.all-customer-table', [
            'customer' => CustomerSignup::all()
        ]);
    }
}
