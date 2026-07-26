@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Curriculum Management
        </h2>

        <a href="{{ route('curriculums.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            + Add Curriculum
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

                <th class="border px-4 py-3 text-center">ID</th>

                <th class="border px-4 py-3 text-center">Department</th>

                <th class="border px-4 py-3 text-center">Course</th>

                <th class="border px-4 py-3 text-center">Academic Year</th>

                <th class="border px-4 py-3 text-center">Semester</th>

                <th class="border px-4 py-3 text-center">Course Type</th>

                <th class="border px-4 py-3 text-center">Credits</th>

                <th class="border px-4 py-3 text-center">Status</th>

                <th class="border px-4 py-3 text-center">Action</th>

            </tr>

        </thead>



        <tbody>


        @foreach($curriculums as $curriculum)


            <tr class="hover:bg-gray-50">


                <td class="border px-4 py-3 text-center">
                    {{ $curriculum->id }}
                </td>


                <td class="border px-4 py-3 text-center">
                    {{ $curriculum->department->name ?? '-' }}
                </td>


                <td class="border px-4 py-3 text-center">
                    {{ $curriculum->course->course_name ?? '-' }}
                </td>


                <td class="border px-4 py-3 text-center">
                    {{ $curriculum->academicYear->academic_year ?? '-' }}
                </td>


                <td class="border px-4 py-3 text-center">
                    {{ $curriculum->semester->semester_name ?? '-' }}
                </td>


                <td class="border px-4 py-3 text-center">
                    {{ $curriculum->courseType->type_name ?? '-' }}
                </td>


                <td class="border px-4 py-3 text-center">
                    {{ $curriculum->credits }}
                </td>


                <td class="border px-4 py-3 text-center">

                    @if($curriculum->status == 'Approved')
                        <span class="text-green-600 font-semibold">Approved</span>
                    @elseif(str_contains($curriculum->status, 'Rejected'))
                        <span class="text-red-600 font-semibold">{{ $curriculum->status }}</span>
                    @elseif($curriculum->status == 'Draft')
                        <span class="text-gray-500 font-semibold">Draft</span>
                    @else
                        <span class="text-yellow-600 font-semibold">{{ $curriculum->status }}</span>
                    @endif

                </td>



                <td class="border px-4 py-3 text-center space-x-2">

                    <a href="{{ route('curriculums.edit',$curriculum->id) }}"
                       class="text-blue-600 font-semibold">
                        Edit
                    </a>

                    <form action="{{ route('curriculums.destroy',$curriculum->id) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 font-semibold">Delete</button>
                    </form>

                    @if($curriculum->status == 'Draft')
                        <form action="{{ route('curriculums.submit', $curriculum->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-blue-600 text-white px-2 py-1 rounded text-sm">Submit</button>
                        </form>
                    @endif

                    @if($curriculum->status == 'Pending HOD')
                        <form action="{{ route('curriculums.hodApprove', $curriculum->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-green-600 text-white px-2 py-1 rounded text-sm">HOD Approve</button>
                        </form>
                        <form action="{{ route('curriculums.hodReject', $curriculum->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-red-600 text-white px-2 py-1 rounded text-sm">HOD Reject</button>
                        </form>
                    @endif

                    @if($curriculum->status == 'Pending CDC')
                        <form action="{{ route('curriculums.cdcApprove', $curriculum->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-green-600 text-white px-2 py-1 rounded text-sm">CDC Approve</button>
                        </form>
                        <form action="{{ route('curriculums.cdcReject', $curriculum->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-red-600 text-white px-2 py-1 rounded text-sm">CDC Reject</button>
                        </form>
                    @endif

                    @if($curriculum->status == 'Pending Admin')
                        <form action="{{ route('curriculums.adminApprove', $curriculum->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-green-600 text-white px-2 py-1 rounded text-sm">Admin Approve</button>
                        </form>
                        <form action="{{ route('curriculums.adminReject', $curriculum->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button class="bg-red-600 text-white px-2 py-1 rounded text-sm">Admin Reject</button>
                        </form>
                    @endif

                </td>


            </tr>


        @endforeach


        </tbody>


    </table>


</div>


@endsection