<h2>Edit User</h2>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name</label><br>
    <input type="text" name="name" value="{{ $user->name }}"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="{{ $user->email }}"><br><br>

    <label>Role</label><br>
    <select name="role">
        <option value="faculty" {{ $user->role=='faculty' ? 'selected' : '' }}>Faculty</option>
        <option value="hod" {{ $user->role=='hod' ? 'selected' : '' }}>HOD</option>
        <option value="cdc" {{ $user->role=='cdc' ? 'selected' : '' }}>CDC</option>
        <option value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
    </select><br><br>

    <label>Department</label><br>
    <select name="department_id">
        <option value="">Select Department</option>

        @foreach($departments as $department)
            <option value="{{ $department->id }}"
                {{ $user->department_id == $department->id ? 'selected' : '' }}>
                {{ $department->name }}
            </option>
        @endforeach

    </select><br><br>

    <button type="submit">Update User</button>
</form>