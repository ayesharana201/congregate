<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Donation Statement
                </h2>

                <button
    onclick="window.print()"
    class="print:hidden px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
    Print Statement
</button>

            </div>

            <!-- Member Information -->
            <div class="mb-8 border-b pb-6">

                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $member->first_name }} {{ $member->last_name }}
                </h3>

                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    <strong>Email:</strong> {{ $member->email ?: 'N/A' }}
                </p>

                <p class="text-gray-600 dark:text-gray-300">
                    <strong>Phone:</strong> {{ $member->phone ?: 'N/A' }}
                </p>

            </div>

            <!-- Date Filters -->
            <div class="mb-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
                            From
                        </label>

                        <input
                            type="date"
                            wire:model.live="from"
                            class="w-full rounded-lg border-gray-300">

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">
                            To
                        </label>

                        <input
                            type="date"
                            wire:model.live="to"
                            class="w-full rounded-lg border-gray-300">

                    </div>

                </div>

            </div>

            <!-- Donations Table -->
            @if($donations->count())

                <div class="overflow-x-auto">

                    <table class="w-full border-collapse">

                        <thead>

                            <tr class="border-b bg-gray-100 dark:bg-gray-700">

                                <th class="py-3 px-4 text-left">
                                    Date
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Type
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Payment Method
                                </th>

                                <th class="py-3 px-4 text-left">
                                    Reference
                                </th>

                                <th class="py-3 px-4 text-right">
                                    Amount
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($donations as $donation)

                                <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700">

                                    <td class="py-3 px-4">
                                        {{ $donation->donation_date->format('d M Y') }}
                                    </td>

                                    <td class="py-3 px-4">
                                        {{ $donation->donation_type }}
                                    </td>

                                    <td class="py-3 px-4">
                                        {{ $donation->payment_method }}
                                    </td>

                                    <td class="py-3 px-4">
                                        {{ $donation->reference_number ?: '-' }}
                                    </td>

                                    <td class="py-3 px-4 text-right font-semibold">
                                        {{ number_format($donation->amount, 2) }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                        <tfoot>

                            <tr class="bg-gray-100 dark:bg-gray-700">

                                <td colspan="4" class="py-4 px-4 text-right font-bold">
                                    Total Donated
                                </td>

                                <td class="py-4 px-4 text-right font-bold text-green-600">
                                    {{ number_format($total, 2) }}
                                </td>

                            </tr>

                        </tfoot>

                    </table>

                </div>

            @else

                <div class="py-12 text-center text-gray-500">

                    <p class="text-lg">
                        No donations found for the selected date range.
                    </p>

                </div>

            @endif

            <!-- Back Button -->
            <div class="mt-8 print:hidden">

                @if(auth()->user()->role === 'organization_admin')

    <a
        href="{{ route('statements.index') }}"
        class="inline-flex items-center gap-2 px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition"
    >
        ← Back to Statements
    </a>

@else

    <a
        href="{{ route('member-portal') }}"
        class="inline-flex items-center gap-2 px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition"
    >
        ← Back to Member Portal
    </a>

@endif

            </div>

        </div>

    </div>

</div>