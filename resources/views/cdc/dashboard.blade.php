@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
        <h2 class="text-2xl font-bold">CDC Dashboard — Pending Review</h2>
        <div class="flex gap-2">
            <a href="{{ route('cdc.history') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 text-sm">
                Review History
            </a>
            <a href="{{ route('cdc.export', request()->query()) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 text-sm">
                Export CSV
            </a>
        </div>
    </div>

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

    <!-- Empty form used as the submit target for the checkboxes below (via form="bulk-approve-form") -->
    <form id="bulk-approve-form" method="POST" action="{{ route('cdc.bulkApprove') }}">
        @csrf
    </form>

    <div class="mb-2 flex items-center justify-between">
        <label class="flex items-center gap-2 text-sm text-gray-600">
            <input type="checkbox" id="select-all-checkbox">
            Select all
        </label>

        <button type="submit" form="bulk-approve-form"
                onclick="return confirm('Approve all selected curriculums?');"
                class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 text-sm">
            Bulk Approve Selected
        </button>
    </div>

    <table class="w-full bg-white rounded-xl shadow border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left w-8"></th>
                <th class="p-3 text-left">Course</th>
                <th class="p-3 text-left">Department</th>
                <th class="p-3 text-left">Academic Year</th>
                <th class="p-3 text-left">Semester</th>
                <th class="p-3 text-left">
                    <a href="{{ route('cdc.dashboard', array_merge(request()->query(), ['sort_by' => 'credits', 'sort_dir' => ($sortBy == 'credits' && $sortDir == 'asc') ? 'desc' : 'asc'])) }}"
                       class="hover:underline">
                        Credits
                        @if($sortBy == 'credits')
                            {{ $sortDir == 'asc' ? '↑' : '↓' }}
                        @endif
                    </a>
                </th>
                <th class="p-3 text-left">
                    <a href="{{ route('cdc.dashboard', array_merge(request()->query(), ['sort_by' => 'created_at', 'sort_dir' => ($sortBy == 'created_at' && $sortDir == 'asc') ? 'desc' : 'asc'])) }}"
                       class="hover:underline">
                        Submitted
                        @if($sortBy == 'created_at')
                            {{ $sortDir == 'asc' ? '↑' : '↓' }}
                        @endif
                    </a>
                </th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($curriculums as $curriculum)
                <tr class="border-t">
                    <td class="p-3">
                        <input type="checkbox" name="curriculum_ids[]" value="{{ $curriculum->id }}" form="bulk-approve-form">
                    </td>
                    <td class="p-3">{{ $curriculum->course->course_name ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->department->name ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->academicYear->academic_year ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->semester->semester_name ?? '-' }}</td>
                    <td class="p-3">{{ $curriculum->credits }}</td>
                    <td class="p-3">{{ optional($curriculum->created_at)->format('d M Y') }}</td>
                    <td class="p-3 text-center space-x-2 whitespace-nowrap">
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
                    <td colspan="8" class="p-4 text-center text-gray-500">No curriculums pending CDC review.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $curriculums->links() }}
    </div>

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

document.getElementById('select-all-checkbox').addEventListener('change', function () {
    const checked = this.checked;
    document.querySelectorAll('input[name="curriculum_ids[]"]').forEach(function (cb) {
        cb.checked = checked;
    });
});
</script>

@endsection