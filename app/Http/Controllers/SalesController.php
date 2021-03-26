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
        // dd($request->all());
        $arrayTemp = [];
        $arraySubProfit = [];
        $subtotal = 0;
        $subProfit = 0;
        foreach ($request->itemId as $key => $item) {
            $itemTemp = Item::find($item);
            // dd($itemTemp->name);
            $subtotal += $itemTemp->sellingPrice * $request->quantity[$key];
            $subProfit += $itemTemp->purchasePrice * $request->quantity[$key];
            array_push($arrayTemp, [
                'name' => $itemTemp->name,
                'qty' => $request->quantity[$key],
                'selling_price' => $itemTemp->sellingPrice,
                'totalItem' => $itemTemp->sellingPrice * $request->quantity[$key]
            ]);
            array_push($arraySubProfit, [
                'name' => $itemTemp->name,
                'qty' => $request->quantity[$key],
                'purchase_price' => $itemTemp->purchasePrice,
                'subProfit' => $itemTemp->purchasePrice * $request->quantity[$key]
            ]);
        }
        $subtotal = $subtotal - ($subtotal * $request->discount / 100);
        dd(['items' => $arrayTemp, 'sub_total' => $subtotal, 'sub_provit' => $subProfit, 'provit_item' => $arraySubProfit]);
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
