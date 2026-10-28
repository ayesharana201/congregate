<?php

namespace App\Livewire\Attendance;

use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Create extends Component
{
    public $member_id = '';
    public $attendance_date;
    public $service_type = 'Sunday Service';
    public $status = 'Present';
    public $notes = '';

    public function mount()
    {
        $this->attendance_date = now()->format('Y-m-d');
    }

    public function save()
    {
        $validated = $this->validate([
            'member_id' => 'required|exists:members,id',
            'attendance_date' => 'required|date',
            'service_type' => 'required|string',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $validated['organization_id'] = Auth::user()->organization_id;

        Attendance::create($validated);

        session()->flash('success', 'Attendance recorded successfully.');

        return redirect()->route('attendance.index');
    }

    public function render()
    {
        $members = Member::where(
            'organization_id',
            Auth::user()->organization_id
        )
        ->orderBy('first_name')
        ->get();

        return view('livewire.attendance.create', [
            'members' => $members,
        ]);
    }
}