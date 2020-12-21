<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
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
    public function store(Request $req)
    {
        //
        $product = new Product;
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->type = $req->type;
        $product->is_active = $req->is_active;
        $res = $product->save();
        if ($res) {
            return "Product insert successfully";
        } else return "Product is not inserted";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($str)
    {
        //
        $res = Product::where("title", 'like', '%' . $str . '%')->orWhere("description", 'like', '%' . $str . '%')->get();
        return $res->where("is_active", '>', 0);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $product = Product::find($id);
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->type = $req->type;
        $product->is_active = $req->is_active;
        $res = $product->save();
        if ($res) {
            return "Product updated successfully";
        } else return "Product is not updated";
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
        $product = Product::find($id);
        $res = $product->delete();
        if ($res) {
            return "Product with id : " . $id . " deleted successfully";
        } else return "Product is not deleted";
    }
    public  function filterBetween($min, $max)
    {
        // $check= Product::where("is_active",'>',0);
        return Product::whereBetween('price', [$min, $max])->where("is_active", '>', 0)->get();
    }

    function getProduct()
    {
        $pro = Product::all();
        return view('products', compact('pro'));
    }
    public function downloadPDF()
    {
        $pro = Product::all();
        $pdf = PDF::loadview('products', compact('pro'));
        return $pdf->download('PRODUCT.pdf');
    }
}
