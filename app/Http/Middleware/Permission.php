<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user            = $request->user();
        $role            = $user->role;
        $permissions     = \Modules\Roles\Entities\Permission::where("role_id",$role->id)->get();
        $access_allowed  = 0; // Permission denied by default

        foreach($permissions as $permission){

            // Example: if pickle-cms.test/admin/user matches the word - 'user' in any permission's entity name, request is allowed.

            if(Str::contains($request->url(),$permission->entity)){
                $access_allowed=1;
                return $next($request);
            }
        }
        return redirect('/');
    }
}
