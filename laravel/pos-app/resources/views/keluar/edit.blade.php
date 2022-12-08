@extends('layouts.base')
@section('title') Edit Barang Keluar @endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Barang Keluar</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-primary" onclick="back()"><i class="fas fa-arrow-left"></i></a>
                {{-- <h4 class="ml-3">Edit Barang</h4> --}}
            </div>
            <div class="card-body">
                <form action="{{ route('keluar.update', $data->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Admin</label>
                        <input type="text" name="nama_admin" class="form-control" value="{{ $data->nama_admin }}">
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
                        <input type="number" name="jumlah" class="form-control" value="{{ $data->jumlah }}">
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                            <option value="active">Active</option>
                            <option value="pendding">Pending</option>
                            <option value="canceled">Canceled</option>
                        </select>
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