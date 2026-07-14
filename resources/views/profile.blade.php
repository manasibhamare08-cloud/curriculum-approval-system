@extends('layouts.app')

@section('content')

<div class="py-8">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                My Profile
            </h1>
            <p class="text-gray-500 mt-2">
                View and manage your account information.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Left Profile Card -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 text-center">

                <img src="{{ asset('images/cams-logo.png') }}"
                     alt="Profile"
                     class="w-32 h-32 mx-auto rounded-full border-4 border-blue-200">

                <h2 class="text-2xl font-bold text-gray-800 mt-6">
                    Admin User
                </h2>

                <p class="text-gray-500">
                    System Administrator
                </p>

                <span class="inline-block mt-4 px-4 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                    ● Online
                </span>

                <button
                    class="mt-8 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                    Edit Profile
                </button>

            </div>

            <!-- Right Details -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Personal Information -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">
                        Personal Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="text-gray-500 text-sm">Full Name</label>
                            <p class="font-semibold text-lg">Admin User</p>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm">Email</label>
                            <p class="font-semibold text-lg">admin@cams.com</p>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm">Phone</label>
                            <p class="font-semibold text-lg">+91 9876543210</p>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm">Department</label>
                            <p class="font-semibold text-lg">
                                Computer Engineering
                            </p>
                        </div>

                    </div>

                </div>

                <!-- Account Information -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">

                    <h2 class="text-2xl font-bold text-gray-800 mb-6">
                        Account Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="text-gray-500 text-sm">Username</label>
                            <p class="font-semibold">admin</p>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm">Employee ID</label>
                            <p class="font-semibold">ADM001</p>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm">Joined</label>
                            <p class="font-semibold">12 July 2026</p>
                        </div>

                        <div>
                            <label class="text-gray-500 text-sm">Last Login</label>
                            <p class="font-semibold">Today, 10:30 AM</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection