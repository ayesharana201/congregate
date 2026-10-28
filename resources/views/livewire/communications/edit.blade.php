<div class="py-12">

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
                Edit Communication
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

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form wire:submit.prevent="update">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="md:col-span-2">

                        <label class="block mb-2 font-medium">

                            Communication Title

                        </label>

                        <input
                            type="text"
                            wire:model="title"
                            class="w-full rounded-lg border-gray-300"
                        >

                        @error('title')

                            <p class="text-red-500 mt-1">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <div>

                        <label class="block mb-2 font-medium">

                            Communication Type

                        </label>

                        <select
                            wire:model="type"
                            class="w-full rounded-lg border-gray-300"
                        >

                            <option value="Announcement">
                                Announcement
                            </option>

                            <option value="Reminder">
                                Reminder
                            </option>

                            <option value="Event Notification">
                                Event Notification
                            </option>

                        </select>

                        @error('type')

                            <p class="text-red-500 mt-1">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <div>

                        <label class="block mb-2 font-medium">

                            Send To

                        </label>

                        <select
                            wire:model="sent_to"
                            class="w-full rounded-lg border-gray-300"
                        >

                            <option value="All Members">
                                All Members
                            </option>

                            <option value="Active Members">
                                Active Members
                            </option>

                            <option value="Inactive Members">
                                Inactive Members
                            </option>

                        </select>

                        @error('sent_to')

                            <p class="text-red-500 mt-1">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    <div class="md:col-span-2">

                        <label class="block mb-2 font-medium">

                            Message

                        </label>

                        <textarea
                            wire:model="message"
                            rows="6"
                            class="w-full rounded-lg border-gray-300"
                            placeholder="Write your communication message..."
                        ></textarea>

                        @error('message')

                            <p class="text-red-500 mt-1">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                <div class="mt-8 flex gap-3">

                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
                    >

                        Update Communication

                    </button>


                    <a
                        href="{{ route('communications.index') }}"
                        class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg"
                    >

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>