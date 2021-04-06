<?php

if (isset($_POST['submit'])) {
    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("location: ../showLogin.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";
        
        $statement = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("location: ../showLogin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, "s", $username);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);

            if ($row = mysqli_fetch_assoc($result)) { // take everything from $result and put it into an associative array $row
                
                if ($password != $row['password']) {
                    header("location: ../showLogin.php?error=wrongpassword");
                    exit();
                } else {
                    session_start();
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionUser'] = $row['username'];
                    header("location: ../index.php?success=loggedin");
                    exit();
                }
            } else {
                header("location: ../showLogin.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("location: ../index.php?error=accessforbidden");
    exit();
}

?>