@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Create Brand</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('product-brand.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('store-brand.index')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter name" class="form-control" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" placeholder="Enter description" class="form-control"></textarea>
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