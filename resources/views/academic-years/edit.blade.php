@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">Edit Academic Year</h2>

    <form action="{{ route('academic-years.update', $academicYear->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Academic Year</label>
            <input type="text" name="academic_year" value="{{ old('academic_year', $academicYear->academic_year) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Update
            </button>
            <a href="{{ route('academic-years.index') }}"
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection