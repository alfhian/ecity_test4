<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\ModuleAuthorization;
use App\Models\Karyawan;

class Dashboard extends Controller
{   
    public function index() {
        $user       = Auth::user();
        $modParent  = ModuleAuthorization::join('modules', 'modules.id', 'module_authorizations.module_id')
            ->where(['module_authorizations.group_id' => $user->group_id, 'modules.status' => 1])
            ->orderBy('modules.module_group', 'asc')
            ->get();

        $data = [
            'modParent' => $modParent,
            'title'     => 'Dashboard',
            'module'    => 'dashboard',
            'username'  => Auth::user()->username
        ];

        return view('dashboard.index',$data);
    }
}
