<?php

namespace App\Http\Controllers\bank;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks=Bank::all();
        return view('Banks.bankindex',compact('banks'));
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
        //section for validation
        $this->validate($request,["bankname"=>"required"]);
        $new_bank= new Bank();
        $new_bank->bank_name=$request->bankname;
        if($new_bank->save())
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank_info=Bank::where('id',$id)->first();
        if($bank_info)
        {
            return json_encode($bank_info);
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
         $bank_info=Bank::where('id',$id)->first();
         $bank_info->bank_name=$request->bankname;
         if($bank_info->save())
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
        $delete_bank=Bank::where('id',$id)->delete();
        if($delete_bank)
        {
            return 1;
        }
    }
}
