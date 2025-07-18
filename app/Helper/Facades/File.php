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
            $fileName = Auth::user()->uuid . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $fileName, 'public');
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

    public static function GetStudentDataPath()
    {
        return 'storage/public/images/' . Auth::user()->uuid . '/';
    }
}
