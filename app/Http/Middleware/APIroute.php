<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
class APIroute
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
        $req =  $request->all();
        if($request->ExistingVault){

            echo "s3";
        }
        else{

            return redirect('api/blobstore');
        }  
          return $next($request);
        
    }
}
