<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Item;
use App\Models\SalesDetail;
use App\Models\Stock;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Sales::with(['item'])->orderBy('created_at', 'desc')->paginate(15);
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
        $arrayTemp = [];
        $subtotal = 0;
        $subProfit = 0;
        $sales = Sales::create([
            'invoiceNumber' => $request->invoiceNumber,
            'discount' => $request->discount,
            'ppn' => $request->ppn,
            'date' => $request->date,
            'total' => 0,
            'profit' => 0
        ]);
        foreach ($request->itemId as $key => $item) {
            $itemTemp = Item::find($item);
            $subtotal += $itemTemp->sellingPrice * $request->quantity[$key];
            $subProfit += $itemTemp->purchasePrice * $request->quantity[$key];
            $getLastStock = Stock::where('idItem', $item)->orderBy('created_at', 'desc')->first();
            if (!is_null($request->quantity[$key])) {
                array_push($arrayTemp, [
                    'salesId' => $sales->id,
                    'idItem' => $item,
                    'purchasePrice' => $itemTemp->purchasePrice,
                    'sellingPrice' => $itemTemp->sellingPrice,
                    'quantity' => $request->quantity[$key],
                ]);
                Stock::create([
                    'idItem' => $item,
                    'stockOut' => $request->quantity[$key],
                    'total' => !is_null($getLastStock) && $getLastStock->total !== 0 ? $getLastStock->total - $request->quantity[$key] : $itemTemp->quantity - $request->quantity[$key]
                ]);
                $itemTemp->update([
                    'quantity' => !is_null($getLastStock) && $getLastStock->total !== 0 ? $getLastStock->total - $request->quantity[$key] : $itemTemp->quantity - $request->quantity[$key]
                ]);
            }
            // SalesDetail::create([
            //     'salesId' => $sales->id,
            //     'idItem' => $item,
            //     'purchasePrice' => $itemTemp->purchasePrice,
            //     'sellingPrice' => $itemTemp->sellingPrice,
            //     'quantity' => $request->quantity[$key],
            // ]);
        }
        SalesDetail::insert($arrayTemp);
        $subtotal = $subtotal - ($subtotal * $request->discount / 100);
        $profit = $subProfit - ($subProfit * $request->discount / 100);
        $total = $subtotal + ($subtotal * $request->ppn / 100);
        $sales->update([
            'total' => $total,
            'profit' => $profit
        ]);

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
        $data = Sales::with(['sales_detail.item'])->find($id);
        return view('sales.sales_edit', compact('data'));
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
        $arrayTemp = [];
        $subtotal = 0;
        $subProfit = 0;

        $data = Sales::find($id);
        $data->update([
            'invoiceNumber' => $request->invoiceNumber,
            'discount' => $request->discount,
            'ppn' => $request->ppn
        ]);
        foreach ($request->salesDetailId as $key => $dataId) {
            $salesDetail = SalesDetail::with('item')->find($dataId);
            $salesDetail->update([
                'quantity' => $request->quantity[$key]
            ]);

            $subtotal += $salesDetail->item->sellingPrice * $request->quantity[$key];
            $subProfit += $salesDetail->item->purchasePrice * $request->quantity[$key];
            $getLastStock = Stock::where('idItem', $salesDetail->idItem)->orderBy('created_at', 'desc')->first();
            if (!is_null($request->quantity[$key])) {
                Stock::create([
                    'idItem' => $salesDetail->idItem,
                    'stockOut' => $request->quantity[$key],
                    'total' => !is_null($getLastStock) && $getLastStock->total !== 0 ? $getLastStock->total - $request->quantity[$key] : $salesDetail->quantity - $request->quantity[$key]
                ]);
                $salesDetail->update([
                    'quantity' => !is_null($getLastStock) && $getLastStock->total !== 0 ? $getLastStock->total - $request->quantity[$key] : $salesDetail->quantity - $request->quantity[$key]
                ]);
            }

        }

        $subtotal = $subtotal - ($subtotal * $request->discount / 100);
        $profit = $subProfit - ($subProfit * $request->discount / 100);
        $total = $subtotal + ($subtotal * $request->ppn / 100);
        $data->update([
            'total' => $total,
            'profit' => $profit
        ]);

        return redirect()->route('sales.index')->with('success', 'Sales successfully updated');
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
