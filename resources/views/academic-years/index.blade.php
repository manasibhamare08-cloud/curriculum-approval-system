<x-app-layout>

<x-slot name="header">
    <h2>Academic Year Management</h2>
</x-slot>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('academic-years.create') }}">Add Academic Year</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Academic Year</th>
    <th>Status</th>
    <th>Action</th>
</tr>

@foreach($academicYears as $year)

<tr>

<td>{{ $year->id }}</td>

<td>{{ $year->academic_year }}</td>

<td>{{ $year->status ? 'Active' : 'Inactive' }}</td>

<td>

<a href="{{ route('academic-years.edit',$year->id) }}">Edit</a>

<form action="{{ route('academic-years.destroy',$year->id) }}" method="POST" style="display:inline;">

@csrf
@method('DELETE')

<button type="submit">Delete</button>

</form>

</td>

</tr>

@endforeach

</table>

</x-app-layout>