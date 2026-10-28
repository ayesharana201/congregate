<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Events
                </h2>

                <a href="{{ route('events.create') }}"
                   class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    Add Event
                </a>

            </div>

            @if(session()->has('success'))
                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            @if($events->count())

                <table class="w-full">

                    <thead>

                        <tr class="border-b">
                            <th class="py-3 text-left">Title</th>
                            <th class="py-3 text-left">Date</th>
                            <th class="py-3 text-left">Time</th>
                            <th class="py-3 text-left">Location</th>
                            <th class="py-3 text-left">Status</th>
                            <th class="py-3 text-left">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($events as $event)

                            <tr class="border-b">

                                <td class="py-3">{{ $event->title }}</td>

                                <td class="py-3">
                                    {{ $event->event_date->format('d M Y') }}
                                </td>

                                <td class="py-3">
                                    {{ $event->start_time }}
                                </td>

                                <td class="py-3">
                                    {{ $event->location }}
                                </td>

                                <td class="py-3">
                                    {{ $event->status }}
                                </td>

                                <td class="py-3 flex gap-2">

    <a href="{{ route('events.edit', $event->id) }}"
   class="px-3 py-1 bg-yellow-500 text-white rounded">
    Edit
</a>

    <button
        wire:click="delete({{ $event->id }})"
        onclick="return confirm('Delete this event?')"
        class="px-3 py-1 bg-red-600 text-white rounded">
        Delete
    </button>

</td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="text-center py-10 text-gray-500">
                    No events found.
                </div>

            @endif

        </div>

    </div>
</div>