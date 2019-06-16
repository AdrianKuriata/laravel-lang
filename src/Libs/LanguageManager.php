<?php

namespace Devtemple\LaravelLang\Libs;

use Devtemple\LaravelLang\Exceptions\LanguageExistsException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class LanguageManager
{
    protected $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * Getting all created languages
     *
     * @return Collection
     */
    public function getLanguages() : Collection
    {
        $files = $this->getFiles();

        return $files->map(function ($item) {
            $code = pathinfo($item, PATHINFO_FILENAME);

            return [
                'code' => $code,
                'is_default' => config('laravel-lang.locale') == $code
            ];
        });
    }

    /**
     * Create new language
     *
     * @param  string  $language
     *
     * @return string|null
     */
    public function createLanguage(string $language) : ?string
    {
        if ($this->checkIfLanguageExists($language)) {
            throw ValidationException::withMessages([
                'code' => __('Language :code exists in the lang folder.', ['code' => $language])
            ]);
        }

        return $this->filesystem->put($this->getFilePath($language), '{}');
    }

    /**
     * Delete all languages
     *
     * @return bool
     */
    public function deleteLanguages($code = null) : bool
    {
        if (!is_null($code)) {
            return $this->filesystem->delete(resource_path(sprintf('lang/%s.json', $code)));
        }

        $files = $this->getFiles();
        $files = $files->map(function ($item) {
            return $item->getPathname();
        });

        return $this->filesystem->delete($files->toArray());
    }

    public function checkIfLanguageExists(string $language) : bool
    {
        return $this->filesystem->exists($this->getFilePath($language));
    }

    private function getFilePath(string $language) : string
    {
        return resource_path(sprintf('lang/%s.json', $language));
    }

    protected function getFiles() : Collection
    {
        return collect($this->filesystem->files(resource_path('lang')))->filter(function ($item) {
            return pathinfo($item, PATHINFO_EXTENSION) == 'json';
        });
    }
}