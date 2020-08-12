<?php

namespace App\Http\Middleware;

use Closure;

class MasterMiddleware
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

      if (auth()->check() && auth()->user()->rol == 'Master')
      return $next($request);

      return redirect('/')->with('error','No tienes permiso a acceder a este modulo');
    }
}
