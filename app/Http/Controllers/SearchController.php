<?php

namespace App\Http\Controllers;

use App\Models\CustomerSignup;
use App\Models\Search\CompanyList;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function autocomplete(Request $request)
    {
        $company = CompanyList::select("company_name")
        ->where("company_name","LIKE","%".$request->keyword."%")
        ->limit(100)
        ->get();
        $data=[];
       foreach($company as $comp)
       {
           $data[]=$comp->company_name;
       }
        return response()->json($data);
    }
}
