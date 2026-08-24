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
        $sortBy = $request->input('sort_by', 'created_at');
        $sortDir = $request->input('sort_dir', 'desc');

        $allowedSorts = ['credits', 'created_at'];
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }

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
        ->orderBy($sortBy, $sortDir)
        ->paginate(10)
        ->withQueryString();

        $pendingCount = $curriculums->total();

        $departments = Department::all();

        return view('cdc.dashboard', compact(
            'curriculums', 'departments', 'departmentId', 'search', 'pendingCount', 'sortBy', 'sortDir'
        ));
    }

    public function show($id)
    {
        $curriculum = Curriculum::with([
            'department', 'course', 'academicYear', 'semester', 'courseType'
        ])->findOrFail($id);

        return view('cdc.show', compact('curriculum'));
    }

    public function bulkApprove(Request $request)
    {
        $request->validate([
            'curriculum_ids' => 'required|array|min:1',
        ]);

        $ids = $request->input('curriculum_ids');

        $count = Curriculum::whereIn('id', $ids)
            ->where('status', 'Pending CDC')
            ->update(['status' => 'Pending Admin']);

        return redirect()->route('cdc.dashboard')
            ->with('success', $count . ' curriculum(s) approved.');
    }

    public function export(Request $request)
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
        ->get();

        $filename = 'cdc_pending_curriculums_' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($curriculums) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Course', 'Department', 'Academic Year', 'Semester', 'Credits', 'Submitted On']);

            foreach ($curriculums as $c) {
                fputcsv($file, [
                    $c->course->course_name ?? '-',
                    $c->department->name ?? '-',
                    $c->academicYear->academic_year ?? '-',
                    $c->semester->semester_name ?? '-',
                    $c->credits,
                    optional($c->created_at)->format('d M Y'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function history(Request $request)
    {
        $search = $request->input('search');

        $curriculums = Curriculum::with([
            'department', 'course', 'academicYear', 'semester', 'courseType'
        ])
        ->whereIn('status', ['Pending Admin', 'Approved', 'Rejected by CDC', 'Rejected by Admin'])
        ->when($search, function ($query, $search) {
            $query->whereHas('course', function ($q) use ($search) {
                $q->where('course_name', 'like', '%' . $search . '%');
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('cdc.history', compact('curriculums', 'search'));
    }
}