<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class Language
{
    public function handle($request, Closure $next)
    {

        if($request->hasCookie('languageRencolt')) {
            $cookie = $request->cookie('languageRencolt');
            if (in_array($cookie, Config::get('app.locales'))) {
                $locale = $cookie;
            } else $locale = Config::get('app.locale');
            app()->setLocale($locale);
            Carbon::setLocale($locale);
            switch ($locale) {
                case 'ru':
                    setLocale(LC_TIME, 'ru_RU.utf8');
                    break;
                case 'uz':
                    setLocale(LC_TIME,'uz-Latn-UZ');
                    break;
                default:
                    setLocale(LC_TIME,'en-US');
                    # code...
                    break;
            }
            return $next($request);
        } else {
            $response = $next($request);
            $response->withCookie(cookie()->forever('languageRencolt', Config::get('app.locale')));
            return $response;
        }

    }

}