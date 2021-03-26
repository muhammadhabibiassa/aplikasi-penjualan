@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Item Detail</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('item.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Name: </label>
                            {{$data->name}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Category: </label>
                            {{$data->category->name}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Brand: </label>
                            {{$data->brand->name}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Selling Price: </label>
                            {{$data->sellingPrice}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Purchase Price: </label>
                            {{$data->purchasePrice}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Quantity: </label>
                            {{$data->quantity}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop