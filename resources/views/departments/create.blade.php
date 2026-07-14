<h2>Add Department</h2>

<form action="{{ route('departments.store') }}" method="POST">
    @csrf

    <label>Department Name</label><br>
    <input type="text" name="name"><br><br>

    <label>Department Code</label><br>
    <input type="text" name="code"><br><br>

    <label>Description</label><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Save</button>
</form>