<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
// include_once 'includes/Doctor.inc.php';

sec_session_start();

$stmt = $mysqli->prepare("INSERT INTO admin_temp (DUsername, PUsername) VALUES (?, ?)");
                        $stmt->bind_param("ss", $doctor, $patien);

                        $patient = filter_input(INPUT_POST, 'patient', FILTER_SANITIZE_STRING);
                        $doctor = $_SESSION['username'];

                        $stmt->execute();