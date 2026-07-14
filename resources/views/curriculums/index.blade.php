<x-app-layout>

<x-slot name="header">
    <h2>Curriculum Management</h2>
</x-slot>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('curriculums.create') }}">Add Curriculum</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Department</th>
    <th>Course</th>
    <th>Academic Year</th>
    <th>Semester</th>
    <th>Course Type</th>
    <th>Credits</th>
    <th>Status</th>
    <th>Action</th>
</tr>

@foreach($curriculums as $curriculum)

<tr>

    <td>{{ $curriculum->id }}</td>

    <td>{{ $curriculum->department->name }}</td>

    <td>{{ $curriculum->course->course_name }}</td>

    <td>{{ $curriculum->academicYear->academic_year }}</td>

    <td>{{ $curriculum->semester->semester_name }}</td>

    <td>{{ $curriculum->courseType->type_name }}</td>

    <td>{{ $curriculum->credits }}</td>

    <td>{{ $curriculum->status }}</td>

    <td>

        <a href="{{ route('curriculums.edit', $curriculum->id) }}">
            Edit
        </a>

        <form action="{{ route('curriculums.destroy', $curriculum->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        @if($curriculum->status == 'Draft')

        <form action="{{ route('curriculums.submit', $curriculum->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit">Submit</button>
        </form>

        @endif

        @if($curriculum->status == 'Pending HOD')

        <form action="{{ route('curriculums.hodApprove', $curriculum->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit">HOD Approve</button>
        </form>

        <form action="{{ route('curriculums.hodReject', $curriculum->id) }}"
              method="POST"
              style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit">HOD Reject</button>
        </form>

        @endif
        @if($curriculum->status == 'Pending CDC')

<form action="{{ route('curriculums.cdcApprove', $curriculum->id) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('PUT')

    <button type="submit">
        CDC Approve
    </button>

</form>

<form action="{{ route('curriculums.cdcReject', $curriculum->id) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('PUT')

    <button type="submit">
        CDC Reject
    </button>

</form>

@endif

@if($curriculum->status == 'Pending Admin')

<form action="{{ route('curriculums.adminApprove', $curriculum->id) }}"
      method="POST"
      style="display:inline;">
    @csrf
    @method('PUT')

    <button type="submit">
        Admin Approve
    </button>
</form>

<form action="{{ route('curriculums.adminReject', $curriculum->id) }}"
      method="POST"
      style="display:inline;">
    @csrf
    @method('PUT')

    <button type="submit">
        Admin Reject
    </button>
</form>

@endif

    </td>

</tr>


@endforeach

</table>

</x-app-layout>