<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                Reports Dashboard
            </h2>

            <p class="mt-2 text-gray-600 dark:text-gray-300">
                Overview of your organization's members, donations, events,
                attendance, and communications.
            </p>

        </div>


        {{-- Summary Cards --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">


            {{-- Total Members --}}

            <div class="bg-blue-600 text-white rounded-lg p-6 shadow">

                <h3 class="text-lg font-medium">
                    Members
                </h3>

                <p class="text-3xl font-bold mt-2">
                    {{ $totalMembers }}
                </p>

            </div>


            {{-- Total Donations --}}

            <div class="bg-green-600 text-white rounded-lg p-6 shadow">

                <h3 class="text-lg font-medium">
                    Donations
                </h3>

                <p class="text-3xl font-bold mt-2">
                    {{ $totalDonations }}
                </p>

            </div>


            {{-- Total Events --}}

            <div class="bg-blue-600 text-white rounded-lg p-6 shadow">

    <h3 class="text-lg font-medium">
        Events
    </h3>

    <p class="text-3xl font-bold mt-2">
        {{ $totalEvents }}
    </p>

</div>


            {{-- Total Attendance --}}

            <div class="bg-green-600 text-white rounded-lg p-6 shadow">

    <h3 class="text-lg font-medium">
        Attendance
    </h3>

    <p class="text-3xl font-bold mt-2">
        {{ $totalAttendance }}
    </p>

</div>


            {{-- Total Communications --}}

            <div class="bg-red-600 text-white rounded-lg p-6 shadow">

                <h3 class="text-lg font-medium">
                    Communications
                </h3>

                <p class="text-3xl font-bold mt-2">
                    {{ $totalCommunications }}
                </p>

            </div>


        </div>


        {{-- Total Donation Amount --}}

        <div class="mt-8">

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Total Donation Amount
                </h3>

                <p class="text-4xl font-bold text-green-600 mt-3">
                    {{ number_format($totalDonationAmount, 2) }}
                </p>

            </div>

        </div>


        {{-- Recent Donations --}}

        <div class="mt-8">

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">

                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Recent Donations
                    </h3>

                    <a
                        href="{{ route('donations.index') }}"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
                    >
                        View All
                    </a>

                </div>


                @if($recentDonations->count())


                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>

                                <tr class="border-b">

                                    <th class="py-3 px-4 text-left">
                                        Member
                                    </th>

                                    <th class="py-3 px-4 text-left">
                                        Donation Type
                                    </th>

                                    <th class="py-3 px-4 text-left">
                                        Amount
                                    </th>

                                    <th class="py-3 px-4 text-left">
                                        Date
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($recentDonations as $donation)

                                    <tr class="border-b">

                                        <td class="py-3 px-4">

                                            {{ $donation->member->first_name ?? 'Unknown' }}

                                            {{ $donation->member->last_name ?? '' }}

                                        </td>


                                        <td class="py-3 px-4">

                                            {{ $donation->donation_type }}

                                        </td>


                                        <td class="py-3 px-4 font-semibold">

                                            {{ number_format($donation->amount, 2) }}

                                        </td>


                                        <td class="py-3 px-4">

                                            {{ $donation->donation_date->format('d M Y') }}

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                @else


                    <div class="text-center py-10 text-gray-500">

                        No donations found.

                    </div>


                @endif


            </div>

        </div>


        {{-- Upcoming Events --}}

        <div class="mt-8">

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">

                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Upcoming Events
                    </h3>

                    <a
                        href="{{ route('events.index') }}"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
                    >
                        View All
                    </a>

                </div>


                @if($upcomingEvents->count())


                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>

                                <tr class="border-b">

                                    <th class="py-3 px-4 text-left">
                                        Title
                                    </th>

                                    <th class="py-3 px-4 text-left">
                                        Date
                                    </th>

                                    <th class="py-3 px-4 text-left">
                                        Time
                                    </th>

                                    <th class="py-3 px-4 text-left">
                                        Location
                                    </th>

                                    <th class="py-3 px-4 text-left">
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($upcomingEvents as $event)

                                    <tr class="border-b">

                                        <td class="py-3 px-4">

                                            {{ $event->title }}

                                        </td>


                                        <td class="py-3 px-4">

                                            {{ $event->event_date->format('d M Y') }}

                                        </td>


                                        <td class="py-3 px-4">

                                            {{ $event->start_time }}

                                        </td>


                                        <td class="py-3 px-4">

                                            {{ $event->location ?: 'N/A' }}

                                        </td>


                                        <td class="py-3 px-4">

                                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">

                                                {{ $event->status }}

                                            </span>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                @else


                    <div class="text-center py-10 text-gray-500">

                        No upcoming events found.

                    </div>


                @endif


            </div>

        </div>

        {{-- Recent Attendance --}}

<div class="mt-8">

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

        <div class="flex justify-between items-center mb-6">

            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Recent Attendance
            </h3>

            <a
                href="{{ route('attendance.index') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
            >
                View All
            </a>

        </div>


        @if($recentAttendance->count())

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="py-3 px-4 text-left">
                                Member
                            </th>

                            <th class="py-3 px-4 text-left">
                                Date
                            </th>

                            <th class="py-3 px-4 text-left">
                                Service Type
                            </th>

                            <th class="py-3 px-4 text-left">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($recentAttendance as $attendance)

                            <tr class="border-b">

                                <td class="py-3 px-4">

                                    {{ $attendance->member->first_name ?? 'Unknown' }}

                                    {{ $attendance->member->last_name ?? '' }}

                                </td>


                                <td class="py-3 px-4">

                                    {{ $attendance->attendance_date->format('d M Y') }}

                                </td>


                                <td class="py-3 px-4">

                                    {{ $attendance->service_type }}

                                </td>


                                <td class="py-3 px-4">

                                    @if($attendance->status === 'Present')

                                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">

                                            Present

                                        </span>

                                    @elseif($attendance->status === 'Absent')

                                        <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">

                                            Absent

                                        </span>

                                    @else

                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">

                                            Visitor

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-10 text-gray-500">

                No attendance records found.

            </div>

        @endif

    </div>

</div>



        {{-- Print Button --}}

<div class="mt-8 flex justify-end">

    <button
        type="button"
        onclick="window.print()"
        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition duration-200"
    >
        Print Report
    </button>

</div>


    </div>

</div>