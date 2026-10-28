<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Member;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DonationStatementController extends Controller
{
    public function memberStatement()
    {
        $member = Member::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $donations = Donation::where(
            'member_id',
            $member->id
        )
        ->orderBy('donation_date')
        ->get();

        $total = $donations->sum('amount');

        $pdf = Pdf::loadView(
            'pdf.member-statement',
            compact(
                'member',
                'donations',
                'total'
            )
        );

        return $pdf->download('Donation-Statement.pdf');
    }
    public function adminStatement(Member $member)
{
    $donations = Donation::where(
        'member_id',
        $member->id
    )
    ->orderBy('donation_date')
    ->get();

    $total = $donations->sum('amount');

    $pdf = Pdf::loadView(
        'pdf.member-statement',
        compact(
            'member',
            'donations',
            'total'
        )
    );

    $fileName =
'Statement-'
.$member->first_name
.'-'
.$member->last_name
.'.pdf';

return $pdf->download($fileName);
}
}