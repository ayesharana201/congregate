<?php

namespace App\Livewire\Donations;

use App\Models\Donation;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Show extends Component
{
    public Donation $donation;

    public function mount(Donation $donation)
    {
        $organizationId = Auth::user()->organization_id;

        // Make sure the donation belongs to the user's organization
        if ($donation->organization_id !== $organizationId) {
            abort(403);
        }

        $this->donation = $donation->load('member');
    }

    public function render()
    {
        return view('livewire.donations.show');
    }
}