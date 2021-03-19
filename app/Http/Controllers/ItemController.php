<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Brand;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Item::with(['category', 'brand'])->paginate(15);
        return view('items.item_list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('items.item_create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Item::create([
            'idCategory' => $request->idCategory,
            'idBrand' => $request->idBrand,
            'name' => $request->name,
            'sellingPrice' => $request->sellingPrice,
            'purchasePrice' => $request->purchasePrice,
            'quantity' => $request->quantity,
        ]);
        // return redirect()->back();
        return redirect()->route('item.index')->with('success', 'Item successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Item::with(['category', 'brand'])->find($id);
        return view('items.item_show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Item::with(['category', 'brand'])->find($id);
        $categories = Category::get();
        $brands = Brand::get();
        return view('items.item_edit', compact('data', 'categories', 'brands'));
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
        $data = Item::find($id);
        $data->update([
            'idCategory' => $request->idCategory,
            'idBrand' => $request->idBrand,
            'name' => $request->name,
            'sellingPrice' => $request->sellingPrice,
            'purchasePrice' => $request->purchasePrice,
            'quantity' => $request->quantity,
        ]);
        // return redirect()->back();
        return redirect()->route('item.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->back();
    }
}
