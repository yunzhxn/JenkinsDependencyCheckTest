<?php
session_start();
if (!isset($_SESSION['password'])) {
    header("Location: index.php");
    exit();
}

$password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <h2>Welcome</h2>
    <p>Your password: <?php echo htmlspecialchars($password); ?></p>
    <form method="post" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
