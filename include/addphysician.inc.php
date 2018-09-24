<?php
session_start();
include '../dbh.php';

$phyID = $_POST['phyID'];
$regNO = $_POST['regNO'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$contactNO = $_POST['contactNO'];
$specialistFlag = $_POST['specialistFlag'];
$leadConsultFlag = $_POST['leadConsultFlag'];
$field = $_POST['field'];
$grade = $_POST['grade'];

$sql = "INSERT INTO physician (phyID, regNO, fname, lname, gender, address, contactNO)
VALUES ('$phyID', '$regNO', '$fname', '$lname', '$gender', '$address', '$contactNO');";
$sql .= "INSERT INTO consultant (consultID, field, grade, specialistFlag, leadConsultFlag)
VALUES ('$phyID', '$field', '$grade', '$specialistFlag', '$leadConsultFlag');";



if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


header("Location: ../addphysician.php");
 ?>
