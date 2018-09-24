<?php

include 'header.php';

/*if (isset($_SESSION['ID'])){
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";
}*/

include 'dbh.php';
$id = $_REQUEST['addmissionNO'];

$result = "SELECT * FROM addmission WHERE addmissionNO = '$id';";
$test = $conn->query($result);
$row = $test->fetch_assoc();
if (!$result) {
		die("Error: Data not found..");
		}

    $addmissionNO = $row['addmissionNO'];
    $admitDate = $row['admitDate'];
    $relationName = $row['relationName'];
    $relationcontactNO = $row['relationcontactNO'];
    $dischargeDate = $row['dischargeDate'];
    $reason = $row['reason'];
    $wardNO = $row['wardNO'];




if(isset($_POST['save'])){

  $relationName_new = $_POST['relationName'];
  $relationcontactNO_new = $_POST['relationcontactNO'];
  $dischargeDate_new = $_POST['dischargeDate'];
  $reason_new = $_POST['reason'];
  $wardNO_new = $_POST['wardNO'];


  $sql = "UPDATE addmission SET relationName ='$relationName_new', relationcontactNO ='$relationcontactNO_new', dischargeDate ='$dischargeDate_new', reason ='$reason_new', wardNO ='$wardNO_new'
          WHERE addmissionNO = '$id';";

  if (mysqli_multi_query($conn, $sql)) {
      echo "Details updated";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


header("Location: addaddmission.php");
}

 ?>




<div class="container-fluid">
  <div class="content ">

    <div class="col-sm-9">
      <div class="well">
        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Update Addmission</h3>
        </div>
      <form method="POST">
        <div class="form-group">
          <label>Admission Number</label>
          <input type="number" value="<?php echo $addmissionNO; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Relation Name</label>
          <input type="text" name="relationName" value="<?php echo $relationName; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Relation Contact NO</label>
          <input type="number" name="relationcontactNO" value="<?php echo $relationcontactNO; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Discharge Date</label>
          <input type="date" name="dischargeDate" class="form-control" value="<?php echo $dischargeDate; ?>">
        </div>
        <div class="form-group">
          <label>Reason</label>
            <div class="radio">
              <label class="radio-inline">
                <input type="radio" name="reason" value="Cure" <?php if ($reason == 'Cure') { echo "checked";}?>>Cure</label>
              <label class="radio-inline">
                <input type="radio" name="reason" value="Transferred" <?php if ($reason == 'Transferred') { echo "checked";}?>>Transferred</label>
            </div>
        </div>
        <div class="form-group">
          <?php
          $optionq = "SELECT * FROM ward;";
          $resultq = $conn->query($optionq);
          ?>

          <label>Ward NO</label>
          <select name="wardNO" class="form-control" >
            <?php while($rowq = mysqli_fetch_array($resultq)):; ?>
              <option value="<?php echo $rowq[0] ?>" <?php if ($wardNO == $rowq[0]) echo 'selected'; ?>><?php echo $rowq[1]; ?></option>
            <?php endwhile; ?>
          </select>
        </div>

        <hr />
        <br />
        <button type="submit" class="btn btn-default" name="save" value="save">Update</button>

      </form>

    </div>


  </div>
</div>

<br />

</body>
</html>
