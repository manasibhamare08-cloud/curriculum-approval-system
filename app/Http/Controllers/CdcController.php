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

        $curriculums = Curriculum::with([
            'department', 'course', 'academicYear', 'semester', 'courseType'
        ])
        ->where('status', 'Pending CDC')
        ->when($departmentId, function ($query, $departmentId) {
            $query->where('department_id', $departmentId);
        })
        ->latest()
        ->get();

        $departments = Department::all();

        return view('cdc.dashboard', compact('curriculums', 'departments', 'departmentId'));
    }
}