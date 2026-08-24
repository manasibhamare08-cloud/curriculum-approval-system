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

        if (auth()->user()->role == 'faculty') {
            return redirect()->route('faculty.dashboard')
                             ->with('success', 'Curriculum Added Successfully.');
        }

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





    public function update(Request $request,$id)
    {

        $request->validate([
            'department_id'=>'required',
            'course_id'=>'required',
            'academic_year_id'=>'required',
            'semester_id'=>'required',
            'course_type_id'=>'required',
            'credits'=>'required|integer',
        ]);


        $curriculum = Curriculum::findOrFail($id);


        $curriculum->update($request->all());


        return redirect()
            ->route('curriculums.index')
            ->with('success','Curriculum Updated Successfully.');
    }





    public function destroy($id)
    {

        Curriculum::findOrFail($id)->delete();


        return redirect()
            ->route('curriculums.index')
            ->with('success','Curriculum Deleted Successfully.');
    }




public function cdcReject(Request $request, $id)
{
    $request->validate([
        'remarks' => 'required|string|min:3',
    ]);

    $curriculum = Curriculum::findOrFail($id);

    $curriculum->status = 'Rejected by CDC';
    $curriculum->remarks = trim($request->input('remarks'));

    // Faculty Submit

    public function submit($id)
    {

        $curriculum = Curriculum::findOrFail($id);


        $curriculum->update([
            'status'=>'Pending HOD'
        ]);


        return redirect()
            ->route('curriculums.index')
            ->with('success','Curriculum Submitted Successfully.');
    }





    // HOD Approval

    public function hodApprove($id)
    {

        $curriculum = Curriculum::findOrFail($id);


        $curriculum->update([
            'status'=>'Pending CDC'
        ]);


        return redirect()
            ->route('hod.dashboard')
            ->with('success','Curriculum Approved by HOD.');
    }





    // HOD Reject

    public function hodReject($id)
    {

        $curriculum = Curriculum::findOrFail($id);


        $curriculum->update([
            'status'=>'Rejected by HOD'
        ]);


        return redirect()
            ->route('hod.dashboard')
            ->with('success','Curriculum Rejected by HOD.');
    }





    // CDC Approval

    public function cdcApprove($id)
    {

        $curriculum = Curriculum::findOrFail($id);


        $curriculum->update([
            'status'=>'Pending Admin'
        ]);


        return redirect()
            ->route('curriculums.index')
            ->with('success','Curriculum Approved by CDC.');
    }





    // CDC Reject

    public function cdcReject($id)
    {

        $curriculum = Curriculum::findOrFail($id);


        $curriculum->update([
            'status'=>'Rejected by CDC'
        ]);


        return redirect()
            ->route('curriculums.index')
            ->with('success','Curriculum Rejected by CDC.');
    }





    // Admin Approval

    public function adminApprove($id)
    {

        $curriculum = Curriculum::findOrFail($id);


        $curriculum->update([
            'status'=>'Approved'
        ]);


        return redirect()
            ->route('curriculums.index')
            ->with('success','Curriculum Approved Successfully.');
    }





    // Admin Reject

    public function adminReject($id)
    {

        $curriculum = Curriculum::findOrFail($id);


        $curriculum->update([
            'status'=>'Rejected by Admin'
        ]);


        return redirect()
            ->route('curriculums.index')
            ->with('success','Curriculum Rejected by Admin.');
    }
    public function show($id)
{
    $curriculum = Curriculum::with([
        'department',
        'course',
        'academicYear',
        'semester',
        'courseType'
    ])->findOrFail($id);


    return view('curriculums.show', compact('curriculum'));
}


}