<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="p-6">

        <h2>Dashboard Statistics</h2>

        <table border="1" cellpadding="10">

            <tr>
                <th>Module</th>
                <th>Total</th>
            </tr>

            <tr>
                <td>Total Departments</td>
                <td>{{ $totalDepartments }}</td>
            </tr>

            <tr>
                <td>Total Courses</td>
                <td>{{ $totalCourses }}</td>
            </tr>

            <tr>
                <td>Total Academic Years</td>
                <td>{{ $totalAcademicYears }}</td>
            </tr>

            <tr>
                <td>Total Semesters</td>
                <td>{{ $totalSemesters }}</td>
            </tr>

            <tr>
                <td>Total Course Types</td>
                <td>{{ $totalCourseTypes }}</td>
            </tr>

            <tr>
                <td>Total Curriculums</td>
                <td>{{ $totalCurriculums }}</td>
            </tr>

            <tr>
                <td>Pending HOD</td>
                <td>{{ $pendingHOD }}</td>
            </tr>

            <tr>
                <td>Pending CDC</td>
                <td>{{ $pendingCDC }}</td>
            </tr>

            <tr>
                <td>Pending Admin</td>
                <td>{{ $pendingAdmin }}</td>
            </tr>

            <tr>
                <td>Approved</td>
                <td>{{ $approved }}</td>
            </tr>

            <tr>
                <td>Rejected</td>
                <td>{{ $rejected }}</td>
            </tr>

        </table>

    </div>

</x-app-layout>