<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class IsTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::has('userrole')!='teacher'){
            return redirect()->to('/dashboard')->with('msg','yor are not authorized');
        }
        return $next($request);
    }
}
