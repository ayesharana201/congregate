<?php

namespace App\Livewire\Members;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Show extends Component
{
    public Member $member;

    public ?string $temporaryPassword = null;

    public ?string $successMessage = null;

    public ?string $errorMessage = null;

    public function mount(Member $member): void
    {
        $this->member = $member;
    }

    public function createLoginAccount(): void
    {
        $this->successMessage = null;
        $this->errorMessage = null;
        $this->temporaryPassword = null;

        // Check if this member already has a login account
        if ($this->member->user_id) {
            $this->errorMessage = 'This member already has a login account.';
            return;
        }

        // Check for email
        if (empty($this->member->email)) {
            $this->errorMessage = 'This member does not have an email address. Please add an email address first.';
            return;
        }

        // Check if email is already registered
        $existingUser = User::where(
            'email',
            $this->member->email
        )->first();

        if ($existingUser) {
            $this->errorMessage = 'This email address is already registered to another user.';
            return;
        }

        // Generate temporary password
        $password = Str::random(10);

        // Keep password available for display
        $this->temporaryPassword = $password;

        // Create user
        $user = User::create([
            'name' => trim(
                $this->member->first_name . ' ' . $this->member->last_name
            ),

            'email' => $this->member->email,

            'password' => Hash::make($password),

            'organization_id' => $this->member->organization_id,

            'role' => 'member',
        ]);

        // Connect user to member
        $this->member->user_id = $user->id;

        $this->member->save();

        // Refresh
        $this->member->refresh();

        // Success message
        $this->successMessage = 'Login account created successfully.';

        // Dispatch browser event to make sure Livewire updates
        $this->dispatch('login-account-created');
    }

    public function render()
    {
        return view('livewire.members.show');
    }
}