<?php

include 'header.php';

/*if (isset($_SESSION['ID'])){
  echo "<form action='include/logout.inc.php'>
          <button>Log Out</button>
        </form>";
}*/

include 'dbh.php';
$id = $_REQUEST['pID'];

$result = "SELECT * FROM paitent WHERE pID = '$id';";
$test = $conn->query($result);
$row = $test->fetch_assoc();
if (!$result) {
		die("Error: Data not found..");
		}

    $pID = $row['pID'];
    $nic = $row['nic'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $address = $row['address'];
    $contactNO = $row['contactNO'];
    $refID = $row['refID'];



if(isset($_POST['save'])){

  $nic_new = $_POST['nic'];
  $fname_new = $_POST['fname'];
  $lname_new = $_POST['lname'];
  $gender_new = $_POST['gender'];
  $dob_new = $_POST['dob'];
  $address_new = $_POST['address'];
  $contactNO_new = $_POST['contactNO'];
  $refID_new = $_POST['refID'];

$sql = "UPDATE paitent SET nic ='$nic_new', fname ='$fname_new', lname ='$lname_new', gender ='$gender_new', dob ='$dob_new', address ='$address_new', contactNO ='$contactNO_new', refID ='$refID_new'
        WHERE pID = '$id';";

if (mysqli_multi_query($conn, $sql)) {
    echo "Details updated";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


header("Location: addpaitent.php");
}

 ?>




<div class="container-fluid">
  <div class="content ">

    <div class="col-sm-9">
      <div class="well">
        <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Update Paitent</h3>
        </div>
      <form method="POST">
        <div class="form-group">
          <label>NIC Number</label>
          <input type="text" name="nic" value="<?php echo $nic; ?>" class="form-control" >
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
          <label>Gender </label>
            <div class="radio">
              <label class="radio-inline">
                <input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') { echo "checked";} ?>>Male</label>
              <label class="radio-inline">
                <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') { echo "checked";} ?>>Female</label>
            </div>
        </div>
        <div class="form-group">
          <label>Date of Birth</label>
          <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>">
        </div>
        <div class="form-group">
          <label>Address</label>
          <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" >
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <input type="number" name="contactNO" value="<?php echo $contactNO; ?>" class="form-control" >
        </div>

        <div class="form-group">
          <?php
          $optionq = "SELECT * FROM physician;";
          $resultq = $conn->query($optionq);
          ?>

          <label>Ref. By</label>
          <select name="refID" class="form-control">
            <?php while($rowq = mysqli_fetch_array($resultq)):; ?>
              <option value="<?php echo $rowq[0] ?>" <?php if ($refID == $rowq[0]) echo 'selected'; ?> ><?php echo "Dr. ".$rowq[2]." ".$rowq[3]; ?></option>
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
