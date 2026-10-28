<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body style="font-family:Arial,sans-serif">

<h2>Hello {{ $donation->member->first_name }},</h2>

<p>
Your donation has been approved successfully.
</p>

<table cellpadding="8">

<tr>
<td><strong>Donation Type</strong></td>
<td>{{ $donation->donation_type }}</td>
</tr>

<tr>
<td><strong>Amount</strong></td>
<td>${{ number_format($donation->amount,2) }}</td>
</tr>

<tr>
<td><strong>Date</strong></td>
<td>{{ $donation->donation_date->format('d M Y') }}</td>
</tr>

</table>

<p>
Thank you for supporting our organization.
</p>

<p>
Regards,<br>
Congregate
</p>

</body>

</html>