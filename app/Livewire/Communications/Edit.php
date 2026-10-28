<?php

namespace App\Livewire\Communications;

use App\Models\Communication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Edit extends Component
{
    public Communication $communication;

    public $title = '';

    public $message = '';

    public $type = 'Announcement';

    public $sent_to = 'All Members';

    public function mount(Communication $communication)
    {
        if (
            $communication->organization_id !==
            Auth::user()->organization_id
        ) {
            abort(403);
        }

        $this->communication = $communication;

        $this->title = $communication->title;

        $this->message = $communication->message;

        $this->type = $communication->type;

        $this->sent_to = $communication->sent_to;
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',

            'message' => 'required|string',

            'type' => 'required|in:Announcement,Reminder,Event Notification',

            'sent_to' => 'required|string|max:255',
        ]);

        $this->communication->update($validated);

        session()->flash(
            'success',
            'Communication updated successfully.'
        );

        return redirect()->route(
            'communications.index'
        );
    }

    public function render()
    {
        return view(
            'livewire.communications.edit'
        );
    }
}