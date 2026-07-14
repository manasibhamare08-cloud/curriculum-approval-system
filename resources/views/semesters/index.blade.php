<x-app-layout>

<x-slot name="header">
    <h2>Semester Management</h2>
</x-slot>

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<a href="{{ route('semesters.create') }}">Add Semester</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Semester</th>
    <th>Academic Year</th>
    <th>Action</th>
</tr>

@foreach($semesters as $semester)

<tr>

<td>{{ $semester->id }}</td>

<td>{{ $semester->semester_name }}</td>

<td>{{ $semester->academicYear->academic_year }}</td>

<td>

<a href="{{ route('semesters.edit',$semester->id) }}">Edit</a>

<form action="{{ route('semesters.destroy',$semester->id) }}" method="POST" style="display:inline;">

@csrf
@method('DELETE')

<button type="submit">Delete</button>

</form>

</td>

</tr>

@endforeach

</table>

</x-app-layout>