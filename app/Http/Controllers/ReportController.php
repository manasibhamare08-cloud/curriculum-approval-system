<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Department;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function curriculumReport(Request $request)
    {
        $departments = Department::all();
        $academicYears = AcademicYear::all();

        $query = Curriculum::with([
            'department', 'course', 'academicYear', 'semester', 'courseType'
        ]);

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        if ($request->filled('academic_year_id')) {
            $query->where('academic_year_id', $request->academic_year_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $curriculums = $query->latest()->get();

        return view('reports.curriculum', compact(
            'curriculums', 'departments', 'academicYears'
        ));
    }

    public function curriculumReportExport(Request $request)
    {
        $query = Curriculum::with([
            'department', 'course', 'academicYear', 'semester', 'courseType'
        ]);

        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        if ($request->filled('academic_year_id')) {
            $query->where('academic_year_id', $request->academic_year_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $curriculums = $query->latest()->get();

        $filename = 'curriculum_report_' . now()->format('Y_m_d_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($curriculums) {
            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'ID', 'Course', 'Department', 'Academic Year',
                'Semester', 'Course Type', 'Credits', 'Status'
            ]);

            foreach ($curriculums as $curriculum) {
                fputcsv($file, [
                    $curriculum->id,
                    $curriculum->course->course_name ?? '-',
                    $curriculum->department->name ?? '-',
                    $curriculum->academicYear->academic_year ?? '-',
                    $curriculum->semester->semester_name ?? '-',
                    $curriculum->courseType->type_name ?? '-',
                    $curriculum->credits,
                    $curriculum->status,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}