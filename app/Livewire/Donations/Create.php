<?php

namespace App\Livewire\Donations;

use App\Models\Donation;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Create extends Component
{
    public $member_id = '';
    public $amount = '';
    public $donation_type = 'Tithe';
    public $donation_date;
    public $payment_method = 'Cash';
    public $reference_number = '';
    public $notes = '';

    public function mount()
    {
        $this->donation_date = now()->format('Y-m-d');
    }

    public function save()
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

        // Make sure the selected member belongs to the user's organization
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

        // Add organization ID to the donation
        $validated['organization_id'] = $organizationId;

        // Create the donation
        Donation::create($validated);

        // Show success message
        session()->flash(
            'success',
            'Donation recorded successfully.'
        );

        // Redirect to donations list
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

        return view('livewire.donations.create', [
            'members' => $members,
        ]);
    }
}