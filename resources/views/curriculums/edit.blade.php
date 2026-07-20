@extends('layouts.app')
 
@section('content')
 
<div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">
 
    <h2 class="text-2xl font-bold mb-6">Edit Curriculum</h2>
 
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('curriculums.update', $curriculum->id) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
            <select name="department_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $curriculum->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Course</label>
            <select name="course_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $curriculum->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Academic Year</label>
            <select name="academic_year_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($academicYears as $year)
                    <option value="{{ $year->id }}" {{ $curriculum->academic_year_id == $year->id ? 'selected' : '' }}>
                        {{ $year->academic_year }}
                    </option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
            <select name="semester_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($semesters as $semester)
                    <option value="{{ $semester->id }}" {{ $curriculum->semester_id == $semester->id ? 'selected' : '' }}>
                        {{ $semester->semester_name }}
                    </option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Course Type</label>
            <select name="course_type_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($courseTypes as $courseType)
                    <option value="{{ $courseType->id }}" {{ $curriculum->course_type_id == $courseType->id ? 'selected' : '' }}>
                        {{ $courseType->type_name }}
                    </option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Credits</label>
            <input type="number" name="credits" value="{{ old('credits', $curriculum->credits) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
 
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Update Curriculum
            </button>
            <a href="{{ route('curriculums.index') }}"
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
        </div>
 
    </form>
 
</div>
 
@endsection