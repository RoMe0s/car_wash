<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    protected $user;

    function __construct() {
    
        $user = Auth::getUser();
        
        $this->user = $user;
    
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!$this->user) return redirect(route('admin.login'), 301);
        
        return $next($request);
    }
}
