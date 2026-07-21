<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Department;
use App\Models\Course;
use App\Models\AcademicYear;
use App\Models\Semester;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::with([
            'department',
            'course',
            'academicYear',
            'semester',
            'courseType'
        ])->get();

        return view('curriculums.index', compact('curriculums'));
    }

    public function create()
    {
        $departments = Department::all();
        $courses = Course::all();
        $academicYears = AcademicYear::all();
        $semesters = Semester::all();
        $courseTypes = CourseType::all();

        return view('curriculums.create', compact(
            'departments',
            'courses',
            'academicYears',
            'semesters',
            'courseTypes'
        ));
    }
    public function store(Request $request)
{
    $request->validate([
        'department_id' => 'required',
        'course_id' => 'required',
        'academic_year_id' => 'required',
        'semester_id' => 'required',
        'course_type_id' => 'required',
        'credits' => 'required|integer',
    ]);
    $request->merge(['user_id' => auth()->id(), 'status' => 'Draft']);

    Curriculum::create($request->all());

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Added Successfully.');
}
public function edit($id)
{
    $curriculum = Curriculum::findOrFail($id);

    $departments = Department::all();
    $courses = Course::all();
    $academicYears = AcademicYear::all();
    $semesters = Semester::all();
    $courseTypes = CourseType::all();

    return view('curriculums.edit', compact(
        'curriculum',
        'departments',
        'courses',
        'academicYears',
        'semesters',
        'courseTypes'
    ));
}
public function update(Request $request, $id)
{
    $request->validate([
        'department_id' => 'required',
        'course_id' => 'required',
        'academic_year_id' => 'required',
        'semester_id' => 'required',
        'course_type_id' => 'required',
        'credits' => 'required|integer',
    ]);

    $curriculum = Curriculum::findOrFail($id);

    $curriculum->update($request->all());

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Updated Successfully.');
}

public function destroy($id)
{
    Curriculum::findOrFail($id)->delete();

    return redirect()->route('curriculums.index')
                     ->with('success','Curriculum Deleted Successfully.');
}

public function submit($id)
{
    $curriculum = Curriculum::findOrFail($id);

    $curriculum->status = 'Pending HOD';

    $curriculum->save();

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Submitted Successfully.');
}
public function hodApprove($id)
{
    $curriculum = Curriculum::findOrFail($id);

    $curriculum->status = 'Pending CDC';

    $curriculum->save();

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Approved by HOD.');
}
public function hodReject($id)
{
    $curriculum = Curriculum::findOrFail($id);

    $curriculum->status = 'Rejected by HOD';

    $curriculum->save();

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Rejected by HOD.');
}
public function cdcApprove($id)
{
    $curriculum = Curriculum::findOrFail($id);

    $curriculum->status = 'Pending Admin';

    $curriculum->save();

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Approved by CDC.');
}

public function cdcReject($id)
{
    $curriculum = Curriculum::findOrFail($id);

    $curriculum->status = 'Rejected by CDC';

    $curriculum->save();

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Rejected by CDC.');
}
public function adminApprove($id)
{
    $curriculum = Curriculum::findOrFail($id);

    $curriculum->status = 'Approved';

    $curriculum->save();

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Approved Successfully.');
}

public function adminReject($id)
{
    $curriculum = Curriculum::findOrFail($id);

    $curriculum->status = 'Rejected by Admin';

    $curriculum->save();

    return redirect()->route('curriculums.index')
                     ->with('success', 'Curriculum Rejected by Admin.');
}
}