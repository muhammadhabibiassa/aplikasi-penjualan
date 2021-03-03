@extends('templates.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 m-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Category List</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('product-category.create')}}" class="btn btn-primary">Add</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hovered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($datas) > 0)
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->description}}</td>
                                            <td>
                                                <a href="{{route('product-category.edit',['id' => $data->id])}}" class="btn btn-success">Edit</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-categories{{$data->id}}">Delete</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal-delete-categories{{$data->id}}" tabindex="-1" aria-labelled-by="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </div>
                                                            <form method="post" action="{{route('product-category.destroy',['id'=>$data->id])}}">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="delete">
                                                                <div class="modal-body">
                                                                    Yakin mau hapus categories dengan nama {{$data->name}}?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
                                        <td colspan="7" class="text-center">Tidak ada data untuk saat ini</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $datas->render() }}
        </div>
    </div>
@stop