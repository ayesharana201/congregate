<?php

namespace App\Livewire\Donations;

use App\Models\Donation;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Edit extends Component
{
    public Donation $donation;

    public $member_id = '';
    public $amount = '';
    public $donation_type = 'Tithe';
    public $donation_date;
    public $payment_method = 'Cash';
    public $reference_number = '';
    public $notes = '';

    public function mount(Donation $donation)
    {
        // Make sure the donation belongs to the logged-in user's organization
        if ($donation->organization_id !== Auth::user()->organization_id) {
            abort(403);
        }

        $this->donation = $donation;

        // Load existing donation data into the form
        $this->member_id = $donation->member_id;
        $this->amount = $donation->amount;
        $this->donation_type = $donation->donation_type;
        $this->donation_date = $donation->donation_date
            ? $donation->donation_date->format('Y-m-d')
            : now()->format('Y-m-d');
        $this->payment_method = $donation->payment_method;
        $this->reference_number = $donation->reference_number;
        $this->notes = $donation->notes;
    }

    public function update()
    {
        $validated = $this->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0.01',
            'donation_type' => 'required|string|max:255',
            'donation_date' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'reference_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $organizationId = Auth::user()->organization_id;

        // Make sure selected member belongs to the same organization
        $member = Member::where('id', $validated['member_id'])
            ->where('organization_id', $organizationId)
            ->first();

        if (!$member) {
            $this->addError(
                'member_id',
                'The selected member does not belong to your organization.'
            );

            return;
        }

        // Update donation
        $this->donation->update($validated);

        session()->flash(
            'success',
            'Donation updated successfully.'
        );

        return redirect()->route('donations.index');
    }

    public function render()
    {
        $members = Member::where(
            'organization_id',
            Auth::user()->organization_id
        )
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->get();

        return view('livewire.donations.edit', [
            'members' => $members,
        ]);
    }
}