@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Create Suppliers</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('suppliers.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('store-suppliers.index')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter name" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <input type="number" name="phone" placeholder="Enter phone" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Address</label>
                                <textarea name="address" placeholder="Enter address" class="form-control" required=""></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>State</label>
                                <input type="text" name="state" placeholder="Enter state" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>City</label>
                                <input type="text" name="city" placeholder="Enter city" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Postal Code</label>
                                <input type="text" name="postalCode" placeholder="Enter postal code" class="form-control" required="">
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