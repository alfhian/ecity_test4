<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\ModuleAuthorization;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Department;

class KaryawanController extends Controller
{   
    public function index(Request $request)
    {
        $view = Karyawan::select('karyawans.*','b.nama_jabatan','b2.nama_level','c.nama_dept')
            ->leftJoin('jabatans AS b', 'b.id_jabatan', 'karyawans.id_jabatan')
            ->leftJoin('levels AS b2', 'b2.id_level', 'b.id_level')
            ->leftJoin('departments AS c', 'c.id_dept', 'karyawans.id_dept')
            ->get();

        $data = [
            'modParent' => $request->modParent,
            'title'     => 'Karyawan',
            'module'    => 'karyawan',
            'username'  => Auth::user()->username,
            'view' => $view
        ];

        return view('karyawan.index', $data);
    }

    public function add(Request $request)
    {
        $jabatan  = Jabatan::All();
        $department  = Department::All();

        $data = [
            'modParent' => $request->modParent,
            'title'     => 'Add Karyawan',
            'module'    => 'karyawan',
            'username'  => Auth::user()->username,
            'jabatan'   => $jabatan,
            'department'=> $department
        ];

        return view('karyawan.add', $data);
    }

    public function save(Request $request)
    {
        Karyawan::create([
            'nik'       => $request->nik,
            'nama'      => $request->nama,
            'ttl'       => $request->ttl,
            'alamat'    => $request->alamat,
            'id_jabatan'=> $request->jabatan,
            'id_dept'   => $request->department
        ]);

        return redirect('karyawan');
    }

    public function edit($id, Request $request)
    {
        $row            = Karyawan::find($id);
        $jabatan        = Jabatan::where('id_jabatan',$row['id_jabatan'])->get();
        $otherJabatan   = Jabatan::where('id_jabatan','<>',$row['id_jabatan'])->get();
        $department     = Department::where('id_dept',$row['id_dept'])->get();
        $otherDepartment= Department::where('id_dept','<>',$row['id_dept'])->get();
        
        $data = [
            'modParent'      => $request->modParent,
            'title'          => 'Edit Jabatan',
            'module'         => 'jabatan',
            'username'       => Auth::user()->username,
            'row'            => $row,
            'jabatan'        => $jabatan,
            'otherJabatan'   => $otherJabatan,
            'department'     => $department,
            'otherDepartment'=> $otherDepartment
        ];

        return view('karyawan.edit', $data);
    }

    public function save_edit(Request $request) {
        $karyawan = Karyawan::find($request->id);

        $karyawan->nik      = $request->nik;
        $karyawan->nama     = $request->nama;
        $karyawan->ttl      = $request->ttl;
        $karyawan->alamat   = $request->alamat;
        $karyawan->id_jabatan= $request->jabatan;
        $karyawan->id_dept  = $request->department;
        $karyawan->save();

        return redirect('karyawan')->with('success','Data Successfuly edited !');
    }

    public function remove($id) {

        $row = Karyawan::find($id);
        $row->delete();

        return redirect('karyawan')->with('success','Data Successfuly removed !');

    }
}
