<!DOCTYPE html>
<html>

<head>
    <title>Welcome to Our Platform</title>
</head>

<body>
    <h1>Welcome to Our Platform!</h1>
    <p>Your account has been successfully created. Below are your login credentials:</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    
    
    <a href="{{ $loginUrl }}" 
       style="display: inline-block; padding: 10px 20px; color: white; background-color: blue; text-decoration: none; border-radius: 5px;">
       Click Here to Login
    </a>
    
    
    
    
    <p>Please log in and change your password as soon as possible for security reasons.</p>
    <br>
    <p>Thank you!</p>
</body>

</html>