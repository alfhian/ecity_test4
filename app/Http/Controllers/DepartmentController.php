<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\ModuleAuthorization;
use App\Models\Department;

class DepartmentController extends Controller
{   
    public function index(Request $request)
    {
        $view = Department::All();

        $data = [
            'modParent' => $request->modParent,
            'title'     => 'Department',
            'module'    => 'department',
            'username'  => Auth::user()->username,
            'view' => $view
        ];

        return view('department.index', $data);
    }

    public function add(Request $request)
    {
        $data = [
            'modParent' => $request->modParent,
            'title'     => 'Add Department',
            'module'    => 'department',
            'username'  => Auth::user()->username
        ];

        return view('department.add', $data);
    }

    public function save(Request $request)
    {
        Department::create([
            'nama_dept'  => $request->nama_dept
        ]);

        return redirect('department');
    }

    public function edit($id, Request $request)
    {
        $row = Department::where('id_dept',$id)->get();
        
        $data = [
            'modParent'      => $request->modParent,
            'title'          => 'Edit Department',
            'module'         => 'department',
            'username'       => Auth::user()->username,
            'row'            => $row
        ];

        return view('department.edit', $data);
    }

    public function save_edit(Request $request) {
        DB::table('departments')
        ->where('id_dept',$request->id)
        ->update([
            'nama_dept'  => $request->nama_dept
        ]);

        return redirect('department')->with('success','Data Successfuly edited !');
    }

    public function remove($id) {

        $row = Department::where('id_dept',$id)->delete();

        return redirect('department')->with('success','Data Successfuly removed !');

    }
}
