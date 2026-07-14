<?php

namespace App\Http\Controllers;

use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseTypeController extends Controller
{
    public function index()
    {
        $courseTypes = CourseType::all();

        return view('course-types.index', compact('courseTypes'));
    }


    public function create()
    {
        return view('course-types.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:course_types'
        ]);


        CourseType::create([
            'type_name' => $request->type_name
        ]);


        return redirect()->route('course-types.index')
                         ->with('success','Course Type Added Successfully.');
    }


    public function edit($id)
    {
        $courseType = CourseType::findOrFail($id);

        return view('course-types.edit', compact('courseType'));
    }


    public function update(Request $request,$id)
    {
        $courseType = CourseType::findOrFail($id);


        $request->validate([
            'type_name' => 'required|unique:course_types,type_name,'.$id
        ]);


        $courseType->update([
            'type_name'=>$request->type_name
        ]);


        return redirect()->route('course-types.index')
                         ->with('success','Course Type Updated Successfully.');
    }


    public function destroy($id)
    {
        CourseType::findOrFail($id)->delete();


        return redirect()->route('course-types.index')
                         ->with('success','Course Type Deleted Successfully.');
    }
}