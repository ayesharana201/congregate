<?php

namespace App\Livewire\Communications;

use App\Models\Communication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Create extends Component
{
    public $title = '';

    public $message = '';

    public $type = 'Announcement';

    public $sent_to = 'All Members';

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',

            'message' => 'required|string',

            'type' => 'required|in:Announcement,Reminder,Event Notification',

            'sent_to' => 'required|string|max:255',
        ]);

        $validated['organization_id'] = Auth::user()->organization_id;

        // Keep sent_at NULL because this communication
        // has only been created and has not been sent yet.
        $validated['sent_at'] = null;

        Communication::create($validated);

        session()->flash(
            'success',
            'Communication created successfully. It is currently a draft.'
        );

        return redirect()->route('communications.index');
    }

    public function render()
    {
        return view('livewire.communications.create');
    }
}