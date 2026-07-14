<x-app-layout>

<x-slot name="header">
    <h2>Course Type Management</h2>
</x-slot>

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<a href="{{ route('course-types.create') }}">Add Course Type</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Course Type</th>
    <th>Action</th>
</tr>

@foreach($courseTypes as $courseType)

<tr>

<td>{{ $courseType->id }}</td>

<td>{{ $courseType->type_name }}</td>

<td>

<a href="{{ route('course-types.edit',$courseType->id) }}">Edit</a>

<form action="{{ route('course-types.destroy',$courseType->id) }}" method="POST" style="display:inline;">

@csrf
@method('DELETE')

<button type="submit">Delete</button>

</form>

</td>

</tr>

@endforeach

</table>

</x-app-layout>