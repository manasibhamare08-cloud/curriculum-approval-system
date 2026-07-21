@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">My Curriculums</h2>
        <a href="{{ route('curriculums.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Add Curriculum
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

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
                    <td class="p-3 text-center space-x-2">
                        @if($curriculum->status == 'Draft' || str_contains($curriculum->status, 'Rejected'))
                            <a href="{{ route('curriculums.edit', $curriculum->id) }}"
                               class="text-blue-600 font-semibold">Edit</a>
                        @endif

                        @if($curriculum->status == 'Draft')
                            <form action="{{ route('curriculums.submit', $curriculum->id) }}"
                                  method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Submit</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">No curriculums yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection