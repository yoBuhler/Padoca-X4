<?php
    session_start();

    if ( ! empty( $_GET ) ) {
        if ( isset( $_GET['username'] ) && isset( $_GET['password'] ) ) {
            // Getting submitted user data from database
            $db_host = '127.0.0.1:3306';
            $db_user = 'root';
            $db_pass = '';
            $db_name = 'padoca';

            $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
            $stmt = $con->prepare("SELECT * FROM users WHERE name = ?");
            $stmt->bind_param('s', $_GET['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_object();
            // Verify user pass and set $_SESSION
            if ( password_verify( $_GET['password'], $user->pass ) ) {
                $_SESSION['id'] = $user->id;
                $_SESSION['user'] = $user;
            }
        }
    }
?>