<?php

namespace App\Livewire\MemberPortal\Attendance;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function render()
    {
        $member = Member::where('user_id', Auth::id())->first();

        $attendance = collect();

        if ($member) {

            $attendance = Attendance::where('member_id', $member->id)
    ->with('event')
    ->orderByDesc('marked_at')
    ->get();
        }

        return view(
            'livewire.member-portal.attendance.index',
            compact('attendance')
        );
    }
}