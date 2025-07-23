<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to UCS Hinthada</title>
</head>
<body>
    <h2>Congratulations!</h2>
    <p>Dear {{ $fresher->name }},</p>
    <p>
        We are pleased to inform you that your student account has been created successfully.
    </p>
    <p>
        <strong>Edu Email:</strong> {{ $fresher->email }}<br>
        <strong>Password:</strong> {{ 'P@ssw0rd' }}
    </p>
    <p>
        Please use these credentials to log in to the <a href="{{ route('login') }}">Student Enrollment System</a>.
    </p>
    <p>
        For your security, please change your password after your first login.
    </p>
    <p>
        If you have any questions, feel free to contact the administration office.
    </p>
    <br>
    <p>Best regards,<br>
    UCS Hinthada Administration</p>
</body>
</html>