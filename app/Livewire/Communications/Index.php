<?php

namespace App\Livewire\Communications;

use App\Models\Communication;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    public function send(Communication $communication)
    {
        if (
            $communication->organization_id
            !== Auth::user()->organization_id
        ) {
            abort(403);
        }

        if ($communication->sent_at) {
            session()->flash(
                'error',
                'This communication has already been sent.'
            );

            return;
        }

        $communication->update([
            'sent_at' => now(),
        ]);

        session()->flash(
            'success',
            'Communication sent successfully.'
        );
    }


    public function delete(Communication $communication)
    {
        if (
            $communication->organization_id
            !== Auth::user()->organization_id
        ) {
            abort(403);
        }

        $communication->delete();

        session()->flash(
            'success',
            'Communication deleted successfully.'
        );
    }


    public function render()
    {
        $communications = Communication::where(
            'organization_id',
            Auth::user()->organization_id
        )
            ->latest()
            ->get();

        return view(
            'livewire.communications.index',
            [
                'communications' => $communications,
            ]
        );
    }
}