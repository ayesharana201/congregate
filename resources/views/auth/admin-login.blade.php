<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Administrator Login | Congregate</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="min-h-screen bg-slate-100">

    <div class="min-h-screen flex">


        {{-- ========================================================= --}}
        {{-- LEFT SIDE --}}
        {{-- ========================================================= --}}

        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">

            {{-- Background --}}
            <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-blue-900 to-indigo-900"></div>


            {{-- Decorative Circles --}}
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>

            <div class="absolute -bottom-32 -right-32 w-[500px] h-[500px] bg-indigo-500/20 rounded-full blur-3xl"></div>


            {{-- Content --}}
            <div class="relative z-10 flex flex-col justify-between w-full p-12 xl:p-16 text-white">


                {{-- Logo / Brand --}}
                <div>

                    <a
                        href="{{ route('home') }}"
                        class="inline-flex items-center gap-3"
                    >

                        {{-- Logo Icon --}}
                        <div class="w-12 h-12 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-sm flex items-center justify-center">

                            <svg
                                class="w-7 h-7 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M3 21h18M5 21V10l7-5 7 5v11M9 21v-6h6v6M8 10h.01M12 10h.01M16 10h.01"
                                />

                            </svg>

                        </div>


                        <div>

                            <div class="text-2xl font-bold tracking-tight">
                                Congregate
                            </div>

                            <div class="text-xs text-blue-200">
                                Organization Management System
                            </div>

                        </div>

                    </a>

                </div>


                {{-- Main Message --}}
                <div class="max-w-xl">

                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/10 text-blue-100 text-sm font-medium mb-7">

                        <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>

                        Administrator Portal

                    </div>


                    <h1 class="text-4xl xl:text-5xl font-bold leading-tight tracking-tight">

                        Manage your organization
                        <span class="text-blue-300">
                            with confidence.
                        </span>

                    </h1>


                    <p class="mt-6 text-lg text-blue-100 leading-relaxed max-w-lg">

                        Access your Congregate administration dashboard to manage members,
                        donations, events, communications, attendance, and reports from one
                        secure place.

                    </p>


                    {{-- Feature Cards --}}
                    <div class="grid grid-cols-2 gap-4 mt-10">


                        {{-- Feature 1 --}}
                        <div class="p-4 rounded-2xl bg-white/10 border border-white/10 backdrop-blur-sm">

                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center mb-3">

                                <svg
                                    class="w-5 h-5 text-blue-200"
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

                            <p class="font-semibold">
                                Member Management
                            </p>

                            <p class="text-sm text-blue-200 mt-1">
                                Keep your organization connected.
                            </p>

                        </div>


                        {{-- Feature 2 --}}
                        <div class="p-4 rounded-2xl bg-white/10 border border-white/10 backdrop-blur-sm">

                            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center mb-3">

                                <svg
                                    class="w-5 h-5 text-blue-200"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 17v-2a4 4 0 014-4h4a4 4 0 014 4v2M9 17H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4M9 17v2m6-2v2"
                                    />

                                </svg>

                            </div>

                            <p class="font-semibold">
                                Powerful Reports
                            </p>

                            <p class="text-sm text-blue-200 mt-1">
                                Understand your organization better.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="text-sm text-blue-200">

                    © {{ date('Y') }} Congregate.
                    All rights reserved.

                </div>

            </div>

        </div>



        {{-- ========================================================= --}}
        {{-- RIGHT SIDE --}}
        {{-- ========================================================= --}}

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10">

            <div class="w-full max-w-md">


                {{-- Mobile Logo --}}
                <div class="lg:hidden text-center mb-10">

                    <a
                        href="{{ route('home') }}"
                        class="inline-flex items-center gap-3"
                    >

                        <div class="w-11 h-11 rounded-xl bg-blue-600 flex items-center justify-center">

                            <svg
                                class="w-6 h-6 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M3 21h18M5 21V10l7-5 7 5v11M9 21v-6h6v6M8 10h.01M12 10h.01M16 10h.01"
                                />

                            </svg>

                        </div>

                        <span class="text-2xl font-bold text-slate-900">
                            Congregate
                        </span>

                    </a>

                </div>



                {{-- Login Card --}}
                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-200 p-8 sm:p-10">


                    {{-- Icon --}}
                    <div class="flex justify-center mb-6">

                        <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center">

                            <svg
                                class="w-8 h-8 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-5a2 2 0 00-2-2H6a2 2 0 00-2 2v5a2 2 0 002 2zm10-9V7a4 4 0 00-8 0v5h8z"
                                />

                            </svg>

                        </div>

                    </div>


                    {{-- Heading --}}
                    <div class="text-center">

                        <p class="text-sm font-semibold text-blue-600 uppercase tracking-wider">
                            Administrator Access
                        </p>

                        <h1 class="mt-2 text-3xl font-bold text-slate-900">
                            Welcome back
                        </h1>

                        <p class="mt-3 text-sm text-slate-500">
                            Sign in to access your Congregate administration dashboard.
                        </p>

                    </div>



                    {{-- Error Message --}}
                    @if ($errors->any())

                        <div class="mt-6 p-4 rounded-xl bg-red-50 border border-red-200">

                            <div class="flex items-start gap-3">

                                <svg
                                    class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />

                                </svg>

                                <div>

                                    <p class="text-sm font-semibold text-red-800">
                                        Unable to sign in
                                    </p>

                                    <p class="mt-1 text-sm text-red-700">
                                        {{ $errors->first() }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    @endif



                    {{-- Login Form --}}
                    <form
                        method="POST"
                        action="{{ route('admin.login.submit') }}"
                        class="mt-8 space-y-5"
                    >

                        @csrf


                        {{-- Email --}}
                        <div>

                            <label
                                for="email"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Email Address
                            </label>

                            <div class="relative">

                                <div
                                    class="absolute top-0 bottom-0 flex items-center pointer-events-none"
                                    style="left: 16px;">
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
                                            d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2 2 0 002 2z"
                                        />

                                    </svg>

                                </div>


                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    placeholder="admin@example.com"
                                    class="w-full py-3.5 pr-4 bg-white border border-slate-400 rounded-xl text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition"
                                    style="padding-left: 48px;">

                            </div>


                            @error('email')

                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- Password --}}
                        <div>

                            <div class="flex items-center justify-between mb-2">

                                <label
                                    for="password"
                                    class="block text-sm font-semibold text-slate-700"
                                >
                                    Password
                                </label>

                                @if (Route::has('password.request'))

                                    <a
                                        href="{{ route('password.request') }}"
                                        class="text-sm font-medium text-blue-600 hover:text-blue-700"
                                    >
                                        Forgot password?
                                    </a>

                                @endif

                            </div>


                            <div class="relative">

                                <div class="absolute top-0 bottom-0 flex items-center pointer-events-none"
                                    style="left: 16px;">

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
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-5a2 2 0 00-2-2H6a2 2 0 00-2 2v5a2 2 0 002 2 2 2 0 002 2zm10-9V7a4 4 0 00-8 0v5h8z"
                                        />

                                    </svg>

                                </div>


                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Enter your password"
                                    class="w-full py-3.5 pr-4 bg-white border border-slate-400 rounded-xl text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition"
                                    style="padding-left: 48px;"
                                >

                            </div>


                            @error('password')

                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>



                        {{-- Remember Me --}}
                        <div class="flex items-center">

                            <label class="inline-flex items-center cursor-pointer">

                                <input
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                    class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                                >

                                <span class="ml-4 text-sm text-slate-600">
                                    Remember me
                                </span>

                            </label>

                        </div>



                        {{-- Sign In Button --}}
                        <button
                            type="submit"
                            class="mt-6 w-full h-12 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold flex items-center justify-center gap-2 shadow-lg shadow-blue-600/20 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >

                            <span>
                                Sign in as Administrator
                            </span>

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
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"
                                />

                            </svg>

                        </button>

                    </form>



                    {{-- Back to Login Choice --}}
                    <div class="mt-7 text-center">

                        <a
                            href="{{ route('login.choice') }}"
                            class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition"
                        >

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
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                />

                            </svg>

                            Back to login options

                        </a>

                    </div>

                </div>


                {{-- Security Note --}}
                <div class="mt-6 flex items-center justify-center gap-2 text-xs text-slate-500">

                    <svg
                        class="w-4 h-4 text-emerald-500"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"
                        />

                    </svg>

                    Secure administrator authentication

                </div>

            </div>

        </div>

    </div>

</body>

</html>