@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Semester Management
        </h2>

        <a href="{{ route('semesters.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            + Add Semester
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

                <th class="border px-6 py-3 text-center">Semester</th>

                <th class="border px-6 py-3 text-center">Academic Year</th>

                <th class="border px-6 py-3 text-center">Action</th>

            </tr>

        </thead>

        <tbody>

        @foreach($semesters as $semester)

            <tr class="hover:bg-gray-50">

                <td class="border px-6 py-3 text-center">
                    {{ $semester->id }}
                </td>

                <td class="border px-6 py-3 text-center">
                    {{ $semester->semester_name }}
                </td>

                <td class="border px-6 py-3 text-center">
                    {{ $semester->academicYear->academic_year ?? '-' }}
                </td>

                <td class="border px-6 py-3 text-center">

                    <a href="{{ route('semesters.edit',$semester->id) }}"
                       class="text-blue-600 font-semibold mr-4">
                        Edit
                    </a>

                    <form action="{{ route('semesters.destroy',$semester->id) }}"
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