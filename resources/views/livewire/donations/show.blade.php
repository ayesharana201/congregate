<div class="py-12">

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-8">

            {{-- Header --}}

            <div class="flex justify-between items-center mb-8 print:hidden">

                <div>

                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        Donation Receipt
                    </h2>

                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Donation details and receipt information
                    </p>

                </div>

                <button
                    type="button"
                    onclick="window.print()"
                    class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition duration-200"
                >
                    Print Receipt
                </button>

            </div>


            {{-- Organization Information --}}

            <div class="text-center border-b pb-6 mb-6">

                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Congregate
                </h3>

                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    Donation Receipt
                </p>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Thank you for supporting our organization
                </p>

            </div>


            {{-- Receipt Information --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                <div>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Receipt Number
                    </p>

                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        #{{ $donation->id }}
                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Donation Date
                    </p>

                    <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $donation->donation_date->format('d M Y') }}
                    </p>

                </div>

            </div>


            {{-- Donor Information --}}

            <div class="border-t border-b py-6 mb-8">

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    Donor Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Member Name
                        </p>

                        <p class="mt-1 font-semibold text-gray-900 dark:text-white">

                            {{ $donation->member->first_name ?? 'Unknown' }}

                            {{ $donation->member->last_name ?? '' }}

                        </p>

                    </div>


                    <div>

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Email
                        </p>

                        <p class="mt-1 font-semibold text-gray-900 dark:text-white">
                            {{ $donation->member->email ?? 'N/A' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Donation Details --}}

            <div class="mb-8">

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    Donation Details
                </h3>

                <div class="overflow-x-auto">

                    <table class="w-full border-collapse">

                        <thead>

                            <tr class="border-b bg-gray-100 dark:bg-gray-700">

                                <th class="py-3 px-4 text-left">
                                    Donation Type
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Payment Method
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Reference Number
                                </th>

                                <th class="py-3 px-4 text-right">
                                    Amount
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <tr class="border-b">

                                <td class="py-4 px-4 text-gray-900 dark:text-white">
                                    {{ $donation->donation_type }}
                                </td>

                                <td class="py-4 px-4 text-gray-900 dark:text-white">
                                    {{ $donation->payment_method }}
                                </td>

                                <td class="py-4 px-4 text-gray-900 dark:text-white">
                                    {{ $donation->reference_number ?: 'N/A' }}
                                </td>

                                <td class="py-4 px-4 text-right font-bold text-green-600">
                                    {{ number_format($donation->amount, 2) }}
                                </td>

                            </tr>

                        </tbody>


                        <tfoot>

                            <tr class="bg-gray-100 dark:bg-gray-700">

                                <td
                                    colspan="3"
                                    class="py-4 px-4 text-right font-bold text-gray-900 dark:text-white"
                                >
                                    Total Donation
                                </td>

                                <td
                                    class="py-4 px-4 text-right text-xl font-bold text-green-600"
                                >
                                    {{ number_format($donation->amount, 2) }}
                                </td>

                            </tr>

                        </tfoot>

                    </table>

                </div>

            </div>


            {{-- Thank You Message --}}

            <div class="border-t pt-6 text-center">

                <p class="text-lg font-semibold text-gray-900 dark:text-white">
                    Thank you for your generous contribution.
                </p>

                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    Your support helps us continue our mission and community work.
                </p>

            </div>


            {{-- Action Buttons --}}

            <div class="mt-8 flex justify-between print:hidden">

                <a
                    href="{{ route('donations.index') }}"
                    class="inline-block px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-md transition duration-200"
                >
                    Back to Donations
                </a>


                <button
                    type="button"
                    onclick="window.print()"
                    class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition duration-200"
                >
                    Print Receipt
                </button>

            </div>

        </div>

    </div>

</div>