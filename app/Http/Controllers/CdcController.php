<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Department;
use Illuminate\Http\Request;

class CdcController extends Controller
{
    public function dashboard(Request $request)
    {
        $departmentId = $request->input('department_id');
        $search = $request->input('search');

        $curriculums = Curriculum::with([
            'department', 'course', 'academicYear', 'semester', 'courseType'
        ])
        ->where('status', 'Pending CDC')
        ->when($departmentId, function ($query, $departmentId) {
            $query->where('department_id', $departmentId);
        })
        ->when($search, function ($query, $search) {
            $query->whereHas('course', function ($q) use ($search) {
                $q->where('course_name', 'like', '%' . $search . '%');
            });
        })
        ->latest()
        ->get();

        $departments = Department::all();
        $pendingCount = $curriculums->count();

        return view('cdc.dashboard', compact(
            'curriculums', 'departments', 'departmentId', 'search', 'pendingCount'
        ));
    }

    public function show($id)
    {
        $curriculum = Curriculum::with([
            'department', 'course', 'academicYear', 'semester', 'courseType'
        ])->findOrFail($id);

        return view('cdc.show', compact('curriculum'));
    }
}