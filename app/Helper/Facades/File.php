<?php

namespace App\Helper\Facades;

use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class File
{
    public static function Upload($file, $path, $disk = 'public')
    {
        if ($file && $file->isValid()) {
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            $file->storeAs($path, $fileName, $disk);

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
        return 'storage/public/images/' . ($user ? $user->uuid : Auth::user()->uuid) . '/';
    }
}
