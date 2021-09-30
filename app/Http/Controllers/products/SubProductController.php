<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\SubProducts;
use Illuminate\Http\Request;

class SubProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $product=Products::all();
          return  view('products.subproducts.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_pro_sub = SubProducts::join('products','subproducts.product_id','=','products.id')
        ->select('subproducts.*','subproducts.id as sub_pro_id','products.*','products.id as pro_id')
        ->paginate(10);

        // with('subproductof')->get();
        $product=Products::all();
        // dd($all_pro_sub);/
        return view('products.subproducts.view',["allproduct_with_sub"=>$all_pro_sub,"products"=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
             "Subproductname"=>"required",
             "Subproductof"=>"required"
         ]);

         $subproduct=new SubProducts();
         $subproduct->subproductname=$request->Subproductname;
         $subproduct->product_id=$request->Subproductof;

         if($subproduct->save())
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
        $all_pro_sub = SubProducts::where('id',$id)->with('subproductof')->get();

        return json_encode($all_pro_sub);
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
        $subproduct=SubProducts::where('id',$id)->first();
        $subproduct->subproductname=$request->subproductname;
        $subproduct->product_id=$request->subtoproductof;

        if($subproduct->save())
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
        $subproduct=SubProducts::where('id',$id)->first();

        if($subproduct->delete())
        {
            return 1;

        }
        else
        {
            return 0;
        }
    }
}
