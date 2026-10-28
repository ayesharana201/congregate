<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Barryvdh\DomPDF\Facade\Pdf;

class DonationReceiptController extends Controller
{
    public function generate(Donation $donation)
    {
        $pdf = Pdf::loadView(
            'pdf.receipt',
            [
                'donation' => $donation
            ]
        );

        return $pdf->download(
            'Receipt-'.$donation->id.'.pdf'
        );
    }
}