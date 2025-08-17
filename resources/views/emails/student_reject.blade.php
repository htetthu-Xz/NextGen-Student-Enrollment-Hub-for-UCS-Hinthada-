<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Rejected</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f6fb;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            padding: 32px;
        }
        .header {
            text-align: center;
            padding-bottom: 16px;
        }
        .header img {
            width: 80px;
        }
        .title {
            color: #d32f2f;
            font-size: 28px;
            margin-bottom: 8px;
        }
        .content {
            font-size: 16px;
            color: #333;
            line-height: 1.7;
        }
        .footer {
            text-align: center;
            color: #888;
            font-size: 13px;
            margin-top: 32px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('user/images/logo.png') }}">
            <div class="title">Registration Rejected</div>
        </div>
        <div class="content">
            <p>Dear {{ $reg->User->name }},</p>
            <p>
                We regret to inform you that your registration for <strong>{{ $reg->academicYear->name }}</strong> has been <strong>rejected</strong>.
            </p>
            <p>
                The reason for this decision is: <strong>{{ $reg->status_message }}</strong>.
            <p>
                If you have any questions or believe this decision was made in error, please contact our support team for further assistance.
            </p>
            <p style="margin-top: 32px;">
                Thank you for your interest in UCS Hinthada.
            </p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} UCS Hinthada. All rights reserved.
        </div>
    </div>
</body>
</html>
