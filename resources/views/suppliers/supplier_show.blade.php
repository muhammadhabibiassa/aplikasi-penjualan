@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Supplier Detail</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('supplier.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('supplier.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name: </label>
                                {{$data->name}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Phone: </label>
                                {{$data->phone}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Address: </label>
                                {{$data->address}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>State: </label>
                                {{$data->state}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Postal Code: </label>
                                {{$data->postalCode}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop