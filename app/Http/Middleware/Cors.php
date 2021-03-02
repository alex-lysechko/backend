<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;

/**
 * Class Cors
 *
 * @package App\Http\Middleware
 */
class Cors
{
    /**
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($request->isMethod('OPTIONS')){
            $response = Response::make();
        } else {
            $response = $next($request);
        }
        return $response
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
    }
}
