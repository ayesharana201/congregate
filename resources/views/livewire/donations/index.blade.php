<div class="py-8">

    <div class="max-w-7xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Donation Management
        </h1>

        @if(session('success'))
            <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="p-4 text-left">Member</th>
                        <th class="p-4 text-left">Type</th>
                        <th class="p-4 text-left">Amount</th>
                        <th class="p-4 text-left">Date</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($donations as $donation)

                    <tr class="border-t">

                        <td class="p-4">
                            {{ $donation->member->first_name }}
                            {{ $donation->member->last_name }}
                        </td>

                        <td class="p-4">
                            {{ $donation->donation_type }}
                        </td>

                        <td class="p-4">
                            ${{ number_format($donation->amount,2) }}
                        </td>

                        <td class="p-4">
                            {{ $donation->donation_date->format('d M Y') }}
                        </td>

                        <td class="p-4">

                            @if($donation->status=='Pending')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                    Pending
                                </span>

                            @elseif($donation->status=='Approved')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                    Approved
                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                    Rejected
                                </span>

                            @endif

                        </td>

                        <td class="p-4 text-center">

                            @if($donation->status=='Pending')

                                <button
                                    wire:click="approve({{ $donation->id }})"
                                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">

                                    Approve

                                </button>

                                <button
                                    wire:click="reject({{ $donation->id }})"
                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 ml-2">

                                    Reject

                                </button>
                                <a
    href="{{ route('donations.receipt',$donation) }}"
    class="text-green-600 hover:underline"
>

    Receipt

</a>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center p-8">

                            No donations found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>