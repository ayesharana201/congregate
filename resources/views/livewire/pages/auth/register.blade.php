<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Administrator Registration | Congregate</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])


{{-- ========================================================= --}}
{{-- PAGE --}}
{{-- ========================================================= --}}

<div class="min-h-screen flex flex-col items-center px-4 sm:px-6 py-8 bg-slate-100">

    {{-- ===================================================== --}}
    {{-- CONGREGATE LOGO --}}
    {{-- ===================================================== --}}

    <div class="mb-8">

        <a href="{{ route('home') }}"
           class="flex items-center justify-center gap-3">

            <div class="w-11 h-11 rounded-xl bg-blue-600 flex items-center justify-center shadow-sm">

                <svg
                    class="w-6 h-6 text-white"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 21h18M5 21V10l7-5 7 5v11M9 21v-6h6v6" />

                </svg>

            </div>

            <span class="text-2xl font-bold text-slate-900">
                Congregate
            </span>

        </a>

    </div>


    {{-- ===================================================== --}}
    {{-- REGISTRATION CARD --}}
    {{-- ===================================================== --}}

    <div class="w-full max-w-2xl">

        <div class="bg-white rounded-3xl border border-slate-200 shadow-xl shadow-slate-300/50">

            {{-- Extra top padding keeps icon away from card border --}}
            <div class="px-6 pb-9 sm:px-10 sm:pb-10" style="padding-top: 40px !important;">


                {{-- ================================================= --}}
                {{-- HEADER --}}
                {{-- ================================================= --}}

                <div class="text-center">

                    {{-- Registration Icon --}}
                    <div class="flex justify-center mb-6">

                        <div class="w-16 h-16 rounded-3xl bg-blue-50 flex items-center justify-center">

                            <svg
                                class="w-8 h-8 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M18 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2
                                       m8-10a4 4 0 100-8 4 4 0 000 8
                                       m8 2v6
                                       m3-3h-6" />

                            </svg>

                        </div>

                    </div>


                    {{-- Small Heading --}}
                    <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">

                        Administrator Registration

                    </p>


                    {{-- Main Heading --}}
                    <h1 class="mt-2 text-3xl font-bold text-slate-900">

                        Create Organization

                    </h1>


                    {{-- Description --}}
                    <p class="mt-3 text-sm text-slate-500">

                        Register your organization and create the administrator account.

                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- VALIDATION ERROR --}}
                {{-- ================================================= --}}

                @if ($errors->any())

                    <div class="mt-7 rounded-xl bg-red-50 border border-red-200 px-4 py-3">

                        <div class="flex items-start gap-3">

                            <svg
                                class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 9v4m0 4h.01M10.29 3.86l-7.82 14a2 2 0 001.74 3h15.58a2 2 0 001.74-3l-7.82-14a2 2 0 00-3.42 0z" />

                            </svg>

                            <p class="text-sm text-red-700">

                                {{ $errors->first() }}

                            </p>

                        </div>

                    </div>

                @endif


                {{-- ================================================= --}}
                {{-- FORM --}}
                {{-- ================================================= --}}

                <form
                    method="POST"
                    action="{{ route('admin.register.store') }}"
                    class="mt-8">

                    @csrf


                    {{-- ================================================= --}}
                    {{-- ORGANIZATION NAME --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="organization_name"
                            class="block text-sm font-semibold text-slate-700 mb-2">

                            Organization Name

                        </label>

                        <input
                            id="organization_name"
                            name="organization_name"
                            type="text"
                            value="{{ old('organization_name') }}"
                            required
                            placeholder="Grace Community Church"
                            class="w-full px-4 py-3.5 bg-white border border-slate-400 rounded-xl text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition">

                        @error('organization_name')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ================================================= --}}
                    {{-- ADMINISTRATOR NAME --}}
                    {{-- ================================================= --}}

                    <div class="mt-5">

                        <label
                            for="name"
                            class="block text-sm font-semibold text-slate-700 mb-2">

                            Administrator Name

                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            placeholder="John Smith"
                            class="w-full px-4 py-3.5 bg-white border border-slate-400 rounded-xl text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition">

                        @error('name')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ================================================= --}}
                    {{-- EMAIL + PHONE --}}
                    {{-- ================================================= --}}

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">


                        {{-- ================================================= --}}
                        {{-- EMAIL --}}
                        {{-- ================================================= --}}

                        <div>

                            <label
                                for="email"
                                class="block text-sm font-semibold text-slate-700 mb-2">

                                Email Address

                            </label>

                            <div class="relative">

                                {{-- Email Icon --}}
                                <div
                                    class="absolute top-0 bottom-0 flex items-center pointer-events-none"
                                    style="left: 16px;">

                                    <svg
                                        class="w-5 h-5 text-slate-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M3 7l9 6 9-6
                                               M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />

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


                        {{-- ================================================= --}}
                        {{-- PHONE --}}
                        {{-- ================================================= --}}

                        <div>

                            <label
                                for="phone"
                                class="block text-sm font-semibold text-slate-700 mb-2">

                                Phone Number

                            </label>

                            <div class="relative">

                                {{-- Phone Icon --}}
                                <div
                                    class="absolute top-0 bottom-0 flex items-center pointer-events-none"
                                    style="left: 16px;">

                                    <svg
                                        class="w-5 h-5 text-slate-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M3 5a2 2 0 012-2h2l2 5-2 2a16 16 0 007 7l2-2 5 2v2a2 2 0 01-2 2h-1C10.82 21 3 13.18 3 6V5z" />

                                    </svg>

                                </div>

                                <input
                                    id="phone"
                                    name="phone"
                                    type="text"
                                    value="{{ old('phone') }}"
                                    placeholder="+92 300 1234567"
                                    class="w-full py-3.5 pr-4 bg-white border border-slate-400 rounded-xl text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition"
                                    style="padding-left: 48px;">

                            </div>

                            @error('phone')

                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PASSWORD + CONFIRM PASSWORD --}}
                    {{-- ================================================= --}}

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">


                        {{-- ================================================= --}}
                        {{-- PASSWORD --}}
                        {{-- ================================================= --}}

                        <div>

                            <label
                                for="password"
                                class="block text-sm font-semibold text-slate-700 mb-2">

                                Password

                            </label>

                            <div class="relative">

                                {{-- Password Icon --}}
                                <div
                                    class="absolute top-0 bottom-0 flex items-center pointer-events-none"
                                    style="left: 16px;">

                                    <svg
                                        class="w-5 h-5 text-slate-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M16 11V7a4 4 0 00-8 0v4
                                               m-2 0h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2z" />

                                    </svg>

                                </div>

                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Create password"
                                    class="w-full py-3.5 pr-4 bg-white border border-slate-400 rounded-xl text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition"
                                    style="padding-left: 48px;">

                            </div>

                            @error('password')

                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- ================================================= --}}
                        {{-- CONFIRM PASSWORD --}}
                        {{-- ================================================= --}}

                        <div>

                            <label
                                for="password_confirmation"
                                class="block text-sm font-semibold text-slate-700 mb-2">

                                Confirm Password

                            </label>

                            <div class="relative">

                                {{-- Confirm Password Icon --}}
                                <div
                                    class="absolute top-0 bottom-0 flex items-center pointer-events-none"
                                    style="left: 16px;">

                                    <svg
                                        class="w-5 h-5 text-slate-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M16 11V7a4 4 0 00-8 0v4
                                               m-2 0h12a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2z" />

                                    </svg>

                                </div>

                                <input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirm password"
                                    class="w-full py-3.5 pr-4 bg-white border border-slate-400 rounded-xl text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition"
                                    style="padding-left: 48px;">

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- TERMS --}}
                    {{-- ================================================= --}}

                    <div class="mt-6 flex items-start">

                        <input
                            id="terms"
                            name="terms"
                            type="checkbox"
                            required
                            class="mt-1 w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">

                        <label
                            for="terms"
                            class="ml-3 text-sm text-slate-600 leading-5">

                            I agree to the Terms of Service and Privacy Policy.

                        </label>

                    </div>


                    {{-- ================================================= --}}
                    {{-- CREATE ORGANIZATION BUTTON --}}
                    {{-- ================================================= --}}

                    <button
                        type="submit"
                        class="mt-6 w-full h-12 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold flex items-center justify-center gap-2 shadow-lg shadow-blue-600/20 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">

                        <span>
                            Create Organization
                        </span>

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />

                        </svg>

                    </button>


                    {{-- ================================================= --}}
                    {{-- LOGIN LINK --}}
                    {{-- ================================================= --}}

                    <div class="mt-7 text-center">

                        <p class="text-sm text-slate-500">

                            Already have an administrator account?

                            <a
                                href="{{ route('admin.login') }}"
                                class="font-semibold text-blue-600 hover:text-blue-700 transition">

                                Sign in

                            </a>

                        </p>

                    </div>

                </form>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- SECURITY MESSAGE --}}
        {{-- ===================================================== --}}

        <div class="mt-6 pb-2 flex items-center justify-center gap-2 text-xs text-slate-500">

            <svg
                class="w-4 h-4 text-slate-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />

            </svg>

            <span>
                Your information is protected with secure encryption.
            </span>

        </div>

    </div>

</div>