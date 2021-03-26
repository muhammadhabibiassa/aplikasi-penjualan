@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Edit Stock</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('stock.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('stock.update', ['id' => $data->id])}}">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Item</label>
                                <select class="form-control" name="idItem">
                                    <option selected="" disabled="">--- Pilih Item ---</option>
                                    @foreach($items as $item)
                                    <option value="{{$item->id}}" {{$item->id === $data->idItem? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Stock In</label>
                                <input type="number" name="stockIn" value="{{$data->stockIn}}" placeholder="Masukkan harga jual barang" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Stock Out</label>
                                <input type="number" name="stockOut" value="{{$data->stockOut}}" placeholder="Masukkan harga beli barang" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Total</label>
                                <input type="number" name="total" value="{{$data->total}}" placeholder="Masukkan quantitas barang" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop