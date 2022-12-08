@extends('layouts.base')
@section('title') Edit Barang @endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{$barang->nama_barang}}</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="#" onclick="back()" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                {{-- <h4 class="ml-3">Edit Barang</h4> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control">
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
                        <input type="number" value="{{ $barang->stock }}" name="stock" class="form-control">
                        {{-- <div class="valid-feedback">
                        Good job!
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input type="number" value="{{ $barang->harga }}" name="harga" class="form-control">
                        {{-- <div class="valid-feedback">
                        Good job!
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <label>Keterangan Barang</label>
                        <input type="text" value="{{ $barang->keterangan }}" class="form-control" name="keterangan">
                        {{-- <div class="valid-feedback">
                        Good job!
                        </div> --}}
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        function back() {
            window.history.back()
        }
    </script>
@endsection