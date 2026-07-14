<x-app-layout>

<x-slot name="header">
<h2>Add Academic Year</h2>
</x-slot>

<form action="{{ route('academic-years.store') }}" method="POST">

@csrf

<label>Academic Year</label><br>

<input type="text" name="academic_year" placeholder="2025-26">

<br><br>

<button type="submit">
Save
</button>

</form>

</x-app-layout>