<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Item;
use App\Models\SalesDetail;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Sales::with(['item'])->paginate(15);
        return view('sales.sales_list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::get();
        return view('sales.sales_create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total = 0;
        $profit = 0;
        dd($request->all());
        $sales = Sales::create([
            'idItem' => $request->idItem,
            'invoiceNumber' => $request->invoiceNumber,
            'total' => 0,
            'profit' => 0,
            'discount' => $request->discount,
            'ppn' => $request->ppn,
        ]);
        foreach ($request->quantity as $key=>$order) {
            $total += $order;
            SalesDetail::create([
                'salesId' => $sales->id,
                'idItem' => $request->itemId[$key],
                'sellingPrice' => 0,
                'purchasePrice' => 0,
                'quantity' => $order

            ]);
        }
        return redirect()->route('sales.index')->with('success', 'Sales successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sales::with(['sales_detail.item'])->find($id);
        return view('sales.sales_show', compact('data'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sales::find($id)->delete();
        return redirect()->back();
    }
}
