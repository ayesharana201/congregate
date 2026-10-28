<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>Choose Login | Congregate</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="min-h-screen bg-slate-100">

    <div class="min-h-screen flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-4xl">


            {{-- Logo --}}
            <div class="text-center mb-10">

                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center gap-3"
                >

                    <div class="w-12 h-12 rounded-2xl bg-blue-600 flex items-center justify-center shadow-lg">

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
                                d="M3 21h18M5 21V10l7-5 7 5v11M9 21v-6h6v6"
                            />

                        </svg>

                    </div>

                    <span class="text-3xl font-bold text-slate-900">
                        Congregate
                    </span>

                </a>

            </div>



            {{-- Heading --}}
            <div class="text-center mb-10">

                <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                    Welcome to Congregate
                </p>

                <h1 class="mt-3 text-4xl font-bold text-slate-900">
                    How would you like to continue?
                </h1>

                <p class="mt-4 text-slate-500">
                    Select your account type to continue to the appropriate login page.
                </p>

            </div>



            {{-- Login Options --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                {{-- ================================================= --}}
                {{-- ADMINISTRATOR --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.login') }}"
                    class="group bg-white rounded-3xl border border-slate-200 p-8 shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300"
                >

                    <div class="flex items-start justify-between">

                        <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center">

                            <svg
                                class="w-7 h-7 text-blue-600"
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


                        <svg
                            class="w-6 h-6 text-slate-300 group-hover:text-blue-600 group-hover:translate-x-1 transition"
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

                    </div>


                    <h2 class="mt-7 text-2xl font-bold text-slate-900">
                        Administrator
                    </h2>


                    <p class="mt-3 text-slate-500 leading-relaxed">
                        Manage members, donations, events, communications,
                        attendance, reports, and organization settings.
                    </p>


                    <div class="mt-7">

                        <span class="inline-flex items-center gap-2 font-semibold text-blue-600">

                            Continue as Administrator

                            <svg
                                class="w-5 h-5 group-hover:translate-x-1 transition"
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

                        </span>

                    </div>

                </a>



                {{-- ================================================= --}}
                {{-- MEMBER --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('member.login') }}"
                    class="group bg-white rounded-3xl border border-slate-200 p-8 shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-300"
                >

                    <div class="flex items-start justify-between">

                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 flex items-center justify-center">

                            <svg
                                class="w-7 h-7 text-emerald-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />

                            </svg>

                        </div>


                        <svg
                            class="w-6 h-6 text-slate-300 group-hover:text-emerald-600 group-hover:translate-x-1 transition"
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

                    </div>


                    <h2 class="mt-7 text-2xl font-bold text-slate-900">
                        Member
                    </h2>


                    <p class="mt-3 text-slate-500 leading-relaxed">
                        Access your member profile, contribution history,
                        statements, events, and community announcements.
                    </p>


                    <div class="mt-7">

                        <span class="inline-flex items-center gap-2 font-semibold text-emerald-600">

                            Continue as Member

                            <svg
                                class="w-5 h-5 group-hover:translate-x-1 transition"
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

                        </span>

                    </div>

                </a>

            </div>



            {{-- Back --}}
            <div class="text-center mt-8">

                <a
                    href="{{ route('home') }}"
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

                    Back to Home

                </a>

            </div>

        </div>

    </div>

</body>

</html>