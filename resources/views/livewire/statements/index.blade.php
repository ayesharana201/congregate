<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-6">
                Donation Statements
            </h2>

            @if($members->count())

                <table class="w-full">

                    <thead>

                        <tr class="border-b">

                            <th class="py-3 text-left">Member</th>
                            <th class="py-3 text-left">Email</th>
                            <th class="py-3 text-left">Phone</th>
                            <th class="py-3 text-left">Statement</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($members as $member)

                            <tr class="border-b">

                                <td class="py-3">
                                    {{ $member->first_name }}
                                    {{ $member->last_name }}
                                </td>

                                <td class="py-3">
                                    {{ $member->email }}
                                </td>

                                <td class="py-3">
                                    {{ $member->phone }}
                                </td>

                                <td class="py-3">

                                    <a
    href="{{ route('statements.show', $member) }}"
    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

    View Statement

</a>

                                </td>
                                <td class="px-6 py-4">

    <a
        href="{{ route('statements.download', $member) }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

        Download Statement

    </a>

</td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="text-center py-10 text-gray-500">
                    No members found.
                </div>

            @endif

        </div>

    </div>

</div>