<?php

namespace App\Livewire\MemberPortal\Donations;

use App\Models\Donation;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $member = Member::where('user_id', Auth::id())->first();

        $donations = collect();

        if ($member) {
            $donations = Donation::where('member_id', $member->id)
                ->latest('donation_date')
                ->get();
        }

        return view('livewire.member-portal.donations.index', [
            'donations' => $donations,
        ]);
    }
}