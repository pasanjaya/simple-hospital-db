<?php
session_start();
include '../dbh.php';

$pID = $_POST['pID'];
$nic = $_POST['nic'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$contactNO = $_POST['contactNO'];
$refID = $_POST['refID'];

$sql = "INSERT INTO paitent (pID, nic, fname, lname, gender, dob, address, contactNO, refID)
VALUES ('$pID', '$nic', '$fname', '$lname', '$gender', '$dob', '$address', '$contactNO', '$refID');";



if (mysqli_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


header("Location: ../addpaitent.php");
 ?>
