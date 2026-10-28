<?php

use Illuminate\Support\Facades\Route;
use App\Models\Communication;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Member;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\MemberLoginController;
use App\Livewire\MemberPortal\ChangePassword;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome')->name('home');

Route::view('/login-choice', 'auth.login-choice')
    ->name('login.choice');

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Authentication
    |--------------------------------------------------------------------------
    */

    Route::view('/admin/login', 'auth.admin-login')
        ->name('admin.login');

    Route::post('/admin/login', [AdminLoginController::class, 'login'])
        ->name('admin.login.submit');

    Route::get('/admin/register', [AdminRegisterController::class, 'create'])
        ->name('admin.register');

    Route::post('/admin/register', [AdminRegisterController::class, 'store'])
        ->name('admin.register.store');



    /*
    |--------------------------------------------------------------------------
    | Member Authentication
    |--------------------------------------------------------------------------
    */

    Route::view('/member/login', 'auth.member-login')
        ->name('member.login');

    Route::post('/member/login', [MemberLoginController::class, 'login'])
        ->name('member.login.submit');
});

/*
|--------------------------------------------------------------------------
| Breeze Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', function () {

        return view('admin.dashboard', [

            'totalMembers'        => Member::count(),
            'totalDonations'      => Donation::sum('amount'),
            'upcomingEventsCount' => Event::where('status', 'Upcoming')->count(),
            'totalCommunications' => Communication::count(),
            'upcomingEvents'      => Event::where('status', 'Upcoming')
                ->orderBy('event_date')
                ->take(5)
                ->get(),

        ]);

    })->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Members
    |--------------------------------------------------------------------------
    */

    Route::get('/members', \App\Livewire\Members\Index::class)->name('members.index');
    Route::get('/members/create', \App\Livewire\Members\Create::class)->name('members.create');
    Route::get('/members/{member}', \App\Livewire\Members\Show::class)->name('members.show');
    Route::get('/members/{member}/edit', \App\Livewire\Members\Edit::class)->name('members.edit');

    /*
    |--------------------------------------------------------------------------
    | Donations
    |--------------------------------------------------------------------------
    */

    Route::get('/donations', \App\Livewire\Donations\Index::class)->name('donations.index');
    Route::get('/donations/create', \App\Livewire\Donations\Create::class)->name('donations.create');
    Route::get('/donations/{donation}', \App\Livewire\Donations\Show::class)->name('donations.show');
    Route::get('/donations/{donation}/edit', \App\Livewire\Donations\Edit::class)->name('donations.edit');
    Route::get('/donations/{donation}/receipt', \App\Livewire\Donations\Receipt::class)->name('donations.receipt');

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    Route::get('/events', \App\Livewire\Events\Index::class)->name('events.index');
    Route::get('/events/create', \App\Livewire\Events\Create::class)->name('events.create');
    Route::get('/events/{event}/edit', \App\Livewire\Events\Edit::class)->name('events.edit');

    /*
    |--------------------------------------------------------------------------
    | Communications
    |--------------------------------------------------------------------------
    */

    Route::get('/communications', \App\Livewire\Communications\Index::class)->name('communications.index');
    Route::get('/communications/create', \App\Livewire\Communications\Create::class)->name('communications.create');
    Route::get('/communications/{communication}/edit', \App\Livewire\Communications\Edit::class)->name('communications.edit');

    /*
    |--------------------------------------------------------------------------
    | Attendance
    |--------------------------------------------------------------------------
    */

    Route::get('/attendance', \App\Livewire\Attendance\Index::class)->name('attendance.index');
    Route::get('/attendance/create', \App\Livewire\Attendance\Create::class)->name('attendance.create');
    Route::get('/attendance/{attendance}/edit', \App\Livewire\Attendance\Edit::class)->name('attendance.edit');

    /*
    |--------------------------------------------------------------------------
    | Statements
    |--------------------------------------------------------------------------
    */

    Route::get('/statements', \App\Livewire\Statements\Index::class)->name('statements.index');
    Route::get('/statements/{member}', \App\Livewire\Statements\Show::class)->name('statements.show');

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::get('/reports', \App\Livewire\Reports\Index::class)->name('reports.index');

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    */

    Route::get('/settings', \App\Livewire\Settings\Index::class)->name('settings.index');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::view('/profile', 'profile')->name('profile');

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
        ->name('admin.logout');

});

/*
|--------------------------------------------------------------------------
| Member Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'member'])->group(function () {


    Route::get(
    '/member/profile',
    \App\Livewire\MemberPortal\Profile::class
)->name('member.profile');

    Route::get('/member/change-password', ChangePassword::class)
        ->name('member.change-password');

    Route::get('/member-portal', \App\Livewire\MemberPortal\Index::class)
        ->name('member-portal');

    Route::get('/member/donations', \App\Livewire\MemberPortal\Donations\Index::class)
    ->name('member.donations.index');

Route::get(
    '/member/donations/create',
    \App\Livewire\MemberPortal\Donations\Create::class
)->name('member.donations.create');


Route::get(
    '/member/donations/statement',
    [\App\Http\Controllers\DonationStatementController::class, 'memberStatement']
)->name('member.donations.statement');


Route::get(
    '/member/statement',
    \App\Livewire\MemberPortal\Statement::class
)->name('member.statement');

Route::get(
    '/member/events',
    \App\Livewire\MemberPortal\Events\Index::class
)->name('member.events.index');

Route::get(
    '/member/attendance',
    \App\Livewire\MemberPortal\Attendance\Index::class
)->name('member.attendance.index');

Route::get(
    '/member/attendance/create',
    \App\Livewire\MemberPortal\Attendance\Create::class
)->name('member.attendance.create');

Route::get(
    '/member/announcements',
    \App\Livewire\MemberPortal\Announcements::class
)->name('member.announcements');



    Route::post('/member/logout', [MemberLoginController::class, 'logout'])
        ->name('member.logout');
});