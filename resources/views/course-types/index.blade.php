@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Course Types
        </h2>

        <a href="{{ route('course-types.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            + Add Course Type
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border border-gray-300 table-fixed">

        <thead class="bg-gray-200">
            <tr>
                <th class="border px-6 py-3 text-center">ID</th>
                <th class="border px-6 py-3 text-center">Course Type</th>
                <th class="border px-6 py-3 text-center">Action</th>
            </tr>
        </thead>

        <tbody>

        @foreach($courseTypes as $courseType)

            <tr class="hover:bg-gray-50">

                <td class="border px-6 py-3 text-center">
                    {{ $courseType->id }}
                </td>

                <td class="border px-6 py-3 text-center">
                    {{ $courseType->type_name }}
                </td>

                <td class="border px-6 py-3 text-center">

                    <a href="{{ route('course-types.edit',$courseType->id) }}"
                       class="text-blue-600 font-semibold mr-4">
                        Edit
                    </a>

                    <form action="{{ route('course-types.destroy',$courseType->id) }}"
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