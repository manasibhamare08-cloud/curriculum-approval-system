@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <h2 class="text-2xl font-bold mb-4">CDC Dashboard — Pending Review</h2>

    <div class="bg-blue-50 border border-blue-200 text-blue-800 rounded-lg px-4 py-3 mb-4 inline-block">
        <span class="font-semibold">{{ $pendingCount }}</span> curriculum(s) awaiting CDC review
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Search + Department Filter -->
    <form method="GET" action="{{ route('cdc.dashboard') }}" class="mb-4 flex flex-wrap gap-2">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by course name..."
               class="border border-gray-300 rounded-lg px-3 py-2">

        <select name="department_id" class="border border-gray-300 rounded-lg px-3 py-2" onchange="this.form.submit()">
            <option value="">All Departments</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ $departmentId == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Search
        </button>

        @if($departmentId || $search)
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
                        <a href="{{ route('cdc.show', $curriculum->id) }}" class="text-blue-600 hover:underline text-sm">View</a>

                        <form action="{{ route('curriculums.cdcApprove', $curriculum->id) }}" method="POST" class="inline approve-form">
                            @csrf
                            @method('PUT')
                            <button type="button" class="bg-green-600 text-white px-3 py-1 rounded text-sm approve-btn">Approve</button>
                        </form>

                        <form action="{{ route('curriculums.cdcReject', $curriculum->id) }}" method="POST" class="inline cdc-reject-form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="remarks" class="remarks-input">
                            <button type="button" class="bg-red-600 text-white px-3 py-1 rounded text-sm reject-btn">Reject</button>
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

<script>
document.querySelectorAll('.approve-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
        if (confirm('Approve this curriculum? This will move it to the Admin review stage.')) {
            btn.closest('form').submit();
        }
    });
});

document.querySelectorAll('.reject-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const reason = prompt("Reason for rejection (faculty will see this):");
        if (!reason || reason.trim() === '') {
            alert('A rejection reason is required.');
            return;
        }
        const form = btn.closest('form');
        form.querySelector('.remarks-input').value = reason;
        form.submit();
    });
});
</script>

@endsection