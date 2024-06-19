<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class Helpers
{
    public function saveImage($image): string
    {
        $directory = $this->makeDirectory();
        $manager = new ImageManager(new Driver());
        $manager->read($image)->toWebp(90)->save($directory . '/' . time() . '_' . rand(10, 1000) . '_image.webp');
        return $directory . '/' . time() . '_' . rand(10, 1000) . '_image.webp';
    }

    public function removeImage($image): void
    {
        if ($image !== null) {
            Storage::delete($image);
        }

    }

    private static function makeDirectory(): string
    {
        $subFolder = 'images/' . date('Y/m/d');
        Storage::makeDirectory($subFolder);
        return $subFolder;
    }

}
