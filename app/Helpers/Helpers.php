<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Storage;

class Helpers
{
    public function makeDirectory(): string
    {
        $subDir = 'images/' . date('Y/m/d');
        Storage::makeDirectory($subDir);
        return $subDir;
    }

    public function uploadImage($image): string
    {
        $path = $this->makeDirectory();
        $image->store($path);
        return $path;
    }

    public function removeImage($image): void
    {
        Storage::delete($image);
    }

}
