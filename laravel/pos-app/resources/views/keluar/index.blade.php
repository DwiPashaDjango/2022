@extends('layouts.base')
@section('title') Barang Keluar @endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Barang Keluar</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                {{-- <h4>Data Barang keluar</h4> --}}
                <div style="float: right;">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">all</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Canceled</a>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('keluar.create') }}" style="float: right;" class="btn btn-warning ml-4"><i class="fas fa-plus"></i> Tambah Barang Keluar</a>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <table class="table text-center table-striped" id="table-all">
                            <thead>
                                <tr>
                                    <th class="bg-info text-white">No</th>
                                    <th class="bg-info text-white">Nama Admin</th>
                                    <th class="bg-info text-white">Barang</th>
                                    <th class="bg-info text-white">Jumlah</th>
                                    <th class="bg-info text-white">Status</th>
                                    <th class="bg-info text-white">Tanggal</th>
                                    <th class="bg-info text-white"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($all as $al)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $al->nama_admin }}</td>
                                        <td>{{ $al->nama_barang }}</td>
                                        <td>{{ $al->jumlah }}</td>
                                        @if ($al->status == 'active')
                                            <td class="badge badge-success my-2">{{ $al->status }}</td>
                                        @elseif ($al->status == 'pendding')
                                            <td class="badge badge-warning my-2">{{ $al->status }}</td>
                                        @else
                                            <td class="badge badge-danger my-2">{{ $al->status }}</td>
                                        @endif
                                        <td>{{ date('d-m-Y', strtotime($al->created_at)) }}</td>
                                        <td>
                                            <form action="{{ route('keluar.edit', $al->id) }}">
                                                @csrf
                                                <button class="btn btn-link text-warning"><i class="fas fa-pen"></i></button>
                                            </form>
                                            <form action="{{ route('keluar.delete', $al->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                        <table class="table text-center table-striped" id="table-pending">
                            <thead>
                                <tr>
                                    <th class="bg-warning text-white">No</th>
                                    <th class="bg-warning text-white">Nama Admin</th>
                                    <th class="bg-warning text-white">Barang</th>
                                    <th class="bg-warning text-white">Jumlah</th>
                                    <th class="bg-warning text-white">Status</th>
                                    <th class="bg-warning text-white">Tanggal</th>
                                    <th class="bg-warning text-white"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pending as $al)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $al->nama_admin }}</td>
                                        <td>{{ $al->nama_barang }}</td>
                                        <td>{{ $al->jumlah }}</td>
                                        @if ($al->status == 'active')
                                            <td class="badge badge-success my-2">{{ $al->status }}</td>
                                        @elseif ($al->status == 'pendding')
                                            <td class="badge badge-warning my-2">{{ $al->status }}</td>
                                        @else
                                            <td class="badge badge-danger my-2">{{ $al->status }}</td>
                                        @endif
                                        <td>{{ date('d-m-Y', strtotime($al->created_at)) }}</td>
                                        <td>
                                            <form action="{{ route('keluar.edit', $al->id) }}">
                                                @csrf
                                                <button class="btn btn-link text-warning"><i class="fas fa-pen"></i></button>
                                            </form>
                                            <form action="{{ route('keluar.delete', $al->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-link text-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                        <table class="table text-center table-striped" id="table-canceled">
                            <thead>
                                <tr>
                                    <th class="bg-danger text-white">No</th>
                                    <th class="bg-danger text-white">Nama Admin</th>
                                    <th class="bg-danger text-white">Barang</th>
                                    <th class="bg-danger text-white">Jumlah</th>
                                    <th class="bg-danger text-white">Status</th>
                                    <th class="bg-danger text-white">Tanggal</th>
                                    <th class="bg-danger text-white"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($canceled as $al)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $al->nama_admin }}</td>
                                        <td>{{ $al->nama_barang }}</td>
                                        <td>{{ $al->jumlah }}</td>
                                        @if ($al->status == 'active')
                                            <td class="badge badge-success my-2">{{ $al->status }}</td>
                                        @elseif ($al->status == 'pendding')
                                            <td class="badge badge-warning my-2">{{ $al->status }}</td>
                                        @else
                                            <td class="badge badge-danger my-2">{{ $al->status }}</td>
                                        @endif
                                        <td>{{ date('d-m-Y', strtotime($al->created_at)) }}</td>
                                        <td>
                                            <form action="{{ route('keluar.edit', $al->id) }}">
                                                @csrf
                                                <button class="btn btn-link text-warning"><i class="fas fa-pen"></i></button>
                                            </form>
                                            <form action="{{ route('keluar.delete', $al->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
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
@endsection

@section('scripts')
    <script>
        $("#table-all").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [2,3] }
            ]   
        });
        $("#table-pending").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [2,3] }
            ]   
        });
        $("#table-canceled").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [2,3] }
            ]   
        });
    </script>
@endsection