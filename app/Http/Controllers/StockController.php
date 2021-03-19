<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Item;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Stock::with(['item'])->orderBy('created_at', 'desc')->paginate(15);
        return view('stocks.stock_list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::get();
        return view('stocks.stock_create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lastStock = Stock::where('idItem', $request->idItem)->orderBy('created_at', 'desc')->first();
        $totals = 0;
        if (!is_null($request->stockIn)) {
            $totals = (int)$lastStock->total + (int)$request->stockIn;
        } else {
            $totals = (int)$lastStock->total - (int)$request->stockOut;
        }
        Stock::create([
            'idItem' => $request->idItem,
            'stockIn' => $request->stockIn,
            'stockOut' => $request->stockOut,
            'total' => $totals
        ]);
        // return redirect()->back();
        return redirect()->route('stock.index')->with('success', 'Stock successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Stock::with(['item'])->find($id);
        return view('stocks.stock_show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Stock::with(['item'])->find($id);
        $items = Item::get();
        return view('stocks.stock_edit', compact('data', 'items'));
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
        $data = Stock::find($id);
        $data->update([
            'idItem' => $request->idItem,
            'stockIn' => $request->stockIn,
            'stockOut' => $request->stockOut,
            'total' => $request->total,
        ]);
        // return redirect()->back();
        return redirect()->route('stock.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::find($id)->delete();
        return redirect()->back();
    }
}
