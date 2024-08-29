<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b1d7d1;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
            color: #333333;
        }
        .content h1 {
            color: #333333;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .content .credentials {
            background-color: #f9f9f9;
            border: 1px solid #dddddd;
            padding: 15px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #777777;
        }
        .footer a {
            color: #333333;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            {{-- <img src="https://www.digika.tn/wp-content/uploads/2018/11/main-logo-3.png" alt="Company Logo"> --}}
        </div>
        <div class="content">
            <h1>Welcome to Our Service!</h1>
            <p>Dear <b>{{ $user->name }}</b>,</p>
            <p>Thank you for creating an account with us. We are excited to have you on board. Below are your account details:</p>
            <div class="credentials">
                <p><img src="https://cdn-icons-png.freepik.com/512/8743/8743964.png" alt="email" style="width: 25px"><strong>Email:</strong> {{ $user->email }}</p>
                <p><img src="https://cdn-icons-png.flaticon.com/512/4305/4305535.png" alt="password" style="width: 25px">  <strong>Password:</strong> {{ $plainPassword }}</p>

            </div>
            <b>NB : Please keep this information safe and do not share it with anyone.</b>
            <p>Best regards,<br>....</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Manel Horchani. All rights reserved.</p>
            <p><a href="#">Visit our website</a></p>
        </div>
    </div>
</body>
</html>
