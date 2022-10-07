<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class ApiKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view = Karyawan::All();

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        
        $add = Karyawan::create([
            'nik'       => $request->nik,
            'nama'      => $request->nama,
            'ttl'       => $request->ttl,
            'alamat'    => $request->alamat,
            'id_jabatan'=> $request->id_jabatan,
            'id_dept'   => $request->id_dept
        ]);

        $result = [
            'message' => "Data berhasil disimpan !",
            'data' => $add
        ];

        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $karyawan = Karyawan::find($request->id);

        $karyawan->nik      = $request->nik;
        $karyawan->nama     = $request->nama;
        $karyawan->ttl      = $request->ttl;
        $karyawan->alamat   = $request->alamat;
        $karyawan->id_jabatan= $request->id_jabatan;
        $karyawan->id_dept  = $request->id_dept;
        $karyawan->save();

        $result = [
            'message' => "Data berhasil di update !",
            'data' => $karyawan
        ];

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $row = Karyawan::find($request->id);
        $row->delete();

        $result = [
            'message' => "Data berhasil dihapus !",
            'data' => $row
        ];

        return $result;
    }
}
