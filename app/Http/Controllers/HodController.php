<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Support\Facades\Auth;

class HodController extends Controller
{
    public function dashboard()
    {
        $curriculums = Curriculum::with([
    'course',
    'department',
    'semester',
    'academicYear',
    'courseType'
])->get();

        return view('hod.dashboard', compact('curriculums'));
    }

    public function show($id)
{
    $curriculum = Curriculum::with([
        'course',
        'department',
        'semester',
        'academicYear',
        'courseType'
    ])->findOrFail($id);

    ($curriculum);

    return view('hod.show', compact('curriculum'));
}
}