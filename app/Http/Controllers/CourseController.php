<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('department')->get();
        return view('courses.index', compact('courses'));
    }
public function create()
{
    $departments = Department::all();

  

    return view('courses.create', compact('departments'));
}

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'course_code' => 'required|unique:courses',
            'credits' => 'required|integer',
            'semester' => 'required',
            'course_type' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')
                         ->with('success', 'Course Added Successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $departments = Department::all();

        return view('courses.edit', compact('course', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'course_name' => 'required',
            'course_code' => 'required|unique:courses,course_code,' . $course->id,
            'credits' => 'required|integer',
            'semester' => 'required',
            'course_type' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
                         ->with('success', 'Course Updated Successfully.');
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();

        return redirect()->route('courses.index')
                         ->with('success', 'Course Deleted Successfully.');
    }
}