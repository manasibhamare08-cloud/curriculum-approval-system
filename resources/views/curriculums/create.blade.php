<x-app-layout>

<x-slot name="header">
    <h2>Add Curriculum</h2>
</x-slot>

<form action="{{ route('curriculums.store') }}" method="POST">

    @csrf

    <label>Department</label><br>

    <select name="department_id">

        @foreach($departments as $department)

            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Course</label><br>

    <select name="course_id">

        @foreach($courses as $course)

            <option value="{{ $course->id }}">
                {{ $course->course_name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Academic Year</label><br>

    <select name="academic_year_id">

        @foreach($academicYears as $year)

            <option value="{{ $year->id }}">
                {{ $year->academic_year }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Semester</label><br>

    <select name="semester_id">

        @foreach($semesters as $semester)

            <option value="{{ $semester->id }}">
                {{ $semester->semester_name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Course Type</label><br>

    <select name="course_type_id">

        @foreach($courseTypes as $courseType)

            <option value="{{ $courseType->id }}">
                {{ $courseType->type_name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Credits</label><br>

    <input type="number" name="credits">

    <br><br>

    <button type="submit">
        Save Curriculum
    </button>

</form>

</x-app-layout>