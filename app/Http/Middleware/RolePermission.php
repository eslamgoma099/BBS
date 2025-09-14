<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;

class RolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$name)
    {

        $roles=explode('_',$name);

        foreach ($roles as $role){
          //  $permission=Permission::whereName($role)->first();

            $roles_id=auth()->user()->roles()->get();
            foreach ($roles_id as $id){
                $permission_id=$id->permissions()->get()->pluck('name')->toarray();

                if(in_array($role,$permission_id)){
                    return $next($request);
                }
            }

        }

        return redirect()->back()->with(['error' => 'No Have Permission']);
    }
}
