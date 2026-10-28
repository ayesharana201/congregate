<?php

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public ?string $gender = null;
    public ?string $date_of_birth = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $address = null;
    public ?string $joined_at = null;
    public ?string $baptism_date = null;
    public string $membership_status = 'Active';

    public function save(): void
    {
        $validated = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'nullable|in:Male,Female',
            'date_of_birth' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'joined_at' => 'nullable|date',
            'baptism_date' => 'nullable|date',
            'membership_status' => 'required|in:Active,Inactive,Visitor',
        ]);

        $validated['organization_id'] = Auth::user()->organization_id;

        Member::create($validated);

        $this->reset([
            'first_name',
            'last_name',
            'gender',
            'date_of_birth',
            'email',
            'phone',
            'address',
            'joined_at',
            'baptism_date',
        ]);

        $this->membership_status = 'Active';

        $this->dispatch('member-created');
        $this->dispatch('close-modal', 'create-member');
    }
};

?>

<div>

    <x-primary-button
        x-on:click="$dispatch('open-modal', 'create-member')"
    >
        + Add Member
    </x-primary-button>

    <x-modal name="create-member" :show="false" maxWidth="2xl">

        <form wire:submit="save" class="p-6">

            <h2 class="text-xl font-bold mb-6">
                Add Member
            </h2>

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <x-input-label value="First Name"/>
                    <x-text-input class="w-full" wire:model="first_name"/>
                    <x-input-error :messages="$errors->get('first_name')"/>
                </div>

                <div>
                    <x-input-label value="Last Name"/>
                    <x-text-input class="w-full" wire:model="last_name"/>
                    <x-input-error :messages="$errors->get('last_name')"/>
                </div>

                <div>
                    <x-input-label value="Gender"/>
                    <select wire:model="gender" class="w-full border rounded-md">
                        <option value="">Select</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div>
                    <x-input-label value="Date of Birth"/>
                    <x-text-input type="date" class="w-full" wire:model="date_of_birth"/>
                </div>

                <div>
                    <x-input-label value="Email"/>
                    <x-text-input class="w-full" wire:model="email"/>
                </div>

                <div>
                    <x-input-label value="Phone"/>
                    <x-text-input class="w-full" wire:model="phone"/>
                </div>

                <div class="col-span-2">
                    <x-input-label value="Address"/>
                    <textarea wire:model="address"
                        class="w-full border rounded-md"></textarea>
                </div>

                <div>
                    <x-input-label value="Joined Date"/>
                    <x-text-input type="date" class="w-full" wire:model="joined_at"/>
                </div>

                <div>
                    <x-input-label value="Baptism Date"/>
                    <x-text-input type="date" class="w-full" wire:model="baptism_date"/>
                </div>

                <div>
                    <x-input-label value="Membership Status"/>
                    <select wire:model="membership_status"
                        class="w-full border rounded-md">
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Visitor</option>
                    </select>
                </div>

            </div>

            <div class="mt-6 flex justify-end gap-2">

                <x-secondary-button
                    x-on:click="$dispatch('close-modal', 'create-member')"
                    type="button"
                >
                    Cancel
                </x-secondary-button>

                <x-primary-button>
                    Save Member
                </x-primary-button>

            </div>

        </form>

    </x-modal>

</div>