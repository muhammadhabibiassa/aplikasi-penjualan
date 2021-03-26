@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Create Purchase</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('purchase.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('purchase.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Supplier</label>
                                <select class="form-control" name="idSupplier">
                                    <option selected="" disabled="">--- Select supplier ---</option>
                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>
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
                            <div class="col-md-6 mb-3">
                                <label>Date</label>
                                <input type="date" name="date" placeholder="Enter date" class="form-control" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <label class="switch">
                                  <input type="checkbox" name="status">
                                  <span class="slider round"></span>
                                </label>
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
                                                        <td><input type="number" class="form-control" name="ordered[]" /><input type="hidden" name="itemId[]" value="{{$data->id}}" /></td>
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

<style type="text/css">
    /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>