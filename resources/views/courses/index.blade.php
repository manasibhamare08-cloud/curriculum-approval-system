<x-app-layout>

<x-slot name="header">
    <h2>Course Management</h2>
</x-slot>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('courses.create') }}">Add Course</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Course Name</th>
    <th>Course Code</th>
    <th>Credits</th>
    <th>Semester</th>
    <th>Course Type</th>
    <th>Department</th>
    <th>Action</th>
</tr>

@foreach($courses as $course)

<tr>

    <td>{{ $course->id }}</td>
    <td>{{ $course->course_name }}</td>
    <td>{{ $course->course_code }}</td>
    <td>{{ $course->credits }}</td>
    <td>{{ $course->semester }}</td>
    <td>{{ $course->course_type }}</td>
    <td>{{ $course->department->name ?? '-' }}</td>

    <td>
        <a href="{{ route('courses.edit', $course->id) }}">Edit</a>

        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')

            <button type="submit">Delete</button>
        </form>
    </td>

</tr>

@endforeach

</table>

</x-app-layout>