<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->account_type == 'Admin') {
            return $next($request);
        }

        return redirect()->route('login')->withErrors('غير مسموح بالوصول لهذه الصفحة.');
    }

}

