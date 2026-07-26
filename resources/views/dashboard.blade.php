@extends('layouts.app')

@section('content')

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Welcome Section -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Welcome to CAMS
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Curriculum Approval Management System Dashboard
                    </p>
                </div>

                <div class="text-right">
                    <p class="text-gray-500 text-sm">Today's Date</p>
                    <h3 class="text-xl font-bold text-blue-700">
                        {{ now()->format('d F Y') }}
                    </h3>
                </div>

            </div>

        </div>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mt-8">
<!-- Total Courses -->
<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 p-6">

    <div class="flex justify-between items-start">

        <div>
            <p class="text-sm text-gray-500 font-medium">
                Total Courses
            </p>

            <h2 class="text-4xl font-bold text-gray-800 mt-3">
                {{ $totalCourses }}
            </h2>

            <p class="text-green-600 text-sm mt-4 font-medium">
                ↑ 12 Added this month
            </p>
        </div>

        <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center">
            <i class="fas fa-book-open text-3xl text-blue-700"></i>
        </div>

    </div>

</div>

<!-- Pending Approval -->
<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 p-6">

    <div class="flex justify-between items-start">

        <div>
            <p class="text-sm text-gray-500 font-medium">
                Pending Approval
            </p>

            <h2 class="text-4xl font-bold text-gray-800 mt-3">
                {{ $pendingHOD + $pendingCDC + $pendingAdmin }}
            </h2>

            <p class="text-yellow-600 text-sm mt-4 font-medium">
                ⏳ 5 Awaiting Review
            </p>
        </div>

        <div class="w-16 h-16 rounded-2xl bg-yellow-100 flex items-center justify-center">
            <i class="fas fa-clock text-3xl text-yellow-600"></i>
        </div>

    </div>

</div>

            <!-- Approved Courses -->
<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 p-6">

    <div class="flex justify-between items-start">

        <div>
            <p class="text-sm text-gray-500 font-medium">
                Approved Courses
            </p>

            <h2 class="text-4xl font-bold text-gray-800 mt-3">
                {{ $approved }}
            </h2>

            <p class="text-green-600 text-sm mt-4 font-medium">
                ✔ 8 Approved Today
            </p>
        </div>

        <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center">
            <i class="fas fa-circle-check text-3xl text-green-600"></i>
        </div>

    </div>

</div>

            <!-- Rejected Courses -->
<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 p-6">

    <div class="flex justify-between items-start">

        <div>
            <p class="text-sm text-gray-500 font-medium">
                Rejected Courses
            </p>

            <h2 class="text-4xl font-bold text-gray-800 mt-3">
                {{ $rejected }}
            </h2>

            <p class="text-red-600 text-sm mt-4 font-medium">
                ✖ 2 This Week
            </p>
        </div>

        <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center">
            <i class="fas fa-circle-xmark text-3xl text-red-600"></i>
        </div>

    </div>

</div>
        </div>
        <!-- END Dashboard Cards grid -->

              <!-- Quick Actions -->
<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 mt-8">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Quick Actions
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Create Curriculum -->
        <a href="{{ route('curriculums.create') }}"
           class="block bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-xl p-6 transition-all duration-300 text-left">

            <i class="fas fa-plus-circle text-3xl text-blue-600 mb-3"></i>

            <h3 class="font-semibold text-gray-800">
                Create Curriculum
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Add a new curriculum.
            </p>

        </a>

        <!-- Approvals -->
        <a href="{{ route('curriculums.index') }}"
           class="block bg-green-50 hover:bg-green-100 border border-green-200 rounded-xl p-6 transition-all duration-300 text-left">

            <i class="fas fa-check-circle text-3xl text-green-600 mb-3"></i>

            <h3 class="font-semibold text-gray-800">
                View Approvals
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Review pending approvals.
            </p>

        </a>

        <!-- Reports -->
        <a href="{{ route('reports.curriculum') }}"
           class="block bg-purple-50 hover:bg-purple-100 border border-purple-200 rounded-xl p-6 transition-all duration-300 text-left">

            <i class="fas fa-chart-line text-3xl text-purple-600 mb-3"></i>

            <h3 class="font-semibold text-gray-800">
                Reports
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                View reports and analytics.
            </p>

        </a>

        <!-- Settings -->
        <button class="bg-orange-50 hover:bg-orange-100 border border-orange-200 rounded-xl p-6 transition-all duration-300 text-left">

            <i class="fas fa-cog text-3xl text-orange-600 mb-3"></i>

            <h3 class="font-semibold text-gray-800">
                Settings
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                Manage dashboard settings.
            </p>

        </button>

    </div>

