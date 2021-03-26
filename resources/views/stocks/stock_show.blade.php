@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Detail Stock</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('stock.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Item: </label>
                            {{$data->item->name}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Stock In: </label>
                            {{$data->stockIn}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Stock Out: </label>
                            {{$data->stockOut}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Total: </label>
                            {{$data->total}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop