<?php

namespace App\Livewire\MemberPortal;

use Livewire\Component;
use App\Models\Communication;

class Announcements extends Component
{
    public function render()
    {
        return view('livewire.member-portal.announcements', [

            'announcements' => Communication::latest()
                ->take(20)
                ->get(),

        ]);
    }
}