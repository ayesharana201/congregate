<?php

namespace App\Livewire\MemberPortal;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Member;
use App\Models\Communication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        $user = Auth::user();

        // Find the member profile connected to the logged-in user
        $member = Member::where('user_id', $user->id)
            ->where('organization_id', $user->organization_id)
            ->first();

        // If no member profile is connected to this user
        if (!$member) {
            abort(404, 'Member profile not found.');
        }

        // Get the member's latest donations
        $donations = Donation::where(
            'organization_id',
            $user->organization_id
        )
            ->where(
                'member_id',
                $member->id
            )
            ->orderByDesc('donation_date')
            ->take(5)
            ->get();

        // Calculate total donations
        $totalDonations = Donation::where(
            'organization_id',
            $user->organization_id
        )
            ->where(
                'member_id',
                $member->id
            )
            ->sum('amount');

        // Get upcoming events
        $upcomingEvents = Event::where(
            'organization_id',
            $user->organization_id
        )
            ->whereDate(
                'event_date',
                '>=',
                now()->toDateString()
            )
            ->where(
                'status',
                'Upcoming'
            )
            ->orderBy('event_date')
            ->orderBy('start_time')
            ->take(5)
            ->get();
           

            // Get event notifications for this member's organization
$notifications = Communication::where(
    'organization_id',
    $user->organization_id
)
    ->where('type', 'Event Notification')
    ->where('sent_to', 'All Members')
    ->latest('sent_at')
    ->take(5)
    ->get();

$notificationCount = Communication::where(
    'organization_id',
    $user->organization_id
)
    ->where('type', 'Event Notification')
    ->where('sent_to', 'All Members')
    ->count();



        return view(
    'livewire.member-portal.index',
    [
        'member' => $member,
        'donations' => $donations,
        'totalDonations' => $totalDonations,
        'upcomingEvents' => $upcomingEvents,
        'notifications' => $notifications,
        'notificationCount' => $notificationCount,
    ]
);
    }
}