<?php

    session_start();
    
    if ( isset( $_SESSION['id'] ) ) {
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages
        echo $_SESSION['user']->status;
    } else {
        // Redirect them to the login page
        // header("Location: http://www.yourdomain.com/login.php");
        echo 'Não funcionou';
    }
?>