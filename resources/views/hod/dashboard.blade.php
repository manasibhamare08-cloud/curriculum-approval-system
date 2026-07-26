@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">

    <h2 class="text-3xl font-bold mb-5">
        HOD Dashboard
    </h2>

    <div class="bg-white shadow rounded p-5">

        <h3 class="text-xl font-semibold mb-4">
            Pending Curriculum Proposals
        </h3>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($curriculums->count())

        <table class="table-auto w-full border-collapse border">

            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Course</th>
                    <th class="border p-2">Department</th>
                    <th class="border p-2">Semester</th>
                    <th class="border p-2">Credits</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>

            <tbody>

            @foreach($curriculums as $curriculum)

                <tr>

                    <td class="border p-2">
                        {{ $curriculum->course->course_name ?? '-' }}
                    </td>

                    <td class="border p-2">
{{ $curriculum->department->name ?? '-' }}                    </td>

                    <td class="border p-2">
                        {{ $curriculum->semester->semester_name ?? '-' }}
                    </td>

                    <td class="border p-2">
                        {{ $curriculum->credits }}
                    </td>

                    <td class="border p-2">
                        {{ $curriculum->status }}
                    </td>

                    <td class="border p-2">

                        <div class="flex gap-2">

                            <!-- View -->
                            <a href="{{ route('hod.show', $curriculum->id) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                View
                            </a>

                            <!-- Approve -->
                            <form action="{{ route('curriculums.hodApprove', $curriculum->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                    onclick="return confirm('Approve this curriculum?')"
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                    Approve
                                </button>
                            </form>

                            <!-- Reject -->
                            <form action="{{ route('curriculums.hodReject', $curriculum->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                    onclick="return confirm('Reject this curriculum?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                    Reject
                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        @else

            <div class="text-center py-6">
                <p class="text-gray-600 text-lg">
                    No curriculums pending your approval.
                </p>
            </div>

        @endif

    </div>

</div>

@endsection