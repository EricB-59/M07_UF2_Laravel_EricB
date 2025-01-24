<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->urlFilm;
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return redirect('/')->withErrors(['wrongUrl' => 'Not valid url']);
        } 
        return $next($request);
    }
}
