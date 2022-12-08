<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\Makanan;
use App\Models\Minuman;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'jdl' => 'Orders',
            'data' => DB::table('order')
            ->join('makanan', 'makanan.id', '=', 'order.id_makanan')
            ->join('minuman', 'minuman.id', '=', 'order.id_minuman')->paginate(5),
            'mkn' => Makanan::all(),
            'mnm' => Minuman::all()
        ];
        return view('kasir.order')->with($data);
    }

    public function print(Order $ord)
    {
        return view('kasir.print')->with($ord);
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
        $request->validate(
            [
                'nama_kasir' => 'required',
                'nama_pelanggan' => 'required',
                'id_makanan' => 'required',
                'qty_makanan' => 'required',
                'id_minuman' => 'required',
                'qty_minuman' => 'required',
            ],
            [
                'nama_kasir.required' => 'Nama Kasir harus Di isi',
                'nama_pelanggan.required' => 'Nama Pelanggan harus Di isi',
                'id_makanan.required' => 'Makanan harus Di isi',
                'id_minuman.required' => 'Minuman harus Di isi',
                'qty_makanan.required' => 'jumlah Pesanan Makanan harus Di isi',
                'qty_minuman.required' => 'jumlah Pesanan Minuman harus Di isi',
            ]
        );

        Order::create([
            'nama_kasir' => $request->nama_kasir,
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_makanan' => $request->id_makanan,
            'id_minuman' => $request->id_minuman,
            'qty_makanan' => $request->qty_makanan,
            'qty_minuman' => $request->qty_minuman,
        ]);
        return to_route('order.kasir')->with(['success' => 'Berhasil Memesan']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $ord)
    {
       $data = Order::where('id', $ord)->delete();
       $data->delete();
       return to_route('order.kasir')->with('success','Berhasil Hapus Pelanggan');
    }
}
