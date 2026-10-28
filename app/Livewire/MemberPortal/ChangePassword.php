<?php

namespace App\Livewire\MemberPortal;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function updatePassword()
    {
        $this->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = Auth::user();

        if (! Hash::check($this->current_password, $user->password)) {

            $this->addError('current_password', 'Current password is incorrect.');

            return;
        }

        $user->password = Hash::make($this->password);
        $user->must_change_password = false;
        $user->save();

        session()->flash('success', 'Password updated successfully.');

        return redirect()->route('member-portal');
    }

    public function render()
    {
        return view('livewire.member-portal.change-password');
    }
}