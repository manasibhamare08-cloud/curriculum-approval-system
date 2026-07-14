<h2>Departments</h2>

<a href="{{ route('departments.create') }}">Add Department</a>

<br><br>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Code</th>
        <th>Description</th>
<th>Action</th>
    </tr>

    @foreach($departments as $department)
    <tr>
        <td>{{ $department->id }}</td>
        <td>{{ $department->name }}</td>
        <td>{{ $department->code }}</td>
      <td>{{ $department->description }}</td>

<td>

    <a href="{{ route('departments.edit', $department->id) }}">
        Edit
    </a>

    <form action="{{ route('departments.destroy', $department->id) }}" 
          method="POST" 
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>

    </form>

</td>
    </tr>
    @endforeach

</table>