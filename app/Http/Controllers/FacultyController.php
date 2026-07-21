<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    public function dashboard()
    {
        $curriculums = Curriculum::with([
            'department', 'course', 'academicYear', 'semester', 'courseType'
        ])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

        return view('faculty.dashboard', compact('curriculums'));
    }
}