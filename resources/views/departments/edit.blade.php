<h2>Edit Department</h2>

<form action="{{ route('departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Department Name</label><br>
    <input type="text" name="name" value="{{ $department->name }}"><br><br>

    <label>Department Code</label><br>
    <input type="text" name="code" value="{{ $department->code }}"><br><br>

    <label>Description</label><br>
    <textarea name="description">{{ $department->description }}</textarea><br><br>

    <button type="submit">Update</button>
</form>