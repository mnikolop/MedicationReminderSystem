<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['username'], $_POST['p'])) {
    $username = $_POST['username'];
    $password = $_POST['p']; // The hashed password.

    if (login($username, $password, $mysqli) == true) {
        // Login success 
        if ($stmt = $mysqli->prepare("SELECT capacity 
                                        FROM members
                                        WHERE username = ?
                                        LIMIT 1"))
        {
            $stmt->bind_param('s', $username);  // Bind "$username" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();
 
            $stmt->bind_result($capacity);
            $stmt->fetch();

            if ($capacity == "patient")
            {
               // echo $capacity;
                header('Location: ../Patient.php');
            }
            elseif ($capacity == "doctor")
            {   
                //echo $capacity;
                header('Location: ../Doctor.php');
            }
            elseif ($capacity == "admin")
            {   
                //echo $capacity;
                header('Location: ../Admin.php');
            }
        
    }
} else {
        // Login failed 
    header('Location: ../index.php?error=1');
}
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}