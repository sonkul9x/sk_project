<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Session,App;
class Locale
{

    protected $app;

    public function __construct()
    {
        if(Session::has('locale')){
            if(in_array(Session::get('locale'), ['en', 'vi'])){
                App::setLocale(Session::get('locale'));
            }
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}