@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <h2 class="text-2xl font-bold mb-6">CDC Dashboard — Pending Review</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Department Filter -->
    <form method="GET" action="{{ route('cdc.dashboard') }}" class="mb-4 flex gap-2">
        <select name="department_id" class="border border-gray-300 rounded-lg px-3 py-2" onchange="this.form.submit()">
            <option value="">All Departments</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $departmentId == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        @if($departmentId)
            <a href="{{ route('cdc.dashboard') }}"
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Clear
            </a>
        @endif
    </form>

    <table class="w-full bg-white rounded-xl shadow border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Course</th>
                <th class="p-3 text-left">Department</th>
                <th class="p-3 text-left">Academic Year</th>
                <th class="p-3 text-left">Semester</th>
                <th class="p-3 text-left">Credits</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($curriculums as $curriculum)
                <tr class="border-t">
                    <td class="p-3">{{ $curriculum->course->course_name ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->department->name ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->academicYear->academic_year ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->semester->semester_name ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->credits }}</td>
                    <td class="p-3 text-center space-x-2">
                        <form action="{{ route('curriculums.cdcApprove', $curriculum->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-green-600 text-white px-3 py-1 rounded text-sm">Approve</button>
                        </form>
                        <form action="{{ route('curriculums.cdcReject', $curriculum->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-red-600 text-white px-3 py-1 rounded text-sm">Reject</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">No curriculums pending CDC review.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection