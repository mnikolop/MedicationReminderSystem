<?php
include_once 'db_connect.php';
include_once 'psl-config.php';

$error_msg = "";

//the code for insearting a new 
$stmt1 = $mysqli->prepare("INSERT INTO prescriptions (Doctor, Drug, Patient, Dosage, LastTaken) VALUES (?, ?, ?, ?, ?)");
$stmt1->bind_param("sisii", $doctor, $drug, $patient, $dosage, $lastTaken);

if (isset($_POST['drug'], $_POST['patient'], $_POST['dosage'])) {


    $drug = filter_input(INPUT_POST, 'drug', FILTER_SANITIZE_STRING);
    $patient = filter_input(INPUT_POST, 'patient', FILTER_SANITIZE_STRING);
    $dosage = filter_input(INPUT_POST, 'dosage', FILTER_SANITAZE_NUMBER_INT);
    $doctor = $_SESSION['username'];
    $lastTaken = time();

        // Insert the new user into the database 
     if ($insert_stmt = $mysqli->prepare("INSERT INTO prescriptions (Doctor, Drug, Patient, Dosage) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sisi', $doctor, $drug, $patient, $dosage);            
            if (! $insert_stmt->execute()) {
                header('Location: #');
            }
        }
        echo "Error making perscription";
}

// //the code for insearting a patient in the temp table for the admin to review 
// $stmt2 = $mysqli->prepare("INSERT INTO admin_temp (DUsername, PUsername) VALUES (?, ?)");
// $stmt2->bind_param("ss", $dusername, $pusername);

// if ($_POST['add_patient']) {

//     $pusername = filter_input(INPUT_POST, 'add_patient', FILTER_SANITIZE_STRING);
//     $doctor = $_SESSION['username'];

//         // Insert the new user into the database 
//     // if ($insert_stmt = $mysqli->prepare("INSERT INTO members (Doctor, Drug, Patient, Dosage) VALUES (?, ?, ?, ?)")) {
//     //     $insert_stmt->bind_param('sisi', $doctor, $drug, $patient, $dosage;
//     $stmt2->execute(); // Execute the prepared query.
// }

