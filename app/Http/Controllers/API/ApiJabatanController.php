<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;

class ApiJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view = Jabatan::All();

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $add = Jabatan::create([
            'nama_jabatan'=> $request->nama_jabatan,
            'id_level'=> $request->id_level,
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
        $edit = Jabatan::where('id_jabatan',$request->id_jabatan)
        ->update([
            'nama_jabatan'=> $request->nama_jabatan,
            'id_level'=> $request->id_level,
        ]);

        $result = [
            'message' => "Data berhasil di update !",
            'data' => $edit
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
        $row = Jabatan::where('id_jabatan',$request->id_jabatan)->delete();

        $result = [
            'message' => "Data berhasil dihapus !",
            'data' => $row
        ];

        return $result;
    }
}
