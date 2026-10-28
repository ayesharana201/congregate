<?php

namespace App\Livewire;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();

        $organizationId = $user->organization_id;

        /*
        |--------------------------------------------------------------------------
        | Total Members
        |--------------------------------------------------------------------------
        */

        $totalMembers = Member::where(
            'organization_id',
            $organizationId
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Total Donations
        |--------------------------------------------------------------------------
        */

        $totalDonations = Donation::where(
            'organization_id',
            $organizationId
        )->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | Upcoming Events Count
        |--------------------------------------------------------------------------
        */

        $upcomingEventsCount = Event::where(
            'organization_id',
            $organizationId
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
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Upcoming Events List
        |--------------------------------------------------------------------------
        */

        $upcomingEvents = Event::where(
            'organization_id',
            $organizationId
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
            ->orderBy(
                'event_date',
                'asc'
            )
            ->orderBy(
                'start_time',
                'asc'
            )
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Return Dashboard View
        |--------------------------------------------------------------------------
        */

        return view(
            'livewire.dashboard',
            [
                'totalMembers' => $totalMembers,
                'totalDonations' => $totalDonations,
                'upcomingEventsCount' => $upcomingEventsCount,
                'upcomingEvents' => $upcomingEvents,
            ]
        );
    }
}