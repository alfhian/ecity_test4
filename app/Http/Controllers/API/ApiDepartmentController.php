<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class ApiDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view = Department::All();

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $add = Department::create([
            'nama_dept'=> $request->nama_dept,
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
        $edit = Department::where('id_dept',$request->id_dept)
        ->update([
            'nama_dept'=> $request->nama_dept,
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
        $row = Department::where('id_dept',$request->id_dept)->delete();

        $result = [
            'message' => "Data berhasil dihapus !",
            'data' => $row
        ];

        return $result;
    }
}
