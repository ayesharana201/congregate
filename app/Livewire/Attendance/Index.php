<?php

namespace App\Livewire\Attendance;

use App\Models\Attendance;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    public $status = '';

    public function approve($id)
{
    $attendance = Attendance::findOrFail($id);

    $attendance->update([

        'status' => 'Present',

        'approved_by' => auth()->id(),

        'approved_at' => now(),

    ]);

    session()->flash(
        'success',
        'Attendance approved successfully.'
    );
}

    public function reject($id)
{
    $attendance = Attendance::findOrFail($id);

    $attendance->update([

        'status' => 'Absent',

        'approved_by' => auth()->id(),

        'approved_at' => now(),

    ]);

    session()->flash(
        'success',
        'Attendance rejected successfully.'
    );
}

    public function render()
    {
        $attendance = Attendance::with(['member', 'event'])

            ->when($this->search, function ($query) {

                $query->whereHas('member', function ($q) {

                    $q->where('first_name', 'like', "%{$this->search}%")
                      ->orWhere('last_name', 'like', "%{$this->search}%");

                });

            })

            ->when($this->status, function ($query) {

                $query->where('status', $this->status);

            })

            ->latest()

            ->get();

        return view('livewire.attendance.index', [
            'attendance' => $attendance,
        ]);
    }
}