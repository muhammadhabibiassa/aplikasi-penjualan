@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Supplier List</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('supplier.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($datas) > 0)
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->phone}}</td>
                                                <td>{{$data->address}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('supplier.show',['id' => $data->id])}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                                    <a href="{{route('supplier.edit',['id' => $data->id])}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#productCategory{{$data->id}}"><i class="fas fa-trash"></i></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="productCategory{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="productCategoryLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="post" action="{{route('supplier.destroy',['id'=>$data->id])}}">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="delete">
                                                                    <div class="modal-body">
                                                                        Yakin mau hapus customer dengan nama {{$data->name}}?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
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