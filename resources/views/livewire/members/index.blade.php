<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">

            {{-- Total Members --}}
            <div class="bg-white shadow rounded-lg p-5">
                <p class="text-gray-500">
                    Total Members
                </p>

                <h2 class="text-3xl font-bold">
                    {{ $totalMembers }}
                </h2>
            </div>

            {{-- Active Members --}}
            <div class="bg-white shadow rounded-lg p-5">
                <p class="text-green-600">
                    Active
                </p>

                <h2 class="text-3xl font-bold">
                    {{ $activeMembers }}
                </h2>
            </div>

            {{-- Inactive Members --}}
            <div class="bg-white shadow rounded-lg p-5">
                <p class="text-red-600">
                    Inactive
                </p>

                <h2 class="text-3xl font-bold">
                    {{ $inactiveMembers }}
                </h2>
            </div>

            {{-- Visitors --}}
            <div class="bg-white shadow rounded-lg p-5">
                <p class="text-yellow-600">
                    Visitors
                </p>

                <h2 class="text-3xl font-bold">
                    {{ $visitors }}
                </h2>
            </div>

        </div>


        {{-- Main Members Card --}}
        <div class="bg-white shadow rounded-lg p-6">

            {{-- Search and Filters --}}
            <div class="flex flex-col lg:flex-row justify-between gap-4 mb-6">

                <div class="flex flex-col sm:flex-row gap-3">

                    {{-- Search --}}
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search member..."
                        class="rounded-lg border-gray-300 w-72"
                    >

                    {{-- Status Filter --}}
                    <select
                        wire:model.live="status"
                        class="rounded-lg border-gray-300"
                    >

                        <option value="">
                            All Status
                        </option>

                        <option value="Active">
                            Active
                        </option>

                        <option value="Inactive">
                            Inactive
                        </option>

                        <option value="Visitor">
                            Visitor
                        </option>

                    </select>

                </div>


                {{-- Add Member --}}
                <a
                    href="{{ route('members.create') }}"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 text-center"
                >
                    Add Member
                </a>

            </div>


            {{-- Success Message --}}
            @if (session()->has('success'))

                <div class="mb-5 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">

                    {{ session('success') }}

                </div>

            @endif


            {{-- Members Table --}}
            <div class="overflow-x-auto">

                <table class="w-full border-collapse">

                    <thead>

                        <tr class="bg-gray-50 border-b">

                            <th class="text-left px-4 py-3 font-semibold text-gray-700">
                                Member
                            </th>

                            <th class="text-left px-4 py-3 font-semibold text-gray-700">
                                Email
                            </th>

                            <th class="text-left px-4 py-3 font-semibold text-gray-700">
                                Phone
                            </th>

                            <th class="text-left px-4 py-3 font-semibold text-gray-700">
                                Status
                            </th>

                            <th class="text-left px-4 py-3 font-semibold text-gray-700">
                                Login
                            </th>

                            <th class="text-right px-4 py-3 font-semibold text-gray-700">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($members as $member)

                            <tr class="border-b hover:bg-gray-50">

                                {{-- Member Name --}}
                                <td class="px-4 py-4">

                                    <div class="flex items-center gap-3">

                                        @if ($member->photo)

    <img
        src="{{ asset('storage/' . $member->photo) }}"
        alt="{{ $member->first_name }}"
        style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;"
    >

@else

    <div
        style="width: 50px; height: 50px; border-radius: 50%;"
        class="bg-gray-200 flex items-center justify-center text-gray-600 font-semibold"
    >
        {{ strtoupper(substr($member->first_name, 0, 1)) }}
    </div>

@endif

                                        <div>

                                            <div class="font-semibold text-gray-900">

                                                {{ $member->first_name }}
                                                {{ $member->last_name }}

                                            </div>

                                            <div class="text-sm text-gray-500">

                                                Member #{{ $member->id }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}
                                <td class="px-4 py-4 text-gray-700">

                                    {{ $member->email ?? '-' }}

                                </td>


                                {{-- Phone --}}
                                <td class="px-4 py-4 text-gray-700">

                                    {{ $member->phone ?? '-' }}

                                </td>


                                {{-- Membership Status --}}
                                <td class="px-4 py-4">

                                    @if ($member->membership_status === 'Active')

                                        <span class="inline-flex px-3 py-1 text-sm font-medium bg-green-100 text-green-700 rounded-full">

                                            Active

                                        </span>

                                    @elseif ($member->membership_status === 'Inactive')

                                        <span class="inline-flex px-3 py-1 text-sm font-medium bg-red-100 text-red-700 rounded-full">

                                            Inactive

                                        </span>

                                    @else

                                        <span class="inline-flex px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-700 rounded-full">

                                            Visitor

                                        </span>

                                    @endif

                                </td>


                                {{-- Login Status --}}
                                <td class="px-4 py-4">

                                    @if ($member->user_id)

                                        <span class="inline-flex px-3 py-1 text-sm font-medium bg-green-100 text-green-700 rounded-full">

                                            Created

                                        </span>

                                    @else

                                        <span class="inline-flex px-3 py-1 text-sm font-medium bg-gray-100 text-gray-600 rounded-full">

                                            Not Created

                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="px-4 py-4">

                                    <div class="flex justify-end items-center gap-2">

                                        {{-- View --}}
                                        <a
                                            href="{{ route('members.show', $member) }}"
                                            class="px-3 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm"
                                        >
                                            View
                                        </a>


                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('members.edit', $member) }}"
                                            class="px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm"
                                        >
                                            Edit
                                        </a>


                                        {{-- Delete --}}
                                        <button
                                            wire:click="delete({{ $member->id }})"
                                            wire:confirm="Are you sure you want to delete this member?"
                                            class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm"
                                        >
                                            Delete
                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="px-4 py-10 text-center text-gray-500"
                                >

                                    No members found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if ($members->hasPages())

                <div class="mt-6">

                    {{ $members->links() }}

                </div>

            @endif

        </div>

    </div>

</div>