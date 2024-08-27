<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DetailSales;
use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        $id_trans = Transaction::max('id');
        // return $penjualan;
        $id_trans++;
        $kode_trans = "SL" . date('dmY') . sprintf('%03s', $id_trans);
        return view('transaction.index', compact('category', 'kode_trans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($date_format);
        $val = Transaction::create([
            'trans_code' => $request->kode_transaksi,
            'trans_date' => now(),
            'trans_paid' => $request->paid,
            'trans_change' => $request->kembalianDB,
            'trans_total_price' => $request->total_price
        ]);
        foreach ($request->product_id as $key => $product) {
            DetailSales::create([
                'sale_id' => $val->id,
                'product_id' => $request->product_id[$key],
                'qty' => $request->qty[$key],
                'sub_total' => $request->sub_total[$key]
            ]);
            return redirect()->route('penjualan.index')->with('success', 'Data berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getProducts($category_id)
    {
        $products = Products::where('category_id', $category_id)->get();
        return response()->json(['product' => $products]);
    }
    public function getProductById($product_id)
    {
        $product = Products::find($product_id);
        return response()->json(['product' => $product]);
    }
}
