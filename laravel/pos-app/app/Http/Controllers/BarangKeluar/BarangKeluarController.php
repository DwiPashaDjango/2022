<?php

namespace App\Http\Controllers\BarangKeluar;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\KeluarBarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = DB::table('keluar')
        ->join('barang', 'barang.id', '=', 'keluar.barang_id')
        ->select('nama_admin', 'nama_barang', 'jumlah', 'status', 'keluar.created_at', 'keluar.id')
        ->get();
        $pending = DB::table('keluar')
        ->where('status', 'pendding')
        ->join('barang', 'barang.id', '=', 'keluar.barang_id')
        ->select('nama_admin', 'nama_barang', 'jumlah', 'status', 'keluar.created_at', 'keluar.id')
        ->get();
        $canceled = DB::table('keluar')
        ->where('status', 'canceled')
        ->join('barang', 'barang.id', '=', 'keluar.barang_id')
        ->select('nama_admin', 'nama_barang', 'jumlah', 'status', 'keluar.created_at', 'keluar.id')
        ->get();
        return view('keluar.index')->with(['all' => $all, 'pending' => $pending, 'canceled' => $canceled]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('keluar.tambah')->with(['barang' => $barang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'nama_admin' => 'required',
            'barang_id' => 'required',
            'jumlah' => 'required',
        ],[
            'nama_admin' => 'Nama admin harus di isi',
            'barang_id' => 'Pilih salah satu barang yg ingin keluar',
            'jumlah' => 'Jumlah harus di isi minimal 1 barang',
            'status' => 'Status harus di isi'
        ]);

        $input = $request->all();

        if ($data->fails()) {
            return back()->with('toast_error', $data->messages()->all()[0])->withInput();
        }

        KeluarBarangModel::create($input);
        return redirect('keluar')->with('toast_success', 'Barhasil Menambahkan Barang keluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::all();
        $data = KeluarBarangModel::find($id);
        return view('keluar.edit')->with(['data' => $data, 'barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Validator::make($request->all(), [
            'nama_admin' => 'required',
            'barang_id' => 'required',
            'jumlah' => 'required',
        ],[
            'nama_admin' => 'Nama admin harus di isi',
            'barang_id' => 'Pilih salah satu barang yg ingin keluar untuk di update',
            'jumlah' => 'Jumlah harus di isi minimal 1 barang',
            'status' => 'Status harus di isi'
        ]);

        if ($data->fails()) {
            return back()->with('toast_error', $data->messages()->all()[0])->withInput();
        }

        DB::table('keluar')->where('id', $id)->update([
            'nama_admin' => $request->nama_admin,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
        ]);
        return redirect('keluar')->with('toast_success', 'Barhasil Mengupdate Barang keluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KeluarBarangModel::find($id);
        $data->delete();
        return back()->with('toast_warning', 'Berhasil menghapus data barang keluar');
    }
}
