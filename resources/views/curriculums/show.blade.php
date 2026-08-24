@extends('layouts.app')


@section('content')


<div class="container mx-auto p-6">


<h2 class="text-3xl font-bold mb-6">
    Curriculum Details
</h2>



<div class="bg-white shadow rounded-lg p-6">


<table class="w-full">


<tr>
<td class="font-bold border p-3">
Course
</td>

<td class="border p-3">
{{ $curriculum->course->course_name ?? '-' }}
</td>

</tr>




<tr>

<td class="font-bold border p-3">
Department
</td>

<td class="border p-3">
{{ $curriculum->department->department_name ?? $curriculum->department->name ?? '-' }}
</td>

</tr>




<tr>

<td class="font-bold border p-3">
Academic Year
</td>

<td class="border p-3">
{{ $curriculum->academicYear->academic_year ?? '-' }}
</td>

</tr>




<tr>

<td class="font-bold border p-3">
Semester
</td>

<td class="border p-3">
{{ $curriculum->semester->semester_name ?? $curriculum->semester->semester ?? '-' }}
</td>

</tr>




<tr>

<td class="font-bold border p-3">
Course Type
</td>

<td class="border p-3">
{{ $curriculum->courseType->type_name ?? $curriculum->courseType->course_type ?? '-' }}
</td>

</tr>




<tr>

<td class="font-bold border p-3">
Credits
</td>

<td class="border p-3">
{{ $curriculum->credits }}
</td>

</tr>




<tr>

<td class="font-bold border p-3">
Status
</td>

<td class="border p-3">
{{ $curriculum->status }}
</td>

</tr>



</table>



<div class="mt-6">

<a href="{{ route('curriculums.index') }}"
class="bg-gray-600 text-white px-4 py-2 rounded">

Back

</a>


</div>



</div>


</div>


@endsection