<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $academicYears = AcademicYear::when($search, function ($query, $search) {
                $query->where('academic_year', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('academic-years.index', compact('academicYears', 'search'));
    }

    public function create()
    {
        return view('academic-years.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'academic_year' => 'required|unique:academic_years',
        ]);

        AcademicYear::create([
            'academic_year' => $request->academic_year,
            'status' => true,
        ]);

        return redirect()->route('academic-years.index')
                         ->with('success', 'Academic Year Added Successfully.');
    }

    public function edit($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        return view('academic-years.edit', compact('academicYear'));
    }

    public function update(Request $request, $id)
    {
        $academicYear = AcademicYear::findOrFail($id);

        $request->validate([
            'academic_year' => 'required|unique:academic_years,academic_year,' . $id,
        ]);

        $academicYear->update([
            'academic_year' => $request->academic_year,
        ]);

        return redirect()->route('academic-years.index')
                         ->with('success', 'Academic Year Updated Successfully.');
    }

    public function destroy($id)
    {
        AcademicYear::findOrFail($id)->delete();

        return redirect()->route('academic-years.index')
                         ->with('success', 'Academic Year Deleted Successfully.');
    }
}