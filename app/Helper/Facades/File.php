<?php

namespace App\Helper\Facades;

use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class File
{
    // public static function Upload($file, $path)
    // {
    //     if (isset($file) && $file->isValid()) {
    //         $fileName = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
    //         $fullPath = $path . $fileName;

    //         $directory = dirname(Storage::path($fullPath));
    //         if (!is_dir($directory)) {
    //             mkdir($directory, 0755, true);
    //         }

    //         $file->storeAs($path, $fileName);

    //         @chown(Storage::path($fullPath), 'www-data');

    //         return $fileName;
    //     }

    //     return null;
    // }

    public static function Upload($file, $path, $disk = 'public')
    {
        if ($file && $file->isValid()) {
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            $storedPath = $file->storeAs($path, $fileName, $disk);

            @chmod(Storage::disk($disk)->path($storedPath), 0644);

            return $fileName;
        }

        return null;
    }

    public static function NoticeImageUpload($file, $path)
    {
        if (isset($file) && $file->isValid()) {
            $fileName = Str::random(10) . '_' . $file->getClientOriginalName();
            $file->storeAs($path, $fileName);
            return $fileName;
        }

        return null;
    }

    public static function Delete($file_path)
    {
        if (Storage::exists($file_path)) {
            Storage::delete($file_path);
            return true;
        }
        return false;
    }

    public static function GetStudentDataPath($user  = null)
    {
        return 'storage/images/' . ($user ? $user->uuid : Auth::user()->uuid) . '/';
    }
}
