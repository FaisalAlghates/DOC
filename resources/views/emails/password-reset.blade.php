<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8fafc;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            width: 60px;
            height: 60px;
            background-color: #2563eb;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .logo svg {
            width: 30px;
            height: 30px;
            color: white;
        }
        h1 {
            color: #1f2937;
            margin-bottom: 10px;
            font-size: 24px;
        }
        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }
        .content {
            margin-bottom: 30px;
        }
        .reset-button {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin: 20px 0;
            transition: background-color 0.3s ease;
        }
        .reset-button:hover {
            background-color: #1d4ed8;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
        .warning {
            background-color: #fef3c7;
            border: 1px solid #f59e0b;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            color: #92400e;
        }
        .link-text {
            word-break: break-all;
            background-color: #f3f4f6;
            padding: 10px;
            border-radius: 6px;
            font-family: monospace;
            font-size: 12px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                </svg>
            </div>
            <h1>Password Reset Request</h1>
            <p class="subtitle">We received a request to reset your password</p>
        </div>

        <div class="content">
            <p>Hello {{ $user->name }},</p>
            
            <p>You recently requested to reset your password for your Document Management System account. Click the button below to reset it:</p>
            
            <div style="text-align: center;">
                <a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}" class="reset-button">
                    Reset Your Password
                </a>
            </div>
            
            <p>If the button above doesn't work, you can copy and paste the following link into your browser:</p>
            
            <div class="link-text">
                {{ route('password.reset', ['token' => $token, 'email' => $email]) }}
            </div>
            
            <div class="warning">
                <strong>Security Notice:</strong> This password reset link will expire in 24 hours. If you didn't request this password reset, please ignore this email or contact support if you have concerns.
            </div>
            
            <p>If you continue to have problems, please contact our support team.</p>
            
            <p>Best regards,<br>
            Document Management System Team</p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Document Management System. All rights reserved.</p>
            <p>This is an automated message, please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
