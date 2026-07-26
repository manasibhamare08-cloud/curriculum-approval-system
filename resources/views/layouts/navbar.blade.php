<nav class="bg-blue-900 text-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo + Title -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo/cams-logo.png') }}"
     alt="CAMS Logo"
     class="h-12 w-auto">
            <h1 class="text-3xl font-bold">CAMS</h1>
        </div>

        <!-- Right Side -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('profile.edit') }}"
               class="bg-white text-blue-900 px-4 py-2 rounded hover:bg-gray-200">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>

    </div>
</nav>