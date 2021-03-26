@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Customer Detail</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('customer.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('customer.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name: </label>
                                {{$data->name}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Gender: </label>
                                {{$data->gender}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Phone: </label>
                                {{$data->phone}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Email: </label>
                                {{$data->email}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Address: </label>
                                {{$data->address}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop