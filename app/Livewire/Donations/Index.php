<?php

namespace App\Livewire\Donations;

use App\Models\Donation;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Mail\DonationApprovedMail;

#[Layout('layouts.app')]
class Index extends Component
{
    public function approve($id)
    {
        $donation = Donation::findOrFail($id);

        $donation->status = 'Approved';
        $donation->save();

        Mail::to($donation->member->email)
            ->send(new DonationApprovedMail($donation));

        session()->flash(
            'success',
            'Donation approved successfully.'
        );
    }

    public function reject($id)
    {
        $donation = Donation::findOrFail($id);

        $donation->status = 'Rejected';
        $donation->save();

        session()->flash(
            'success',
            'Donation rejected.'
        );
    }

    public function render()
    {
        return view('livewire.donations.index', [
            'donations' => Donation::with('member')
                ->latest()
                ->get(),
        ]);
    }
}