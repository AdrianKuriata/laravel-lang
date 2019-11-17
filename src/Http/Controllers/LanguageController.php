<?php

namespace Devtemple\LaravelLang\Http\Controllers;

use Devtemple\LaravelLang\Http\Requests\CreateLanguage;
use Devtemple\LaravelLang\Libs\LanguageManager;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected $manager;

    public function __construct(LanguageManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'languages' => $this->manager->getLanguages()
        ]);
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

        return back()->with('success', 'Poprawnie utworzyłeś nowy język.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
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
     *
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
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_string($id)) {
            $this->manager->deleteLanguages($id);
        }

        if ($id == 1) {
            $this->manager->deleteLanguages();
        }

        return response()->json([
            'languages' => $this->manager->getLanguages()
        ]);
    }
}
