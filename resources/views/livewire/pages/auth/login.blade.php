<div class="min-h-screen bg-slate-50">

    {{-- Top Header --}}
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            <div class="h-20 flex items-center justify-between">

                {{-- Congregate Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-blue-600 flex items-center justify-center shadow-sm">
                        <span class="text-white text-2xl font-bold">+</span>
                    </div>

                    <div>
                        <div class="text-xl font-bold text-slate-900 leading-tight">
                            Congregate
                        </div>

                        <div class="text-xs text-slate-500">
                            Organization Management
                        </div>
                    </div>

                </a>


                {{-- Back to Website --}}
                <a
                    href="{{ url('/') }}"
                    class="text-sm font-medium text-slate-600 hover:text-blue-600 transition"
                >
                    Back to website
                </a>

            </div>

        </div>
    </header>


    {{-- Main Content --}}
    <main class="relative overflow-hidden">

        {{-- Background Decorations --}}
        <div class="absolute inset-0 pointer-events-none">

            <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-60"></div>

            <div class="absolute top-20 right-0 w-96 h-96 bg-indigo-100 rounded-full blur-3xl opacity-60"></div>

            <div class="absolute bottom-0 left-1/3 w-96 h-72 bg-blue-50 rounded-full blur-3xl opacity-70"></div>

        </div>


        <div class="relative max-w-7xl mx-auto px-6 lg:px-10 py-12 lg:py-16">

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">


                {{-- LEFT SIDE --}}
                <section class="py-8 lg:py-12">

                    {{-- Small Heading --}}
                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-10 h-1 bg-blue-600 rounded-full"></div>

                        <span class="text-sm font-bold uppercase tracking-wider text-blue-600">
                            Welcome Back
                        </span>

                    </div>


                    {{-- Main Heading --}}
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">

                        Everything your
                        <span class="block text-blue-600">
                            organization needs,
                        </span>

                        <span class="block">
                            in one place.
                        </span>

                    </h1>


                    {{-- Description --}}
                    <p class="mt-7 max-w-xl text-lg leading-8 text-slate-600">

                        Sign in to Congregate and manage your members, donations,
                        events, communications, attendance, and reports through
                        one simple and organized platform.

                    </p>


                    {{-- Feature Highlights --}}
                    <div class="mt-10 grid sm:grid-cols-2 gap-5">

                        {{-- Feature 1 --}}
                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">

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
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                            </div>

                            <span class="font-medium text-slate-700">
                                Centralized Management
                            </span>

                        </div>


                        {{-- Feature 2 --}}
                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">

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
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>

                            </div>

                            <span class="font-medium text-slate-700">
                                Secure Access
                            </span>

                        </div>

                    </div>


                    {{-- Mini Dashboard Preview --}}
                    <div class="mt-12 relative max-w-xl">

                        {{-- Floating Icon --}}
                        <div class="absolute -top-5 -right-3 z-10 w-12 h-12 rounded-xl bg-white shadow-lg flex items-center justify-center">

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
                                    d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"
                                />
                            </svg>

                        </div>


                        {{-- Dashboard Card --}}
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-xl p-5">

                            <div class="flex items-center justify-between mb-5">

                                <div>

                                    <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
                                        Organization Overview
                                    </p>

                                    <h3 class="mt-1 text-xl font-bold text-slate-900">
                                        Dashboard
                                    </h3>

                                </div>

                                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center">

                                    <span class="text-white text-xl font-bold">
                                        +
                                    </span>

                                </div>

                            </div>


                            {{-- Dashboard Stats --}}
                            <div class="grid grid-cols-3 gap-3">

                                {{-- Members --}}
                                <div class="rounded-xl bg-blue-50 p-4">

                                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mb-3">

                                        <svg
                                            class="w-4 h-4 text-blue-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 100-6 3 3 0 000 6z"
                                            />
                                        </svg>

                                    </div>

                                    <p class="text-xs text-slate-500">
                                        Members
                                    </p>

                                    <p class="mt-1 text-xl font-bold text-slate-900">
                                        248
                                    </p>

                                </div>


                                {{-- Donations --}}
                                <div class="rounded-xl bg-emerald-50 p-4">

                                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center mb-3">

                                        <span class="text-emerald-600 font-bold">
                                            $
                                        </span>

                                    </div>

                                    <p class="text-xs text-slate-500">
                                        Donations
                                    </p>

                                    <p class="mt-1 text-xl font-bold text-slate-900">
                                        $12.5K
                                    </p>

                                </div>


                                {{-- Events --}}
                                <div class="rounded-xl bg-purple-50 p-4">

                                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mb-3">

                                        <svg
                                            class="w-4 h-4 text-purple-600"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"
                                            />
                                        </svg>

                                    </div>

                                    <p class="text-xs text-slate-500">
                                        Events
                                    </p>

                                    <p class="mt-1 text-xl font-bold text-slate-900">
                                        12
                                    </p>

                                </div>

                            </div>


                            {{-- Recent Activity --}}
                            <div class="mt-4 rounded-xl border border-slate-200 p-4">

                                <div class="flex items-center justify-between">

                                    <h4 class="font-semibold text-slate-900">
                                        Recent Activity
                                    </h4>

                                    <span class="text-xs font-semibold text-blue-600">
                                        View All
                                    </span>

                                </div>


                                <div class="mt-4 space-y-3">

                                    <div class="flex items-center justify-between">

                                        <div class="flex items-center gap-3">

                                            <div class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">

                                                <svg
                                                    class="w-4 h-4 text-emerald-600"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 13l4 4L19 7"
                                                    />
                                                </svg>

                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-slate-900">
                                                    Donation recorded
                                                </p>

                                                <p class="text-xs text-slate-500">
                                                    Contribution received
                                                </p>

                                            </div>

                                        </div>

                                        <span class="text-sm font-semibold text-emerald-600">
                                            +$100
                                        </span>

                                    </div>


                                    <div class="flex items-center justify-between">

                                        <div class="flex items-center gap-3">

                                            <div class="w-9 h-9 rounded-lg bg-blue-100 flex items-center justify-center">

                                                <svg
                                                    class="w-4 h-4 text-blue-600"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3M5 11h14"
                                                    />
                                                </svg>

                                            </div>

                                            <div>

                                                <p class="text-sm font-semibold text-slate-900">
                                                    New event scheduled
                                                </p>

                                                <p class="text-xs text-slate-500">
                                                    Community gathering
                                                </p>

                                            </div>

                                        </div>

                                        <span class="text-xs text-slate-500">
                                            Today
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </section>


                {{-- RIGHT SIDE LOGIN CARD --}}
                <section>

                    <div class="bg-white rounded-3xl border border-slate-200 shadow-2xl p-7 sm:p-9 max-w-xl mx-auto">

                        {{-- Logo --}}
                        <div class="flex justify-center">

                            <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center shadow-lg">

                                <span class="text-white text-4xl font-bold">
                                    +
                                </span>

                            </div>

                        </div>


                        {{-- Heading --}}
                        <div class="text-center mt-6">

                            <h2 class="text-3xl font-bold text-slate-900">
                                Sign in to Congregate
                            </h2>

                            <p class="mt-2 text-slate-500">
                                Choose how you want to sign in
                            </p>

                        </div>


                        {{-- Admin / Staff Login --}}
                        <a
                            href="{{ route('admin.login') }}"
                            class="mt-8 group block border border-slate-200 rounded-2xl p-5 hover:border-blue-300 hover:bg-blue-50/50 transition"
                        >

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 shrink-0 rounded-xl bg-blue-100 flex items-center justify-center">

                                    <svg
                                        class="w-7 h-7 text-blue-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM5 21a7 7 0 0114 0"
                                        />
                                    </svg>

                                </div>


                                <div class="flex-1">

                                    <h3 class="text-lg font-bold text-slate-900">
                                        Admin / Staff Login
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Access the organization dashboard
                                        and management features.
                                    </p>

                                </div>


                                <svg
                                    class="w-6 h-6 text-blue-600 group-hover:translate-x-1 transition"
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

                            </div>

                        </a>


                        {{-- Member Login --}}
                        <a
                            href="{{ route('member.login') }}"
                            class="mt-4 group block border border-slate-200 rounded-2xl p-5 hover:border-emerald-300 hover:bg-emerald-50/50 transition"
                        >

                            <div class="flex items-center gap-5">

                                <div class="w-14 h-14 shrink-0 rounded-xl bg-emerald-100 flex items-center justify-center">

                                    <svg
                                        class="w-7 h-7 text-emerald-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 100-6 3 3 0 000 6z"
                                        />
                                    </svg>

                                </div>


                                <div class="flex-1">

                                    <h3 class="text-lg font-bold text-slate-900">
                                        Member Login
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Access your profile, view updates
                                        and organization information.
                                    </p>

                                </div>


                                <svg
                                    class="w-6 h-6 text-emerald-600 group-hover:translate-x-1 transition"
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

                            </div>

                        </a>


                        {{-- Divider --}}
                        <div class="flex items-center gap-4 my-7">

                            <div class="flex-1 h-px bg-slate-200"></div>

                            <span class="text-sm font-medium text-slate-400">
                                OR
                            </span>

                            <div class="flex-1 h-px bg-slate-200"></div>

                        </div>


                        {{-- Help Box --}}
                        <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5">

                            <div class="flex items-start gap-4">

                                <div class="w-11 h-11 shrink-0 rounded-full bg-white border border-slate-200 flex items-center justify-center">

                                    <svg
                                        class="w-6 h-6 text-slate-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 18h.01M8.5 9a3.5 3.5 0 117 0c0 2-3.5 2-3.5 4"
                                        />
                                    </svg>

                                </div>


                                <div>

                                    <h4 class="font-semibold text-slate-900">
                                        New to Congregate?
                                    </h4>

                                    <p class="mt-1 text-sm text-slate-500 leading-6">
                                        Contact your organization administrator
                                        to get access.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Footer --}}
                        <div class="mt-8 text-center">

                            <p class="text-sm text-slate-400">
                                © {{ date('Y') }} Congregate. All rights reserved.
                            </p>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </main>

</div>