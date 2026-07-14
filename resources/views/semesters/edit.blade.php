<x-app-layout>

<x-slot name="header">
    <h2>Edit Semester</h2>
</x-slot>


<form action="{{ route('semesters.update',$semester->id) }}" method="POST">

@csrf
@method('PUT')


<label>Semester Name</label><br>

<input type="text" 
name="semester_name"
value="{{ $semester->semester_name }}">


<br><br>


<label>Academic Year</label><br>

<select name="academic_year_id">

@foreach($academicYears as $year)

<option value="{{ $year->id }}"
@if($year->id == $semester->academic_year_id)
selected
@endif
>
{{ $year->academic_year }}
</option>

@endforeach

</select>


<br><br>


<button type="submit">
Update
</button>


</form>


</x-app-layout>