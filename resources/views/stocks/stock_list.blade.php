@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Stock List</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('stock.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Stock In</th>
                                        <th>Stock Out</th>
                                        <th>Total</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($datas) > 0)
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>{{$data->item->name}}</td>
                                                <td>{{!is_null($data->stockIn) ? $data->stockIn : '-'}}</td>
                                                <td>{{!is_null($data->stockOut) ? $data->stockOut : '-'}}</td>
                                                <td>{{$data->total}}</td>
                                                <td>{{$data->created_at}}</td>
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
                        {{ $datas->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop