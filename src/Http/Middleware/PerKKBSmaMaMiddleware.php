<?php namespace Bantenprov\PerKKBSmaMa\Http\Middleware;

use Closure;

/**
 * The PerKKBSmaMaMiddleware class.
 *
 * @package Bantenprov\PerKKBSmaMa
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PerKKBSmaMaMiddleware
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
        return $next($request);
    }
}
