<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\LangFiles;

class LanguageAdminController extends Controller
{


	public $data = [];
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function showTexts(LangFiles $langfile, Language $languages, $lang = '', $file = 'site')
    {

        if ($lang) {
            $langfile->setLanguage($lang);
        }

        $langfile->setFile($file);
        
        $this->data['currentFile'] = $file;
        $this->data['currentLang'] = $lang ?: config('app.locale');
        $this->data['currentLangObj'] = Language::where('abbr', '=', $this->data['currentLang'])->first();
        $this->data['browsingLangObj'] = Language::where('abbr', '=', config('app.locale'))->first();
        $this->data['languages'] = $languages->orderBy('name')->where('active', 1)->get();
        $this->data['langFiles'] = $langfile->getlangFiles();
        $this->data['fileArray'] = $langfile->getFileContent();
        $this->data['langfile'] = $langfile;
        $this->data['title'] = 'Translation in admin panel';

        return view('langs.translations', $this->data);
    }

    public function updateTexts(LangFiles $langfile, Request $request, $lang = '', $file = 'site')
    {

        $message = 'General error in translation';
        $status = false;

        if ($lang) {
            $langfile->setLanguage($lang);
        }

        $langfile->setFile($file);

        $fields = $langfile->testFields($request->all());
        if (empty($fields)) {
            if ($langfile->setFileContent($request->all())) {
                // \Alert::success(trans('backpack::langfilemanager.saved'))->flash();
                $status = true;
            }
        } else {
            $message ='Not translated or updated';
            // \Alert::error(trans('backpack::langfilemanager.please_fill_all_fields'))->flash();
        }

        return redirect()->back()->with('message','Языковые файлы успешно обновлены');
    }
}
