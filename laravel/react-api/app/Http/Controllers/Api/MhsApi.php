<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mhs\MhsModel;

class MhsApi extends Controller
{
    public function mhs()
    {
        $data = MhsModel::all();
        return response()->json([
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'umur' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();

        if ($profile = $request->file('profile')) {
            $path = 'image/profile/';
            $profileImage = $profile->getClientOriginalName();
            $profile->move($path, $profileImage);
            $input['profile'] = "$profileImage";        
        }

        $data = MhsModel::create($input);

        return response()->json([
            'data' => $data,
            'message' => 'Successfully added Mahasiswa'
        ], 200);
    }

    public function show($id)
    {
        $data = MhsModel::find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $mhs = MhsModel::find($id);
        $mhs->update($request->all());
        return $mhs;
    }

    public function destroy($id)
    {
        $data = MhsModel::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Successfully deleted Mahasiswa.'
        ]);
    }

    public function search($name)
    {
        return MhsModel::where('name', 'like', '%'.$name.'%')->get();
    }
}
