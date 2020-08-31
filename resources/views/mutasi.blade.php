@extends('layouts.app')
@section('content')
<table class="table table-striped table-dark" style="margin-top:-25px">
    <thead>
      <tr>
        <th scope="col">
            <div class="btn" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary d-flex align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">add_circle</i> 
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                  <div class="d-flex flex-column p-2">
                        <button type="button" class="btn btn-success d-flex justify-content-center" data-toggle="modal" data-target="#mutasi_masuk">
                            <i class="material-icons">vertical_align_bottom</i>
                        </button>
                  </div>
                  <div class="d-flex flex-column p-2">
                        <button type="button" class="btn btn-danger d-flex justify-content-center align-items-center">
                            <i class="material-icons">vertical_align_top</i>
                        </button>
                  </div>
                </div>
            </div>
        </th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Tipe Barang</th>
        <th scope="col">Lokasi</th>
        <th scope="col">Mutasi Masuk</th>
        <th scope="col">Mutasi Keluar</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($mutasi as $no => $mutation)
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $mutation->nama_barang }}</td>
        <td>{{ $mutation->tipe_barang }}</td>
        <td>{{ $mutation->lokasi }}</td>
        <td>{{ $mutation->masuk }}</td>
        <td>{{ $mutation->keluar }}</td>
      </tr>              
    @endforeach
    </tbody>
</table>
@endsection


{{-- mutasi_masuk --}}
<div class="modal fade" id="mutasi_masuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title text-white" id="exampleModalLabel">Mutasi Masuk</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/mutasi/masuk" method="post">
            <div class="modal-body">
                <div class="row">
                    <select name="id_barang">
                            <option value="{{$barang->id}}">{{$barang->nama_barang}}</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>