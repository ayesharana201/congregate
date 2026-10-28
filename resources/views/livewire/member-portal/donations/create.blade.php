<div class="py-10">

    <div class="max-w-3xl mx-auto">

        <div class="bg-white shadow-xl rounded-xl p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Make a Donation
            </h1>

            <p class="text-gray-500 mb-8">
                Submit your donation. It will be reviewed by the administrator.
            </p>

            @if (session()->has('error'))
                <div class="mb-6 bg-red-100 text-red-700 p-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form wire:submit="save" class="space-y-6">

                <div>
                    <label class="block font-semibold mb-2">
                        Donation Type
                    </label>

                    <select
                        wire:model="donation_type"
                        class="w-full border rounded-lg px-4 py-3">

                        <option>Tithe</option>
                        <option>Offering</option>
                        <option>Building Fund</option>
                        <option>Charity</option>
                        <option>Mission</option>
                        <option>Other</option>

                    </select>

                    @error('donation_type')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Amount
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        wire:model="amount"
                        class="w-full border rounded-lg px-4 py-3">

                    @error('amount')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Payment Method
                    </label>

                    <select
                        wire:model="payment_method"
                        class="w-full border rounded-lg px-4 py-3">

                        <option>Cash</option>
                        <option>Bank Transfer</option>
                        <option>Credit Card</option>
                        <option>Mobile Wallet</option>

                    </select>

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Reference Number
                    </label>

                    <input
                        type="text"
                        wire:model="reference_number"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Notes
                    </label>

                    <textarea
                        wire:model="notes"
                        rows="4"
                        class="w-full border rounded-lg px-4 py-3"></textarea>

                </div>

                <div class="flex justify-end gap-4">

                    <a
                        href="{{ route('member.donations.index') }}"
                        class="px-6 py-3 rounded-lg border">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold">

                        Submit Donation

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>