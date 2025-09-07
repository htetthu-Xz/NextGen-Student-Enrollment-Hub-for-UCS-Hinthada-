<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Request</title>
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
            color: #1976d2;
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
        .btn {
            display: inline-block;
            padding: 10px 24px;
            background: #1976d2;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('user/images/logo.png') }}">
            <div class="title">Payment Request</div>
        </div>
        <div class="content">
            <p>Dear {{ $reg->User->name }},</p>
            <p>
                Congratulations! Your registration for <strong>{{ $reg->academicYear->name }}</strong> has been approved.
            </p>
            <p>
                To complete your enrollment, please proceed with the payment.
            </p>
            <p>
                သင်တန်းနှစ်ကြေး : {{ number_format($data['reg_fee'], 2) }} MMK <br>
                ကျောင်းဝင်ကြေး : {{ number_format($data['school_entry_fee'], 2) }} MMK <br>
                စာမေးပွဲကြေး : {{ number_format($data['exam_fee'], 2) }} MMK <br>
                အားကစားကြေး : {{ number_format($data['sport_fee'], 2) }} MMK
            </p>
            <p>Description: {{ $data['payment_note'] ?? '-' }}</p>
            <p>
                If you have any questions or need assistance, please contact our support team.
            </p>
            <p style="margin-top: 32px;">
                Thank you for choosing UCS Hinthada.
            </p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} UCS Hinthada. All rights reserved.
        </div>
    </div>
</body>
</html>