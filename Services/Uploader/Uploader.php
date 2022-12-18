<?php

namespace Services\Uploader;

use Illuminate\Support\Facades\Storage;

class Uploader
{
    public static function upload($file, $path = "")
    {
        $newFile = static::generateName($file);
        $path = public_path($path);
        $uploadedFile = $file->move($path, $newFile);
        return $uploadedFile->getFilename();
    }

    private static function generateName($file)
    {
        return $file->getClientOriginalName() . rand(1000000, 9999999) . "." . $file->getClientOriginalExtension();
    }
}
