<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\ModuleAuthorization;
use App\Models\Level;

class LevelController extends Controller
{   
    public function index(Request $request)
    {
        $view = Level::All();

        $data = [
            'modParent' => $request->modParent,
            'title'     => 'Level',
            'module'    => 'level',
            'username'  => Auth::user()->username,
            'view' => $view
        ];

        return view('level.index', $data);
    }

    public function add(Request $request)
    {
        $data = [
            'modParent' => $request->modParent,
            'title'     => 'Add Level',
            'module'    => 'level',
            'username'  => Auth::user()->username
        ];

        return view('level.add', $data);
    }

    public function save(Request $request)
    {
        Level::create([
            'nama_level'  => $request->nama_level
        ]);

        return redirect('level');
    }

    public function edit($id, Request $request)
    {
        $row = Level::where('id_level',$id)->get();
        
        $data = [
            'modParent'      => $request->modParent,
            'title'          => 'Edit Level',
            'module'         => 'level',
            'username'       => Auth::user()->username,
            'row'            => $row
        ];

        return view('level.edit', $data);
    }

    public function save_edit(Request $request) {
        DB::table('levels')
        ->where('id_level',$request->id)
        ->update([
            'nama_level'  => $request->nama_level
        ]);

        return redirect('level')->with('success','Data Successfuly edited !');
    }

    public function remove($id) {

        $row = Level::where('id_level',$id)->delete();

        return redirect('level')->with('success','Data Successfuly removed !');

    }
}
