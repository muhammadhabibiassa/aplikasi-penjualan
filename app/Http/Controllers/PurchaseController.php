<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Item;
use App\Models\Stock;
use App\Models\PurchaseDetail;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Purchase::with(['supplier'])->paginate(15);
        return view('purchases.purchase_list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::get();
        $items = Item::get();
        return view('purchases.purchase_create', compact('suppliers', 'items'));
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
        $subtotal = 0;
        $purchase = Purchase::create([
            'idSupplier' => $request->idSupplier,
            'invoiceNumber' => $request->invoiceNumber,
            'discount' => $request->discount,
            'ppn' => $request->ppn,
            'date' => $request->date,
            'total' => 0,
            'status' => !is_null($request->status)? 1 : 0,
        ]);
        // return redirect()->back();
        foreach ($request->itemId as $key => $item) {
            $itemTemp = Item::find($item);
            $subtotal += $itemTemp->sellingPrice * $request->ordered[$key];
            $getLastStock = Stock::where('idItem', $item)->orderBy('created_at', 'desc')->first();
            if (!is_null($request->ordered[$key])) {
                array_push($arrayTemp, [
                    'purchaseId' => $purchase->id,
                    'idItem' => $item,
                    'ordered' => $request->ordered[$key],
                    'accepted' => 0,
                ]);
                Stock::create([
                    'idItem' => $item,
                    'stockIn' => $request->ordered[$key],
                    'total' => !is_null($getLastStock) && $getLastStock->total !== 0 ? $getLastStock->total + $request->ordered[$key] : $itemTemp->quantity + $request->ordered[$key]
                ]);
                $itemTemp->update([
                    'quantity' => !is_null($getLastStock) && $getLastStock->total !== 0 ? $getLastStock->total + $request->ordered[$key] : $itemTemp->quantity + $request->ordered[$key]
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
        PurchaseDetail::insert($arrayTemp);
        $subtotal = $subtotal - ($subtotal * $request->discount / 100);
        $total = $subtotal + ($subtotal * $request->ppn / 100);
        $purchase->update([
            'total' => $total
        ]);

        return redirect()->route('purchase.index')->with('success', 'Purchase successfully created');
        // foreach ($request->ordered as $key=>$order) {
        //     $total += $order;
        //     PurchaseDetail::create([
        //         'purchaseId' => $purchase->id,
        //         'idItem' => $request->itemId[$key],
        //         'ordered' => $order,
        //         'accepted' => 0,
        //     ]);
        // }
        // Purchase::find($purchase->id)->update(['total' => $total]);
        // return redirect()->route('purchase.index')->with('success', 'Purchase successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Purchase::with(['supplier', 'purchase_detail.item'])->find($id);
        return view('purchases.purchase_show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Purchase::with(['supplier', 'purchase_detail.item'])->find($id);
        $items = Item::get();
        $suppliers = Supplier::get();
        $date=date_create($data->date);
        $data->date = date_format($date,"Y-m-d");
        return view('purchases.purchase_edit', compact('data', 'suppliers', 'items'));
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
        $total = 0;
        $data = Purchase::find($id);
        $purchase = Purchase::update([
            'idSupplier' => $request->idSupplier,
            'invoiceNumber' => $request->invoiceNumber,
            'discount' => $request->discount,
            'ppn' => $request->ppn,
            'date' => $request->date,
            'total' => 0,
            'status' => !is_null($request->status)? 1 : 0,
        ]);
        // return redirect()->back();
        foreach ($request->ordered as $key=>$order) {
            $total += $order;
            PurchaseDetail::update([
                'purchaseId' => $purchase->id,
                'idItem' => $request->itemId[$key],
                'ordered' => $order,
                'accepted' => 0,
            ]);
        }
        
        Purchase::find($purchase->id)->update(['total' => $total]);
        return redirect()->route('purchase.show')->with('success', 'Purchase successfully created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purchase::find($id)->delete();
        return redirect()->back();
    }
}
