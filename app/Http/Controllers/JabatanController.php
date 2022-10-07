<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\ModuleAuthorization;
use App\Models\Jabatan;
use App\Models\Level;

class JabatanController extends Controller
{   
    public function index(Request $request)
    {
        $view = Jabatan::select('jabatans.*','b.nama_level')
            ->leftJoin('levels AS b', 'b.id_level', 'jabatans.id_level')
            ->get();

        $data = [
            'modParent' => $request->modParent,
            'title'     => 'Jabatan',
            'module'    => 'jabatan',
            'username'  => Auth::user()->username,
            'view' => $view
        ];

        return view('jabatan.index', $data);
    }

    public function add(Request $request)
    {
        $level  = Level::All();

        $data = [
            'modParent' => $request->modParent,
            'title'     => 'Add Jabatan',
            'module'    => 'jabatan',
            'username'  => Auth::user()->username,
            'level' => $level
        ];

        return view('jabatan.add', $data);
    }

    public function save(Request $request)
    {
        Jabatan::create([
            'nama_jabatan'  => $request->nama_jabatan,
            'id_level'      => $request->level
        ]);

        return redirect('jabatan');
    }

    public function edit($id, Request $request)
    {
        $row                = Jabatan::where('id_jabatan',$id)->get();
        $level              = Level::where('id_level',$row[0]['id_level'])->get();
        $otherLevel         = Level::where('id_level','<>',$row[0]['id_level'])->get();
        
        $data = [
            'modParent'      => $request->modParent,
            'title'          => 'Edit Jabatan',
            'module'         => 'jabatan',
            'username'       => Auth::user()->username,
            'row'            => $row,
            'level'          => $level,
            'otherLevel'     => $otherLevel
        ];

        return view('jabatan.edit', $data);
    }

    public function save_edit(Request $request) {
        DB::table('jabatans')
        ->where('id_jabatan',$request->id)
        ->update([
            'nama_jabatan'  => $request->nama_jabatan,
            'id_level'      => $request->level
        ]);

        return redirect('jabatan')->with('success','Data Successfuly edited !');
    }

    public function remove($id) {

        $row = Jabatan::where('id_jabatan',$id)->delete();

        return redirect('jabatan')->with('success','Data Successfuly removed !');

    }
}
