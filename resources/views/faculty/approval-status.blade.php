@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <h2 class="text-2xl font-bold mb-6">Approval Status</h2>

    <table class="w-full bg-white rounded-xl shadow border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Course</th>
                <th class="p-3 text-left">Department</th>
                <th class="p-3 text-left">Status</th>
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
                        @elseif($curriculum->status == 'Draft')
                            <span class="text-gray-500 font-semibold">Draft</span>
                        @else
                            <span class="text-yellow-600 font-semibold">{{ $curriculum->status }}</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">No curriculums yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection