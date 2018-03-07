<?php

namespace App\Http\Middleware;

use Closure;

class ForbidEmptyShoppingCart
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
        if(\App\Webshop\ShoppingCart::getCartFromSession()->isEmpty()){
            return redirect()->route('shopping-cart');
        }
        return $next($request);
    }
}
