<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                Record Donation
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

                    {{-- Member --}}
                    <div>
                        <label class="block mb-2 font-medium">
                            Member
                        </label>

                        <select
                            wire:model="member_id"
                            class="w-full rounded-lg border-gray-300">

                            <option value="">
                                Select Member
                            </option>

                            @foreach($members as $member)
                                <option value="{{ $member->id }}">
                                    {{ $member->first_name }}
                                    {{ $member->last_name }}
                                </option>
                            @endforeach

                        </select>

                        @error('member_id')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Amount --}}
                    <div>
                        <label class="block mb-2 font-medium">
                            Amount
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            wire:model="amount"
                            class="w-full rounded-lg border-gray-300">

                        @error('amount')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Donation Type --}}
                    <div>
                        <label class="block mb-2 font-medium">
                            Donation Type
                        </label>

                        <select
                            wire:model="donation_type"
                            class="w-full rounded-lg border-gray-300">

                            <option>Tithe</option>
                            <option>Offering</option>
                            <option>Building Fund</option>
                            <option>Mission Fund</option>
                            <option>Thanksgiving</option>
                            <option>Charity</option>
                            <option>Special Donation</option>

                        </select>

                        @error('donation_type')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Donation Date --}}
                    <div>
                        <label class="block mb-2 font-medium">
                            Donation Date
                        </label>

                        <input
                            type="date"
                            wire:model="donation_date"
                            class="w-full rounded-lg border-gray-300">

                        @error('donation_date')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Payment Method --}}
                    <div>
                        <label class="block mb-2 font-medium">
                            Payment Method
                        </label>

                        <select
                            wire:model="payment_method"
                            class="w-full rounded-lg border-gray-300">

                            <option>Cash</option>
                            <option>Bank Transfer</option>
                            <option>Credit Card</option>
                            <option>Debit Card</option>
                            <option>Cheque</option>
                            <option>Online Payment</option>

                        </select>

                        @error('payment_method')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Reference Number --}}
                    <div>
                        <label class="block mb-2 font-medium">
                            Reference Number
                        </label>

                        <input
                            type="text"
                            wire:model="reference_number"
                            class="w-full rounded-lg border-gray-300"
                            placeholder="Optional">

                        @error('reference_number')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Notes --}}
                    <div class="md:col-span-2">

                        <label class="block mb-2 font-medium">
                            Notes
                        </label>

                        <textarea
                            rows="4"
                            wire:model="notes"
                            class="w-full rounded-lg border-gray-300"
                            placeholder="Optional notes..."></textarea>

                        @error('notes')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

                <div class="mt-8 flex gap-4">

                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                        Save Donation
                    </button>

                    <a
                        href="{{ route('donations.index') }}"
                        class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>
</div>