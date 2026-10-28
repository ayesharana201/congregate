<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Communications
                </h2>

                <a
                    href="{{ route('communications.create') }}"
                    class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
                >
                    New Communication
                </a>

            </div>


            @if (session()->has('success'))

                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">

                    {{ session('success') }}

                </div>

            @endif


            @if ($communications->count())

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="border-b">

                                <th class="py-3 px-4 text-left">
                                    Title
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Type
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Sent To
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Status
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Date
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($communications as $communication)

                                <tr class="border-b">

                                    <td class="py-3 px-4">

                                        {{ $communication->title }}

                                    </td>


                                    <td class="py-3 px-4">

                                        {{ $communication->type }}

                                    </td>


                                    <td class="py-3 px-4">

                                        {{ $communication->sent_to }}

                                    </td>


                                    <td class="py-3 px-4">

                                        @if ($communication->sent_at)

                                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">

                                                Sent

                                            </span>

                                        @else

                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">

                                                Draft

                                            </span>

                                        @endif

                                    </td>


                                    <td class="py-3 px-4">

                                        @if ($communication->sent_at)

                                            {{ $communication->sent_at->format('d M Y h:i A') }}

                                        @else

                                            Not Sent

                                        @endif

                                    </td>


                                    <td class="py-3 px-4">

                                        <div class="flex gap-2">


                                            @if (!$communication->sent_at)

                                                <button
                                                    wire:click="send({{ $communication->id }})"
                                                    onclick="return confirm('Are you sure you want to send this communication?')"
                                                    class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded"
                                                >
                                                    Send
                                                </button>

                                            @endif


                                            <a
                                                href="{{ route('communications.edit', $communication->id) }}"
                                                class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded"
                                            >
                                                Edit
                                            </a>


                                            <button
                                                wire:click="delete({{ $communication->id }})"
                                                onclick="return confirm('Are you sure you want to delete this communication?')"
                                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded"
                                            >
                                                Delete
                                            </button>


                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="text-center py-10 text-gray-500">

                    No communications found.

                </div>

            @endif

        </div>

    </div>

</div>