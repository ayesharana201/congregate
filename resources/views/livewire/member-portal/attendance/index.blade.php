<div class="max-w-7xl mx-auto py-8">

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">
            My Attendance
        </h1>

        <a href="{{ route('member.attendance.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
            Mark Attendance
        </a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="text-left px-6 py-4">Event</th>

                    <th class="text-left px-6 py-4">Event Date</th>

                    <th class="text-left px-6 py-4">Status</th>

                    <th class="text-left px-6 py-4">Submitted</th>

                </tr>

            </thead>

            <tbody>

            @forelse($attendance as $item)

                <tr class="border-t">

                    <td class="px-6 py-4">
                        {{ $item->event->title ?? '-' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $item->event?->event_date }}
                    </td>

                    <td class="px-6 py-4">

                        @if($item->status=='Pending')

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                                Pending Approval
                            </span>

                        @elseif($item->status=='Present')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                                Present
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                                Absent
                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4">
                        {{ $item->marked_at }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center py-10 text-gray-500">
                        No attendance records found.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>