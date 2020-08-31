@extends('layouts.app')
@section('content')
<table class="table table-striped table-dark"style="margin-top:-25px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Jenis</th>
        <th class="col d-flex justify-content-end">
            <button type="button" class="btn btn-primary d-flex align-items-center" data-toggle="modal" data-target="#add">
                <i class="material-icons">add_circle</i>
            </button>
        </th>
      </tr>
    </thead>
    <tbody>
    @foreach ($category as $no => $kind)
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $kind->jenis }}</td>
        <td class="d-flex justify-content-end">
            <button type="button" class="btn btn-warning mr-2 d-flex align-items-center" data-toggle="modal" data-target="#edit{{$kind->id_category}}">
                <i class="material-icons">edit</i>
            </button>
            <button type="button" class="btn btn-danger d-flex align-items-center" data-toggle="modal" data-target="#delete{{$kind->id_category}}">
                <i class="material-icons">delete</i>
            </button>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="#add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Category Barang</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/category_barang/add" method="post">
            @csrf
            <div class="modal-body">
                <div class="row p-2">
                    <label for="jenis">Category : </label>
                    <input type="text" name="jenis" id="jenis" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary d-flex align-items-center">
                    <i class="material-icons">send</i>
                </button>
            </div>
        </form>
        </div>
    </div>
  </div>

  @foreach($category as $kind)
  <div class="modal fade" id="edit{{$kind->id_category}}" tabindex="-1" role="dialog" aria-labelledby="#add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/category_barang/edit" method="post">
            @csrf
            <input type="hidden" name="id" value={{$kind->id_category}}>
            <div class="modal-body">
                <div class="row p-2">
                    <label for="jenis">Category : </label>
                    <input type="text" name="jenis" id="jenis" class="form-control" value="{{$kind->jenis}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning d-flex align-items-center">
                    <i class="material-icons">create</i>
                </button>
            </div>
        </form>
        </div>
    </div>
  </div>

  <div class="modal fade" id="delete{{$kind->id_category}}" tabindex="-1" role="dialog" aria-labelledby="#add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Category Barang</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/category_barang/delete" method="post">
            @csrf
            <input type="hidden" name="id" value={{$kind->id_category}}>
            <div class="modal-body">
                <div class="row">
                    <p>Apakah anda yakin akan menghapus data ini ?</p>
                </div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <p>Category :</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{ $kind->jenis }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger d-flex align-items-center">
                    <i class="material-icons">delete</i>
                </button>
            </div>
        </form>
        </div>
    </div>
  </div>
  @endforeach
@endsection