<?php

namespace App\Livewire\MemberPortal\Donations;

use App\Models\Donation;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Create extends Component
{
    public $amount = '';
    public $donation_type = 'Tithe';
    public $payment_method = 'Cash';
    public $reference_number = '';
    public $notes = '';

    public function save()
    {
        $this->validate([
            'amount' => 'required|numeric|min:1',
            'donation_type' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'reference_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $user = Auth::user();

        $member = Member::where('user_id', $user->id)->first();

        if (!$member) {
            session()->flash('error', 'Member profile not found.');
            return;
        }

        Donation::create([
            'organization_id' => $user->organization_id,
            'member_id' => $member->id,
            'amount' => $this->amount,
            'donation_type' => $this->donation_type,
            'donation_date' => now()->toDateString(),
            'payment_method' => $this->payment_method,
            'reference_number' => $this->reference_number,
            'notes' => $this->notes,
            'status' => 'Pending',
        ]);

        session()->flash(
            'success',
            'Your donation has been submitted successfully and is awaiting administrator approval.'
        );

        return redirect()->route('member.donations.index');
    }

    public function render()
    {
        return view('livewire.member-portal.donations.create');
    }
}