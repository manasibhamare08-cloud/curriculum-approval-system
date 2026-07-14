<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Course;
use App\Models\AcademicYear;
use App\Models\Semester;
use App\Models\CourseType;
use App\Models\Curriculum;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDepartments = Department::count();
        $totalCourses = Course::count();
        $totalAcademicYears = AcademicYear::count();
        $totalSemesters = Semester::count();
        $totalCourseTypes = CourseType::count();
        $totalCurriculums = Curriculum::count();

        $pendingHOD = Curriculum::where('status', 'Pending HOD')->count();
        $pendingCDC = Curriculum::where('status', 'Pending CDC')->count();
        $pendingAdmin = Curriculum::where('status', 'Pending Admin')->count();

        $approved = Curriculum::where('status', 'Approved')->count();

        $rejected = Curriculum::where('status', 'Rejected by HOD')
            ->orWhere('status', 'Rejected by CDC')
            ->orWhere('status', 'Rejected by Admin')
            ->count();

        return view('dashboard', compact(
            'totalDepartments',
            'totalCourses',
            'totalAcademicYears',
            'totalSemesters',
            'totalCourseTypes',
            'totalCurriculums',
            'pendingHOD',
            'pendingCDC',
            'pendingAdmin',
            'approved',
            'rejected'
        ));
    }
}