@extends('layouts.app')

@section('content')

<div class="py-8">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Page Heading -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Settings
            </h1>
            <p class="text-gray-500 mt-2">
                Configure your Curriculum Approval Management System.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- General Settings -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    General Settings
                </h2>

                <div class="space-y-5">

                    <div>
                        <label class="block text-gray-600 mb-2">
                            Institute Name
                        </label>

                        <input
                            type="text"
                            value="Curriculum Approval Management System"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-600 mb-2">
                            Academic Year
                        </label>

                        <input
                            type="text"
                            value="2026-2027"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-600 mb-2">
                            Default Language
                        </label>

                        <select class="w-full border rounded-lg px-4 py-3">
                            <option>English</option>
                            <option>Hindi</option>
                        </select>
                    </div>

                </div>

            </div>

            <!-- Notification Settings -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    Notification Settings
                </h2>

                <div class="space-y-5">

                    <div class="flex justify-between items-center">
                        <span>Email Notifications</span>

                        <input type="checkbox" checked class="w-5 h-5">
                    </div>

                    <div class="flex justify-between items-center">
                        <span>SMS Notifications</span>

                        <input type="checkbox" class="w-5 h-5">
                    </div>

                    <div class="flex justify-between items-center">
                        <span>System Alerts</span>

                        <input type="checkbox" checked class="w-5 h-5">
                    </div>

                </div>

            </div>

            <!-- Security Settings -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    Security
                </h2>

                <div class="space-y-5">

                    <button class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 transition">
                        Change Password
                    </button>

                    <button class="w-full bg-yellow-500 text-white py-3 rounded-xl hover:bg-yellow-600 transition">
                        Enable Two-Factor Authentication
                    </button>

                </div>

            </div>

            <!-- Appearance -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    Appearance
                </h2>

                <div class="space-y-5">

                    <div>
                        <label class="block text-gray-600 mb-2">
                            Theme
                        </label>

                        <select class="w-full border rounded-lg px-4 py-3">
                            <option>Light</option>
                            <option>Dark</option>
                        </select>
                    </div>

                    <button class="w-full bg-green-600 text-white py-3 rounded-xl hover:bg-green-700 transition">
                        Save Settings
                    </button>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection