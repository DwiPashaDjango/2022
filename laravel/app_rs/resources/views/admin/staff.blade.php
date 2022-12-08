@extends('layouts.app')

@section('title', 'Staff')

@push('style')

@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <button id="back" class="btn btn-primary mr-4"><i class="fas fa-users"></i></button>
                <h1>Staff</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary btn-sm add"><i class="fas fa-plus"></i></button>
                    </div>
                   <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0" id="usr-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jk</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Job</th>
                                        <th>No telephon</th>
                                        <th>Alamat</th>
                                        <th>Validasi</th>
                                        <th>Created At</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                        </div>
                   </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('modal')
<div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalAddLabel"></h4>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
            <form>
                @csrf
                <input type="hidden" name="validasi" id="validasi" value="not_validate" class="form-control">
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control">
                        <option selected>-- Jenis Kelamin --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No Telephon</label>
                    <input type="number" name="no_tlp" id="no_tlp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Job</label>
                    <select name="id_job" id="id_job" class="form-control">
                        <option selected>-- Job --</option>
                        @foreach ($job as $j)
                            <option value="{{ $j->id }}">{{$j->job}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="8"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option selected>-- Level --</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="dokter">Dokter</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="on">
                </div>
            </form>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary saveAdd">Tambah</button>
        </div>
      </div>
    </div>
  </div>
@endpush
@push('scripts')
    <script src="{{ asset('js/dosen.js') }}"></script>
@endpush
