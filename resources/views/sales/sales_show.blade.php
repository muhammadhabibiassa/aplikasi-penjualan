@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                            <label>Invoice Number: </label>
                            {{$data->invoiceNumber}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Discount: </label>
                            {{$data->discount}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>PPN: </label>
                            {{$data->ppn}}
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Status: </label>
                            <span class="badge rounded-pill bg-light">{{$data->status ? 'Pesanan Diorder' : 'Pesanan Diterima'}}</span>
                        </div>
                        <div class="col-md-12 my-3 table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data->sales_detail) > 0)
                                            @foreach ($data->sales_detail as $sales_detail)
                                                <tr>
                                                    <td>{{$sales_detail->item->name}}</td>
                                                    <td>{{$sales_detail->item->category->name}}</td>
                                                    <td>{{$sales_detail->item->brand->name}}</td>
                                                    <td>{{$sales_detail->item->quantity}}</td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="7" class="text-center">There's no data</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop