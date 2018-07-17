<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLocale(Request $request, $locale){
        return redirect()->back()->withCookie(cookie()->forever('languageRencolt', $locale));
    }
}
