<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Products\Entities\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::all();
        return response()->json(['products'=>$products], 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('products::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=> 'required|max:101',
            'description'=> 'required|max:101',
            'price'=> 'required|max:101',
            'qty'=> 'required|max:101',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        return response()->json(['message' => 'Product Added Succesfully'],200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $products = Product::find($id);
        if($products)
        {
            return response()->json(['products'=>$products], 200);
        }
        else
        {
            return response()->json(['message'=>'no record found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('products::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=> 'required|max:101',
            'description'=> 'required|max:101',
            'price'=> 'required|max:101',
            'qty'=> 'required|max:101',
        ]);

        $product = Product::find($id);
        if($product)
        {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->update();
        return response()->json(['message' => 'Product update Succesfully'],200);
        }
        else
        {
            return response()->json(['message' => 'no record found'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json(['message' => 'Product delete Succesfully'],200);
        }
        else
        {
            return response()->json(['message' => 'no record found'],404);
        }
    }
    
}
