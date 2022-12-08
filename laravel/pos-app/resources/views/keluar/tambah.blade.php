@extends('layouts.base')
@section('title') Tambah Barang keluar @endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Barang Keluar</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="#" onclick="back()" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="card-body">
                <form action="{{ route('keluar.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Admin</label>
                        <input type="text" name="nama_admin" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang Keluar</label>
                        <select name="barang_id" class="form-control">
                            <option></option>
                            @foreach ($barang as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="#">Jumlah Barang keluar</label>
                        <input type="number" name="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="status" class="form-control" value="active">
                    </div>

                    <div class="card-footer text-right">
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-info">Tambah</button>
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