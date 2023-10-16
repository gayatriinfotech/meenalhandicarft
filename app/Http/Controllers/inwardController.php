<?php

namespace App\Http\Controllers;

use App\Models\inward;
use App\Models\product;
use App\Models\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inward = inward::get();
        $product = product::get();
        return view('backend/inward', compact('inward', 'product'));
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
        $request->validate([
            'quantity' => 'required',
            'product_id' => 'required',
        ]);
        $data = new inward([
            'product_id' => $request->get('product_id'),
            'quantity' => $request->get('quantity'),
        ]);
        $sql = DB::table('products')->where('id', '=', $request->get('product_id'))->select('*')->first();
        $sql_stock = DB::table('stocks')->where('product_id', '=', $sql->id)->select('*')->first();
        if ($sql_stock != '') {
            $stock_update = stock::find($sql_stock->id);
            $stock_update->stocks = $sql_stock->stocks + $request->get('quantity');
            $stock_update->update();
        } else {
            $stockadd = new stock([
                'product_id' => $request->get('product_id'),
                'stocks' => $request->get('quantity'),
            ]);
            $stockadd->save();
        }
        $data->save();
        return back()->with('success', "Stocks Added");
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
        $data = inward::find($id);
        $stock = DB::table('stocks')->where('product_id', '=', $data->product_id)->first();
        $minus_stocks = $stock->stocks - $data->quantity;
        $data->quantity = $request->get('quantity');

        $update_stocks = stock::where([
            ['product_id', '=', $data->product_id],
        ])->first();
        $update_stocks->stocks = $minus_stocks + $request->get('quantity');

        $update_stocks->update();
        $data->update();

        return back()->with('success', "Quantity Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inward = inward::find($id);
        $stock = stock::where([
            ['product_id', '=', $inward->product_id],
        ])->first();
        $stock->stocks = $stock->stocks - $inward->quantity;
        if ($stock->update()) {
            $inward->delete();
        }
        return back()->with('success', "Stocks Reduced");
    }
}
