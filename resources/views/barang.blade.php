@extends('layouts.app')
@section('content')
<table class="table table-striped table-dark" style="margin-top:-25px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga Beli</th>
        <th scope="col">Harga Jual</th>
        <th class="col d-flex justify-content-end">
            <button type="button" class="btn btn-primary d-flex align-items-center" data-toggle="modal" data-target="#add">
                <i class="material-icons">add_circle</i>
            </button>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($barang as $no => $item)
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $item->nama_barang}}</td>
        <td>{{ $item->harga_beli }}</td>
        <td>{{ $item->harga_jual }}</td>
        <td class="d-flex justify-content-end">
            <button type="button" class="btn btn-warning d-flex align-items-end" data-toggle="modal" data-target="#edit{{ $item->id }}">
                <i class="material-icons">edit</i>
            </button>
            <button type="button" class="btn btn-primary mr-2 ml-2 d-flex align-items-center" data-toggle="modal" data-target="details{{$item->id}}">
                <i class="material-icons">search</i>
            </button>
            <button type="button" class="btn btn-danger d-flex align-items-end" data-toggle="modal" data-target="#delete{{$item->id}}">
                <i class="material-icons">delete</i>
            </button>
        </td>
    </tr>
      @endforeach
    </tbody>
</table>

  
  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Barang</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/barang/add" method="post">
            @csrf
            <div class="modal-body">
                <div class="row pl-3 pr-3">
                    <label for="nama_barang">Nama Barang :</label>
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="merk_barang">Merk Barang :</label>
                        <input type="text" name="merk_barang" class="form-control" id="merk_barang">
                    </div>
                    <div class="col-md-6">
                        <label for="tipe_barang">Tipe Barang :</label>
                        <input type="text" name="tipe_barang" class="form-control" id="tipe_barang">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">    
                        <label for="lokasi">Lokasi :</label>
                        <select name="lokasi_gudang" class="form-control">
                            @foreach ($gudang as $storage)
                                <option value="{{$storage->id}}">{{$storage->lokasi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="category">Category Barang :</label>
                        <select name="category_barang" class="form-control">
                            @foreach ($category as $kind)
                                <option value="{{$kind->id_category}}">{{$kind->jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="harga_jual" name="harga_jual" class="form-control">
                    </div>
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

@foreach ($barang as $item)
  <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
            <h5 class="modal-title d-inline-flex" id="exampleModalLabel">
                <i class="material-icons">create</i>&nbsp;Edit Barang
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/barang/edit/{{$item->id}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row pl-3 pr-3">
                    <label for="nama_barang">Nama Barang :</label>
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{ $item->nama_barang }}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="merk_barang">Merk Barang :</label>
                        <input type="text" name="merk_barang" class="form-control" id="merk_barang" value={{ $item->merk_barang}}>
                    </div>
                    <div class="col-md-6">
                        <label for="tipe_barang">Tipe Barang :</label>
                        <input type="text" name="tipe_barang" class="form-control" id="tipe_barang" value={{ $item->tipe_barang }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">    
                        <label for="lokasi">Lokasi :</label>
                        <select name="lokasi_gudang" class="form-control">
                            @foreach($edit as $update)
                            <option value="{{$update->lokasi_gudang}}">{{ $update->lokasi }}</option>
                            @endforeach
                            @foreach ($gudang as $storage)
                                <option value="{{$storage->id}}">{{$storage->lokasi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="category">Category Barang :</label>
                        <select name="category_barang" class="form-control">
                            @foreach ($category as $kind)
                                <option value="{{$kind->id_category}}">{{$kind->jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" value="{{$item->harga_beli}}">
                    </div>
                    <div class="col-md-6">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="harga_jual" name="harga_jual" class="form-control" value="{{$item->harga_jual}}">
                    </div>
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
  <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
            <h5 class="modal-title d-inline-flex text-white" id="exampleModalLabel">
                <i class="material-icons">delete</i>&nbsp;Hapus Barang
            </h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/barang/edit/{{$item->id}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row pl-3">
                    <p>Apakah anda yakin akan menghapus data ini ?</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Nama Barang</p>
                    </div>
                    <div class="col-md-6">
                        <p>: {{ $item->nama_barang}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Merk Barang</p>
                    </div>
                    <div class="col-md-6">
                        <p>: {{ $item->merk_barang }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Tipe Barang</p>
                    </div>
                    <div class="col-md-6">
                        <p>: {{ $item->tipe_barang}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Harga Beli</p>
                    </div>
                    <div class="col-md-6">
                        <p>: {{ $item->harga_beli }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Harga Jual</p>
                    </div>
                    <div class="col-md-6">
                        <p>: {{ $item->harga_jual }}</p>
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