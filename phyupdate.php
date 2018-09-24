<?php

include 'header.php';

/*if (isset($_SESSION['ID'])){
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";
}*/

include 'dbh.php';
$id = $_REQUEST['phyID'];

$result = "SELECT * FROM physician, consultant WHERE phyID = consultID AND phyID = '$id';";
$test = $conn->query($result);
$row = $test->fetch_assoc();
if (!$result) {
		die("Error: Data not found..");
		}

    $phyID = $row['phyID'];
    $regNO = $row['regNO'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $gender = $row['gender'];
    $address = $row['address'];
    $contactNO = $row['contactNO'];
    $specialistFlag = $row['specialistFlag'];
    $leadConsultFlag = $row['leadConsultFlag'];
    $field = $row['field'];
    $grade = $row['grade'];


if(isset($_POST['save'])){

  $regNO_new = $_POST['regNO'];
  $fname_new = $_POST['fname'];
  $lname_new = $_POST['lname'];
  $address_new = $_POST['address'];
  $contactNO_new = $_POST['contactNO'];
  $specialistFlag_new = $_POST['specialistFlag'];
  $leadConsultFlag_new = $_POST['leadConsultFlag'];
  $field_new = $_POST['field'];
  $grade_new = $_POST['grade'];

$sql = "UPDATE physician SET regNO = '$regNO_new', fname = '$fname_new', lname = '$lname_new', address = '$address_new', contactNO = '$contactNO_new' WHERE phyID = '$id';";
$sql .= "UPDATE consultant SET field = '$field_new', grade = '$grade_new', specialistFlag = '$specialistFlag_new', leadConsultFlag = '$leadConsultFlag_new' WHERE consultID = '$id';";

if (mysqli_multi_query($conn, $sql)) {
    echo "Details updated";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


header("Location: addphysician.php");
}

 ?>




<div class="container-fluid">
  <div class="content ">

    <div class="col-sm-9">
      <div class="well">
        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Update Physician</h3>
        </div>
      <form method="POST">
        <div class="form-group">
          <label>Regestration Number</label>
          <input type="text" name="regNO" value="<?php echo $regNO; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <input type="number" name="contactNO" value="<?php echo $contactNO; ?>" class="form-control" >
        </div>
        <hr />
        <br />
        <div class="form-group">
          <label>Consultation Type </label>
          <div class="checkbox">
            <label class="checkbox-inline">
              <input type="checkbox"  name="specialistFlag" value="yes" <?php if ($specialistFlag) { echo "checked";} else {echo "";} ?>/> Specialist
            </label>
            <label class="checkbox-inline">
              <input type="checkbox"  name="leadConsultFlag" value="yes" <?php if ($leadConsultFlag) { echo "checked";} else {echo "";} ?>/> Lead Consultant
            </label>
          </div>
        </div>
        <div class="form-group">
          <label>Field</label>
          <input type="text" name="field" value="<?php echo $field; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Grade</label>
          <input type="text" name="grade" value="<?php echo $grade; ?>" class="form-control" >
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
