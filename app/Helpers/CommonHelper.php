<?php

namespace App\Helpers;

use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CommonHelper
{

    public static function  generateUniqueSlug(string $slug, string $table, int $counter = 1)
    { //generate the unique slug

        $slug = Str::of($slug)->slug('-')->__toString() . (($counter > 1) ? '-' : '');

        if (Schema::hasTable($table)) {
            if (DB::table($table)->where('slug', $slug)->doesntExist()) {
                return $slug;
            }
            return static::generateUniqueSlug($slug, $table, $counter + 1);
        }
    }

    public static function uploadSingleImage($image, $path, $is_thumbnail = true)
    {
        if (is_file($image)) {
            return self::makeDirectoryAndStore($image, $path, $is_thumbnail);
        }
    }

    public static function makeDirectoryAndStore($image, $path, $is_thumbnail = true): array
    {
        $image_path     = "/storage/{$path}";
        $thumbnail_path = "/storage/{$path}_thumbnails";
        $arr            = [];

        // Check and create directories if not exist
        if (!is_dir(public_path($image_path))) {
            File::makeDirectory(public_path($image_path), 0755, true);
        }
        if ($is_thumbnail && !is_dir(public_path($thumbnail_path))) {
            File::makeDirectory(public_path($thumbnail_path), 0755, true);
        }

        // Store the image
        $arr['image']     = self::storeImage($image, $image_path);
        // Generate thumbnail if required
        $arr['thumbnail'] = null;

        return $arr;
    }

    // Store the original image
    public static function storeImage($image, $path)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension(); // Create unique image name
        $image->move(public_path($path), $imageName); // Move the image to the directory
        return $path . "/{$imageName}";
    }

    public static function getImage($file): string //show image from public directory otherwise return placeholder
    {
        if (file_exists(public_path($file)) && !is_null($file)) {
            return asset($file);
        }
        return asset('images/profile_placeholder.png');
    }

    public static function removeImage($file)
    { //remove the iamge from directory
        @unlink(public_path($file));
    }
}
