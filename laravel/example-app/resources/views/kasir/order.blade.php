@extends('layouts.base')

@section('content')
<div class="col-lg">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <a href="#" data-bs-toggle="modal" data-bs-target="#orderModal" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Tambah Pesanan</a>
      </div>
      <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-xl">
          <form action="#" method="POST" class="mb-3">
            <div class="input-group">
              <div class="form-outline">
                <input id="search-input" type="search" id="form1" placeholder="Cari...." class="form-control" />
              </div>
            </div>
          </form>
        </div>
        @foreach ($data as $row)
            @php
                $no = 1;
            @endphp
            @php
                $a  = (int)$row->harga_makanan;
                $b  = (int)$row->harga_minuman;
                $c = (int)$row->qty_makanan;
                $d = (int)$row->qty_minuman;
                $e = $a * $c;
                $f = $b * $d;
                $total = $e + $f;
            @endphp
            <ul class="list-group">
              <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                <div class="d-flex flex-column">
                  <h6 class="mb-3 text-sm">Pelanggan: {{$row->nama_pelanggan}}</h6>
                  <span class="mb-2 text-xs">Makanan: <span class="text-dark font-weight-bold ms-sm-2">{{ $row->nama_makanan }} x {{ $row->qty_makanan }}</span></span>
                  <span class="mb-2 text-xs">Minuman: <span class="text-dark ms-sm-2 font-weight-bold">{{ $row->nama_minuman }} x {{ $row->qty_minuman }}</span></span>
                  <span class="text-xs">Total Harga: <span class="ms-sm-2 font-weight-bold text-success text-gradient ">Rp.{{ number_format($total) }}</span></span>
                </div>
                <div class="ms-auto text-end">
                  <a class="btn btn-link text-primary text-gradient px-3 mb-0" href="{{ route('order.print', $row->id) }}"><i class="fa-solid fa-print"></i></a>
                  <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                  {{-- <a class="btn btn-link text-danger px-3 mb-0" href="{{route('order.delete', $row->id)}}"><i class="fas fa-trash text-danger me-2" aria-hidden="true"></i></a> --}}
                  <form action="{{ request()->routeIs('order.delete', $row->id) }}" method="DELETE">
                      @method("DELETE")
                      @csrf
                      <button type="submit" class="show_confirm">Delete</button>
                  </form>
                </div>
              </li>
            </ul>
        @endforeach
        {!! $data->links() !!}
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="orderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orderModalLabel">Orders</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.store') }}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label for="">Nama Kasir</label>
            <input type="text" name="nama_kasir" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label for="">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control">
          </div>
          <div class="form-group mb-3">
            <div class="row">
              <div class="col-md-10">
                <label for="">Makanan</label>
                <select name="id_makanan" class="form-select">
                    <option>--- Pilih Makanan ---</option>
                    @foreach ($mkn as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_makanan }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-2">
                <label for="">Jumlah Pesanan</label>
                <input type="number" class="form-control" name="qty_makanan">
              </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <div class="row">
              <div class="col-md-10">
                <label for="">Minuman</label>
                <select name="id_minuman" class="form-select">
                    <option>--- Pilih Minuman ---</option>
                    @foreach ($mnm as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_minuman }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-2">
                <label for="">Jumlah Pesanan</label>
                <input type="number" class="form-control" name="qty_minuman">
              </div>
            </div>
          </div>

          {{-- <div class="form-group mb-3" style="float: center;">
            <label for="">Jumlah Bayar</label>
            <input type="text" name="total" class="" value="40,000" readonly style="border: none;">
          </div> --}}
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Pesan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
    $(document).ready( function () {
        $('#order').DataTable();
        $('#table-hapus-order').DataTable();
    });

    $('.show_confirm').click(function(event) {
      var form =  $(this).closest("form");
      event.preventDefault();
      swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      })
      .then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire(
            'Deleted!',
            'Your data has been deleted.',
            'success'
            )
        }
    });
  });
@endsection

{{-- {{ number_format($row->total) }} --}}