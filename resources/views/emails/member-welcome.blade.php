<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to Congregate</title>
</head>

<body style="margin:0;padding:0;background:#f3f4f6;font-family:Arial,Helvetica,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,.08);">

                    <!-- Header -->
                    <tr>
                        <td align="center"
                            style="background:#2563eb;padding:30px;color:#ffffff;">

                            <h1 style="margin:0;font-size:30px;">
                                Congregate
                            </h1>

                            <p style="margin-top:10px;font-size:16px;">
                                Religious Organization Management System
                            </p>

                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:40px;">

                            <h2 style="margin-top:0;color:#111827;">
                                Welcome {{ $user->name }}!
                            </h2>

                            <p style="color:#4b5563;font-size:16px;line-height:1.8;">
                                Your member account has been created successfully.
                            </p>

                            <p style="color:#4b5563;font-size:16px;">
                                Please use the following credentials to log in.
                            </p>

                            <table width="100%" cellpadding="10" cellspacing="0"
                                style="margin-top:20px;border:1px solid #e5e7eb;border-collapse:collapse;">

                                <tr>
                                    <td style="background:#f9fafb;font-weight:bold;width:180px;">
                                        Login URL
                                    </td>

                                    <td>
                                        <a href="{{ url('/member/login') }}">
                                            {{ url('/member/login') }}
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="background:#f9fafb;font-weight:bold;">
                                        Email
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="background:#f9fafb;font-weight:bold;">
                                        Temporary Password
                                    </td>

                                    <td style="font-size:18px;font-weight:bold;color:#dc2626;">
                                        {{ $temporaryPassword }}
                                    </td>
                                </tr>

                            </table>

                            <div style="margin-top:35px;text-align:center;">

                                <a href="{{ url('/member/login') }}"
                                    style="background:#2563eb;color:#ffffff;padding:14px 28px;text-decoration:none;border-radius:6px;font-size:16px;display:inline-block;">

                                    Login to Congregate

                                </a>

                            </div>

                            <div style="margin-top:35px;padding:18px;background:#fef3c7;border-left:5px solid #f59e0b;">

                                <strong>Important</strong>

                                <p style="margin:10px 0 0 0;color:#92400e;line-height:1.7;">

                                    This password is temporary.

                                    For your security, you will be required to change your password immediately after your first login.

                                </p>

                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center"
                            style="background:#f9fafb;padding:20px;color:#6b7280;font-size:14px;">

                            © {{ date('Y') }} Congregate

                            <br>

                            Religious Organization Management System

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>