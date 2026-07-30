@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-8">

    <a href="{{ route('cdc.dashboard') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Back to Dashboard</a>

    <h2 class="text-2xl font-bold mb-6">Curriculum Detail</h2>

    <div class="bg-white rounded-xl shadow border p-6 space-y-3">
        <p><span class="font-semibold">Course:</span> {{ $curriculum->course->course_name ?? '-' }}</p>
        <p><span class="font-semibold">Department:</span> {{ $curriculum->department->name ?? '-' }}</p>
        <p><span class="font-semibold">Academic Year:</span> {{ $curriculum->academicYear->academic_year ?? '-' }}</p>
        <p><span class="font-semibold">Semester:</span> {{ $curriculum->semester->semester_name ?? '-' }}</p>
        <p><span class="font-semibold">Course Type:</span> {{ $curriculum->courseType->name ?? '-' }}</p>
        <p><span class="font-semibold">Credits:</span> {{ $curriculum->credits }}</p>
        <p><span class="font-semibold">Status:</span> {{ $curriculum->status }}</p>
        <p><span class="font-semibold">Submitted:</span> {{ $curriculum->created_at->format('d M Y, h:i A') }}</p>
        <p><span class="font-semibold">Last Updated:</span> {{ $curriculum->updated_at->format('d M Y, h:i A') }}</p>
        @if($curriculum->remarks)
            <p><span class="font-semibold">Remarks:</span> {{ $curriculum->remarks }}</p>
        @endif
    </div>

</div>

@endsection