<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kt = Kategori::all();
        $barang = DB::table('barang')
        ->join('kategori', 'kategori.id', '=', 'barang.kategori_id')
        ->select('nama_kategori', 'nama_barang', 'harga', 'stock', 'keterangan', 'barang.id')
        ->get();
        return view('barang.index')->with(['barang' => $barang, 'kt' => $kt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ],[
            'nama_barang' => 'Nama barang harus di isi',
            'kategori_id' => 'Kategori barang harus di isi',
            'stock' => 'Stock barang minimal 1 barang',
            'harga' => 'Harga harus di isi',
            'keterangan' => 'keterangan barang harus di isi',
        ]); 

        $input = $request->all();

        if ($data->fails()) {
            return back()->with('toast_error', $data->messages()->all()[0])->withInput();
        }

        Barang::create($input);
        return redirect('barang')->with('toast_success', 'Berhasil Menambahkan Barang');
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
        $kt = Kategori::all();
        $data = Barang::find($id);
        return view('barang.edit')->with(['barang' =>$data, 'kt' => $kt]);
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
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ],[
            'nama_barang' => 'Nama barang harus di isi',
            'kategori_id' => 'Kategori Tidak Boleh Kosong',
            'stock' => 'Stock barang minimal 1 barang',
            'harga' => 'Harga harus di isi',
            'keterangan' => 'keterangan barang harus di isi',
        ]); 

        if ($data->fails()) {
            return back()->with('toast_error', $data->messages()->all()[0])->withInput();
        }

        DB::table('barang')->where('id', $request->id)->update([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('barang')->with('toast_success', 'Berhasil mengupdate data barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect('barang')->with('toast_warning', 'Berhasil menghapus data barang');
    }
}
