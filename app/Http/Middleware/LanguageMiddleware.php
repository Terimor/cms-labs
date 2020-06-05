<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Language;
use App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     * Sets actual language.
     * Russian is default
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url_array = explode('.', parse_url($request->url(), PHP_URL_HOST));
        $subdomain = $url_array[0];

        $language = in_array($subdomain, Language::getLanguageList())
            ? $subdomain
            : Language::DEFAULT_LANGUAGE;

        App::setLocale($language);
        $request->language = $language;

        return $next($request);
    }
}
