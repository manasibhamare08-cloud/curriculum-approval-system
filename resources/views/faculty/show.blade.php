@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Curriculum Details</h2>

    <div class="bg-white rounded-xl shadow border p-6 space-y-4">
        <p><strong>Course:</strong> {{ $curriculum->course->course_name ?? '-' }}</p>
        <p><strong>Department:</strong> {{ $curriculum->department->name ?? '-' }}</p>
        <p><strong>Status:</strong> {{ $curriculum->status }}</p>

        <div><strong>Course Outcomes:</strong><p>{{ $curriculum->course_outcomes ?? 'Not provided' }}</p></div>
        <div><strong>Units:</strong><p>{{ $curriculum->units ?? 'Not provided' }}</p></div>
        <div><strong>Practicals:</strong><p>{{ $curriculum->practicals ?? 'Not provided' }}</p></div>
        <div><strong>References:</strong><p>{{ $curriculum->references_list ?? 'Not provided' }}</p></div>
        <div><strong>Assessment Plan:</strong><p>{{ $curriculum->assessment_plan ?? 'Not provided' }}</p></div>

        <a href="{{ route('faculty.dashboard') }}" class="text-blue-600 font-semibold">← Back to My Curriculums</a>
    </div>
</div>
@endsection