<?php

namespace App\Helper\Facades;

use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class File
{
    public static function Upload($file, $path)
    {
        if (isset($file) && $file->isValid()) {
            $fileName = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
            $file->storeAs($path, $fileName);
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
        dd('storage/images/' . ($user ? $user->uuid : Auth::user()->uuid) . '/');
        return 'storage/images/' . ($user ? $user->uuid : Auth::user()->uuid) . '/';
    }
}
