<x-app-layout>

<x-slot name="header">
    <h2>Add Semester</h2>
</x-slot>

<form action="{{ route('semesters.store') }}" method="POST">

@csrf

<label>Semester Name</label><br>

<input type="text" name="semester_name">

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

<button type="submit">

Save

</button>

</form>

</x-app-layout>