@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
        <h2 class="text-2xl font-bold">CDC Review History</h2>
        <a href="{{ route('cdc.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">
            Back to Pending Review
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search -->
    <form method="GET" action="{{ route('cdc.history') }}" class="mb-4 flex flex-wrap gap-2">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by course name..."
               class="border border-gray-300 rounded-lg px-3 py-2">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Search
        </button>

        @if($search)
            <a href="{{ route('cdc.history') }}"
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
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Remarks</th>
                <th class="p-3 text-left">Last Updated</th>
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
                    <td class="p-3">
                        @if($curriculum->status == 'Approved')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">{{ $curriculum->status }}</span>
                        @elseif(str_contains($curriculum->status, 'Rejected'))
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">{{ $curriculum->status }}</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">{{ $curriculum->status }}</span>
                        @endif
                    </td>
                    <td class="p-3 text-sm text-gray-600">{{ $curriculum->remarks ?? '-' }}</td>
                    <td class="p-3">{{ optional($curriculum->updated_at)->format('d M Y') }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('cdc.show', $curriculum->id) }}" class="text-blue-600 hover:underline text-sm">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="p-4 text-center text-gray-500">No reviewed curriculums yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $curriculums->links() }}
    </div>

</div>

@endsection