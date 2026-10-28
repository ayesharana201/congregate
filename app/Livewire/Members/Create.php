<?php

namespace App\Livewire\Members;

use App\Mail\MemberWelcomeMail;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class Create extends Component
{
    use WithFileUploads;

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

    public $photo;

    public function save()
    {
        $validated = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'nullable|in:Male,Female',
            'date_of_birth' => 'nullable|date',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'joined_at' => 'nullable|date',
            'baptism_date' => 'nullable|date',
            'membership_status' => 'required|in:Active,Inactive,Visitor',
            'photo' => 'nullable|image|max:2048',
        ]);

        DB::beginTransaction();

        try {

            // Generate temporary password
            $temporaryPassword = Str::password(10);

            // Create member login account
            $user = User::create([
                'organization_id'      => Auth::user()->organization_id,
                'name'                 => $validated['first_name'].' '.$validated['last_name'],
                'email'                => $validated['email'],
                'role'                 => 'member',
                'password'             => Hash::make($temporaryPassword),
                'must_change_password' => true,
            ]);

            // Upload photo
            if ($this->photo) {
                $validated['photo'] = $this->photo->store('members', 'public');
            }

            // Create member record
            Member::create([
                'organization_id'   => Auth::user()->organization_id,
                'user_id'           => $user->id,
                'first_name'        => $validated['first_name'],
                'last_name'         => $validated['last_name'],
                'gender'            => $validated['gender'],
                'date_of_birth'     => $validated['date_of_birth'],
                'email'             => $validated['email'],
                'phone'             => $validated['phone'],
                'address'           => $validated['address'],
                'joined_at'         => $validated['joined_at'],
                'baptism_date'      => $validated['baptism_date'],
                'membership_status' => $validated['membership_status'],
                'photo'             => $validated['photo'] ?? null,
            ]);

            // Send welcome email
            Mail::to($user->email)->send(
                new MemberWelcomeMail(
                    $user,
                    $temporaryPassword
                )
            );

            DB::commit();

            session()->flash(
                'success',
                'Member created successfully. Login credentials have been sent to the member\'s email.'
            );

            $this->reset([
                'first_name',
                'last_name',
                'gender',
                'date_of_birth',
                'email',
                'phone',
                'address',
                'joined_at',
                'baptism_date',
                'photo',
            ]);

            $this->membership_status = 'Active';

        } catch (\Throwable $e) {

            DB::rollBack();

            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.members.create');
    }
}