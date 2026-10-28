<?php

namespace App\Livewire\Events;

use App\Models\Event;
use App\Models\Communication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    
    public function delete(Event $event)
{
    if ($event->organization_id !== Auth::user()->organization_id) {
        abort(403);
    }

    // Delete the notification connected to this event
    Communication::where('event_id', $event->id)
        ->where('organization_id', Auth::user()->organization_id)
        ->delete();

    // Delete the event
    $event->delete();

    session()->flash(
        'success',
        'Event deleted successfully.'
    );
}

    public function render()
    {
        $organizationId = Auth::user()->organization_id;

        $events = Event::where(
            'organization_id',
            $organizationId
        )
            ->orderBy('event_date', 'desc')
            ->orderBy('start_time', 'desc')
            ->get();

        return view('livewire.events.index', [
            'events' => $events,
        ]);
    }
}