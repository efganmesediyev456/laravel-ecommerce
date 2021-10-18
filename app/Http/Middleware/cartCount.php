<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cart;

class cartCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cart::instance("cart")->count() == 0) {

            return redirect()->route("shop");
        }
        return $next($request);
    }
}
