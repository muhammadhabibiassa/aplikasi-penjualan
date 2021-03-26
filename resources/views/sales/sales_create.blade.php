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
                                <label>Invoice Number</label>
                                <input type="number" name="invoiceNumber" placeholder="Enter invoice number" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Discount (in percentage)</label>
                                <input type="number" name="discount" placeholder="Enter discount" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>PPN (in percentage)</label>
                                <input type="number" name="ppn" placeholder="Enter ppn" class="form-control" required="">
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
                                                <th>Total Pesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($items) > 0)
                                                @foreach ($items as $data)
                                                    <tr>
                                                        <td>{{$data->name}}</td>
                                                        <td>{{$data->category->name}}</td>
                                                        <td>{{$data->brand->name}}</td>
                                                        <td>{{$data->quantity}}</td>
                                                        <td><input type="number" class="form-control" name="quantity[]" /><input type="hidden" name="itemId[]" value="{{$data->id}}" /></td>
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