<div class="py-10">

    <div class="max-w-7xl mx-auto">

        @if (session()->has('success'))
            <div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-6">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    My Donations
                </h1>

                <p class="text-gray-500 mt-1">
                    View your donation history and submit new donations.
                </p>
            </div>

            <a
                href="{{ route('member.donations.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold">

                + Make Donation

            </a>
            <a
    href="{{ route('member.donations.statement') }}"
    class="bg-green-600 text-white px-5 py-3 rounded-lg hover:bg-green-700">

    Download Statement

</a>
        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left px-6 py-4">Date</th>

                        <th class="text-left px-6 py-4">Type</th>

                        <th class="text-left px-6 py-4">Amount</th>

                        <th class="text-left px-6 py-4">Status</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($donations as $donation)

                    <tr class="border-t">

                        <td class="px-6 py-4">
                            {{ $donation->donation_date->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $donation->donation_type }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-green-700">
                            ${{ number_format($donation->amount,2) }}
                        </td>

                        <td class="px-6 py-4">

                            @if($donation->status=='Approved')
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                                    Approved
                                </span>

                            @elseif($donation->status=='Rejected')
                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                                    Rejected
                                </span>

                            @else
                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>
                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-12 text-gray-500">

                            You haven't submitted any donations yet.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>