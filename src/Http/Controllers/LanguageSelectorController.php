<?php

namespace Devtemple\LaravelLang\Http\Controllers;

use Devtemple\LaravelLang\Http\Requests\CreateLanguage;
use Devtemple\LaravelLang\Libs\LanguageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LanguageSelectorController extends Controller
{
    protected $manager;

    public function __construct(LanguageManager $manager)
    {
        $this->manager = $manager;
    }

    public function index()
    {
        return response()->json([
            'languages' => $this->manager->getLanguages(),
            'language_translations' => [
                'label' => trans('laravel-lang::language_picker.label')
            ]
        ]);
    }
}
