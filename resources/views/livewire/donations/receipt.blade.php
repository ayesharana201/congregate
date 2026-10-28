<div class="py-12">

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <!-- Receipt -->

        <div class="bg-white shadow-lg rounded-xl p-8">

            <!-- Header -->

            <div class="text-center border-b pb-6 mb-6">

                <h1 class="text-3xl font-bold text-gray-900">
                    Donation Receipt
                </h1>

                <p class="text-gray-500 mt-2">
                    Thank you for your generous contribution.
                </p>

            </div>


            <!-- Organization -->

            <div class="text-center mb-8">

                <h2 class="text-2xl font-bold text-gray-900">
                    {{ $donation->organization?->name ?? 'Organization' }}
                </h2>

            </div>


            <!-- Receipt Details -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                <div>

                    <p class="text-sm text-gray-500">
                        Donor
                    </p>

                    <p class="text-lg font-semibold text-gray-900">
                        {{ $donation->member?->first_name }}
                        {{ $donation->member?->last_name }}
                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Donation Date
                    </p>

                    <p class="text-lg font-semibold text-gray-900">
                        {{ $donation->donation_date->format('d M Y') }}
                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Donation Type
                    </p>

                    <p class="text-lg font-semibold text-gray-900">
                        {{ $donation->donation_type }}
                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Payment Method
                    </p>

                    <p class="text-lg font-semibold text-gray-900">
                        {{ $donation->payment_method }}
                    </p>

                </div>


                @if($donation->reference_number)

                    <div>

                        <p class="text-sm text-gray-500">
                            Reference Number
                        </p>

                        <p class="text-lg font-semibold text-gray-900">
                            {{ $donation->reference_number }}
                        </p>

                    </div>

                @endif

            </div>


            <!-- Amount -->

            <div class="border-t border-b py-6 mb-8 text-center">

                <p class="text-sm text-gray-500 mb-2">
                    Donation Amount
                </p>

                <p class="text-4xl font-bold text-green-600">
                    ${{ number_format($donation->amount, 2) }}
                </p>

            </div>


            <!-- Notes -->

            @if($donation->notes)

                <div class="mb-8">

                    <p class="text-sm text-gray-500 mb-1">
                        Notes
                    </p>

                    <p class="text-gray-700">
                        {{ $donation->notes }}
                    </p>

                </div>

            @endif


            <!-- Actions -->

            <div class="flex justify-center gap-3 print:hidden">

                <button
                    onclick="window.print()"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    Print Receipt
                </button>

                <a
                    href="{{ route('donations.index') }}"
                    class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">
                    Back to Donations
                </a>

            </div>

        </div>

    </div>

</div>