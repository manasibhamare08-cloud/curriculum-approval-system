@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Faculty Dashboard</h2>

    <div class="grid grid-cols-4 gap-4">
        <div class="bg-white rounded-xl shadow border p-6 text-center">
            <p class="text-3xl font-bold">{{ $total }}</p>
            <p class="text-gray-500">Total Curriculums</p>
        </div>
        <div class="bg-white rounded-xl shadow border p-6 text-center">
            <p class="text-3xl font-bold text-gray-500">{{ $drafts }}</p>
            <p class="text-gray-500">Drafts</p>
        </div>
        <div class="bg-white rounded-xl shadow border p-6 text-center">
            <p class="text-3xl font-bold text-yellow-600">{{ $submitted }}</p>
            <p class="text-gray-500">Submitted</p>
        </div>
        <div class="bg-white rounded-xl shadow border p-6 text-center">
            <p class="text-3xl font-bold text-green-600">{{ $approved }}</p>
            <p class="text-gray-500">Approved</p>
        </div>
    </div>

    <div class="mt-8 flex gap-4">
        <a href="{{ route('faculty.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">My Curriculums</a>
        <a href="{{ route('curriculums.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">+ Create Curriculum</a>
    </div>
</div>
@endsection