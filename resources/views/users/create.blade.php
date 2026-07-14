@if ($errors->any())
<div style="color:red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h2>Add User</h2>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <label>Name</label><br>
    <input type="text" name="name"><br><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <label>Role</label><br>
    <select name="role">
        <option value="faculty">Faculty</option>
        <option value="hod">HOD</option>
        <option value="cdc">CDC</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <label>Department</label><br>
    <select name="department_id">
        <option value="">Select Department</option>

        @foreach($departments as $department)
            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>
        @endforeach

    </select><br><br>

    <button type="submit">Save User</button>

</form>