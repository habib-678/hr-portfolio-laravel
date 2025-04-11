<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

    <h2>Hi, {{$resultUrl['name']}} Reset Your Password</h2>
    <p>Click the link below to reset your password:</p>
    <p><a href="{{ $resultUrl['url'] }}">{{ $resultUrl['url'] }}</a></p>
</body>
</html>