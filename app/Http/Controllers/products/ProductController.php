<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products=Products::all();
        return view ('products.create',compact('all_products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // server side validation
         $this->validate($request,[
             "productname"=>"required"
         ]);

         $products=new Products();
         $products->productname=$request->productname;
         if($products->save())
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
        $product=Products::where('id',$id)->first();

        return json_encode($product);
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
          $this->validate($request,[
              "productname"=>"required"
            ]);
         $products=Products::where('id',$id)->first();
         $products->productname=$request->productname;
         if($products->save())
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
        $products=Products::where('id',$id)->delete();
         if($products)
         {
             return 1;
         }
         else
         {
             return 0;
         }

    }
}
