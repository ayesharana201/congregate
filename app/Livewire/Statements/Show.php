<?php

namespace App\Livewire\Statements;

use App\Models\Donation;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Show extends Component
{
    public Member $member;

    public $from = '';
    public $to = '';

    public function mount(Member $member)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Organization Security
        |--------------------------------------------------------------------------
        |
        | Make sure the member belongs to the same organization
        | as the logged-in user.
        |
        */

        if ($member->organization_id !== $user->organization_id) {
            abort(403, 'You are not authorized to access this page.');
        }


        /*
        |--------------------------------------------------------------------------
        | Member Security
        |--------------------------------------------------------------------------
        |
        | Normal members can ONLY view their own statement.
        |
        | Admins can view any member within their organization.
        |
        */

        if ($user->role !== 'organization_admin') {

            if ($member->user_id !== $user->id) {
                abort(403, 'You are not authorized to access this page.');
            }

        }


        /*
        |--------------------------------------------------------------------------
        | Set Member
        |--------------------------------------------------------------------------
        */

        $this->member = $member;


        /*
        |--------------------------------------------------------------------------
        | Default Date Range
        |--------------------------------------------------------------------------
        |
        | Current year until today.
        |
        */

        $this->from = now()
            ->startOfYear()
            ->format('Y-m-d');

        $this->to = now()
            ->format('Y-m-d');
    }


    public function render()
    {
        $organizationId = Auth::user()->organization_id;


        /*
        |--------------------------------------------------------------------------
        | Get Donations
        |--------------------------------------------------------------------------
        |
        | Only donations belonging to this member and organization
        | are included.
        |
        */

        $query = Donation::where('organization_id', $organizationId)
            ->where('member_id', $this->member->id);


        /*
        |--------------------------------------------------------------------------
        | Filter From Date
        |--------------------------------------------------------------------------
        */

        if ($this->from) {

            $query->whereDate(
                'donation_date',
                '>=',
                $this->from
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Filter To Date
        |--------------------------------------------------------------------------
        */

        if ($this->to) {

            $query->whereDate(
                'donation_date',
                '<=',
                $this->to
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Get Donations
        |--------------------------------------------------------------------------
        */

        $donations = $query
            ->orderByDesc('donation_date')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Calculate Total
        |--------------------------------------------------------------------------
        */

        $total = $donations->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | Return Statement View
        |--------------------------------------------------------------------------
        */

        return view('livewire.statements.show', [
            'donations' => $donations,
            'total' => $total,
        ]);
    }
}