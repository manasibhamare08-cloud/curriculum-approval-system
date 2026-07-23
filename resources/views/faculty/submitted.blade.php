@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <h2 class="text-2xl font-bold mb-6">Submitted Curriculums</h2>

    <table class="w-full bg-white rounded-xl shadow border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Course</th>
                <th class="p-3 text-left">Department</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($curriculums as $curriculum)
                <tr class="border-t">
                    <td class="p-3">{{ $curriculum->course->course_name ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->department->name ?? '-' }}</td>
                    <td class="p-3">
                        @if($curriculum->status == 'Approved')
                            <span class="text-green-600 font-semibold">Approved</span>
                        @elseif(str_contains($curriculum->status, 'Rejected'))
                            <span class="text-red-600 font-semibold">{{ $curriculum->status }}</span>
                        @else
                            <span class="text-yellow-600 font-semibold">{{ $curriculum->status }}</span>
                        @endif
                    </td>
                    <td class="p-3 text-center">
                        <a href="{{ route('faculty.show', $curriculum->id) }}" class="text-gray-600 font-semibold">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">No submitted curriculums yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsectionv