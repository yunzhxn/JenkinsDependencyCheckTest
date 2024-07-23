<?php
session_start();

function isCommonPassword($password) {
    $commonPasswords = file('10-million-password-list-top-1000.txt', FILE_IGNORE_NEW_LINES);
    return in_array($password, $commonPasswords);
}

function validatePassword($password) {
    // Password should be at least 8 characters long
    if (strlen($password) < 8) {
        return false;
    }

    // Password should include at least one lowercase letter, one uppercase letter, one number, and one special character
    if (!preg_match('/[a-z]/', $password) ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[\W_]/', $password)) {
        return false;
    }

    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    if (isCommonPassword($password)) {
        echo "Password is too common.";
        header("refresh:3;url=index.php");
        exit();
    }

    if (!validatePassword($password)) {
        echo "Password does not meet the requirements.";
        header("refresh:3;url=index.php");
        exit();
    }

    $_SESSION['password'] = $password;
    header("Location: welcome.php");
    exit();
}
?>