</div>
<!-- Recent Activities -->
<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 mt-8">

    <div class="flex items-center justify-between mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Recent Activities
        </h2>

        <a href="#" class="text-blue-600 hover:underline text-sm">
            View All
        </a>

    </div>

    <div class="space-y-4">

        <!-- Activity 1 -->
        <div class="flex items-center justify-between border-b pb-4">

            <div class="flex items-center gap-4">

                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                    <i class="fas fa-check text-green-600"></i>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        AI Curriculum Approved
                    </p>
                    <p class="text-sm text-gray-500">
                        Department of Computer Engineering
                    </p>
                </div>

            </div>

            <span class="text-sm text-gray-400">
                2 min ago
            </span>

        </div>

        <!-- Activity 2 -->
        <div class="flex items-center justify-between border-b pb-4">

            <div class="flex items-center gap-4">

                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                    <i class="fas fa-clock text-yellow-600"></i>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        New Curriculum Submitted
                    </p>
                    <p class="text-sm text-gray-500">
                        Information Technology Department
                    </p>
                </div>

            </div>

            <span class="text-sm text-gray-400">
                15 min ago
            </span>

        </div>

        <!-- Activity 3 -->
        <div class="flex items-center justify-between border-b pb-4">

            <div class="flex items-center gap-4">

                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-user text-blue-600"></i>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        Faculty Profile Updated
                    </p>
                    <p class="text-sm text-gray-500">
                        Electronics Department
                    </p>
                </div>

            </div>

            <span class="text-sm text-gray-400">
                1 hour ago
            </span>

        </div>

        <!-- Activity 4 -->
        <div class="flex items-center justify-between">

            <div class="flex items-center gap-4">

                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                    <i class="fas fa-chart-line text-purple-600"></i>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        Monthly Report Generated
                    </p>
                    <p class="text-sm text-gray-500">
                        System Analytics
                    </p>
                </div>

            </div>

            <span class="text-sm text-gray-400">
                Today
            </span>

        </div>

    </div>

</div>
<!-- Notifications -->
<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 mt-8">

    <div class="flex items-center justify-between mb-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Notifications
        </h2>

        <span class="bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full">
            3 New
        </span>

    </div>

    <div class="space-y-4">

        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition">
            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                <i class="fas fa-bell text-red-600"></i>
            </div>

            <div>
                <p class="font-semibold text-gray-800">
                    5 Curriculums are waiting for approval
                </p>
                <p class="text-sm text-gray-500">
                    10 minutes ago
                </p>
            </div>
        </div>

        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition">
            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                <i class="fas fa-calendar text-blue-600"></i>
            </div>

            <div>
                <p class="font-semibold text-gray-800">
                    Curriculum Committee Meeting at 2:00 PM
                </p>
                <p class="text-sm text-gray-500">
                    Today
                </p>
            </div>
        </div>

        <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition">
            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                <i class="fas fa-user-plus text-green-600"></i>
            </div>

            <div>
                <p class="font-semibold text-gray-800">
                    New Faculty member registered
                </p>
                <p class="text-sm text-gray-500">
                    1 hour ago
                </p>
            </div>
        </div>

    </div>

</div>
<!-- Dashboard Analytics -->
<div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mt-8">

    <!-- Monthly Approvals -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold text-gray-800">
                Monthly Approvals
            </h2>

            <i class="fas fa-chart-bar text-blue-600 text-2xl"></i>

        </div>

        <div class="h-72">
            <canvas id="monthlyApprovalsChart"></canvas>
        </div>

    </div>

    <!-- Approval Status -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold text-gray-800">
                Approval Status
            </h2>

            <i class="fas fa-chart-pie text-green-600 text-2xl"></i>

        </div>

        <div class="h-72">
            <canvas id="approvalStatusChart"></canvas>
        </div>

    </div>

</div>
        </div>

      

    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    console.log('Chart.js loaded:', typeof Chart !== 'undefined');

    const monthlyLabels = {!! json_encode(collect($monthlyApprovals)->pluck('label')) !!};
    const monthlyData = {!! json_encode(collect($monthlyApprovals)->pluck('count')) !!};

    new Chart(document.getElementById('monthlyApprovalsChart'), {
        type: 'bar',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Approved Curriculums',
                data: monthlyData,
                backgroundColor: '#2563eb',
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });

    new Chart(document.getElementById('approvalStatusChart'), {
        type: 'pie',
        data: {
            labels: ['Draft', 'Pending HOD', 'Pending CDC', 'Pending Admin', 'Approved', 'Rejected'],
            datasets: [{
                data: [
                    {{ $draft }},
                    {{ $pendingHOD }},
                    {{ $pendingCDC }},
                    {{ $pendingAdmin }},
                    {{ $approved }},
                    {{ $rejected }}
                ],
                backgroundColor: [
                    '#9ca3af',
                    '#facc15',
                    '#fb923c',
                    '#818cf8',
                    '#22c55e',
                    '#ef4444'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });
});
</script>
</div>

@endsection