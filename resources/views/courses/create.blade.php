<x-app-layout>

<x-slot name="header">
    <h2>Add Course</h2>
</x-slot>
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('courses.store') }}" method="POST">

    @csrf

    <label>Course Name</label><br>
    <input type="text" name="course_name"><br><br>

    <label>Course Code</label><br>
    <input type="text" name="course_code"><br><br>

    
    <label>Credits</label><br>
    <input type="number" name="credits"><br><br>

    <label>Semester</label><br>

    <select name="semester">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
    </select>

    <br><br>

    <label>Course Type</label><br>

    <select name="course_type">
        <option value="Theory">Theory</option>
        <option value="Practical">Practical</option>
        <option value="Theory + Practical">Theory + Practical</option>
    </select>

    <br><br>

    <label>Department</label><br>

    <select name="department_id">

        @foreach($departments as $department)

            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <button type="submit">Save Course</button>

</form>

</x-app-layout>