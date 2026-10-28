<?php

namespace App\Livewire\Members;

use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class Edit extends Component
{
    use WithFileUploads;

    public Member $member;

    public string $first_name = '';
    public string $last_name = '';
    public ?string $gender = null;
    public ?string $date_of_birth = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $address = null;
    public ?string $joined_at = null;
    public ?string $baptism_date = null;
    public string $membership_status = 'Active';

    // New uploaded photo only
    public $photo = null;

    public function mount(Member $member): void
    {
        $this->member = $member;

        $this->first_name = $member->first_name ?? '';
        $this->last_name = $member->last_name ?? '';
        $this->gender = $member->gender;
        $this->date_of_birth = $member->date_of_birth?->format('Y-m-d');
        $this->email = $member->email;
        $this->phone = $member->phone;
        $this->address = $member->address;
        $this->joined_at = $member->joined_at?->format('Y-m-d');
        $this->baptism_date = $member->baptism_date?->format('Y-m-d');
        $this->membership_status = $member->membership_status ?? 'Active';
    }

    public function update(): void
    {
        $validated = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'nullable|in:Male,Female',
            'date_of_birth' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'joined_at' => 'nullable|date',
            'baptism_date' => 'nullable|date',
            'membership_status' => 'required|in:Active,Inactive,Visitor',
            'photo' => 'nullable|image|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Photo Only If A New Photo Was Uploaded
        |--------------------------------------------------------------------------
        */

        if ($this->photo) {

            // Save the new photo first
            $newPhotoPath = $this->photo->store('members', 'public');

            // Delete old photo after new photo is successfully stored
            if (
                $this->member->photo &&
                Storage::disk('public')->exists($this->member->photo)
            ) {
                Storage::disk('public')->delete($this->member->photo);
            }

            // Update photo field
            $validated['photo'] = $newPhotoPath;
        } else {

            // No new photo uploaded.
            // Remove photo from validated data so existing photo is preserved.
            unset($validated['photo']);
        }

        /*
        |--------------------------------------------------------------------------
        | Update Member
        |--------------------------------------------------------------------------
        */

        $this->member->update($validated);

        session()->flash(
            'success',
            'Member updated successfully.'
        );

        $this->redirectRoute(
            'members.index',
            navigate: true
        );
    }

    public function render()
    {
        return view('livewire.members.edit');
    }
}