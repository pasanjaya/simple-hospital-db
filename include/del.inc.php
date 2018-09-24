<?php
session_start();
include '../dbh.php';


if(isset($_REQUEST['phyID'])){
  $id = $_REQUEST['phyID'];
  $sql = "DELETE FROM consultant WHERE consultID = '$id';";
  $sql .= "DELETE FROM externalphy WHERE eConsultID = '$id';";
  $sql .= "DELETE FROM physician WHERE phyID = '$id';";

  if (mysqli_multi_query($conn, $sql)){
    echo "Deleted data successfully";
  } else{
    echo "Error: " .$sql. "<br />".mysqli_error($conn);
  }
}

elseif (isset($_REQUEST['pID']) and isset($_REQUEST['testID'])) {
  $id1 = $_REQUEST['pID'];
  $id2 = $_REQUEST['testID'];
  $sql = "DELETE FROM testregister WHERE pID = '$id1' AND testID = '$id2';";

  if (mysqli_multi_query($conn, $sql)){
    echo "Deleted data successfully";
  } else{
    echo "Error: " .$sql. "<br />".mysqli_error($conn);
  }
}


elseif (isset($_REQUEST['pID'])) {
  $id = $_REQUEST['pID'];
  $sql = "DELETE FROM paitent WHERE pID = '$id';";

  if (mysqli_multi_query($conn, $sql)){
    echo "Deleted data successfully";
  } else{
    echo "Error: " .$sql. "<br />".mysqli_error($conn);
  }
}

elseif (isset($_REQUEST['testID'])) {
  $id = $_REQUEST['testID'];
  $sql = "DELETE FROM test WHERE testID = '$id';";

  if (mysqli_multi_query($conn, $sql)){
    echo "Deleted data successfully";
  } else{
    echo "Error: " .$sql. "<br />".mysqli_error($conn);
  }
}

elseif (isset($_REQUEST['addmissionNO'])) {
  $id = $_REQUEST["addmissionNO"];
  $sql = "DELETE FROM confirmedpaitent WHERE addmissionNO = '$id';";
  $sql .= "DELETE FROM addmission WHERE addmissionNO = '$id';";

  if (mysqli_multi_query($conn, $sql)){
    echo "Deleted data successfully";
  } else{
    echo "Error: " .$sql. "<br />".mysqli_error($conn);
  }
}




header("Location:".$_SERVER['HTTP_REFERER']);
?>
