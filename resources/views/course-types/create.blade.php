<x-app-layout>

<x-slot name="header">
    <h2>Add Course Type</h2>
</x-slot>

<form action="{{ route('course-types.store') }}" method="POST">

@csrf

<label>Course Type</label><br>

<input type="text" name="type_name">

<br><br>

<button type="submit">
Save
</button>

</form>

</x-app-layout>