<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Staff extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'job' => DB::table('job')->get()
        ];
        return view('admin.staff')->with($data);
    }

    public function jsonUser()
    {
        $data = DB::table('users')
        ->leftJoin('job', 'job.id', '=', 'users.id_job')
        ->select('users.id','users.name', 'users.jk', 'users.email', 'users.tgl_lahir', 'users.tempat_lahir', 'job.job', 'users.no_tlp', 'users.alamat', 'users.validasi', 'users.created_at')
        ->get();
        return response()->json($data);
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
       $data = [
            'name' => $request->name,
            'validasi' => $request->validasi,
            'level' => $request->level,
            'email' => $request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'id_job' => $request->id_job,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password)
       ];
       User::create($data);
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
    public function destroy($id)
    {
        //
    }
}
