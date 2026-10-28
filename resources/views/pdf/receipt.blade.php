<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:14px;
            color:#333;
        }

        h1{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        td{
            border:1px solid #ddd;
            padding:10px;
        }

        .header{
            text-align:center;
            margin-bottom:25px;
        }

        .footer{
            margin-top:40px;
            text-align:center;
        }

    </style>

</head>

<body>

<div class="header">

<h1>CONGREGATE</h1>

<h3>Donation Receipt</h3>

</div>

<table>

<tr>

<td><strong>Receipt #</strong></td>

<td>

REC-{{ now()->format('Ymd') }}-{{ str_pad($donation->id,5,'0',STR_PAD_LEFT) }}

</td>

</tr>

<tr>

<td>Member</td>

<td>

{{ $donation->member->first_name }}
{{ $donation->member->last_name }}

</td>

</tr>

<tr>

<td>Email</td>

<td>

{{ $donation->member->email }}

</td>

</tr>

<tr>

<td>Donation Type</td>

<td>

{{ $donation->donation_type }}

</td>

</tr>

<tr>

<td>Amount</td>

<td>

${{ number_format($donation->amount,2) }}

</td>

</tr>

<tr>

<td>Payment Method</td>

<td>

{{ $donation->payment_method }}

</td>

</tr>

<tr>

<td>Reference Number</td>

<td>

{{ $donation->reference_number ?? '-' }}

</td>

</tr>

<tr>

<td>Date</td>

<td>

{{ $donation->donation_date->format('d M Y') }}

</td>

</tr>

<tr>

<td>Status</td>

<td>

{{ $donation->status }}

</td>

</tr>

</table>

<div class="footer">

<p>

Thank you for your generous contribution.

</p>

<br><br>

__________________________

<br>

Authorized Signature

</div>

</body>

</html>