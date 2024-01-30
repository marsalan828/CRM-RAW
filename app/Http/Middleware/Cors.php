<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
     /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $headers = [
            'Access-Control-Allow-Origin'=>'*',
            'Access-Control-Allow-Methods'=>'GET,POST,PUT,DELETE',
            'Access-Control-Allow-Headers'=>'Content-Type,Authorization'
        ];

        foreach ($headers as $key=>$val) {
            $response->header($key,$val);
        }
        return $response;

        // $response->headers()->set('Access-Control-Allow-Origin','*');
        // $response->headers()->set('Access-Control-Allow-Methods','GET,POST,PUT,DELETE,OPTIONS');
        // $response->headers()->set('Access-Control-Allow-Headers','Content-Type,Authorization');

        // return $response;
    }
}
