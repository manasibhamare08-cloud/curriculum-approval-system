@extends('layouts.app')

@section('content')

<div class="py-8">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Page Heading -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                About CAMS
            </h1>

            <p class="text-gray-500 mt-2">
                Learn more about the Curriculum Approval Management System.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">

            <div class="flex flex-col md:flex-row items-center gap-8">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/cams-logo.png') }}"
                         alt="CAMS Logo"
                         class="w-10 h-20 object-contain">
                </div>

                <!-- Description -->
                <div>

                    <h2 class="text-2xl font-bold text-blue-700 mb-4">
                        Curriculum Approval Management System (CAMS)
                    </h2>

                    <p class="text-gray-600 leading-8">
                        Curriculum Approval Management System (CAMS) is a web-based
                        application developed to simplify and digitize the curriculum
                        approval process in educational institutions.

                        The system allows faculty members, Heads of Departments (HOD),
                        Curriculum Development Committee (CDC), and administrators to
                        submit, review, approve, and manage curriculum proposals
                        efficiently.
                    </p>

                </div>

            </div>

        </div>

        <!-- Features -->

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

            <div class="bg-white rounded-2xl shadow-md p-6">

                <i class="fas fa-user-graduate text-4xl text-blue-600 mb-4"></i>

                <h3 class="text-xl font-semibold mb-2">
                    Faculty Management
                </h3>

                <p class="text-gray-500">
                    Manage faculty curriculum submissions efficiently.
                </p>

            </div>

            <div class="bg-white rounded-2xl shadow-md p-6">

                <i class="fas fa-check-circle text-4xl text-green-600 mb-4"></i>

                <h3 class="text-xl font-semibold mb-2">
                    Approval Workflow
                </h3>

                <p class="text-gray-500">
                    Multi-level approval process for curriculum management.
                </p>

            </div>

            <div class="bg-white rounded-2xl shadow-md p-6">

                <i class="fas fa-chart-line text-4xl text-purple-600 mb-4"></i>

                <h3 class="text-xl font-semibold mb-2">
                    Reports & Analytics
                </h3>

                <p class="text-gray-500">
                    Generate reports and monitor approval statistics.
                </p>

            </div>

        </div>

    </div>
</div>

@endsection