<?php

namespace App\Livewire\MemberPortal;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Profile extends Component
{
    public Member $member;

    public function mount(): void
    {
        $user = Auth::user();

        $this->member = Member::where('user_id', $user->id)
            ->where('organization_id', $user->organization_id)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.member-portal.profile');
    }
}