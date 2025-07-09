<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class StudentGradingController extends Controller
{
    public function index() 
    {
        $semesters = Semester::all();

        return view('admin.grading.index', ['semesters' => $semesters]);
    }

    public function getGrading(Semester $semester) 
    {
        // $semester->getSemesterUsers();
        return view('admin.grading.list', []);
    }
}
