@extends('layouts.base')
@section('title') Barang Masuk @endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Barang Masuk</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Barang</h4>
                        <a href="#"  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary ml-5 kategori" style="float: right;"><i class="fas fa-plus"></i> Tambah Kategori</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                        </div>
                        <form action="{{ route('barang.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control">
                                {{-- <div class="valid-feedback">
                                Good job!
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <label for="">Katgori Barang</label>
                                <select name="kategori_id" id="" class="form-control">
                                    <option></option>
                                    @foreach ($kt as $k)
                                        <option value="{{$k->id}}">{{$k->nama_kategori}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Barang</label>
                                <input type="number" name="stock" class="form-control">
                                {{-- <div class="valid-feedback">
                                Good job!
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <label>Harga Barang</label>
                                <input type="number" name="harga" class="form-control">
                                {{-- <div class="valid-feedback">
                                Good job!
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <label>Keterangan Barang</label>
                                <input type="text" class="form-control" name="keterangan">
                                {{-- <div class="valid-feedback">
                                Good job!
                                </div> --}}
                            </div>
                            <div class="card-footer text-right">
                                <button type="reset" class="btn btn-secondary">Canel</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Barang Masuk</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-md table-striped text-center" id="table-barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Keteranagan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($barang as $b)
                                @php
                                    $a = $b->stock;
                                    $b = $b->harga;
                                    $total = $a * $b;
                                @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $b->nama_barang }}</td>
                                        <td>{{ $b->nama_kategori }}</td>
                                        <td>{{ $b->stock }}</td>
                                        <td>{{ number_format($b->harga) }}</td>
                                        <td>{{ $total }}</td>
                                        <td>
                                            <form action="{{ route('barang.edit', $b->id) }}">
                                                @csrf
                                                <button class="btn btn-link text-warning"><i class="fas fa-pen"></i></button>
                                            </form>
                                            <form action="{{ route('barang.destroy', $b->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('kategori.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script>
        $("#table-barang").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [2,3] }
            ]   
        });

        // $(".kategori").modal('show');
           
    </script>
@endsection