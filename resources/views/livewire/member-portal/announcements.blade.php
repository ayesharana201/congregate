<div class="max-w-7xl mx-auto py-10">

    <div class="mb-8">

        <h2 class="text-3xl font-bold">

            Announcements

        </h2>

        <p class="text-gray-500">

            Latest messages from your organization.

        </p>

    </div>

    @forelse($announcements as $item)

        <div class="bg-white rounded-2xl shadow-lg p-6 mb-5">

            <div class="flex justify-between">

                <h3 class="text-xl font-bold">

                    {{ $item->title }}

                </h3>

                <span class="text-gray-400">

                    {{ $item->created_at->format('d M Y') }}

                </span>

            </div>

            <div class="mt-4 text-gray-700">

                {{ $item->message }}

            </div>

        </div>

    @empty

        <div class="bg-white rounded-xl p-12 text-center">

            No announcements available.

        </div>

    @endforelse

</div>