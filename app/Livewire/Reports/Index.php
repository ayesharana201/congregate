<?php

namespace App\Livewire\Reports;

use App\Models\Attendance;
use App\Models\Communication;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        $organizationId = Auth::user()->organization_id;


        $recentDonations = Donation::where(
            'organization_id',
            $organizationId
        )
            ->with('member')
            ->latest('donation_date')
            ->take(5)
            ->get();


        $upcomingEvents = Event::where(
            'organization_id',
            $organizationId
        )
            ->where(
                'status',
                'Upcoming'
            )
            ->whereDate(
                'event_date',
                '>=',
                now()->toDateString()
            )
            ->orderBy(
                'event_date'
            )
            ->take(5)
            ->get();


        $recentAttendance = Attendance::where(
            'organization_id',
            $organizationId
        )
            ->with('member')
            ->latest('attendance_date')
            ->take(5)
            ->get();


        return view(
            'livewire.reports.index',
            [

                'totalMembers' =>
                    Member::where(
                        'organization_id',
                        $organizationId
                    )->count(),


                'totalDonations' =>
                    Donation::where(
                        'organization_id',
                        $organizationId
                    )->count(),


                'totalDonationAmount' =>
                    Donation::where(
                        'organization_id',
                        $organizationId
                    )->sum('amount'),


                'totalEvents' =>
                    Event::where(
                        'organization_id',
                        $organizationId
                    )->count(),


                'totalAttendance' =>
                    Attendance::where(
                        'organization_id',
                        $organizationId
                    )->count(),


                'totalCommunications' =>
                    Communication::where(
                        'organization_id',
                        $organizationId
                    )->count(),


                'recentDonations' =>
                    $recentDonations,


                'upcomingEvents' =>
                    $upcomingEvents,


                'recentAttendance' =>
                    $recentAttendance,

            ]
        );
    }
}