<div class="max-w-7xl mx-auto py-8">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold">
                Upcoming Events
            </h1>

            <p class="text-gray-600 mt-2">
                Stay informed about upcoming organization events.
            </p>

        </div>

        <a href="{{ route('member-portal') }}"
           class="bg-gray-700 text-white px-5 py-3 rounded-lg">

            ← Back

        </a>

    </div>

    <div class="grid md:grid-cols-2 gap-6">

        @forelse($events as $event)

            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="text-xl font-bold">
                    {{ $event->title }}
                </h2>

                <p class="text-gray-600 mt-2">
                    {{ $event->description }}
                </p>

                <div class="mt-5 space-y-2">

                    <p>
                        📅
                        {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                    </p>

                    <p>
                        📍 {{ $event->location }}
                    </p>

                    <p>
                        🕒 {{ $event->start_time }}
                    </p>

                </div>

            </div>

        @empty

            <div class="col-span-2">

                <div class="bg-white rounded-xl shadow p-10 text-center">

                    No upcoming events.

                </div>

            </div>

        @endforelse

    </div>

</div>