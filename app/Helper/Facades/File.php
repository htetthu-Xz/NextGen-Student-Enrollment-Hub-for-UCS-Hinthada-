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
        if ($file->isValid()) {
            $file_name = Carbon::now()->format('Ymdhisf') . '_' . $file->getClientOriginalName();

            Storage::put($path . $file_name, file_get_contents($file));

            return $file_name;
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
        $authUser = Auth::user();
        return 'storage/images/' . Str::slug($authUser->name) . '-'  . Auth::user()->uuid . '/';
    }
}
