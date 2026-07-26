@extends('layouts.app')

@section('content')

    <div class="max-w-4xl mx-auto space-y-6">

        <h2 class="text-2xl font-bold mb-6">Profile Settings</h2>

        @if (session('status') === 'profile-updated')
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                Profile updated successfully.
            </div>
        @endif

        <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>

@endsection