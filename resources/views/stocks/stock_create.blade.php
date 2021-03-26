@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Create Stock</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('stock.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('stock.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Item</label>
                                <select class="form-control" name="idItem">
                                    <option selected="" disabled="">--- Select item ---</option>
                                    @foreach($items as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Stock In</label>
                                <input type="number" name="stockIn" placeholder="Enter stock in" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Stock Out</label>
                                <input type="number" name="stockOut" placeholder="Enter stock out" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Total</label>
                                <input type="number" name="total" placeholder="Enter total" class="form-control">
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