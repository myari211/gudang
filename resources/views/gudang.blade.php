@extends('layouts.app')
@section('content')
<table class="table table-striped table-dark" style="margin-top:-25px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Lokasi</th>
        <th scope="col">Kapasitas</th>
        <th class="col d-flex justify-content-end">
            <button type="button" class="btn btn-primary d-flex align-items-center" data-toggle="modal" data-target="#add">
                <i class="material-icons">add_circle</i>
            </button>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($gudang as $no => $storage)
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $storage->lokasi}}</td>
        <td>{{ $storage->kapasitas }}</td>
        <td class="d-flex justify-content-end">
            <button type="button" class="btn btn-warning mr-2 d-flex align-items-end" data-toggle="modal" data-target="#edit{{ $storage->id }}">
                <i class="material-icons">edit</i>
            </button>
            <button type="button" class="btn btn-danger d-flex align-items-end" data-toggle="modal" data-target="#delete{{$storage->id}}">
                <i class="material-icons">delete</i>
            </button>
        </td>
    </tr>
      @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $gudang->links() }}
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Gudang</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/gudang/add" method="post">
            @csrf
            <div class="modal-body">
                <div class="row p-2">
                    <label for="lokasi">Lokasi Gudang</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" required="required">
                </div>
                <div class="row p-2">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="number" name="kapasitas" id="kapasitas" class="form-control" required="required">
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

{{-- edit --}}
@foreach ($gudang as $storage)
  <div class="modal fade" id="edit{{ $storage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="exampleModalLabel">Edit Gudang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/gudang/edit/{{ $storage->id }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row p-2">
                    <label for="lokasi">Lokasi Gudang</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" required="required" value="{{ $storage->lokasi }}">
                </div>
                <div class="row p-2">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="number" name="kapasitas" id="kapasitas" class="form-control" required="required" value="{{ $storage->kapasitas }}">
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
  <div class="modal fade" id="delete{{$storage->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/gudang/delete/{{$storage->id}}" method="post">
            @csrf   
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <p>Apakah anda yakin akan menghapus data ini ?</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Lokasi :</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $storage->lokasi }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Kapasitas :</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $storage->kapasitas }}</p>
                        </div>
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