<x-app-layout>

<x-slot name="header">
    <h2>Edit Curriculum</h2>
</x-slot>

<form action="{{ route('curriculums.update', $curriculum->id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Department</label><br>

    <select name="department_id">

        @foreach($departments as $department)

        <option value="{{ $department->id }}"
            {{ $curriculum->department_id == $department->id ? 'selected' : '' }}>

            {{ $department->name }}

        </option>

        @endforeach

    </select>

    <br><br>

    <label>Course</label><br>

    <select name="course_id">

        @foreach($courses as $course)

        <option value="{{ $course->id }}"
            {{ $curriculum->course_id == $course->id ? 'selected' : '' }}>

            {{ $course->course_name }}

        </option>

        @endforeach

    </select>

    <br><br>

    <label>Academic Year</label><br>

    <select name="academic_year_id">

        @foreach($academicYears as $year)

        <option value="{{ $year->id }}"
            {{ $curriculum->academic_year_id == $year->id ? 'selected' : '' }}>

            {{ $year->academic_year }}

        </option>

        @endforeach

    </select>

    <br><br>

    <label>Semester</label><br>

    <select name="semester_id">

        @foreach($semesters as $semester)

        <option value="{{ $semester->id }}"
            {{ $curriculum->semester_id == $semester->id ? 'selected' : '' }}>

            {{ $semester->semester_name }}

        </option>

        @endforeach

    </select>

    <br><br>

    <label>Course Type</label><br>

    <select name="course_type_id">

        @foreach($courseTypes as $courseType)

        <option value="{{ $courseType->id }}"
            {{ $curriculum->course_type_id == $courseType->id ? 'selected' : '' }}>

            {{ $courseType->type_name }}

        </option>

        @endforeach

    </select>

    <br><br>

    <label>Credits</label><br>

    <input type="number"
           name="credits"
           value="{{ $curriculum->credits }}">

    <br><br>

    <button type="submit">
        Update Curriculum
    </button>

</form>

</x-app-layout>