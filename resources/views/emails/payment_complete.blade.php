<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Complete</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);}
        .header { text-align: center; margin-bottom: 30px; }
        .header h2 { color: #2d7cff; margin: 0; }
        .content { font-size: 16px; color: #333; }
        .footer { margin-top: 30px; font-size: 13px; color: #888; text-align: center; }
        .btn { display: inline-block; padding: 10px 20px; background: #2d7cff; color: #fff; border-radius: 4px; text-decoration: none; margin-top: 20px;}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Payment Confirmation</h2>
        </div>
        <div class="content">
            <p>Dear {{ $reg->User->name }},</p>
            <p>We have received your payment for <strong>{{ $reg->academicYear->name }}</strong>.</p>

            <p>Your payment has been successfully processed. Thank you for completing this step!</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} UCS Hinthada. All rights reserved.
        </div>
    </div>
</body>
</html>