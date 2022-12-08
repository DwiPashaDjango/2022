<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen\DosenModel;
use Illuminate\Support\Facades\DB;

class DosenApi extends Controller
{
    public function dosen()
    {
        $data = DB::table('dosen')
                ->join('mapel', 'mapel.id', '=', 'dosen.mapel_id')
                ->join('lulusan', 'lulusan.id', '=', 'dosen.lulusan_id')
                ->get(['dosen.*', 'mapel.mapel', 'lulusan.lulusan']);
        return response()->json([
           'data' => $data 
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'tgl_lahir'     => 'required',
            'tempat_lahir'  => 'required',
            'lulusan_id'    => 'required',
            'mapel_id'      => 'required',
            'umur'          => 'required',
            'alamat'        => 'required',
            'profile'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();

        if ($profile = $request->file('profile')) {
            $path = 'image/profile_dosen/';
            $profileImage = $profile->getClientOriginalName();
            $profile->move($path, $profileImage);
            $input['profile'] = "$profileImage";
        }

        $data = DosenModel::create($input);

        return response()->json([
            'data' => $data,
            'message' => 'Successfully added dosen'
        ], 200);
    }

    public function show($id)
    {
        $data = DosenModel::find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $dosen = DosenModel::find($id);
        $dosen->update($request->all());
        return $dosen;
    }

    public function destroy($id)
    {
        $data = DosenModel::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Successfully deleted Dosen.'
        ]);
    }

    public function search($name)
    {
        return DosenModel::where('name', 'like', '%'.$name.'%')->get();
    }
}
