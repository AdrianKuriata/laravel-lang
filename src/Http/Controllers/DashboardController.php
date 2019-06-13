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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLanguage  $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Devtemple\LaravelLang\Exceptions\LanguageExistsException
     */
    public function store(CreateLanguage $request)
    {
        $this->manager->createLanguage($request->code);

        return response()->json([
            'test' => 'test'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
