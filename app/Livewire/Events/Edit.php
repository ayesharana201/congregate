<?php

namespace App\Livewire\Events;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Edit extends Component
{
    public Event $event;

    public $title = '';
    public $description = '';
    public $event_date = '';
    public $start_time = '';
    public $end_time = '';
    public $location = '';
    public $status = 'Upcoming';

    public function mount(Event $event)
    {
        $organizationId = Auth::user()->organization_id;

        // Make sure this event belongs to the user's organization
        if ($event->organization_id !== $organizationId) {
            abort(403);
        }

        $this->event = $event;

        $this->title = $event->title ?? '';
        $this->description = $event->description ?? '';

        $this->event_date = $event->event_date
            ? $event->event_date->format('Y-m-d')
            : '';

        $this->start_time = $event->start_time ?? '';
        $this->end_time = $event->end_time ?? '';
        $this->location = $event->location ?? '';
        $this->status = $event->status ?? 'Upcoming';
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:Upcoming,Completed,Cancelled',
        ]);

        // Double-check organization ownership
        if (
            $this->event->organization_id !==
            Auth::user()->organization_id
        ) {
            abort(403);
        }

        $this->event->update($validated);

        session()->flash(
            'success',
            'Event updated successfully.'
        );

        return redirect()->route('events.index');
    }

    public function render()
    {
        return view('livewire.events.edit');
    }
}