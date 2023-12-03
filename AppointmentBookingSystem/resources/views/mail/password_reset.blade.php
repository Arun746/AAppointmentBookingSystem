<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>

<body>
    <p>Hello {{ $user->fname }},</p>
    <p>Your password has been reset. <br>Your new password is: <strong>{{ $newPassword }}</strong></p>
    <p>Please log in with the new password and consider changing it to a more secure one.</p>
    <p>Thank you!</p>
</body>

</html>
