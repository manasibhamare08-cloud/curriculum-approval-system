<x-app-layout>

<x-slot name="header">
    <h2>Edit Academic Year</h2>
</x-slot>

<form action="{{ route('academic-years.update', $academicYear->id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Academic Year</label><br>

    <input type="text" name="academic_year"
           value="{{ $academicYear->academic_year }}">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>

</x-app-layout>