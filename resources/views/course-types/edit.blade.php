<x-app-layout>

<x-slot name="header">
    <h2>Edit Course Type</h2>
</x-slot>

<form action="{{ route('course-types.update',$courseType->id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Course Type</label><br>

    <input type="text"
           name="type_name"
           value="{{ $courseType->type_name }}">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>

</x-app-layout>