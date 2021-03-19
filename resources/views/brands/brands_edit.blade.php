@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Edit Brand</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('product-brand.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('product-brand.update', ['id' => $data->id])}}">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$data->name}}" placeholder="Masukkan nama kategori barang" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <input type="text" name="description" value="{{$data->description}}" placeholder="Masukkan description barang" class="form-control" required="">
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