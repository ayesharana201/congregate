<div class="min-h-screen bg-slate-50 py-8">

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>

            <p class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                Organization Overview
            </p>

            <h1 class="mt-1 text-3xl font-bold text-slate-900">
                Dashboard
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Welcome back. Here's what's happening in your organization.
            </p>

        </div>


        {{-- Add Member Button --}}

        <a
            href="{{ route('members.create') }}"
            class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow-lg hover:shadow-2xl transition"
        >

            <svg
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Add Member

        </a>

    </div>


    {{-- ========================================================= --}}
    {{-- STATISTICS + QUICK ACTION GRID --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">


        {{-- ===================================================== --}}
        {{-- TOTAL MEMBERS --}}
        {{-- ===================================================== --}}

        <div class="bg-white border border-slate-200 rounded-3xl shadow-lg hover:shadow-2xl p-6">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Members
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-900">
                        {{ $totalMembers }}
                    </p>

                </div>


                <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-blue-50">

                    <svg
                        class="w-6 h-6 text-blue-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                    </svg>

                </div>

            </div>


            <div class="mt-5">

                <a
                    href="{{ route('members.index') }}"
                    class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 hover:text-blue-800"
                >

                    View members

                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>

                </a>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- TOTAL DONATIONS --}}
        {{-- ===================================================== --}}

        <div class="bg-white border border-slate-200 rounded-3xl shadow-lg hover:shadow-2xl p-6">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Total Donations
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-900">
                        ${{ number_format($totalDonations, 2) }}
                    </p>

                </div>


                <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-emerald-50">

                    <svg
                        class="w-6 h-6 text-emerald-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>

                </div>

            </div>


            <div class="mt-5">

                <a
                    href="{{ route('donations.index') }}"
                    class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 hover:text-emerald-800"
                >

                    View donations

                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>

                </a>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- UPCOMING EVENTS --}}
        {{-- ===================================================== --}}

        <div class="bg-white border border-slate-200 rounded-3xl shadow-lg hover:shadow-2xl p-6">

            <div class="flex items-start justify-between">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Upcoming Events
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-900">
                        {{ $upcomingEventsCount }}
                    </p>

                </div>


                <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-slate-50">

                    <svg
                        class="w-6 h-6 text-slate-700"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>

                </div>

            </div>


            <div class="mt-5">

                <a
                    href="{{ route('events.index') }}"
                    class="inline-flex items-center gap-1 text-sm font-semibold text-slate-800 hover:text-blue-600"
                >

                    View events

                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>

                </a>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- QUICK ACTION --}}
        {{-- ===================================================== --}}

        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl shadow-lg hover:shadow-2xl p-6 text-white">

            <p class="text-sm font-medium text-blue-100">
                Quick Action
            </p>

            <h2 class="mt-2 text-xl font-bold">
                Manage your organization
            </h2>

            <p class="mt-2 text-sm text-blue-100">
                Quickly access the tools you use most.
            </p>


            <div class="mt-5">

                <a
                    href="{{ route('donations.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white text-blue-700 text-sm font-semibold rounded-lg hover:bg-blue-50 transition"
                >

                    Record Donation

                    <svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>

                </a>

            </div>

        </div>

    </div>



    {{-- ========================================================= --}}
    {{-- UPCOMING EVENTS SECTION --}}
    {{-- ========================================================= --}}

    <div class="bg-white border border-slate-200 rounded-3xl shadow-lg hover:shadow-2xl overflow-hidden mb-8">

        {{-- Section Header --}}

        <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">

            <div>

                <h2 class="text-lg font-bold text-slate-900">
                    Upcoming Events
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Your next scheduled organization events.
                </p>

            </div>


            <a
                href="{{ route('events.index') }}"
                class="text-sm font-semibold text-blue-600 hover:text-blue-800"
            >
                View all
            </a>

        </div>


        {{-- Events --}}

        @if($upcomingEvents->count())

            <div class="divide-y divide-slate-100">

                @foreach($upcomingEvents as $event)

                    <div class="flex items-center gap-4 px-6 py-5 hover:bg-slate-50 transition">


                        {{-- Date Box --}}

                        <div class="w-12 h-14 flex-shrink-0 flex flex-col items-center justify-center rounded-xl bg-blue-50">

                            <span class="text-xs font-bold uppercase text-blue-600">
                                {{ $event->event_date->format('M') }}
                            </span>

                            <span class="text-lg font-bold text-blue-700">
                                {{ $event->event_date->format('d') }}
                            </span>

                        </div>


                        {{-- Event Information --}}

                        <div class="flex-1 min-w-0">

                            <h3 class="font-semibold text-slate-900">
                                {{ $event->title }}
                            </h3>


                            <div class="mt-1 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500">

                                @if($event->start_time)

                                    <span class="inline-flex items-center gap-1">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>

                                        {{ $event->start_time }}

                                        @if($event->end_time)
                                            - {{ $event->end_time }}
                                        @endif

                                    </span>

                                @endif


                                @if($event->location)

                                    <span class="inline-flex items-center gap-1">

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>

                                        {{ $event->location }}

                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- Status --}}

                        <span class="hidden sm:inline-flex px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold">

                            {{ $event->status }}

                        </span>

                    </div>

                @endforeach

            </div>

        @else

            <div class="text-center py-12 px-6">

                <div class="mx-auto w-12 h-12 flex items-center justify-center rounded-full bg-slate-100">

                    <svg
                        class="w-6 h-6 text-slate-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>

                </div>


                <p class="mt-4 text-sm text-slate-500">
                    No upcoming events found.
                </p>


                <a
                    href="{{ route('events.create') }}"
                    class="inline-flex mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg"
                >
                    Add Event
                </a>

            </div>

        @endif

    </div>



    {{-- ========================================================= --}}
    {{-- QUICK ACCESS --}}
    {{-- ========================================================= --}}

    <div class="bg-white border border-slate-200 rounded-3xl shadow-lg hover:shadow-2xl overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200">

            <h2 class="text-lg font-bold text-slate-900">
                Quick Access
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Frequently used tools.
            </p>

        </div>


        <div class="divide-y divide-slate-100">


            {{-- Members --}}

            <a
                href="{{ route('members.index') }}"
                class="flex items-center gap-4 px-6 py-5 hover:bg-slate-50 transition"
            >

                <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-blue-50">

                    <svg
                        class="w-5 h-5 text-blue-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>

                </div>


                <div class="flex-1">

                    <p class="text-sm font-semibold text-slate-900">
                        Members
                    </p>

                    <p class="text-xs text-slate-500">
                        Manage organization members
                    </p>

                </div>


                <svg
                    class="w-5 h-5 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>

            </a>



            {{-- Donations --}}

            <a
                href="{{ route('donations.index') }}"
                class="flex items-center gap-4 px-6 py-5 hover:bg-slate-50 transition"
            >

                <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-emerald-50">

                    <svg
                        class="w-5 h-5 text-emerald-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>

                </div>


                <div class="flex-1">

                    <p class="text-sm font-semibold text-slate-900">
                        Donations
                    </p>

                    <p class="text-xs text-slate-500">
                        Record and manage donations
                    </p>

                </div>


                <svg
                    class="w-5 h-5 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>

            </a>



            {{-- Statements --}}

            <a
                href="{{ route('statements.index') }}"
                class="flex items-center gap-4 px-6 py-5 hover:bg-slate-50 transition"
            >

                <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100">

                    <svg
                        class="w-5 h-5 text-slate-700"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                    </svg>

                </div>


                <div class="flex-1">

                    <p class="text-sm font-semibold text-slate-900">
                        Statements
                    </p>

                    <p class="text-xs text-slate-500">
                        View member statements
                    </p>

                </div>


                <svg
                    class="w-5 h-5 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>

            </a>



            {{-- Reports --}}

            <a
                href="{{ route('reports.index') }}"
                class="flex items-center gap-4 px-6 py-5 hover:bg-slate-50 transition"
            >

                <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100">

                    <svg
                        class="w-5 h-5 text-slate-700"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2z"
                        />
                    </svg>

                </div>


                <div class="flex-1">

                    <p class="text-sm font-semibold text-slate-900">
                        Reports
                    </p>

                    <p class="text-xs text-slate-500">
                        View organization reports
                    </p>

                </div>


                <svg
                    class="w-5 h-5 text-slate-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>

            </a>

        </div>

    </div>

</div>

</div>