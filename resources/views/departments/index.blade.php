@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Departments</h2>

        <a href="{{ route('departments.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Department
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
   <table class="w-full border border-gray-300 table-fixed">

    <thead class="bg-gray-200">
        <tr>
            <th class="border px-6 py-3 text-center">ID</th>
            <th class="border px-6 py-3 text-center">Department</th>
            <th class="border px-6 py-3 text-center">Code</th>
            <th class="border px-6 py-3 text-center">Description</th>
            <th class="border px-6 py-3 text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($departments as $department)
        <tr class="hover:bg-gray-50">

            <td class="border px-6 py-3 text-center">
                {{ $department->id }}
            </td>

            <td class="border px-6 py-3 text-center">
                {{ $department->name }}
            </td>

            <td class="border px-6 py-3 text-center">
                {{ $department->code }}
            </td>

            <td class="border px-6 py-3 text-center">
                {{ $department->description }}
            </td>

            <td class="border px-6 py-3 text-center">
                <a href="{{ route('departments.edit',$department->id) }}"
                   class="text-blue-600 font-semibold mr-3">
                    Edit
                </a>

                <form action="{{ route('departments.destroy',$department->id) }}"
                      method="POST"
                      class="inline">
                    @csrf
                    @method('DELETE')

                    <button class="text-red-600 font-semibold">
                        Delete
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>

</table>

</div>

@endsection