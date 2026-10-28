<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Logo + Navigation -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                    @auth
                        @if(Auth::user()->role === 'member')
                            <a href="{{ route('member-portal') }}" wire:navigate>
                        @else
                            <a href="{{ route('dashboard') }}" wire:navigate>
                        @endif
                    @else
                        <a href="{{ route('login') }}" wire:navigate>
                    @endauth

                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />

                    </a>

                </div>


                <!-- Desktop Navigation -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    @auth

                        {{-- ============================= --}}
                        {{-- MEMBER NAVIGATION --}}
                        {{-- ============================= --}}

                        @if(Auth::user()->role === 'member')

                            <x-nav-link
                                :href="route('member-portal')"
                                :active="request()->routeIs('member-portal')"
                                wire:navigate
                            >
                                {{ __('Member Portal') }}
                            </x-nav-link>

                        @endif


                        {{-- ============================= --}}
                        {{-- ADMIN NAVIGATION --}}
                        {{-- ============================= --}}

                        @if(Auth::user()->role === 'organization_admin')

                            <!-- Dashboard -->
                            <x-nav-link
                                :href="route('dashboard')"
                                :active="request()->routeIs('dashboard')"
                                wire:navigate
                            >
                                {{ __('Dashboard') }}
                            </x-nav-link>

                            <!-- Member Portal -->
                            <x-nav-link
                                :href="route('member-portal')"
                                :active="request()->routeIs('member-portal')"
                                wire:navigate
                            >
                                {{ __('Member Portal') }}
                            </x-nav-link>

                            <!-- Members -->
                            <x-nav-link
                                :href="route('members.index')"
                                :active="request()->routeIs('members.*')"
                                wire:navigate
                            >
                                {{ __('Members') }}
                            </x-nav-link>

                            <!-- Donations -->
                            <x-nav-link
                                :href="route('donations.index')"
                                :active="request()->routeIs('donations.*')"
                                wire:navigate
                            >
                                {{ __('Donations') }}
                            </x-nav-link>

                            <!-- Attendance -->
                            <x-nav-link
                                :href="route('attendance.index')"
                                :active="request()->routeIs('attendance.*')"
                                wire:navigate
                            >
                                {{ __('Attendance') }}
                            </x-nav-link>

                            <!-- Events -->
                            <x-nav-link
                                :href="route('events.index')"
                                :active="request()->routeIs('events.*')"
                                wire:navigate
                            >
                                {{ __('Events') }}
                            </x-nav-link>

                            <!-- Communications -->
                            <x-nav-link
                                :href="route('communications.index')"
                                :active="request()->routeIs('communications.*')"
                                wire:navigate
                            >
                                {{ __('Communications') }}
                            </x-nav-link>

                            <!-- Statements -->
                            <x-nav-link
                                :href="route('statements.index')"
                                :active="request()->routeIs('statements.*')"
                                wire:navigate
                            >
                                {{ __('Statements') }}
                            </x-nav-link>

                            <!-- Reports -->
                            <x-nav-link
                                :href="route('reports.index')"
                                :active="request()->routeIs('reports.*')"
                                wire:navigate
                            >
                                {{ __('Reports') }}
                            </x-nav-link>

                            <!-- Settings -->
                            <x-nav-link
                                :href="route('settings.index')"
                                :active="request()->routeIs('settings.*')"
                                wire:navigate
                            >
                                {{ __('Settings') }}
                            </x-nav-link>

                        @endif

                    @endauth

                </div>

            </div>


            <!-- User Dropdown -->
            @auth

                <div class="hidden sm:flex sm:items-center sm:ms-6">

                    <x-dropdown align="right" width="48">

                        <x-slot name="trigger">

                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                            >

                                <div>
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="ms-1">

                                    <svg
                                        class="fill-current h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >

                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />

                                    </svg>

                                </div>

                            </button>

                        </x-slot>


                        <x-slot name="content">

                            <!-- Profile -->

                            <x-dropdown-link
                                :href="route('profile')"
                                wire:navigate
                            >
                                {{ __('Profile') }}
                            </x-dropdown-link>


                            <!-- Logout -->

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button
                                    type="submit"
                                    class="w-full text-start block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                    {{ __('Log Out') }}
                                </button>

                            </form>

                        </x-slot>

                    </x-dropdown>

                </div>

            @endauth


            <!-- Mobile Hamburger -->

            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out"
                >

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >

                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    <!-- Mobile Navigation -->

    <div
        :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden"
    >

        <div class="pt-2 pb-3 space-y-1">

            @auth

                {{-- MEMBER MOBILE NAVIGATION --}}

                @if(Auth::user()->role === 'member')

                    <x-responsive-nav-link
                        :href="route('member-portal')"
                        :active="request()->routeIs('member-portal')"
                        wire:navigate
                    >
                        {{ __('Member Portal') }}
                    </x-responsive-nav-link>

                @endif


                {{-- ADMIN MOBILE NAVIGATION --}}

                @if(Auth::user()->role === 'organization_admin')

                    <x-responsive-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        wire:navigate
                    >
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('member-portal')"
                        :active="request()->routeIs('member-portal')"
                        wire:navigate
                    >
                        {{ __('Member Portal') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('members.index')"
                        :active="request()->routeIs('members.*')"
                        wire:navigate
                    >
                        {{ __('Members') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('donations.index')"
                        :active="request()->routeIs('donations.*')"
                        wire:navigate
                    >
                        {{ __('Donations') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('attendance.index')"
                        :active="request()->routeIs('attendance.*')"
                        wire:navigate
                    >
                        {{ __('Attendance') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('events.index')"
                        :active="request()->routeIs('events.*')"
                        wire:navigate
                    >
                        {{ __('Events') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('communications.index')"
                        :active="request()->routeIs('communications.*')"
                        wire:navigate
                    >
                        {{ __('Communications') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('statements.index')"
                        :active="request()->routeIs('statements.*')"
                        wire:navigate
                    >
                        {{ __('Statements') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('reports.index')"
                        :active="request()->routeIs('reports.*')"
                        wire:navigate
                    >
                        {{ __('Reports') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('settings.index')"
                        :active="request()->routeIs('settings.*')"
                        wire:navigate
                    >
                        {{ __('Settings') }}
                    </x-responsive-nav-link>

                @endif

            @endauth

        </div>


        <!-- Mobile User Options -->

        @auth

            <div class="pt-4 pb-1 border-t border-gray-200">

                <div class="px-4">

                    <div class="font-medium text-base text-gray-800">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="font-medium text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </div>

                    <div class="mt-1 text-xs text-gray-400">
                        {{ Auth::user()->role }}
                    </div>

                </div>


                <div class="mt-3 space-y-1">

                    <!-- Profile -->

                    <x-responsive-nav-link
                        :href="route('profile')"
                        wire:navigate
                    >
                        {{ __('Profile') }}
                    </x-responsive-nav-link>


                    <!-- Logout -->

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="w-full text-start block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        >
                            {{ __('Log Out') }}
                        </button>

                    </form>

                </div>

            </div>

        @endauth

    </div>

</nav>