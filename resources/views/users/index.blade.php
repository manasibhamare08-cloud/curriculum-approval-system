@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            User Management
        </h2>

        <a href="{{ route('users.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            + Add User
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

                <th class="border px-6 py-3 text-center">Name</th>

                <th class="border px-6 py-3 text-center">Email</th>

                <th class="border px-6 py-3 text-center">Role</th>

                <th class="border px-6 py-3 text-center">Department</th>

                <th class="border px-6 py-3 text-center">Action</th>

            </tr>

        </thead>

        <tbody>

        @foreach($users as $user)

            <tr class="hover:bg-gray-50">

                <td class="border px-6 py-3 text-center">
                    {{ $user->id }}
                </td>

                <td class="border px-6 py-3 text-center">
                    {{ $user->name }}
                </td>

                <td class="border px-6 py-3 text-center">
                    {{ $user->email }}
                </td>

                <td class="border px-6 py-3 text-center">
                    {{ ucfirst($user->role) }}
                </td>

                <td class="border px-6 py-3 text-center">
                    {{ $user->department->name ?? '-' }}
                </td>

                <td class="border px-6 py-3 text-center">

                    <a href="{{ route('users.edit',$user->id) }}"
                       class="text-blue-600 font-semibold mr-4">
                        Edit
                    </a>

                    <form action="{{ route('users.destroy',$user->id) }}"
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

        @endforeach

        </tbody>

    </table>

</div>

@endsection