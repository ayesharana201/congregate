<?php

namespace App\Livewire\MemberPortal\Attendance;

use Livewire\Component;
use App\Models\Event;
use App\Models\Member;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Create extends Component
{
    public $event_id = '';

    public $notes = '';

    public function save()
    {
        $this->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $member = Member::where('user_id', Auth::id())->first();

        if (!$member) {
            session()->flash('error', 'Member record not found.');
            return;
        }

        $event = Event::findOrFail($this->event_id);

        /*
        |--------------------------------------------------------------------------
        | Event Validation
        |--------------------------------------------------------------------------
        */

        // Upcoming Event
        if ($event->status == 'Upcoming') {

            session()->flash(
                'error',
                'You cannot mark attendance because this event has not started yet.'
            );

            return;
        }

        // Cancelled Event
        if ($event->status == 'Cancelled') {

            session()->flash(
                'error',
                'You cannot mark attendance because this event has been cancelled.'
            );

            return;
        }

        // Only Completed events are allowed
        if ($event->status != 'Completed') {

            session()->flash(
                'error',
                'Attendance can only be marked after an event has been completed.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Attendance
        |--------------------------------------------------------------------------
        */

        $exists = Attendance::where('member_id', $member->id)
            ->where('event_id', $event->id)
            ->exists();

        if ($exists) {

            session()->flash(
                'error',
                'You have already marked attendance for this event.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Save Attendance
        |--------------------------------------------------------------------------
        */

        Attendance::create([

            'organization_id' => Auth::user()->organization_id,

            'member_id' => $member->id,

            'event_id' => $event->id,

            'status' => 'Pending',

            'marked_by' => 'member',

            'marked_at' => now(),

            'notes' => $this->notes,

        ]);

        session()->flash(
            'success',
            'Attendance submitted successfully and is awaiting administrator approval.'
        );

        return redirect()->route('member.attendance.index');
    }

    public function render()
    {
        // Show ALL events so member can select any event.
        // Validation above decides whether attendance is allowed.

        $events = Event::where(
                'organization_id',
                Auth::user()->organization_id
            )
            ->orderByDesc('event_date')
            ->get();

        return view(
            'livewire.member-portal.attendance.create',
            compact('events')
        );
    }
}