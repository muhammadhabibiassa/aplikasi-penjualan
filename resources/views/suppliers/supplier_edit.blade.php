@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Edit Supplier</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('supplier.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('supplier.update', ['id' => $data->id])}}">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$data->name}}" placeholder="Enter name" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Phone</label>
                                <input type="number" name="phone" value="{{$data->phone}}" placeholder="Enter phone" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <input type="text" name="address" value="{{$data->address}}" placeholder="Enter address" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>State</label>
                                <input type="text" name="state" value="{{$data->state}}" placeholder="Enter state" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>City</label>
                                <input type="text" name="city" value="{{$data->city}}" placeholder="Enter city" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Postal Code</label>
                                <input type="text" name="postalCode" value="{{$data->postalCode}}" placeholder="Enter postal code" class="form-control" required="">
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