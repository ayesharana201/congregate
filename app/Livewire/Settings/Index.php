<?php

namespace App\Livewire\Settings;

use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    public Organization $organization;

    public $name = '';
    public $primary_contact_email = '';
    public $timezone = '';
    public $currency_code = '';

    public function mount()
    {
        $this->organization = Organization::findOrFail(
            Auth::user()->organization_id
        );

        $this->name = $this->organization->name;
        $this->primary_contact_email = $this->organization->primary_contact_email;
        $this->timezone = $this->organization->timezone;
        $this->currency_code = $this->organization->currency_code;
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'primary_contact_email' => 'nullable|email|max:255',
            'timezone' => 'nullable|string|max:100',
            'currency_code' => 'nullable|string|max:10',
        ]);

        $this->organization->update($validated);

        session()->flash('success', 'Organization settings updated successfully.');
    }

    public function render()
    {
        return view('livewire.settings.index');
    }
}