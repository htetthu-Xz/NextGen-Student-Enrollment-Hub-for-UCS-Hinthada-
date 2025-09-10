<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FormController extends Controller
{
    public function download()
    {
        $file = public_path('admin-assets/form.pdf');
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Registration_Form.pdf"',
        ];
        return Response::file($file, $headers);
    }
}
