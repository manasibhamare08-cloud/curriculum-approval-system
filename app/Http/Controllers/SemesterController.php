<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::with('academicYear')->get();

        return view('semesters.index', compact('semesters'));
    }

    public function create()
    {
        $academicYears = AcademicYear::all();

        return view('semesters.create', compact('academicYears'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester_name' => 'required',
            'academic_year_id' => 'required|exists:academic_years,id',
        ]);

        Semester::create($request->all());

        return redirect()->route('semesters.index')
                         ->with('success', 'Semester Added Successfully.');
    }

    public function edit($id)
    {
        $semester = Semester::findOrFail($id);
        $academicYears = AcademicYear::all();

        return view('semesters.edit', compact('semester', 'academicYears'));
    }

    public function update(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);

        $request->validate([
            'semester_name' => 'required',
            'academic_year_id' => 'required|exists:academic_years,id',
        ]);

        $semester->update($request->all());

        return redirect()->route('semesters.index')
                         ->with('success', 'Semester Updated Successfully.');
    }

    public function destroy($id)
    {
        Semester::findOrFail($id)->delete();

        return redirect()->route('semesters.index')
                         ->with('success', 'Semester Deleted Successfully.');
    }
}