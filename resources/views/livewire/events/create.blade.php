<div class="py-12">

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
                Create Event
            </h2>

            @if(session()->has('success'))
                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="md:col-span-2">
                        <label class="block mb-2 font-medium">
                            Event Title
                        </label>

                        <input
                            type="text"
                            wire:model="title"
                            class="w-full rounded-lg border-gray-300">

                        @error('title')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block mb-2 font-medium">
                            Description
                        </label>

                        <textarea
                            wire:model="description"
                            rows="4"
                            class="w-full rounded-lg border-gray-300"></textarea>

                        @error('description')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Event Date
                        </label>

                        <input
                            type="date"
                            wire:model="event_date"
                            class="w-full rounded-lg border-gray-300">

                        @error('event_date')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Start Time
                        </label>

                        <input
                            type="time"
                            wire:model="start_time"
                            class="w-full rounded-lg border-gray-300">

                        @error('start_time')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            End Time
                        </label>

                        <input
                            type="time"
                            wire:model="end_time"
                            class="w-full rounded-lg border-gray-300">

                        @error('end_time')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Location
                        </label>

                        <input
                            type="text"
                            wire:model="location"
                            class="w-full rounded-lg border-gray-300">

                        @error('location')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Status
                        </label>

                        <select
                            wire:model="status"
                            class="w-full rounded-lg border-gray-300">

                            <option value="Upcoming">Upcoming</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>

                        </select>

                        @error('status')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="mt-8 flex gap-3">

                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                        Save Event
                    </button>

                    <a
                        href="{{ route('events.index') }}"
                        class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>