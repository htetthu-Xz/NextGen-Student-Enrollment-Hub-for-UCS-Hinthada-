<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index()
    {
        $years = Year::paginate(10);
        return view('admin.years.index', compact('years'));
    }

    public function store(Request $request)
    {
        $year = Year::create([
            'name' => $request->name,
            'is_current' => $request->is_current ? 1 : 0,
        ]);
        return response()->json(['success' => true, 'year' => $year]);
    }

    public function edit(Year $year)
    {
        return response()->json(['success' => true, 'year' => $year]);
    }

    public function update(Request $request, Year $year)
    {
        $year->update([
            'name' => $request->name,
            'is_current' => $request->is_current ? 1 : 0,
        ]);
        return response()->json(['success' => true, 'year' => $year]);
    }

    public function destroy(Year $year)
    {
        $year->delete();
        return response()->json(['success' => true]);
    }
}
