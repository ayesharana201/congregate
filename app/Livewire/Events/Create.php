<?php

namespace App\Livewire\Events;

use App\Models\Event;
use App\Models\Communication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Create extends Component
{
    public $title = '';
    public $description = '';
    public $event_date = '';
    public $start_time = '';
    public $end_time = '';
    public $location = '';
    public $status = 'Upcoming';

    public function mount()
    {
        $this->event_date = now()->format('Y-m-d');
    }

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:Upcoming,Completed,Cancelled',
        ]);

        $validated['organization_id'] = Auth::user()->organization_id;

        /*
        |--------------------------------------------------------------------------
        | CREATE EVENT
        |--------------------------------------------------------------------------
        */

        $event = Event::create($validated);

        /*
        |--------------------------------------------------------------------------
        | CREATE MEMBER NOTIFICATION
        |--------------------------------------------------------------------------
        */

        Communication::create([
    'organization_id' => Auth::user()->organization_id,
    'event_id' => $event->id,
    'title' => 'New Event: ' . $event->title,
    'message' => 'A new event has been added: '
        . $event->title
        . ' on '
        . $event->event_date->format('d M Y')
        . '. Location: '
        . ($event->location ?: 'To be announced'),
    'type' => 'Event Notification',
    'sent_to' => 'All Members',
    'sent_at' => now(),
]);
        /*
        |--------------------------------------------------------------------------
        | SUCCESS MESSAGE
        |--------------------------------------------------------------------------
        */

        session()->flash(
            'success',
            'Event created successfully and members have been notified.'
        );

        return redirect()->route('events.index');
    }

    public function render()
    {
        return view('livewire.events.create');
    }
}