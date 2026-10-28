<?php

namespace App\Livewire\MemberPortal;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Statement extends Component
{
    public function render()
    {
        return view('livewire.member-portal.statement');
    }
}