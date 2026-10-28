{{-- ========================================================= --}}
{{-- SINGLE LIVEWIRE ROOT ELEMENT --}}
{{-- ========================================================= --}}

<div class="min-h-screen bg-slate-100">

    {{-- ========================================================= --}}
    {{-- MEMBER NAVBAR --}}
    {{-- ========================================================= --}}

    <div class="relative z-50 bg-white border-b border-slate-200 shadow-sm">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="h-20 flex items-center justify-between">

                {{-- ================================================= --}}
                {{-- LOGO --}}
                {{-- ================================================= --}}

                <div class="flex items-center gap-3">

                    <div
                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-md"
                    >
                        <span class="text-white text-xl font-bold">
                            C
                        </span>
                    </div>

                    <div>

                        <h1 class="text-xl font-extrabold text-slate-900">
                            Congregate
                        </h1>

                        <p class="text-xs text-slate-500">
                            Member Portal
                        </p>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- RIGHT SIDE --}}
                {{-- ================================================= --}}

                <div class="flex items-center gap-3 sm:gap-5">

                    {{-- ================================================= --}}
                    {{-- NOTIFICATION --}}
                    {{-- ================================================= --}}

                    <div class="relative">

                        <details class="relative">

                            {{-- NOTIFICATION BUTTON --}}

                            <summary
                                class="list-none cursor-pointer w-10 h-10 rounded-xl bg-slate-100 hover:bg-blue-50 flex items-center justify-center transition relative"
                            >

                                {{-- Bell Icon --}}

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
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-5-5.917V4a1 1 0 10-2 0v1.083A6 6 0 006 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                    />
                                </svg>


                                {{-- ================================================= --}}
                                {{-- SMALL NOTIFICATION COUNT --}}
                                {{-- ================================================= --}}

                                @if($notificationCount > 0)

                                    <span
                                        class="absolute -top-1 -right-1 min-w-[17px] h-[17px] px-1 rounded-full bg-red-600 text-white text-[10px] leading-none font-bold flex items-center justify-center border-2 border-white"
                                    >
                                        {{ $notificationCount }}
                                    </span>

                                @endif

                            </summary>


                            {{-- ========================================================= --}}
{{-- NOTIFICATION DROPDOWN --}}
{{-- ========================================================= --}}

<div
    class="absolute right-0 top-full mt-3 bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden z-[9999]"
    style="width: 700px; max-width: calc(100vw - 30px);"
>

    {{-- DROPDOWN HEADER --}}
    <div class="px-6 py-4 border-b border-slate-200">

        <div class="flex items-center justify-between">

            <div>
                <h3 class="font-bold text-slate-900 text-lg">
                    Notifications
                </h3>

                <p class="text-xs text-slate-500 mt-1">
                    Latest event updates
                </p>
            </div>

            @if($notificationCount > 0)

                <span class="text-xs font-semibold text-blue-600">
                    {{ $notificationCount }} new
                </span>

            @endif

        </div>

    </div>


    {{-- NOTIFICATION LIST --}}
    <div
        class="overflow-y-auto"
        style="max-height: 300px;"
    >

        @forelse($notifications as $notification)

            <div
                class="px-6 py-4 border-b border-slate-100 hover:bg-slate-50 transition"
            >

                <div class="flex items-start gap-4">

                    {{-- ICON --}}
                    <div
                        class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0"
                    >

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
                                d="M8 7V3m8 4v4M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2H5z"
                            />

                        </svg>

                    </div>


                    {{-- CONTENT --}}
                    <div class="flex-1 min-w-0">

                        <div
                            class="flex items-start justify-between gap-6"
                        >

                            {{-- TITLE --}}
                            <p class="text-sm font-bold text-slate-900">

                                {{ $notification->title }}

                            </p>


                            {{-- DATE --}}
                            @if($notification->sent_at)

                                <span
                                    class="text-xs text-blue-600 whitespace-nowrap flex-shrink-0"
                                >

                                    {{ $notification->sent_at->format('d M Y, h:i A') }}

                                </span>

                            @endif

                        </div>


                        {{-- MESSAGE --}}
                        <p
                            class="text-sm text-slate-500 mt-2 leading-5"
                        >

                            {{ $notification->message }}

                        </p>

                    </div>

                </div>

            </div>

        @empty

            {{-- EMPTY --}}
            <div class="px-6 py-10 text-center">

                <div
                    class="w-14 h-14 mx-auto rounded-full bg-slate-100 flex items-center justify-center mb-3"
                >

                    <svg
                        class="w-7 h-7 text-slate-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 00-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1"
                        />

                    </svg>

                </div>

                <p class="text-sm font-semibold text-slate-700">
                    No notifications
                </p>

                <p class="text-xs text-slate-500 mt-1">
                    New event notifications will appear here.
                </p>

            </div>

        @endforelse

    </div>

</div>

                        </details>

                    </div>


                    {{-- ================================================= --}}
                    {{-- MEMBER NAME --}}
                    {{-- ================================================= --}}

                    <div class="hidden sm:block text-right">

                        <p class="text-sm font-bold text-slate-900">
                            {{ $member->first_name }} {{ $member->last_name }}
                        </p>

                        <p class="text-xs text-slate-500">
                            Member
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- MEMBER INITIAL + PROFILE LINK --}}
                    {{-- ================================================= --}}

                    <a
href="{{ route('member.profile') }}"
                        title="View My Profile"
                        class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-indigo-700 text-white flex items-center justify-center font-bold shadow-md hover:scale-105 hover:shadow-lg transition duration-200"
                    >

                        {{ strtoupper(substr($member->first_name, 0, 1)) }}

                    </a>


                    {{-- ================================================= --}}
                    {{-- LOGOUT --}}
                    {{-- ================================================= --}}

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition shadow-sm"
                        >
                            Logout
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MEMBER PORTAL CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- ========================================================= --}}
        {{-- PAGE HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-8">

            <h1 class="text-3xl font-extrabold text-slate-900">
                Member Portal
            </h1>

            <p class="mt-2 text-slate-600">

                Welcome back,

                <span class="font-bold text-blue-700">
                    {{ $member->first_name }} {{ $member->last_name }}
                </span>

                👋

            </p>

        </div>


        {{-- ========================================================= --}}
        {{-- PROFILE HERO --}}
        {{-- ========================================================= --}}

        <div class="relative z-10 overflow-hidden rounded-3xl shadow-2xl mb-8">

            {{-- Gradient Background --}}

            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700"
            ></div>


            {{-- Decorative Shapes --}}

            <div
                class="absolute -right-20 -top-20 w-96 h-96 rounded-full bg-white opacity-10"
            ></div>

            <div
                class="absolute right-40 -bottom-40 w-96 h-96 rounded-full bg-purple-500 opacity-20"
            ></div>


            {{-- Content --}}

            <div class="relative p-8 sm:p-10 lg:p-12">

                <div class="flex flex-col lg:flex-row items-center gap-10">


                    {{-- ================================================= --}}
                    {{-- PROFILE IMAGE --}}
                    {{-- ================================================= --}}

                    <div class="flex-shrink-0">

                        @if($member->photo)

                            <img
                                src="{{ asset('storage/' . $member->photo) }}"
                                alt="{{ $member->first_name }} {{ $member->last_name }}"
                                class="w-48 h-48 sm:w-56 sm:h-56 object-cover rounded-full border-8 border-white shadow-2xl"
                            >

                        @else

                            <div
                                class="w-48 h-48 sm:w-56 sm:h-56 rounded-full bg-white flex items-center justify-center border-8 border-white shadow-2xl"
                            >

                                <span class="text-7xl font-extrabold text-blue-700">

                                    {{ strtoupper(substr($member->first_name, 0, 1)) }}

                                </span>

                            </div>

                        @endif

                    </div>


                    {{-- ================================================= --}}
                    {{-- PROFILE CONTENT --}}
                    {{-- ================================================= --}}

                    <div class="flex-1 w-full">


                        {{-- PROFILE LABEL --}}

                        <div class="mb-3">

                            <a
                                href="{{ route('member.profile') }}"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/20 border border-white/30 text-white text-sm font-bold hover:bg-white/30 transition"
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
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />

                                </svg>

                                MY PROFILE

                            </a>

                        </div>


                        {{-- NAME --}}

                        <h2 class="text-4xl sm:text-5xl font-extrabold text-white">

                            {{ $member->first_name }}
                            {{ $member->last_name }}

                        </h2>


                        {{-- WELCOME --}}

                        <p class="mt-3 text-lg text-blue-100">

                            Welcome to your personal member dashboard.

                        </p>


                        {{-- STATUS --}}

                        <div class="mt-5">

                            <span
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-500 text-white font-bold shadow-lg"
                            >

                                <span class="w-3 h-3 rounded-full bg-white"></span>

                                {{ $member->membership_status ?? 'Active' }} Member

                            </span>

                        </div>


                        {{-- ================================================= --}}
                        {{-- CONTACT CARDS --}}
                        {{-- ================================================= --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-7">


                            {{-- EMAIL --}}

                            <div
                                class="flex items-center gap-4 bg-white/15 border border-white/20 rounded-2xl p-4"
                            >

                                <div
                                    class="w-12 h-12 rounded-xl bg-blue-500 flex items-center justify-center flex-shrink-0"
                                >

                                    <svg
                                        class="w-6 h-6 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                        />

                                    </svg>

                                </div>


                                <div class="min-w-0">

                                    <p class="text-sm text-blue-100">
                                        Email Address
                                    </p>

                                    <p class="mt-1 font-bold text-white truncate">

                                        {{ $member->email ?: 'N/A' }}

                                    </p>

                                </div>

                            </div>


                            {{-- PHONE --}}

                            <div
                                class="flex items-center gap-4 bg-white/15 border border-white/20 rounded-2xl p-4"
                            >

                                <div
                                    class="w-12 h-12 rounded-xl bg-emerald-500 flex items-center justify-center flex-shrink-0"
                                >

                                    <svg
                                        class="w-6 h-6 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a2 2 0 011.8 1.1l1.2 2.4a2 2 0 01-.45 2.3l-1.5 1.5a16 16 0 006.36 6.36l1.5-1.5a2 2 0 012.3-.45l2.4 1.2a2 2 0 011.1 1.8V21a2 2 0 01-2 2h-1C10.27 23 1 13.73 1 2V1a2 2 0 012-2z"
                                        />

                                    </svg>

                                </div>


                                <div>

                                    <p class="text-sm text-blue-100">
                                        Phone Number
                                    </p>

                                    <p class="mt-1 font-bold text-white">

                                        {{ $member->phone ?: 'N/A' }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- STATISTICS --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">


            {{-- ================================================= --}}
            {{-- TOTAL DONATIONS --}}
            {{-- ================================================= --}}

            <div
                class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-2xl shadow-xl p-6 text-white"
            >

                <div class="flex items-center gap-5">

                    <div
                        class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center"
                    >

                        <svg
                            class="w-8 h-8 text-white"
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


                    <div>

                        <p class="text-sm font-bold uppercase tracking-wide">
                            My Total Donations
                        </p>

                        <p class="text-3xl font-extrabold mt-1">

                            ${{ number_format($totalDonations, 2) }}

                        </p>

                        <p class="text-sm mt-1 text-green-100">
                            Total amount contributed
                        </p>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- ORGANIZATION ANNOUNCEMENTS --}}
            {{-- ================================================= --}}

            <a
                href="{{ route('member.announcements') }}"
                class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-xl p-6 text-white hover:shadow-2xl hover:-translate-y-1 transition duration-200"
            >

                <div class="flex items-center gap-5">

                    <div
                        class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center"
                    >

                        <svg
                            class="w-8 h-8 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M11 5L6 9H2v6h4l5 4V5zm6 3a5 5 0 010 8m2-10a8 8 0 010 12"
                            />

                        </svg>

                    </div>


                    <div>

                        <p class="text-sm font-bold uppercase tracking-wide">
                            Organization
                        </p>

                        <p class="text-3xl font-extrabold mt-1">
                            Announcements
                        </p>

                        <p class="text-sm mt-1 text-blue-100">
                            View latest organization updates
                        </p>

                    </div>

                </div>

            </a>


            {{-- ================================================= --}}
            {{-- RECENT DONATIONS --}}
            {{-- ================================================= --}}

            <div
                class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-xl p-6 text-white"
            >

                <div class="flex items-center gap-5">

                    <div
                        class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center"
                    >

                        <svg
                            class="w-8 h-8 text-white"
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


                    <div>

                        <p class="text-sm font-bold uppercase tracking-wide">
                            Recent Donations
                        </p>

                        <p class="text-3xl font-extrabold mt-1">

                            {{ $donations->count() }}

                        </p>

                        <p class="text-sm mt-1 text-blue-100">
                            Recent contribution records
                        </p>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- ATTENDANCE --}}
            {{-- ================================================= --}}

            <a
                href="{{ route('member.attendance.create') }}"
                class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-2xl shadow-xl p-6 text-white hover:shadow-2xl hover:-translate-y-1 transition duration-200"
            >

                <div class="flex items-center gap-5">

                    <div
                        class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center"
                    >

                        <svg
                            class="w-8 h-8 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4M5 13l4 4L19 7"
                            />

                        </svg>

                    </div>


                    <div>

                        <p class="text-sm font-bold uppercase tracking-wide">
                            Attendance
                        </p>

                        <p class="text-3xl font-extrabold mt-1">
                            Mark
                        </p>

                        <p class="text-sm mt-1 text-emerald-100">
                            Submit today's attendance
                        </p>

                    </div>

                </div>

            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- RECENT DONATIONS --}}
        {{-- ========================================================= --}}

        <div
            class="bg-white rounded-2xl shadow-xl mb-8 overflow-hidden"
        >

            <div class="p-6 sm:p-8">


                {{-- HEADER --}}

                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8"
                >

                    <div class="flex items-center gap-4">

                        <div
                            class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center"
                        >

                            <svg
                                class="w-6 h-6 text-purple-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />

                            </svg>

                        </div>


                        <div>

                            <h3 class="text-xl font-extrabold text-slate-900">
                                My Recent Donations
                            </h3>

                            <p class="text-sm text-slate-500 mt-1">
                                View your latest contribution history.
                            </p>

                        </div>

                    </div>


                    {{-- MY DONATIONS BUTTON --}}

                    <a
                        href="{{ route('member.donations.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-lg transition"
                    >
                        💰 My Donations
                    </a>

                </div>


                {{-- DONATIONS TABLE --}}

                @if($donations->count())

                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>

                                <tr class="bg-slate-50">

                                    <th
                                        class="py-4 px-5 text-left text-xs font-bold uppercase text-slate-600"
                                    >
                                        Date
                                    </th>

                                    <th
                                        class="py-4 px-5 text-left text-xs font-bold uppercase text-slate-600"
                                    >
                                        Donation Type
                                    </th>

                                    <th
                                        class="py-4 px-5 text-left text-xs font-bold uppercase text-slate-600"
                                    >
                                        Payment Method
                                    </th>

                                    <th
                                        class="py-4 px-5 text-right text-xs font-bold uppercase text-slate-600"
                                    >
                                        Amount
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($donations as $donation)

                                    <tr
                                        class="border-b border-slate-100 hover:bg-purple-50 transition"
                                    >

                                        <td
                                            class="py-4 px-5 font-semibold text-slate-800"
                                        >
                                            {{ $donation->donation_date->format('d M Y') }}
                                        </td>

                                        <td
                                            class="py-4 px-5 text-slate-700"
                                        >
                                            {{ $donation->donation_type }}
                                        </td>

                                        <td
                                            class="py-4 px-5 text-slate-700"
                                        >
                                            {{ $donation->payment_method }}
                                        </td>

                                        <td
                                            class="py-4 px-5 text-right font-extrabold text-emerald-600"
                                        >
                                            ${{ number_format($donation->amount, 2) }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="py-12 text-center">

                        <div
                            class="mx-auto w-20 h-20 rounded-2xl bg-purple-100 flex items-center justify-center"
                        >

                            <svg
                                class="w-10 h-10 text-purple-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />

                            </svg>

                        </div>


                        <h4 class="mt-5 text-lg font-extrabold text-slate-900">
                            No donations found
                        </h4>


                        <p class="mt-2 text-slate-500">
                            Your contribution history will appear here.
                        </p>

                    </div>

                @endif

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- UPCOMING EVENTS --}}
        {{-- ========================================================= --}}

        <div
            class="bg-white rounded-2xl shadow-xl overflow-hidden"
        >


            {{-- HEADER --}}

            <div class="p-6 sm:p-8">

                <div class="flex items-center gap-4">

                    <div
                        class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center"
                    >

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
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />

                        </svg>

                    </div>


                    <div>

                        <h3 class="text-xl font-extrabold text-slate-900">
                            Upcoming Events
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Stay updated with upcoming organization events.
                        </p>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- EVENTS --}}
            {{-- ================================================= --}}

            @if($upcomingEvents->count())

                <div
                    class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 px-6 pb-8 mb-8"
                >

                    @foreach($upcomingEvents as $event)

                        <div
                            class="bg-gradient-to-br from-blue-50 to-white rounded-2xl border border-blue-100 shadow-md hover:shadow-xl transition duration-300 overflow-hidden"
                        >

                            <div class="p-6">

                                <div class="flex justify-between items-start">

                                    <div class="pr-4">

                                        <h4
                                            class="text-xl font-bold text-slate-900"
                                        >
                                            {{ $event->title }}
                                        </h4>

                                        <p
                                            class="text-sm text-slate-500 mt-1"
                                        >
                                            {{ \Illuminate\Support\Str::limit($event->description, 90) }}
                                        </p>

                                    </div>


                                    <div
                                        class="bg-blue-100 text-blue-700 rounded-xl p-3 flex-shrink-0"
                                    >

                                        <svg
                                            class="w-6 h-6"
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


                                <div class="mt-6 space-y-3">


                                    {{-- DATE --}}

                                    <div class="flex items-center gap-3">

                                        <span class="text-blue-600">
                                            📅
                                        </span>

                                        <span class="font-medium">
                                            {{ $event->event_date->format('d M Y') }}
                                        </span>

                                    </div>


                                    {{-- TIME --}}

                                    <div class="flex items-center gap-3">

                                        <span class="text-green-600">
                                            🕒
                                        </span>

                                        <span>
                                            {{ $event->start_time }}
                                        </span>

                                    </div>


                                    {{-- LOCATION --}}

                                    <div class="flex items-center gap-3">

                                        <span class="text-red-600">
                                            📍
                                        </span>

                                        <span>
                                            {{ $event->location ?: 'To be announced' }}
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- NO EVENTS --}}

                <div class="py-16 text-center">

                    <div
                        class="mx-auto w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center mb-4"
                    >

                        <svg
                            class="w-10 h-10 text-blue-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 01-2-2V7a2 2 0 01-2-2H5a2 2 0 01-2 2v12a2 2 0 002 2z"
                            />

                        </svg>

                    </div>


                    <h3 class="text-xl font-bold text-slate-700">
                        No Upcoming Events
                    </h3>


                    <p class="text-slate-500 mt-2 mb-6">
                        New events will appear here once your organization publishes them.
                    </p>

                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- FOOTER --}}
        {{-- ========================================================= --}}

        <div class="text-center py-8 pb-10">

            <p class="text-sm text-slate-500">

                Thank you for being a valued member of our organization.

                <span class="text-blue-600">
                    💙
                </span>

            </p>

        </div>

    </div>

</div>