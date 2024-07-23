<?php
session_start();
if (isset($_SESSION['password'])) {
    header('Location: welcome.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="verify.php">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
