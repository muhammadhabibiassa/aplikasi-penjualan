@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Create Sales</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('sales.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('sales.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Item</label>
                                <select class="form-control" name="idSupplier">
                                    <option selected="" disabled="">--- Select item ---</option>
                                    @foreach($items as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Invoice Number</label>
                                <input type="number" name="invoiceNumber" placeholder="Enter invoice number" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total</label>
                                <input type="number" name="total" placeholder="Enter total" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Profit</label>
                                <input type="number" name="profit" placeholder="Enter profit" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Discount (in percentage)</label>
                                <input type="number" name="discount" placeholder="Enter discount" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>PPN (in percentage)</label>
                                <input type="number" name="ppn" placeholder="Enter ppn" class="form-control" required="">
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