<div class="max-w-xl mx-auto py-12">

    <div class="bg-white rounded-lg shadow p-6">

        <h2 class="text-2xl font-bold mb-6">
            Change Your Password
        </h2>

        @if(session()->has('success'))
            <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="updatePassword">

            <div class="mb-4">
                <label>Current Password</label>

                <input
                    type="password"
                    wire:model="current_password"
                    class="w-full rounded border">

                @error('current_password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label>New Password</label>

                <input
                    type="password"
                    wire:model="password"
                    class="w-full rounded border">

                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label>Confirm Password</label>

                <input
                    type="password"
                    wire:model="password_confirmation"
                    class="w-full rounded border">
            </div>

            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">

                Update Password

            </button>

        </form>

    </div>

</div>