<?php

namespace App\Livewire\Attendance;

use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Edit extends Component
{
    public Attendance $attendance;

    public $member_id;

    public $attendance_date;

    public $service_type;

    public $status;

    public $notes;


    public function mount(Attendance $attendance)
    {
        if (
            $attendance->organization_id !==
            Auth::user()->organization_id
        ) {
            abort(403);
        }

        $this->attendance = $attendance;

        $this->member_id = $attendance->member_id;

        $this->attendance_date =
            $attendance->attendance_date->format('Y-m-d');

        $this->service_type =
            $attendance->service_type;

        $this->status =
            $attendance->status;

        $this->notes =
            $attendance->notes;
    }


    public function update()
    {
        $validated = $this->validate([

            'member_id' =>
                'required|exists:members,id',

            'attendance_date' =>
                'required|date',

            'service_type' => [
                'required',
                'in:Sunday Service,Bible Study,Prayer Meeting,Youth Meeting,Special Event',
            ],

            'status' => [
                'required',
                'in:Present,Absent,Visitor',
            ],

            'notes' =>
                'nullable|string',

        ]);


        $member = Member::where(
            'id',
            $this->member_id
        )
            ->where(
                'organization_id',
                Auth::user()->organization_id
            )
            ->firstOrFail();


        $this->attendance->update([

            'member_id' =>
                $member->id,

            'attendance_date' =>
                $validated['attendance_date'],

            'service_type' =>
                $validated['service_type'],

            'status' =>
                $validated['status'],

            'notes' =>
                $validated['notes'],

        ]);


        session()->flash(
            'success',
            'Attendance updated successfully.'
        );


        return redirect()->route(
            'attendance.index'
        );
    }


    public function render()
    {
        $members = Member::where(
            'organization_id',
            Auth::user()->organization_id
        )
            ->orderBy(
                'first_name'
            )
            ->get();


        return view(
            'livewire.attendance.edit',
            [
                'members' =>
                    $members,
            ]
        );
    }
}