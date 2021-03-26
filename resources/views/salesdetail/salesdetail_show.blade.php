@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Sales Detail</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('sales.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Item: </label>
                            {{$data->item->name}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Selling Price: </label>
                            {{$data->item->sellingPrice}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Purchase Price: </label>
                            {{$data->item->purchasePrice}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Quantity: </label>
                            {{$data->item->quantity}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop