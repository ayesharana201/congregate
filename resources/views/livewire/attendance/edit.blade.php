<div class="py-12">

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
                Edit Attendance
            </h2>


            {{-- Validation Errors --}}

            @if($errors->any())

                <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">

                    <ul class="list-disc pl-5">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- Edit Attendance Form --}}

            <form wire:submit.prevent="update">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    {{-- Member --}}

                    <div>

                        <label class="block mb-2 font-medium">

                            Member

                        </label>


                        <select
                            wire:model="member_id"
                            class="w-full rounded-lg border-gray-300"
                        >

                            <option value="">
                                Select Member
                            </option>


                            @foreach($members as $member)

                                <option value="{{ $member->id }}">

                                    {{ $member->first_name }}
                                    {{ $member->last_name }}

                                </option>

                            @endforeach

                        </select>


                        @error('member_id')

                            <p class="text-red-500 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>


                    {{-- Attendance Date --}}

                    <div>

                        <label class="block mb-2 font-medium">

                            Attendance Date

                        </label>


                        <input
                            type="date"
                            wire:model="attendance_date"
                            class="w-full rounded-lg border-gray-300"
                        >


                        @error('attendance_date')

                            <p class="text-red-500 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>


                    {{-- Service Type --}}

                    <div>

                        <label class="block mb-2 font-medium">

                            Service Type

                        </label>


                        <select
                            wire:model="service_type"
                            class="w-full rounded-lg border-gray-300"
                        >

                            <option value="">
                                Select Service
                            </option>


                            <option value="Sunday Service">
                                Sunday Service
                            </option>


                            <option value="Bible Study">
                                Bible Study
                            </option>


                            <option value="Prayer Meeting">
                                Prayer Meeting
                            </option>


                            <option value="Youth Meeting">
                                Youth Meeting
                            </option>


                            <option value="Special Event">
                                Special Event
                            </option>

                        </select>


                        @error('service_type')

                            <p class="text-red-500 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>


                    {{-- Status --}}

                    <div>

                        <label class="block mb-2 font-medium">

                            Status

                        </label>


                        <select
                            wire:model="status"
                            class="w-full rounded-lg border-gray-300"
                        >

                            <option value="Present">
                                Present
                            </option>


                            <option value="Absent">
                                Absent
                            </option>


                            <option value="Visitor">
                                Visitor
                            </option>

                        </select>


                        @error('status')

                            <p class="text-red-500 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>


                    {{-- Notes --}}

                    <div class="md:col-span-2">

                        <label class="block mb-2 font-medium">

                            Notes

                        </label>


                        <textarea
                            wire:model="notes"
                            rows="4"
                            class="w-full rounded-lg border-gray-300"
                        ></textarea>


                        @error('notes')

                            <p class="text-red-500 mt-1">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>


                </div>


                {{-- Buttons --}}

                <div class="mt-8 flex gap-3">


                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
                    >

                        Update Attendance

                    </button>


                    <a
                        href="{{ route('attendance.index') }}"
                        class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg"
                    >

                        Cancel

                    </a>


                </div>


            </form>

        </div>

    </div>

</div>