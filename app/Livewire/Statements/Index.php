<?php

namespace App\Livewire\Statements;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        $organizationId = Auth::user()->organization_id;

        $members = Member::where(
            'organization_id',
            $organizationId
        )
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->get();

        return view('livewire.statements.index', [
            'members' => $members,
        ]);
    }
}