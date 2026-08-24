<aside class="w-64 min-h-screen bg-gray-800 text-white">

    <div class="p-6">

        @if(Auth::user()->role == 'admin')

        <!-- ADMIN MENU -->
        <h2 class="text-xl font-bold mb-6">
            Admin Menu
        </h2>

        <ul class="space-y-3">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-gauge mr-2"></i>
                    Dashboard
                </a>
            </li>


            <li>
                <a href="{{ route('departments.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-building mr-2"></i>
                    Departments
                </a>
            </li>


            <li>
                <a href="{{ route('users.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-users mr-2"></i>
                    Users
                </a>
            </li>


            <li>
                <a href="{{ route('courses.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-book mr-2"></i>
                    Courses
                </a>
            </li>


            <li>
                <a href="{{ route('course-types.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-list mr-2"></i>
                    Course Types
                </a>
            </li>


            <li>
                <a href="{{ route('academic-years.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-calendar-days mr-2"></i>
                    Academic Years
                </a>
            </li>


            <li>
                <a href="{{ route('semesters.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-calendar mr-2"></i>
                    Semesters
                </a>
            </li>


            <li>
                <a href="{{ route('curriculums.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-file-lines mr-2"></i>
                    Curriculums
                </a>
            </li>
            <li>
                <a href="{{ route('faculty.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-gauge mr-2"></i> Faculty Dashboard
                </a>
            </li>

            <li>
<a href="{{ route('faculty.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-list mr-2"></i> My Curriculums
                </a>
            </li>

            <li>
                <a href="{{ route('faculty.submitted') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-paper-plane mr-2"></i> Submitted Curriculums
                </a>
            </li>

            <li>
                <a href="{{ route('faculty.approvalStatus') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-circle-check mr-2"></i> Approval Status
                </a>
            </li>


            <li>
                <a href="{{ route('reports.curriculum') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-chart-line mr-2"></i>
                    Reports
                </a>
            </li>

        </ul>



        @elseif(Auth::user()->role == 'hod')


        <!-- HOD MENU -->
        <h2 class="text-xl font-bold mb-6">
            HOD Menu
        </h2>


        <ul class="space-y-3">


            <li>
                <a href="{{ route('hod.dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">

                    <i class="fa-solid fa-gauge mr-2"></i>
                    Dashboard

                </a>
            </li>



            <li>
                <a href="{{ route('hod.dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">

                    <i class="fa-solid fa-file-circle-check mr-2"></i>
                    Pending Proposals

                </a>
            </li>



            <li>
                <a href="{{ route('hod.dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">

                    <i class="fa-solid fa-clock-rotate-left mr-2"></i>
                    Proposal History

                </a>
            </li>



            <li>
                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">

                    <i class="fa-solid fa-user mr-2"></i>
                    Profile

                </a>
            </li>



            <li>
                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">

                    <i class="fa-solid fa-key mr-2"></i>
                    Change Password

                </a>
            </li>


        </ul>



        @elseif(Auth::user()->role == 'faculty')


        <!-- FACULTY MENU -->
        <h2 class="text-xl font-bold mb-6">
            Faculty Menu
        </h2>


        <ul class="space-y-3">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-gauge mr-2"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('curriculums.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-file-lines mr-2"></i>
                    My Curriculums
                </a>
            </li>

            <li>
                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-user mr-2"></i>
                    Profile
                </a>
            </li>

        </ul>



        @elseif(Auth::user()->role == 'cdc')


        <!-- CDC MENU -->
        <h2 class="text-xl font-bold mb-6">
            CDC Menu
        </h2>


        <ul class="space-y-3">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-gauge mr-2"></i>
                    Dashboard
                </a>
            </li>


            <li>
                <a href="{{ route('curriculums.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-file-lines mr-2"></i>
                    Pending Curriculums
                </a>
            </li>


            <li>
                <a href="{{ route('cdc.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-clipboard-check mr-2"></i> CDC Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('reports.curriculum') }}" class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-chart-line mr-2"></i> Reports
                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fa-solid fa-user mr-2"></i>
                    Profile
                </a>
            </li>

        </ul>


        @endif


    </div>

</aside>