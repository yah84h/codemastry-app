<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    public function handle($request, Closure $next)
    {
        // if (Session::has('locale')) {
        //     App::setLocale(Session::get('locale'));
        // }

         return $next($request);
    }
}
