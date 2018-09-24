<?php
session_start();
include '../dbh.php';

$uid = $_POST['usrid'];
$pwd = $_POST['pwd'];

$sql ="SELECT * FROM userlogin WHERE username = '$uid' AND password = '$pwd'";
$result = $conn -> query($sql);

if (!$row = $result->fetch_assoc()){
  echo "Your username or password didn't matched";
}else{
  $_SESSION['loginType'] = $row['loginType'];

  }

header("Location: ../index.php");
 ?>
