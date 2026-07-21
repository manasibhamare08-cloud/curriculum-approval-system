@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Curriculum Report</h2>

        <a href="{{ route('reports.curriculum.export', request()->query()) }}"
           class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            Export CSV
        </a>
    </div>

    <!-- Filters -->
    <form method="GET" action="{{ route('reports.curriculum') }}"
          class="bg-white rounded-xl shadow p-6 mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
            <select name="department_id" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <option value="">All Departments</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ request('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Academic Year</label>
            <select name="academic_year_id" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <option value="">All Years</option>
                @foreach($academicYears as $year)
                    <option value="{{ $year->id }}" {{ request('academic_year_id') == $year->id ? 'selected' : '' }}>
                        {{ $year->academic_year }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <option value="">All Statuses</option>
                <option value="Draft" {{ request('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Pending HOD" {{ request('status') == 'Pending HOD' ? 'selected' : '' }}>Pending HOD</option>
                <option value="Pending CDC" {{ request('status') == 'Pending CDC' ? 'selected' : '' }}>Pending CDC</option>
                <option value="Pending Admin" {{ request('status') == 'Pending Admin' ? 'selected' : '' }}>Pending Admin</option>
                <option value="Approved" {{ request('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
            </select>
        </div>

        <div class="flex items-end gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 w-full">
                Filter
            </button>
            <a href="{{ route('reports.curriculum') }}"
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 w-full text-center">
                Reset
            </a>
        </div>

    </form>

    <!-- Results -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-3 text-center">ID</th>
                    <th class="border px-4 py-3 text-center">Course</th>
                    <th class="border px-4 py-3 text-center">Department</th>
                    <th class="border px-4 py-3 text-center">Academic Year</th>
                    <th class="border px-4 py-3 text-center">Semester</th>
                    <th class="border px-4 py-3 text-center">Credits</th>
                    <th class="border px-4 py-3 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($curriculums as $curriculum)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3 text-center">{{ $curriculum->id }}</td>
                        <td class="border px-4 py-3 text-center">{{ $curriculum->course->course_name ?? '-' }}</td>
                        <td class="border px-4 py-3 text-center">{{ $curriculum->department->name ?? '-' }}</td>
                        <td class="border px-4 py-3 text-center">{{ $curriculum->academicYear->academic_year ?? '-' }}</td>
                        <td class="border px-4 py-3 text-center">{{ $curriculum->semester->semester_name ?? '-' }}</td>
                        <td class="border px-4 py-3 text-center">{{ $curriculum->credits }}</td>
                        <td class="border px-4 py-3 text-center">{{ $curriculum->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border px-4 py-6 text-center text-gray-500">
                            No curriculums match the selected filters.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="text-gray-500 text-sm mt-4">
        Showing {{ $curriculums->count() }} result(s)
    </p>

</div>

@endsection