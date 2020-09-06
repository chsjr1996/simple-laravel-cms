<?php

namespace App\Services\UploadFileService;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Storage;

class UploadFileService
{
    /**
     * @param UploadedFile $file
     * @param string $directory
     * @param string $local
     * @param string $name
     *
     * @return string|bool
     */
    public static function run(
        UploadedFile $file,
        string $directory,
        string $local = 'local',
        string $name = null
    )
    {
        $fileName = $name;
        $fileExtension = $file->getClientOriginalExtension();
        $fileOriginalName = $file->getClientOriginalName();

        if (!$name) {
            $fileName = uniqid(str_replace('.'.$fileExtension, '', $fileOriginalName));
            $fileName.= ".{$fileExtension}";
        }

        $filePath = "{$directory}/{$fileName}";
        $fileContent = file_get_contents($file);

        if (!Storage::disk($local)->put($filePath, $fileContent)) {
            return false;
        }

        return $filePath;
    }
}
