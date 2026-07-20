@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">Edit Course</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Course Name</label>
            <input type="text" name="course_name" value="{{ old('course_name', $course->course_name) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Course Code</label>
            <input type="text" name="course_code" value="{{ old('course_code', $course->course_code) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Credits</label>
            <input type="number" name="credits" value="{{ old('credits', $course->credits) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
            <select name="semester"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @for($i=1;$i<=8;$i++)
                    <option value="{{ $i }}" {{ $course->semester==$i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Course Type</label>
            <select name="course_type"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Theory" {{ $course->course_type=='Theory' ? 'selected' : '' }}>Theory</option>
                <option value="Practical" {{ $course->course_type=='Practical' ? 'selected' : '' }}>Practical</option>
                <option value="Theory + Practical" {{ $course->course_type=='Theory + Practical' ? 'selected' : '' }}>Theory + Practical</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
            <select name="department_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $course->department_id==$department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Update Course
            </button>
            <a href="{{ route('courses.index') }}"
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection