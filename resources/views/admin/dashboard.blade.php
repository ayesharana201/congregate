<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Administrator Dashboard | Congregate</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gradient-to-br from-slate-50 via-slate-100 to-slate-200 min-h-screen">

    {{-- =============================== --}}
    {{-- TOP NAVBAR --}}
    {{-- =============================== --}}
<header class="bg-white border-b border-slate-200 sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-8 py-6">

        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-3xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-lg">

                        <span class="text-white text-2xl font-bold">
                            C
                        </span>

                    </div>

                    <div>

                        <h1 class="text-3xl font-bold text-slate-900">
                            Congregate
                        </h1>

                        <p class="text-sm text-slate-500">
                            Administrator Control Panel
                        </p>

                    </div>

                </div>


            {{-- Right Side --}}
            <div class="flex items-center gap-8">

                <div class="text-right">
                    <h3 class="font-bold">
                        {{ auth()->user()->name }}
                    </h3>
                    <p class="text-sm text-slate-500">
                        Administrator
                    </p>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="px-6 py-3 rounded-xl bg-red-600 text-white">
                        Logout
                    </button>
                </form>

            </div>

        </div>

    </div>

</header>



    {{-- =============================== --}}
    {{-- MAIN CONTENT --}}
    {{-- =============================== --}}
<main class="max-w-7xl mx-auto px-8 lg:px-12 py-10 space-y-10">
    

{{-- ================= HERO SECTION ================= --}}
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-700 via-indigo-700 to-purple-700 shadow-2xl">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 overflow-hidden">
    </div>

    <div class="relative grid lg:grid-cols-2 gap-12 items-center px-10 lg:px-16 py-12 lg:py-14">

        {{-- LEFT SIDE --}}
        <div class="px-8 lg:px-0">

            <span
                class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 backdrop-blur text-white text-sm font-semibold">
                Administrator Dashboard
            </span>

            <h1 class="mt-6 text-4xl lg:text-5xl font-black text-white leading-tight">
                Welcome Back,

                <span class="block text-blue-100">
                    {{ Auth::user()->name }}
                </span>
            </h1>

            <p class="mt-6 text-lg leading-8 text-blue-100 max-w-xl">
                Manage members, donations, attendance, events,
                communications and reports from one centralized dashboard.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">

                <a href="{{ route('members.index') }}"
                   class="px-7 py-4 bg-white text-blue-700 rounded-xl font-semibold shadow-lg hover:scale-105 hover:bg-slate-100 transition duration-300">
                    Manage Members
                </a>

                <a href="{{ route('events.index') }}"
                   class="px-7 py-4 border border-white/30 rounded-xl text-white hover:bg-white/10 transition duration-300">
                    Upcoming Events
                </a>

            </div>

        </div>

        {{-- RIGHT SIDE --}}
        <div class="hidden lg:flex justify-end">
            <div class="grid grid-cols-2 gap-5 w-full max-w-md">
            </div>
        </div>

    </div>

</div>
        {{-- =============================== --}}
        {{-- STATISTICS SECTION STARTS HERE --}}
        {{-- =============================== --}}

        {{-- =============================== --}}
        {{-- DASHBOARD STATISTICS --}}
        {{-- =============================== --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8 mt-16">

            {{-- Members --}}
            <div class="bg-white rounded-3xl border border-slate-200 bg-white p-8 shadow-lg hover:shadow-2xl hover:shadow-xl transition-all duration-300">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-semibold text-slate-500">
                            Total Members
                        </p>

                        <h3 class="mt-3 text-4xl font-extrabold text-slate-900">
                            {{ \App\Models\Member::count() }}
                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center">

                        <svg class="w-8 h-8 text-blue-700"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2a5 5 0 00-10 0v2m5-13a4 4 0 110-8 4 4 0 010 8z"/>

                        </svg>

                    </div>

                </div>

                <p class="mt-5 text-sm text-slate-500">
                    Registered organization members.
                </p>

            </div>



            {{-- Donations --}}
            <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl hover:shadow-xl transition-all duration-300 border border-slate-200 p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-semibold text-slate-500">
                            Donations
                        </p>

                        <h3 class="mt-3 text-4xl font-extrabold text-emerald-600">

                            ${{ number_format(\App\Models\Donation::sum('amount'),2) }}

                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-emerald-100 flex items-center justify-center">

                        <svg class="w-8 h-8 text-emerald-700"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2
                                3 .895 3 2-1.343 2-3 2m0-8V7m0
                                1v8m0 0v1m0-1c-1.11
                                0-2.08-.402-2.599-1M21
                                12a9 9 0 11-18 0
                                9 9 0 0118 0z"/>

                        </svg>

                    </div>

                </div>

                <p class="mt-5 text-sm text-slate-500">
                    Total contributions received.
                </p>

            </div>



            {{-- Events --}}
            <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl hover:shadow-xl transition-all duration-300 border border-slate-200 p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-semibold text-slate-500">
                            Upcoming Events
                        </p>

                        <h3 class="mt-3 text-4xl font-extrabold text-orange-600">

                            {{ \App\Models\Event::where('status','Upcoming')->count() }}

                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-orange-100 flex items-center justify-center">

                        <svg class="w-8 h-8 text-orange-700"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9
                                8h10M5 21h14a2 2 0
                                002-2V7a2 2 0
                                00-2-2H5a2 2 0
                                00-2 2v12a2 2 0
                                002 2z"/>

                        </svg>

                    </div>

                </div>

                <p class="mt-5 text-sm text-slate-500">
                    Scheduled organization events.
                </p>

            </div>



            {{-- Communications --}}
            <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl hover:shadow-xl transition-all duration-300 border border-slate-200 p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-semibold text-slate-500">
                            Communications
                        </p>

                        <h3 class="mt-3 text-4xl font-extrabold text-purple-600">

                            {{ \App\Models\Communication::count() }}

                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-purple-100 flex items-center justify-center">

                        <svg class="w-8 h-8 text-purple-700"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 10h.01M12
                                10h.01M16 10h.01M9
                                16H5a2 2 0
                                01-2-2V6a2 2 0
                                012-2h14a2 2 0
                                012 2v8a2 2 0
                                01-2 2h-5l-4 4v-4z"/>

                        </svg>

                    </div>

                </div>

                <p class="mt-5 text-sm text-slate-500">
                    Messages and announcements.
                </p>

            </div>

        </div>



        {{-- =============================== --}}
        {{-- QUICK ACTIONS START BELOW --}}
        {{-- =============================== --}}


        {{-- =============================== --}}
        {{-- QUICK ACTIONS --}}
        {{-- =============================== --}}

        <div class="mt-14">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-2xl font-bold text-slate-900">
                        Quick Actions
                    </h2>

                    <p class="text-slate-500">
                        Access frequently used administration modules.
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                {{-- Members --}}
                <a href="{{ route('members.index') }}"
                   class="group bg-white rounded-3xl border border-slate-200 shadow-lg hover:shadow-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-6">

                    <div class="w-14 h-14 rounded-3xl bg-blue-100 flex items-center justify-center">

                        <svg class="w-7 h-7 text-blue-700"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2a5 5 0 00-10 0v2m5-13a4 4 0 110-8 4 4 0 010 8z"/>

                        </svg>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Members
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Register, edit and manage members.
                    </p>

                </a>



                {{-- Donations --}}
                <a href="{{ route('donations.index') }}"
                   class="group bg-white rounded-3xl border border-slate-200 shadow-lg hover:shadow-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">

                    <div class="w-14 h-14 rounded-3xl bg-emerald-100 flex items-center justify-center">

                        <svg class="w-7 h-7 text-emerald-700"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2"/>

                        </svg>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Donations
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Record and monitor donations.
                    </p>

                </a>



                {{-- Events --}}
                <a href="{{ route('events.index') }}"
                   class="group bg-white rounded-3xl border border-slate-200 shadow-lg hover:shadow-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">

                    <div class="w-14 h-14 rounded-3xl bg-orange-100 flex items-center justify-center">

                        <svg class="w-7 h-7 text-orange-700"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10"/>

                        </svg>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Events
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Manage upcoming church events.
                    </p>

                </a>



                {{-- Communications --}}
                <a href="{{ route('communications.index') }}"
                   class="group bg-white rounded-3xl border border-slate-200 shadow-lg hover:shadow-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">

                    <div class="w-14 h-14 rounded-3xl bg-purple-100 flex items-center justify-center">

                        <svg class="w-7 h-7 text-purple-700"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 10h.01M12 10h.01M16 10h.01"/>

                        </svg>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Communications
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Send announcements and reminders.
                    </p>

                </a>



                {{-- Attendance --}}
                <a href="{{ route('attendance.index') }}"
                   class="group bg-white rounded-3xl border border-slate-200 shadow-lg hover:shadow-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">

                    <div class="w-14 h-14 rounded-3xl bg-cyan-100 flex items-center justify-center">

                        <span class="text-3xl">📋</span>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Attendance
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Track attendance records.
                    </p>

                </a>



                {{-- Reports --}}
                <a href="{{ route('reports.index') }}"
                   class="group bg-white rounded-3xl border border-slate-200 shadow-lg hover:shadow-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">

                    <div class="w-14 h-14 rounded-3xl bg-indigo-100 flex items-center justify-center">

                        <span class="text-3xl">📊</span>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Reports
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Generate organization reports.
                    </p>

                </a>



                {{-- Settings --}}
                <a href="{{ route('settings.index') }}"
                   class="group bg-white rounded-3xl border border-slate-200 shadow-lg hover:shadow-2xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">

                    <div class="w-14 h-14 rounded-3xl bg-slate-200 flex items-center justify-center">

                        <span class="text-3xl">⚙️</span>

                    </div>

                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Settings
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Configure your organization.
                    </p>

                </a>



                {{-- Management Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="group rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-700 shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 p-8 text-white">

                    <div class="w-14 h-14 rounded-3xl bg-white/20 flex items-center justify-center">

                        <span class="text-3xl">🚀</span>

                    </div>

                    <h3 class="mt-5 text-xl font-bold">
                        Management Dashboard
                    </h3>

                    <p class="mt-2 text-blue-100 text-sm">
                        Open the complete Congregate management system.
                    </p>

                </a>

            </div>

        </div>



        {{-- ====================================== --}}
        {{-- UPCOMING EVENTS & RECENT ACTIVITY NEXT --}}
        {{-- ====================================== --}}


        {{-- ====================================== --}}
        {{-- UPCOMING EVENTS & RECENT ACTIVITY --}}
        {{-- ====================================== --}}

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-14">

            {{-- Upcoming Events --}}
            <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl border border-slate-200">

                <div class="flex items-center justify-between p-8 border-b">

                    <div>

                        <h2 class="text-xl font-bold text-slate-900">
                            Upcoming Events
                        </h2>

                        <p class="text-sm text-slate-500">
                            Scheduled organization events
                        </p>

                    </div>

                    <a href="{{ route('events.index') }}"
                       class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                        View All
                    </a>

                </div>

                <div class="p-8">

                    @forelse($upcomingEvents as $event)

                        <div class="flex items-center justify-between py-4 border-b last:border-0">

                            <div>

                                <h3 class="font-semibold text-slate-800">
                                    {{ $event->title }}
                                </h3>

                                <p class="text-sm text-slate-500">

                                    {{ $event->event_date->format('d M Y') }}

                                    @if($event->start_time)
                                        • {{ $event->start_time }}
                                    @endif

                                </p>

                            </div>

                            <span
                                class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">

                                {{ $event->status }}

                            </span>

                        </div>

                    @empty

                        <div class="text-center py-10">

                            <div class="text-6xl lg:text-7xl mb-3">
                                📅
                            </div>

                            <h3 class="font-semibold text-slate-700">
                                No Upcoming Events
                            </h3>

                            <p class="text-sm text-slate-500 mt-2">
                                Create an event to keep your congregation informed.
                            </p>

                            <a href="{{ route('events.create') }}"
                               class="inline-flex mt-5 px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold">

                                Create Event

                            </a>

                        </div>

                    @endforelse

                </div>

            </div>



            {{-- Recent Activity --}}
            <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl border border-slate-200">

                <div class="p-8 border-b">

                    <h2 class="text-xl font-bold text-slate-900">
                        System Status
                    </h2>

                    <p class="text-sm text-slate-500">
                        Current overview of your Congregate system.
                    </p>

                </div>

                <div class="p-8 space-y-5">

                    <div class="flex items-center justify-between">

                        <span class="text-slate-600">
                            Member Management
                        </span>

                        <span class="text-emerald-600 font-semibold">
                            ✓ Active
                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <span class="text-slate-600">
                            Donations
                        </span>

                        <span class="text-emerald-600 font-semibold">
                            ✓ Active
                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <span class="text-slate-600">
                            Events
                        </span>

                        <span class="text-emerald-600 font-semibold">
                            ✓ Active
                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <span class="text-slate-600">
                            Communications
                        </span>

                        <span class="text-emerald-600 font-semibold">
                            ✓ Active
                        </span>

                    </div>

                    <div class="flex items-center justify-between">

                        <span class="text-slate-600">
                            Reports
                        </span>

                        <span class="text-emerald-600 font-semibold">
                            ✓ Ready
                        </span>

                    </div>

                    <div class="mt-8 rounded-3xl bg-green-50 border border-green-200 p-5">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white">

                                ✓

                            </div>

                            <div>

                                <h4 class="font-bold text-green-800">
                                    System Healthy
                                </h4>

                                <p class="text-sm text-green-700">
                                    All Congregate modules are functioning normally.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- ====================================== --}}
        {{-- FOOTER --}}
        {{-- ====================================== --}}

        <footer class="mt-16 border-t border-slate-200 pt-6 pb-10">

            <div class="flex flex-col md:flex-row items-center justify-between gap-4">

                <div>

                    <h3 class="font-bold text-slate-800">
                        Congregate Management System
                    </h3>

                    <p class="text-sm text-slate-500">
                        Religious Organization Management System
                    </p>

                </div>

                <div class="text-sm text-slate-500">

                    © {{ date('Y') }} Congregate. All Rights Reserved.

                </div>

            </div>

        </footer>

    </main>

</body>

</html>