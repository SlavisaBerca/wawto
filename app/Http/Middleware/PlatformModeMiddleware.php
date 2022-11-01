<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Generalsetting;

class PlatformModeMiddleware
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
        $gs = Generalsetting::findOrFail(1);
        if($gs->is_platform){
            return $next($request);
        }else{
            return back();
        }
      
    }
}
