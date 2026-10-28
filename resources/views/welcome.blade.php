<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Congregate | Organization Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900 antialiased">

    {{-- ========================================================= --}}
    {{-- NAVIGATION --}}
    {{-- ========================================================= --}}

    <header class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="h-20 flex items-center justify-between">

                {{-- Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-lg">

                        <svg class="w-6 h-6 text-white"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 3v18M3 12h18"/>

                        </svg>

                    </div>

                    <div>
                        <h1 class="text-xl font-extrabold text-slate-900 tracking-tight">
                            Congregate
                        </h1>

                        <p class="text-xs font-medium text-slate-500">
                            Organization Management
                        </p>
                    </div>

                </a>


                {{-- Desktop Navigation --}}
                <nav class="hidden md:flex items-center gap-8">

                    <a href="#features"
                       class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition">
                        Features
                    </a>

                    <a href="#about"
                       class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition">
                        About
                    </a>

                    <a href="#benefits"
                       class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition">
                        Benefits
                    </a>

                </nav>


                {{-- Login --}}
                <div class="flex items-center gap-3">

                    <a href="{{ route('login.choice') }}"
   class="...">
    Sign In
</a>

<a href="{{ route('admin.register') }}">
    Get Started
</a>

                </div>

            </div>

        </div>

    </header>



    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <main class="pt-20">

        <section class="relative overflow-hidden">

            {{-- Background --}}
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-blue-950 to-indigo-950"></div>

            {{-- Decorative circles --}}
            <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-blue-500/20 blur-3xl"></div>

            <div class="absolute top-1/2 -left-40 w-96 h-96 rounded-full bg-indigo-500/20 blur-3xl"></div>

            <div class="absolute bottom-0 right-1/3 w-72 h-72 rounded-full bg-purple-500/10 blur-3xl"></div>


            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="min-h-[650px] flex items-center py-20 lg:py-28">

                    <div class="grid lg:grid-cols-2 gap-16 items-center w-full">


                        {{-- Hero Content --}}
                        <div>

                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 text-blue-200 text-sm font-bold mb-7">

                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>

                                Modern Organization Management

                            </div>


                            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight tracking-tight">

                                Everything your organization needs,

                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">
                                    in one place.
                                </span>

                            </h2>


                            <p class="mt-7 text-lg sm:text-xl text-slate-300 leading-relaxed max-w-2xl">

                                Congregate helps organizations manage members, donations, events,
                                communications, attendance, and reports through one simple,
                                secure, and organized platform.

                            </p>


                            {{-- Hero Buttons --}}
                            <div class="mt-9 flex flex-col sm:flex-row gap-4">

                                <a href="{{ route('login.choice') }}"
   class="inline-flex items-center justify-center gap-3 px-7 py-4 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-extrabold shadow-xl shadow-blue-900/30 transition">

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M11 16l-4-4m0 0l4-4m-4 4h12m-1-8H7a2 2 0 00-2 2v12a2 2 0 002 2h11a2 2 0 002-2V6a2 2 0 00-2-2z"/>

                                    </svg>

                                    Sign In to Congregate

                                </a>


                                <a href="#features"
                                   class="inline-flex items-center justify-center gap-3 px-7 py-4 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold transition">

                                    Explore Features

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M19 9l-7 7-7-7"/>

                                    </svg>

                                </a>

                            </div>


                            {{-- Trust indicators --}}
                            <div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-4 text-sm text-slate-400">

                                <div class="flex items-center gap-2">

                                    <svg class="w-5 h-5 text-emerald-400"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M5 13l4 4L19 7"/>

                                    </svg>

                                    Centralized Management

                                </div>


                                <div class="flex items-center gap-2">

                                    <svg class="w-5 h-5 text-emerald-400"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M5 13l4 4L19 7"/>

                                    </svg>

                                    Secure Access

                                </div>

                            </div>

                        </div>



                        {{-- Dashboard Preview --}}
                        <div class="relative hidden lg:block">

                            <div class="absolute -inset-6 bg-blue-500/20 blur-3xl rounded-full"></div>


                            <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden border border-white/20">

                                {{-- Fake browser header --}}
                                <div class="h-12 bg-slate-100 border-b border-slate-200 flex items-center px-5 gap-2">

                                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                                    <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                                    <span class="w-3 h-3 rounded-full bg-green-400"></span>

                                    <div class="ml-4 flex-1 h-7 bg-white rounded-lg border border-slate-200"></div>

                                </div>


                                <div class="p-6 bg-slate-50">

                                    <div class="flex items-center justify-between mb-6">

                                        <div>

                                            <p class="text-xs font-semibold text-slate-500">
                                                ORGANIZATION OVERVIEW
                                            </p>

                                            <h3 class="text-xl font-extrabold text-slate-900 mt-1">
                                                Dashboard
                                            </h3>

                                        </div>

                                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center">

                                            <svg class="w-5 h-5 text-white"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M12 4v16m8-8H4"/>

                                            </svg>

                                        </div>

                                    </div>


                                    {{-- Preview cards --}}
                                    <div class="grid grid-cols-3 gap-3 mb-5">

                                        <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">

                                            <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mb-3">

                                                <svg class="w-4 h-4 text-blue-600"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M17 20h5V4H2v16h5m10 0v-6H7v6"/>

                                                </svg>

                                            </div>

                                            <p class="text-xs text-slate-500">
                                                Members
                                            </p>

                                            <p class="text-xl font-black text-slate-900">
                                                248
                                            </p>

                                        </div>


                                        <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">

                                            <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center mb-3">

                                                <svg class="w-4 h-4 text-emerald-600"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2"/>

                                                </svg>

                                            </div>

                                            <p class="text-xs text-slate-500">
                                                Donations
                                            </p>

                                            <p class="text-xl font-black text-slate-900">
                                                $12.5K
                                            </p>

                                        </div>


                                        <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">

                                            <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mb-3">

                                                <svg class="w-4 h-4 text-purple-600"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M8 7V3m8 4V3m-9 8h10"/>

                                                </svg>

                                            </div>

                                            <p class="text-xs text-slate-500">
                                                Events
                                            </p>

                                            <p class="text-xl font-black text-slate-900">
                                                12
                                            </p>

                                        </div>

                                    </div>


                                    {{-- Preview activity --}}
                                    <div class="bg-white rounded-xl border border-slate-200 p-5">

                                        <div class="flex items-center justify-between mb-5">

                                            <h4 class="font-bold text-slate-900">
                                                Recent Activity
                                            </h4>

                                            <span class="text-xs font-bold text-blue-600">
                                                View All
                                            </span>

                                        </div>


                                        <div class="space-y-4">

                                            <div class="flex items-center gap-3">

                                                <div class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">

                                                    <svg class="w-4 h-4 text-emerald-600"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M5 13l4 4L19 7"/>

                                                    </svg>

                                                </div>

                                                <div class="flex-1">

                                                    <p class="text-sm font-bold text-slate-800">
                                                        Donation recorded
                                                    </p>

                                                    <p class="text-xs text-slate-500">
                                                        Contribution received
                                                    </p>

                                                </div>

                                                <span class="text-sm font-bold text-emerald-600">
                                                    +$100
                                                </span>

                                            </div>


                                            <div class="flex items-center gap-3">

                                                <div class="w-9 h-9 rounded-lg bg-blue-100 flex items-center justify-center">

                                                    <svg class="w-4 h-4 text-blue-600"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M8 7V3m8 4V3m-9 8h10"/>

                                                    </svg>

                                                </div>

                                                <div class="flex-1">

                                                    <p class="text-sm font-bold text-slate-800">
                                                        New event scheduled
                                                    </p>

                                                    <p class="text-xs text-slate-500">
                                                        Community gathering
                                                    </p>

                                                </div>

                                                <span class="text-xs font-semibold text-slate-500">
                                                    Today
                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- FEATURES --}}
        {{-- ========================================================= --}}

        <section id="features" class="py-24 bg-white">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="max-w-3xl mx-auto text-center">

                    <span class="text-sm font-extrabold uppercase tracking-widest text-blue-600">
                        Everything in one place
                    </span>

                    <h2 class="mt-3 text-3xl sm:text-4xl font-black text-slate-900">
                        Powerful tools for better organization management
                    </h2>

                    <p class="mt-5 text-lg text-slate-600">
                        Replace scattered spreadsheets, paperwork, and manual processes
                        with one organized digital platform.
                    </p>

                </div>


                <div class="mt-16 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">


                    {{-- Members --}}
                    <div class="group p-7 rounded-2xl border border-slate-200 bg-white hover:border-blue-300 hover:shadow-xl transition">

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center group-hover:bg-blue-600 transition">

                            <svg class="w-7 h-7 text-blue-600 group-hover:text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17 20h5V4H2v16h5m10 0v-6H7v6m5-13a3 3 0 110 6 3 3 0 010-6z"/>

                            </svg>

                        </div>

                        <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                            Member Management
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            Keep member profiles, contact information, membership
                            status, and records organized in one place.
                        </p>

                    </div>


                    {{-- Donations --}}
                    <div class="group p-7 rounded-2xl border border-slate-200 bg-white hover:border-emerald-300 hover:shadow-xl transition">

                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center group-hover:bg-emerald-600 transition">

                            <svg class="w-7 h-7 text-emerald-600 group-hover:text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8"/>

                            </svg>

                        </div>

                        <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                            Donation Tracking
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            Record contributions, monitor donations, and provide
                            members with clear statements and receipts.
                        </p>

                    </div>


                    {{-- Events --}}
                    <div class="group p-7 rounded-2xl border border-slate-200 bg-white hover:border-purple-300 hover:shadow-xl transition">

                        <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center group-hover:bg-purple-600 transition">

                            <svg class="w-7 h-7 text-purple-600 group-hover:text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                            </svg>

                        </div>

                        <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                            Event Management
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            Schedule upcoming events and keep your community
                            informed about important activities.
                        </p>

                    </div>


                    {{-- Communications --}}
                    <div class="group p-7 rounded-2xl border border-slate-200 bg-white hover:border-indigo-300 hover:shadow-xl transition">

                        <div class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center group-hover:bg-indigo-600 transition">

                            <svg class="w-7 h-7 text-indigo-600 group-hover:text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M8 10h8m-8 4h5m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                        </div>

                        <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                            Communications
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            Share announcements, reminders, and event notifications
                            with your members efficiently.
                        </p>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- ABOUT --}}
        {{-- ========================================================= --}}

        <section id="about" class="py-24 bg-slate-50">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid lg:grid-cols-2 gap-16 items-center">


                    {{-- Visual --}}
                    <div class="relative">

                        <div class="absolute -inset-6 bg-blue-100 rounded-3xl rotate-3"></div>

                        <div class="relative bg-gradient-to-br from-blue-700 to-indigo-800 rounded-3xl p-8 sm:p-12 shadow-2xl">

                            <div class="grid grid-cols-2 gap-5">

                                <div class="bg-white/10 border border-white/20 rounded-2xl p-6">

                                    <div class="text-4xl font-black text-white">
                                        01
                                    </div>

                                    <p class="mt-2 text-blue-100 font-semibold">
                                        Centralized
                                    </p>

                                </div>


                                <div class="bg-white/10 border border-white/20 rounded-2xl p-6">

                                    <div class="text-4xl font-black text-white">
                                        02
                                    </div>

                                    <p class="mt-2 text-blue-100 font-semibold">
                                        Organized
                                    </p>

                                </div>


                                <div class="bg-white/10 border border-white/20 rounded-2xl p-6">

                                    <div class="text-4xl font-black text-white">
                                        03
                                    </div>

                                    <p class="mt-2 text-blue-100 font-semibold">
                                        Transparent
                                    </p>

                                </div>


                                <div class="bg-white/10 border border-white/20 rounded-2xl p-6">

                                    <div class="text-4xl font-black text-white">
                                        04
                                    </div>

                                    <p class="mt-2 text-blue-100 font-semibold">
                                        Connected
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Text --}}
                    <div>

                        <span class="text-sm font-extrabold uppercase tracking-widest text-blue-600">
                            Why Congregate?
                        </span>

                        <h2 class="mt-4 text-3xl sm:text-4xl font-black text-slate-900 leading-tight">
                            Simplify the way your organization works.
                        </h2>

                        <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                            Congregate brings your organization's essential activities
                            together in one reliable system. From managing members to
                            tracking donations and organizing events, everything is
                            easier to access and manage.
                        </p>


                        <div class="mt-8 space-y-5">

                            <div class="flex gap-4">

                                <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-emerald-100 flex items-center justify-center">

                                    <svg class="w-5 h-5 text-emerald-600"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M5 13l4 4L19 7"/>

                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-extrabold text-slate-900">
                                        Less paperwork
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-600">
                                        Keep important records digitally organized.
                                    </p>

                                </div>

                            </div>


                            <div class="flex gap-4">

                                <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-blue-100 flex items-center justify-center">

                                    <svg class="w-5 h-5 text-blue-600"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M12 15v2m-6 4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-extrabold text-slate-900">
                                        Better visibility
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-600">
                                        Access the information you need when you need it.
                                    </p>

                                </div>

                            </div>


                            <div class="flex gap-4">

                                <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-purple-100 flex items-center justify-center">

                                    <svg class="w-5 h-5 text-purple-600"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M17 20h5V4H2v16h5m10 0v-6H7v6"/>

                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-extrabold text-slate-900">
                                        Connected community
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-600">
                                        Keep members informed and engaged.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- BENEFITS --}}
        {{-- ========================================================= --}}

        <section id="benefits" class="py-24 bg-white">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center max-w-3xl mx-auto">

                    <span class="text-sm font-extrabold uppercase tracking-widest text-emerald-600">
                        Built for your organization
                    </span>

                    <h2 class="mt-3 text-3xl sm:text-4xl font-black text-slate-900">
                        One platform. Multiple possibilities.
                    </h2>

                </div>


                <div class="mt-14 grid md:grid-cols-3 gap-6">

                    <div class="p-8 rounded-2xl bg-blue-50 border border-blue-100">

                        <h3 class="text-xl font-black text-blue-900">
                            For Administrators
                        </h3>

                        <p class="mt-4 text-blue-800 leading-7">
                            Manage members, donations, events, communications,
                            attendance, and organizational reports from one dashboard.
                        </p>

                    </div>


                    <div class="p-8 rounded-2xl bg-emerald-50 border border-emerald-100">

                        <h3 class="text-xl font-black text-emerald-900">
                            For Members
                        </h3>

                        <p class="mt-4 text-emerald-800 leading-7">
                            Access your personal profile, donation history,
                            statements, and upcoming events through your member portal.
                        </p>

                    </div>


                    <div class="p-8 rounded-2xl bg-purple-50 border border-purple-100">

                        <h3 class="text-xl font-black text-purple-900">
                            For Organizations
                        </h3>

                        <p class="mt-4 text-purple-800 leading-7">
                            Create a more organized, transparent, and connected
                            community with modern digital tools.
                        </p>

                    </div>

                </div>

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- CTA --}}
        {{-- ========================================================= --}}

        <section class="py-20 bg-gradient-to-r from-blue-700 via-indigo-700 to-purple-700">

            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

                <h2 class="text-3xl sm:text-4xl font-black text-white">
                    Ready to manage your organization better?
                </h2>

                <p class="mt-5 text-lg text-blue-100">
                    Sign in to access your Congregate account and start managing
                    your organization from one central platform.
                </p>

                <div class="mt-8">

                    <a href="{{ route('login.choice') }}"
   class="inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-white text-blue-700 font-extrabold shadow-xl hover:bg-blue-50 transition">

                        Sign In to Congregate

                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>

                        </svg>

                    </a>

                </div>

            </div>

        </section>

    </main>



    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <footer class="bg-slate-950 text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

            <div class="grid md:grid-cols-3 gap-10">


                {{-- Brand --}}
                <div>

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center">

                            <svg class="w-5 h-5 text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 3v18M3 12h18"/>

                            </svg>

                        </div>

                        <span class="text-xl font-black">
                            Congregate
                        </span>

                    </div>

                    <p class="mt-5 text-sm text-slate-400 leading-6 max-w-sm">
                        A modern organization management system designed to
                        simplify administration and strengthen community connections.
                    </p>

                </div>


                {{-- Quick Links --}}
                <div>

                    <h3 class="font-bold text-white">
                        Quick Links
                    </h3>

                    <div class="mt-5 space-y-3">

                        <a href="#features"
                           class="block text-sm text-slate-400 hover:text-white transition">
                            Features
                        </a>

                        <a href="#about"
                           class="block text-sm text-slate-400 hover:text-white transition">
                            About Congregate
                        </a>

                        <a href="#benefits"
                           class="block text-sm text-slate-400 hover:text-white transition">
                            Benefits
                        </a>

                    </div>

                </div>


                {{-- Account --}}
                <div>

                    <h3 class="font-bold text-white">
                        Account
                    </h3>

                    <div class="mt-5 space-y-3">

                        <a href="{{ route('login.choice') }}"
                           class="block text-sm text-slate-400 hover:text-white transition">
                            Sign In
                        </a>

                        <a href="{{ route('member.login') }}"
                           class="block text-sm text-slate-400 hover:text-white transition">
                            Member Access
                        </a>

                        <a href="{{ route('admin.login') }}"
                           class="block text-sm text-slate-400 hover:text-white transition">
                            Administrator Access
                        </a>

                    </div>

                </div>

            </div>


            <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row justify-between gap-4">

                <p class="text-sm text-slate-500">
                    © {{ date('Y') }} Congregate. All rights reserved.
                </p>

                <p class="text-sm text-slate-500">
                    Organization Management System
                </p>

            </div>

        </div>

    </footer>


</body>
</html>