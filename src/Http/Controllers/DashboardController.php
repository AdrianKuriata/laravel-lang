<?php

namespace Devtemple\LaravelLang\Http\Controllers;

use Devtemple\LaravelLang\Http\Requests\CreateLanguage;
use Devtemple\LaravelLang\Libs\LanguageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    protected $manager;

    public function __construct(LanguageManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Display a listing of the resource.
     * @todo Usunąć później artisan:call gdy nie będzie potrzebny
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Artisan::call('vendor:publish', [
            '--tag' => 'laravel-lang-public',
            '--force' => true
        ]);

        if (!$this->manager->checkIfLanguageExists(config('laravel-lang.locale'))) {
            $this->manager->createLanguage(config('laravel-lang.locale'));
        }

        return view('laravel-lang::index');
    }
}
