@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Academic Year Management
        </h2>

        <a href="{{ route('academic-years.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            + Add Academic Year
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('academic-years.index') }}" class="mb-4 flex gap-2">
        <input type="text" name="search" value="{{ $search }}"
               placeholder="Search by academic year..."
               class="border border-gray-300 rounded-lg px-3 py-2 w-full max-w-sm">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Search
        </button>
        @if($search)
            <a href="{{ route('academic-years.index') }}"
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                Clear
            </a>
        @endif
    </form>

    <table class="w-full border border-gray-300 table-fixed">

        <thead class="bg-gray-200">

            <tr>

                <th class="border px-6 py-3 text-center">ID</th>

                <th class="border px-6 py-3 text-center">Academic Year</th>

                <th class="border px-6 py-3 text-center">Status</th>

                <th class="border px-6 py-3 text-center">Action</th>

            </tr>

        </thead>

        <tbody>

        @forelse($academicYears as $academicYear)

            <tr class="hover:bg-gray-50">

                <td class="border px-6 py-3 text-center">
                    {{ $academicYear->id }}
                </td>

                <td class="border px-6 py-3 text-center">
    {{ $academicYear->academic_year }}
</td>

                <td class="border px-6 py-3 text-center">
                    {{ $academicYear->status }}
                </td>

                <td class="border px-6 py-3 text-center">

                    <a href="{{ route('academic-years.edit', $academicYear->id) }}"
                       class="text-blue-600 font-semibold mr-4">
                        Edit
                    </a>

                    <form action="{{ route('academic-years.destroy', $academicYear->id) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="text-red-600 font-semibold">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty
            <tr>
                <td colspan="4" class="border px-6 py-6 text-center text-gray-500">
                    No records found.
                </td>
            </tr>
        @endforelse

        </tbody>

    </table>

    <div class="mt-4">
        {{ $academicYears->links() }}
    </div>

</div>

@endsection