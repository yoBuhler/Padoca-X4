<?php
    header("Content-Type: application/json; charset=UTF-8");
    
    session_start();

    if ( ! empty( $_POST ) ) {
        if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
            // Getting submitted user data from database
            $db_host = '2a02:4780:bad:c0de::14';
            $db_user = 'id6806891_admin';
            $db_pass = 'admin';
            $db_name = 'id6806891_teste';

            $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
            $stmt = $con->prepare("SELECT * FROM users WHERE name = ?");
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_object();
            // Verify user pass and set $_SESSION
            if ( password_verify( $_POST['password'], $user->pass ) ) {
                $_SESSION['user'] = $user;
                echo json_encode($user);
            }else{
                echo json_encode(
                    array("body" => array(), "count" => 0);
                );
            }
        }
    }
?>