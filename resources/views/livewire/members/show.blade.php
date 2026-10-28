<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-8">

            <div class="flex justify-between items-center mb-8">

                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Member Profile
                </h2>

                <a href="{{ route('members.index') }}"
                   class="px-5 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">
                    Back
                </a>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- PHOTO --}}
                <div>

                    @if($member->photo)
                        <img
                            src="{{ asset('storage/' . $member->photo) }}"
                            alt="{{ $member->first_name }} {{ $member->last_name }}"
                            class="w-56 h-56 rounded-xl object-cover border shadow">
                    @else
                        <div class="w-56 h-56 rounded-xl bg-gray-200 flex items-center justify-center text-gray-500">
                            No Photo
                        </div>
                    @endif

                </div>

                {{-- MEMBER INFORMATION --}}
                <div class="md:col-span-2">

                    <table class="w-full">

                        <tbody>

                            <tr class="border-b">
                                <th class="text-left py-3 w-48">First Name</th>
                                <td>{{ $member->first_name }}</td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Last Name</th>
                                <td>{{ $member->last_name }}</td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Gender</th>
                                <td>{{ $member->gender ?? '-' }}</td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Date of Birth</th>
                                <td>
                                    {{ $member->date_of_birth?->format('d M Y') ?? '-' }}
                                </td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Email</th>
                                <td>{{ $member->email ?? '-' }}</td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Phone</th>
                                <td>{{ $member->phone ?? '-' }}</td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Address</th>
                                <td>{{ $member->address ?? '-' }}</td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Joined Date</th>
                                <td>
                                    {{ $member->joined_at?->format('d M Y') ?? '-' }}
                                </td>
                            </tr>

                            <tr class="border-b">
                                <th class="text-left py-3">Baptism Date</th>
                                <td>
                                    {{ $member->baptism_date?->format('d M Y') ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th class="text-left py-3">Membership Status</th>

                                <td>
                                    @if($member->membership_status === 'Active')

                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full">
                                            Active
                                        </span>

                                    @elseif($member->membership_status === 'Inactive')

                                        <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full">
                                            Inactive
                                        </span>

                                    @else

                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full">
                                            Visitor
                                        </span>

                                    @endif
                                </td>
                            </tr>

                        </tbody>

                    </table>

                    <div class="mt-8">

                        <a href="{{ route('members.edit', $member) }}"
                           class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                            Edit Member
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>