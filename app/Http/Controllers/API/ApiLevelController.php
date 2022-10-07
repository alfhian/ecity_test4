<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class ApiLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view = Level::All();

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $add = Level::create([
            'nama_level'=> $request->nama_level,
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
        $edit = Level::where('id_level',$request->id_level)
        ->update([
            'nama_level'=> $request->nama_level,
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
        $row = Level::where('id_level',$request->id_level)->delete();

        $result = [
            'message' => "Data berhasil dihapus !",
            'data' => $row
        ];

        return $result;
    }
}
