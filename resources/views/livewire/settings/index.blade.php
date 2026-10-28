<div class="py-12">

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
                Organization Settings
            </h2>

            @if(session()->has('success'))
                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="save">

                <div class="space-y-6">

                    <div>
                        <label class="block mb-2 font-medium">
                            Organization Name
                        </label>

                        <input
                            type="text"
                            wire:model="name"
                            class="w-full rounded-lg border-gray-300">

                        @error('name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Contact Email
                        </label>

                        <input
                            type="email"
                            wire:model="primary_contact_email"
                            class="w-full rounded-lg border-gray-300">

                        @error('primary_contact_email')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Time Zone
                        </label>

                        <input
                            type="text"
                            wire:model="timezone"
                            placeholder="UTC"
                            class="w-full rounded-lg border-gray-300">

                        @error('timezone')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">
                            Currency Code
                        </label>

                        <input
                            type="text"
                            wire:model="currency_code"
                            placeholder="USD"
                            class="w-full rounded-lg border-gray-300">

                        @error('currency_code')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="mt-8">

                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                        Save Settings

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>