<?php

namespace App\Http\Middleware;

use App\Services\LinkService;
use Closure;

class LinkCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        LinkService::check($request->route('link'));

        return $next($request);
    }
}
