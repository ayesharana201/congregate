<div class="py-12">

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">


        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">


            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
                Edit Member
            </h2>


            @if (session()->has('success'))

                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">

                    {{ session('success') }}

                </div>

            @endif



            @if ($errors->any())

                <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">

                    <ul class="list-disc pl-5">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <form wire:submit.prevent="update">


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    <div>
                        <label class="block mb-2">
                            First Name
                        </label>

                        <input
                            type="text"
                            wire:model="first_name"
                            class="w-full rounded-lg border-gray-300">
                    </div>



                    <div>
                        <label class="block mb-2">
                            Last Name
                        </label>

                        <input
                            type="text"
                            wire:model="last_name"
                            class="w-full rounded-lg border-gray-300">
                    </div>



                    <div>
                        <label class="block mb-2">
                            Gender
                        </label>

                        <select
                            wire:model="gender"
                            class="w-full rounded-lg border-gray-300">

                            <option value="">
                                Select Gender
                            </option>

                            <option value="Male">
                                Male
                            </option>

                            <option value="Female">
                                Female
                            </option>

                        </select>

                    </div>



                    <div>
                        <label class="block mb-2">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            wire:model="date_of_birth"
                            class="w-full rounded-lg border-gray-300">
                    </div>



                    <div>
                        <label class="block mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            wire:model="email"
                            class="w-full rounded-lg border-gray-300">

                    </div>



                    <div>
                        <label class="block mb-2">
                            Phone
                        </label>

                        <input
                            type="text"
                            wire:model="phone"
                            class="w-full rounded-lg border-gray-300">

                    </div>



                    <div class="md:col-span-2">

                        <label class="block mb-2">
                            Address
                        </label>

                        <textarea
                            wire:model="address"
                            rows="3"
                            class="w-full rounded-lg border-gray-300"></textarea>

                    </div>



                    <div>

                        <label class="block mb-2">
                            Joined Date
                        </label>

                        <input
                            type="date"
                            wire:model="joined_at"
                            class="w-full rounded-lg border-gray-300">

                    </div>



                    <div>

                        <label class="block mb-2">
                            Baptism Date
                        </label>

                        <input
                            type="date"
                            wire:model="baptism_date"
                            class="w-full rounded-lg border-gray-300">

                    </div>



                    <div>

                        <label class="block mb-2">
                            Membership Status
                        </label>

                        <select
                            wire:model="membership_status"
                            class="w-full rounded-lg border-gray-300">


                            <option value="Active">
                                Active
                            </option>


                            <option value="Inactive">
                                Inactive
                            </option>


                            <option value="Visitor">
                                Visitor
                            </option>


                        </select>

                    </div>
                    <div class="md:col-span-2">

    <label class="block mb-2 font-medium">
        Current Photo
    </label>

    @if($member->photo)

        <img
            src="{{ asset('storage/' . $member->photo) }}"
            class="h-32 w-32 rounded-lg object-cover border mb-4">

    @else

        <div class="h-32 w-32 rounded-lg border flex items-center justify-center text-gray-500">
            No Photo
        </div>

    @endif

    <label class="block mb-2 font-medium mt-4">
        Upload New Photo
    </label>

    <input
        type="file"
        wire:model="photo"
        accept="image/*"
        class="w-full rounded-lg border-gray-300">

    @error('photo')
        <p class="text-red-500 mt-2">
            {{ $message }}
        </p>
    @enderror

    <div wire:loading wire:target="photo" class="mt-2 text-blue-600">
        Uploading...
    </div>

    @if($photo)

        <div class="mt-4">
            <p class="mb-2 font-medium">
                Preview
            </p>

            <img
                src="{{ $photo->temporaryUrl() }}"
                class="h-32 w-32 rounded-lg object-cover border">
        </div>

    @endif

</div>


                </div>



                <div class="mt-8 flex gap-3">


                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                        Update Member

                    </button>



                    <a
                        href="{{ route('members.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">

                        Cancel

                    </a>


                </div>


            </form>


        </div>


    </div>


</div>