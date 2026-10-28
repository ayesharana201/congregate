<?php

namespace App\Livewire\Members;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public string $status = '';

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'status' => [
            'except' => '',
        ],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    public function delete(Member $member): void
    {
        // Security check:
        // Only allow deletion of members belonging
        // to the currently logged-in user's organization.
        if (
            $member->organization_id !==
            Auth::user()->organization_id
        ) {
            abort(403);
        }

        $member->delete();

        session()->flash(
            'success',
            'Member deleted successfully.'
        );

        $this->resetPage();
    }

    public function render()
    {
        $organizationId = Auth::user()->organization_id;

        $query = Member::where(
            'organization_id',
            $organizationId
        );

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($this->search !== '') {

            $search = '%' . $this->search . '%';

            $query->where(function ($q) use ($search) {

                $q->where(
                    'first_name',
                    'like',
                    $search
                )
                ->orWhere(
                    'last_name',
                    'like',
                    $search
                )
                ->orWhere(
                    'email',
                    'like',
                    $search
                )
                ->orWhere(
                    'phone',
                    'like',
                    $search
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($this->status !== '') {

            $query->where(
                'membership_status',
                $this->status
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Members
        |--------------------------------------------------------------------------
        */

        $members = $query
            ->latest()
            ->paginate(10);


        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalMembers = Member::where(
            'organization_id',
            $organizationId
        )->count();


        $activeMembers = Member::where(
            'organization_id',
            $organizationId
        )
            ->where(
                'membership_status',
                'Active'
            )
            ->count();


        $inactiveMembers = Member::where(
            'organization_id',
            $organizationId
        )
            ->where(
                'membership_status',
                'Inactive'
            )
            ->count();


        $visitors = Member::where(
            'organization_id',
            $organizationId
        )
            ->where(
                'membership_status',
                'Visitor'
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view(
            'livewire.members.index',
            [
                'members' => $members,
                'totalMembers' => $totalMembers,
                'activeMembers' => $activeMembers,
                'inactiveMembers' => $inactiveMembers,
                'visitors' => $visitors,
            ]
        );
    }
}