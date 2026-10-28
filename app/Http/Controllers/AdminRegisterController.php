<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminRegisterController extends Controller
{
    /**
     * Show registration page.
     */
    public function create()
    {
        return view('livewire.pages.auth.register');
    }

    /**
     * Register a new organization and administrator.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organization_name' => ['required', 'string', 'max:255'],
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'          => ['required', 'confirmed', 'min:8'],
        ]);

        DB::beginTransaction();

        try {

            // Create Organization
            $organization = Organization::create([
    'name' => $request->organization_name,
    'slug' => Str::slug($request->organization_name) . '-' . time(),
    'primary_contact_email' => $request->email,
]);

            // Create Administrator
            $user = User::create([
    'organization_id' => $organization->id,
    'name'            => $request->name,
    'email'           => $request->email,
    'role'            => 'organization_admin',
    'password'        => Hash::make($request->password),
]);

            DB::commit();

            Auth::login($user);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Organization created successfully.');

        } 
        
    catch (\Throwable $e) {

    DB::rollBack();

    dd($e->getMessage(), $e->getTraceAsString());
}
    }
}