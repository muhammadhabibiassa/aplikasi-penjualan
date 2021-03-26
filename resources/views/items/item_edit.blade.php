@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Edit Item</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('item.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('item.update', ['id' => $data->id])}}">
                        @csrf
                        <input type="hidden" name="_method" value="patch">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Category</label>
                                <select class="form-control" name="idCategory">
                                    <option selected="" disabled="">--- Pilih Kategori ---</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id === $data->idCategory? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Brand</label>
                                <select class="form-control" name="idBrand">
                                    <option selected="" disabled="">--- Pilih Brand ---</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{$brand->id === $data->idBrand? 'selected' : ''}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$data->name}}" placeholder="Masukkan nama barang" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Selling Price</label>
                                <input type="number" name="sellingPrice" value="{{$data->sellingPrice}}" placeholder="Masukkan harga jual barang" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Purchase Price</label>
                                <input type="number" name="purchasePrice" value="{{$data->purchasePrice}}" placeholder="Masukkan harga beli barang" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Quantity</label>
                                <input type="number" name="quantity" value="{{$data->quantity}}" placeholder="Masukkan quantitas barang" class="form-control" required="">
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