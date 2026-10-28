<?php

namespace App\Livewire\MemberPortal\Events;

use App\Models\Event;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        $events = Event::where('status', 'Upcoming')
            ->orderBy('event_date')
            ->get();

        return view('livewire.member-portal.events.index', [
            'events' => $events,
        ]);
    }
}