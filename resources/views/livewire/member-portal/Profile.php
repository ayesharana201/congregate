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
        $this->member = Member::where('user_id', Auth::id())
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.member-portal.profile');
    }
}