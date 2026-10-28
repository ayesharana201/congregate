<div class="max-w-7xl mx-auto py-8">

    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-300 bg-green-100 px-5 py-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Attendance Management
            </h1>

            <p class="text-gray-500 mt-1">
                Review and approve attendance submitted by members.
            </p>

        </div>

    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">

        <div class="grid md:grid-cols-2 gap-4">

            <input
                type="text"
                wire:model.live="search"
                placeholder="Search member..."
                class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
            >

            <select
                wire:model.live="status"
                class="w-full rounded-xl border-gray-300 focus:ring-blue-500 focus:border-blue-500"
            >
                <option value="">All Status</option>
                <option value="Pending">Pending</option>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select>

        </div>

    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-max w-full border-collapse">

                <thead class="bg-gray-100">
    <tr>
        <th class="px-8 py-5 text-left font-semibold w-72">
            Member
        </th>

        <th class="px-8 py-5 text-left font-semibold w-72">
            Event
        </th>

        <th class="px-8 py-5 text-left font-semibold w-48">
            Date
        </th>

        <th class="px-8 py-5 text-left font-semibold w-40">
            Status
        </th>

        <th class="px-8 py-5 text-center font-semibold w-72">
            Action
        </th>
    </tr>
</thead>
                <tbody>

                    @forelse($attendance as $item)

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="px-8 py-5 align-middle">

                                {{ $item->member->first_name }}
                                {{ $item->member->last_name }}

                            </td>

                            <td class="px-8 py-5 align-middle">

                                {{ $item->event?->title ?? 'General Attendance' }}

                            </td>

                            <td class="px-8 py-5 align-middle">

                                {{ $item->marked_at?->format('d M Y H:i') }}

                            </td>

                            <td class="px-10 py-5 whitespace-nowrap">

                                @if($item->status == 'Pending')

                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
                                        Pending
                                    </span>

                                @elseif($item->status == 'Present')

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                                        Present
                                    </span>

                                @elseif($item->status == 'Absent')

    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">
        Absent
    </span>

@endif

                            </td>

                            <td class="px-10 py-5 whitespace-nowrap">

                                @if($item->status == 'Pending')

                                    <div class="flex justify-center gap-2">

                                        <button
                                            wire:click="approve({{ $item->id }})"
                                            wire:confirm="Approve this attendance?"
                                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">

                                            ✓ Approve

                                        </button>

                                        <button
                                            wire:click="reject({{ $item->id }})"
                                            wire:confirm="Reject this attendance?"
                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">

                                            ✕ Reject

                                        </button>

                                    </div>

                                @elseif($item->status == 'Present')

                                    <span class="text-green-600 font-semibold">
                                        Approved
                                    </span>

                                @elseif($item->status == 'Absent')

    <span class="text-red-600 font-semibold">
        Rejected
    </span>

@endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="py-12 text-center text-gray-500">

                                No attendance records found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>