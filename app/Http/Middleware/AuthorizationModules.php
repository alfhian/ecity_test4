<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use App\Models\ModuleAuthorization;

use Closure;
use Illuminate\Http\Request;

class AuthorizationModules
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user= Auth::user();
        $modParent  = ModuleAuthorization::join('modules', 'modules.id', 'module_authorizations.module_id')
            ->where(['module_authorizations.group_id' => Auth::user()->group_id, 'modules.status' => 1])
            ->orderBy('modules.module_group', 'asc')
            ->get();

        $request->merge(["modParent" => $modParent]);

        return $next($request);
    }
}
