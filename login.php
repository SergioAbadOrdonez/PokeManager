php
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login_process.php">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</body>
</html>