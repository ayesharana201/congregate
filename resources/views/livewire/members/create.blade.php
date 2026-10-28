<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
                Add Member
            </h2>

            @if (session()->has('success'))
                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif
            

      



            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form wire:submit.prevent="save">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            First Name
                        </label>

                        <input
                            type="text"
                            wire:model="first_name"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                        @error('first_name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Last Name
                        </label>

                        <input
                            type="text"
                            wire:model="last_name"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                        @error('last_name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Gender
                        </label>

                        <select
                            wire:model="gender"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        </select>

                        @error('gender')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            wire:model="date_of_birth"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                        @error('date_of_birth')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Email
                        </label>

                        <input
                            type="email"
                            wire:model="email"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Phone
                        </label>

                        <input
                            type="text"
                            wire:model="phone"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                        @error('phone')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Address
                        </label>

                        <textarea
                            wire:model="address"
                            rows="3"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"></textarea>

                        @error('address')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Joined Date
                        </label>

                        <input
                            type="date"
                            wire:model="joined_at"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                        @error('joined_at')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Baptism Date
                        </label>

                        <input
                            type="date"
                            wire:model="baptism_date"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                        @error('baptism_date')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Member Photo --}}
                    <div class="md:col-span-2">
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Member Photo
                        </label>

                        <input
                            type="file"
                            wire:model="photo"
                            accept="image/*"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                        @error('photo')
                            <p class="mt-1 text-sm text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                        <div wire:loading wire:target="photo" class="mt-2 text-blue-600">
                            Uploading...
                        </div>

                        @if($photo)
                            <img
                                src="{{ $photo->temporaryUrl() }}"
                                class="mt-4 h-32 w-32 rounded-lg object-cover border">
                        @endif
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                            Membership Status
                        </label>

                        <select
                            wire:model="membership_status"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Visitor">Visitor</option>

                        </select>

                        @error('membership_status')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="mt-8">
                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                        Save Member
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>