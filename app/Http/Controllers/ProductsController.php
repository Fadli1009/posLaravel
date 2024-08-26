<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::all();
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.tambah-product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        Products::create($val);
        return redirect()->route('product.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Products::findOrFail($id);
        $categories = Category::all();
        return view('product.edit-product', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        $val = $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        // dd($val);
        $products->update($val);
        return redirect()->route('product.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return redirect()->route('product.index')->with('success', 'Data berhasil dihapus');
    }
}
