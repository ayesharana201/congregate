<div class="max-w-4xl mx-auto py-8">

    {{-- Success Message --}}
    @if(session()->has('success'))
        <div class="mb-6 rounded-xl bg-green-100 border border-green-300 text-green-800 px-5 py-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if(session()->has('error'))
        <div class="mb-6 rounded-xl bg-red-100 border border-red-300 text-red-800 px-5 py-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">

            <h2 class="text-3xl font-bold text-white">
                Mark Attendance
            </h2>

            <p class="text-blue-100 mt-2">
                Submit your attendance for an event.
            </p>

        </div>

        {{-- Form --}}
        <form wire:submit="save" class="p-8 space-y-6">

            {{-- Event --}}
            <div>

                <label class="block font-semibold mb-2">
                    Select Event
                </label>

                <select
                    wire:model="event_id"
                    class="w-full rounded-xl border-gray-300"
                >

                    <option value="">Select Event</option>

                    @foreach($events as $event)
                        <option value="{{ $event->id }}">
                            {{ $event->title }}
                            ({{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }})
                            - {{ $event->status }}
                        </option>
                    @endforeach

                </select>

                @error('event_id')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Notes --}}
            <div>

                <label class="block font-semibold mb-2">
                    Notes (Optional)
                </label>

                <textarea
                    wire:model="notes"
                    rows="4"
                    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500"
                    placeholder="Add any comments..."
                ></textarea>

            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-4 pt-4">

                <a
                    href="{{ route('member.attendance.index') }}"
                    class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold"
                >
                    Submit Attendance
                </button>

            </div>

        </form>

    </div>

</div>