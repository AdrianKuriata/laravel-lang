<?php

namespace Devtemple\LaravelLang\Libs;

use Devtemple\LaravelLang\Exceptions\LanguageExistsException;
use Illuminate\Filesystem\Filesystem;

class LanguageManager
{
    protected $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function getLanguages()
    {

    }

    public function createLanguage($language)
    {
        if ($this->checkIfLanguageExists($language)) {
            throw new LanguageExistsException(__('Language :code exists in the lang folder.', ['code' => $language]));
        }

        return $this->filesystem->put($this->getFilePath($language), '{}');
    }

    public function checkIfLanguageExists($language)
    {
        return $this->filesystem->exists($this->getFilePath($language));
    }

    private function getFilePath($language)
    {
        return resource_path(sprintf('lang/%s.json', $language));
    }
}