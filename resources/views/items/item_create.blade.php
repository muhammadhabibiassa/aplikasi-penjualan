@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Create Item</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('item.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('item.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Category</label>
                                <select class="form-control" name="idCategory">
                                    <option selected="" disabled="">--- Select category ---</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Brand</label>
                                <select class="form-control" name="idBrand">
                                    <option selected="" disabled="">--- Select brand ---</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter name" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Selling Price</label>
                                <input type="number" name="sellingPrice" placeholder="Enter selling price" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Puchase Price</label>
                                <input type="number" name="purchasePrice" placeholder="Enter purchase price" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Quantity</label>
                                <input type="number" name="quantity" placeholder="Enter quantity" class="form-control">
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